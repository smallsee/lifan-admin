<?php

namespace App\Http\Controllers\Web\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Video;
use App\Models\Commit;
use App\Models\M3Result;
use App\Tool\UUID;


include app_path().'/Tool/Qiniu/autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;
class CommitController extends Controller{

  public function book_commit(Request $request){

    $content = $request->input('content','');
    $book_id = $request->input('book_id','');
    $video_id = $request->input('video_id','');
    $video_content = $request->input('video_content','');

    $user = $request->session()->get('username');
    if (!$user){
      return '用户没有登录';
    }



    $user_id = $user->id;
    $user_thumb = $user->thumb;

    $commit = new Commit();
    $commit->user_id = $user_id;
    $commit->user_thumb = $user_thumb;
    $commit->book_id = $book_id;
    $commit->video_id = $video_id;
    $commit->content = $content;
    $commit->video_content = $video_content;
    if (!$commit->save()){
      return '存储失败';
    }

    if ($book_id == ''){
      $video = Video::where('id',$video_id)->first();
      $reply = $video->reply;
      $video->reply = $reply+1;

      if (!$video->save()){
        return '视频评论数增加错误';
      }
    }

    if ($video_id == ''){
      $book = Book::where('id',$book_id)->first();
      $reply = $book->reply;
      $book->reply = $reply+1;

      if (!$book->save()){
        return '本子评论数增加错误';
      }
    }

    return  0;
  }
}