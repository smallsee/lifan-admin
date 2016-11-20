<?php

namespace App\Http\Controllers\Web\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\M3Result;
use App\Tool\UUID;


include app_path().'/Tool/Qiniu/autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;
class BookController extends Controller{

  public function bookList(Request $request){

    $page = $request->get('page','1');
    $down =$request->get('dowm','0');
    $tab =$request->get('tab','个人动画');
    if ($tab == '全部'){
      $tab = '';
    }
    $user = Book::where('tab','like','%'.$tab.'%')->orderBy('created_at','desc')->skip(20*($page-1)+$down)->take(10)->get();



    if ($user->first() == null){
      return 'end';
    }


    return $user;
  }

  public function addBook(Request $request){


    $a = $_FILES['imgFile'];
    $m3_result = new M3Result();

    // 需要填写你的 Access Key 和 Secret Key
    $accessKey = '-xpzbXEV0gDocV0_SsQFn-WYczH9kPQr27wtYQ_2';
    $secretKey = 'Lpynlw9BBhexmODsMV0a4-v-Kzp6zm_njdXaTUxJ';

    // 构建鉴权对象
    $auth = new Auth($accessKey, $secretKey);
    $bucket = 'book';
    $filePath = $a['tmp_name'];

    $uploadMgr = new UploadManager();
    $key = UUID::create();
    $token = $auth->uploadToken($bucket);

    //初始化BucketManager
    $bucketMgr = new BucketManager($auth);


    list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
    if ($err !== null) {
      var_dump($err);
    } else {
      $url = ('http://ogh4xbkgc.bkt.clouddn.com/'.$ret['key']);
      $request->session()->push('book_content_img',$url);
      $m3_result->error = 0;
      $m3_result->url = $url;
    }



//    //获取文件的状态信息
//    list($ret, $err) = $bucketMgr->stat($bucket, $key);
//    if ($err !== null) {
//      dd($err);
//    } else {
//      dd($ret);
//    }



    return $m3_result->toJson();
  }

  public function book(Request $request){

    $content_img = $request->session()->get('book_content_img');

    if ($content_img){
      $content_imgs  = '';
      foreach ($content_img as $img){
        $content_imgs.=$img.',';
      }
      $imgs = rtrim($content_imgs, ',');
    }else{
      return '请上传图片';
    }


    $username = $request->session()->get('username');
    if (!$username){
      return '用户没有登录无法操作';
    }else if ($username->statue !=1){
      return '用户账号没有激活,请去邮箱激活';
    }


    $content =  $request->input('content','');
    $thumb =  $request->input('thumb','');
    $parent_id =  $request->input('parent_id','');
    $book_title =  $request->input('book_title','');
    $tab =  $request->input('checkArr','');
    $state =  $request->input('state','0');

    if ($tab[0] !=null){
      $tabs  = '';
      foreach ($tab as $img){
        $tabs.=$img.',';
      }
      $tab = rtrim($tabs, ',');
    }else{
      return '前填写标签';
    }

    if (!strlen($book_title)>0){
      return '请填写标题';
    }
    if (strlen($parent_id)<6){
      return '文字内容要求大于6个字符';
    }
    if ($thumb == '/web/images/icon-add.png'){
      return '请上传封面图';
    }

    $id = $request->input('id');
    if(!$id){
      $book = new Book();
    }else{
      $book = Book::where('id',$id)->first();
    }

    $book->user_id = $username->id;
    $book->username = $username->username;
    $book->user_thumb = $username->thumb;
    $book->state = 0;
    $book->book_thumb = $thumb;
    $book->book_list = $parent_id;
    $book->content = $content;
    $book->book_title = $book_title;
    $book->book_content_img = $imgs;
    $book->tab = $tab;
    $book->state = $state;
    if (!$book->save()){
      return '存储出现问题';
    }



    return 1;

  }
}