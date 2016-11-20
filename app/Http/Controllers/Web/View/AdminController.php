<?php

namespace App\Http\Controllers\Web\View;

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


  public function book(Request $request){

    $page = $request->get('page','1');

    $users = Book::paginate(10);
    $book = Book::skip(($page-1)*10)->take(10)->get();
    return view('web/adminBook')->with('users',$users)->with('books',$book);
  }

  public function bookDel(Request $request){
    $id = $request->get('id','');
    $book = Book::where('id',$id)->first();

    $book_key = str_replace('http://ogh4xbkgc.bkt.clouddn.com/','',$book->book_content_img);
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
      $err = $bucketMgr->delete($bucket, $key);
      echo "\n====> delete $key : \n";
      if ($err !== null) {
        var_dump($err);
      } else {
        echo "Success!";
      }

    }
  }


}