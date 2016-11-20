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
    $state = $request->input('state','');
    $video = Video::where('video_title','like','%'.$title.'%')->where('tab','like','%'.$tab.'%')->where('state','like','%'.$state.'%')->orderBy('created_at','desc')->paginate(10);
    $num = Video::where('video_title','like','%'.$title.'%')->where('tab','like','%'.$tab.'%')->where('state','like','%'.$state.'%')->count();

    return view('admin/video')->with('videos',$video)->with('title',$title)->with('tab',$tab)->with('state',$state)->with('num',$num);
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

    return view('admin/videoAdd')->with('token',$token);
  }

  public function toVideoEdit(Request $request)
  {
    $id = $request->get('id');
    $data = Video::where('id',$id)->first();

    $tab = explode(',',$data->tab);

    // 需要填写你的 Access Key 和 Secret Key
    $accessKey = '-xpzbXEV0gDocV0_SsQFn-WYczH9kPQr27wtYQ_2';
    $secretKey = 'Lpynlw9BBhexmODsMV0a4-v-Kzp6zm_njdXaTUxJ';

    // 构建鉴权对象
    $auth = new Auth($accessKey, $secretKey);

    // 要上传的空间
    $bucket = 'video';

    // 生成上传 Token
    $token = $auth->uploadToken($bucket);

    return view('admin/videoEdit')->with('token',$token)->with('video',$data)->with('tab',$tab);
  }

  public function toBook(Request $request)
  {

    //查找数据
    $title = $request->input('title','');
    $tab = $request->input('tab','');
    $state = $request->input('state','');

    $book = Book::where('book_title','like','%'.$title.'%')->where('tab','like','%'.$tab.'%')->where('state','like','%'.$state.'%')->orderBy('created_at','desc')->paginate(10);

    $num = Book::where('book_title','like','%'.$title.'%')->where('tab','like','%'.$tab.'%')->where('state','like','%'.$state.'%')->count();

    return view('admin/book')->with('books',$book)->with('title',$title)->with('tab',$tab)->with('state',$state)->with('num',$num);
  }

  public function toBookAdd(Request $request)
  {
    $request->session()->put('book_content_img',null);

    return view('admin/bookAdd');
  }

  public function toBookEdit(Request $request)
  {

    $id = $request->get('id');
    $data = Book::where('id',$id)->first();

    $tab = explode(',',$data->tab);


    return view('admin/bookEdit')->with('book',$data)->with('tab',$tab);
  }


}