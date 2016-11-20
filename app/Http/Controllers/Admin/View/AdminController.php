<?php

namespace App\Http\Controllers\Admin\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Commit;
use App\Models\Book;

include app_path().'/Tool/Qiniu/autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;

class AdminController extends Controller{

  public function toAdmin(Request $request)
  {
    return view('admin/index');
  }

  public function toPc(Request $request)
  {
    return view('admin/pc');
  }
  public function toVideo(Request $request)
  {
    //查找数据
    $title = $request->input('title','');
    $tab = $request->input('tab','');
    $video = Video::where('video_title','like','%'.$title.'%')->where('tab','like','%'.$tab.'%')->orderBy('created_at','desc')->paginate(10);
    $num = Video::where('video_title','like','%'.$title.'%')->where('tab','like','%'.$tab.'%')->count();

    return view('admin/video')->with('videos',$video)->with('title',$title)->with('tab',$tab)->with('num',$num);
  }

  public function toVideoAdd(Request $request)
  {
    // 需要填写你的 Access Key 和 Secret Key
    $accessKey = '-xpzbXEV0gDocV0_SsQFn-WYczH9kPQr27wtYQ_2';
    $secretKey = 'Lpynlw9BBhexmODsMV0a4-v-Kzp6zm_njdXaTUxJ';

    // 构建鉴权对象
    $auth = new Auth($accessKey, $secretKey);

    // 要上传的空间
    $bucket = 'video';

    // 生成上传 Token
    $token = $auth->uploadToken($bucket);

    return view('admin/VideoAdd')->with('token',$token);
  }
}