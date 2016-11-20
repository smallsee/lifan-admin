<?php

namespace App\Http\Controllers\Web\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Commit;

include app_path().'/Tool/Qiniu/autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;

class VideoController extends Controller{

  public function toVideo(Request $request){

//第几页
    $page = 1;
    $username = $request->session()->get('username');

    //查找video

    $video_hot = Video::where('state','1')->where('home','1')->orderBy('see','desc')->skip(0)->take(8)->get();
    if (!$video_hot){
      $message = '数据不够请管理员添加';
      return view('web/statue')->with('username',$username)->with('page',$page)->with('message',$message);
    }


    return view('web/video')->with('username',$username)
                ->with('page',$page)->with('video_hots',$video_hot);
  }

  public function toAddVideo(Request $request){

    // 需要填写你的 Access Key 和 Secret Key
    $accessKey = '-xpzbXEV0gDocV0_SsQFn-WYczH9kPQr27wtYQ_2';
    $secretKey = 'Lpynlw9BBhexmODsMV0a4-v-Kzp6zm_njdXaTUxJ';

    // 构建鉴权对象
    $auth = new Auth($accessKey, $secretKey);

    // 要上传的空间
    $bucket = 'video';

    // 生成上传 Token
    $token = $auth->uploadToken($bucket);

//第几页
    $page = 1;
    $request->session()->put('book_content_img',null);
    $username = $request->session()->get('username');
    if (!$username){
      $message = '用户登录后才能进行添加操作';
      return view('web/statue')->with('username',$username)->with('page',$page)->with('message',$message);
    }else if ($username->statue != 1){
      $message = '用户激活后才能进行添加操作';
      return view('web/statue')->with('username',$username)->with('page',$page)->with('message',$message);
    }

    return view('web/addVideo')->with('username',$username)
      ->with('page',$page)->with('token',$token);
  }


  public function video_list(Request $request){
//第几页
    $page = 1;
    $username = $request->session()->get('username');

    //观看人数+1
    $video_id = $request->get('id','');
    $video = Video::where('id',$video_id)->first();
    $see = $video->see;
    $video->see = $see + 1;
    if ($video->save()){
      $video = Video::where('id',$video_id)->first();
    }


    $commit = Commit::where('video_id',$video_id)->get();

    $show =false;
    if (!$username){
      return view('web/video_list')->with('username',$username)
        ->with('page',$page)->with('video',$video)->with('show',$show)->with('commits',$commit);
    }else if ($username->statue != 1){
      $message = '用户激活后才能进行添加操作';
      return view('web/statue')->with('username',$username)->with('page',$page)->with('message',$message);
    }

    $show = Commit::where(['video_id'=>$video_id,'user_id'=>$username->id])->first();
    if ($show){
      $show = true;
    }else{
      $show = false;
    }

    return view('web/video_list')->with('username',$username)
      ->with('page',$page)->with('video',$video)->with('show',$show)->with('commits',$commit);
  }





}