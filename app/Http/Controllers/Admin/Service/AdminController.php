<?php

namespace App\Http\Controllers\Admin\Service;

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

  public function changState(Request $request)
  {
    $id = $request->input('id');
    $state = $request->input('state');

    $data = Video::where('id',$id)->first();
    $data->state = $state;
    if (!$data->save()){
      return '存储失败';
    }

    return '1';
  }

  public function changHome(Request $request)
  {
    $id = $request->input('id');
    $state = $request->input('state');

    $data = Video::where('id',$id)->first();
    $data->home = $state;
    if (!$data->save()){
      return '存储失败';
    }

    return '1';
  }

  public function changBookState(Request $request)
  {
    $id = $request->input('id');
    $state = $request->input('state');

    $data = Book::where('id',$id)->first();
    $data->state = $state;
    if (!$data->save()){
      return '存储失败';
    }

    return '1';
  }

  public function changBookHome(Request $request)
  {
    $id = $request->input('id');
    $state = $request->input('state');

    $data = Book::where('id',$id)->first();
    $data->home = $state;
    if (!$data->save()){
      return '存储失败';
    }

    return '1';
  }

  public function videoDel(Request $request){
    $id = $request->input('id');
    $data = Video::where('id',$id)->first();

    $video_key = str_replace('oejvtim90.bkt.clouddn.com/','',$data->video_url);

    $accessKey = '-xpzbXEV0gDocV0_SsQFn-WYczH9kPQr27wtYQ_2';
    $secretKey = 'Lpynlw9BBhexmODsMV0a4-v-Kzp6zm_njdXaTUxJ';

    //初始化Auth状态
    $auth = new Auth($accessKey, $secretKey);

    //初始化BucketManager
    $bucketMgr = new BucketManager($auth);

    //你要测试的空间， 并且这个key在你空间中存在
    $bucket = 'video';

    $err = $bucketMgr->delete($bucket, $video_key);

    if ($err !== null) {
      return '远程仓库没有删除或者已经删除';
    } else {

      if(!Video::where('id',$id)->delete()){
        return '删除失败';
      }

      return '1';
    }

  }

  public function bookDel(Request $request){

    $id = $request->input('id');
    $data = Book::where('id',$id)->first();


    $book_key = str_replace('http://ogh4xbkgc.bkt.clouddn.com/','',$data->book_content_img);
    $thumb = explode(',',$book_key);

    $accessKey = '-xpzbXEV0gDocV0_SsQFn-WYczH9kPQr27wtYQ_2';
    $secretKey = 'Lpynlw9BBhexmODsMV0a4-v-Kzp6zm_njdXaTUxJ';

    //初始化Auth状态
    $auth = new Auth($accessKey, $secretKey);

    //初始化BucketManager
    $bucketMgr = new BucketManager($auth);

    //你要测试的空间， 并且这个key在你空间中存在
    $bucket = 'book';

    foreach ($thumb as $img){

      $key = $img;
      //删除$bucket 中的文件 $key
      $bucketMgr->delete($bucket, $key);

    }



      if(!Book::where('id',$id)->delete()){
        return '删除失败';
      }

      return '1';



  }

}