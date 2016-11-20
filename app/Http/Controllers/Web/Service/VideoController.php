<?php

namespace App\Http\Controllers\Web\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

include app_path().'/Tool/Qiniu/autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;

class VideoController extends Controller{

  public function addVideo(Request $request){

    $username = $request->session()->get('username');
    if (!$username){
      return '用户没有登录无法操作';
    }else if ($username->statue !=1){
      return '用户账号没有激活,请去邮箱激活';
    }


    $tab =  $request->input('tab','');
    $video_url =  $request->input('video_url','');
    $video_title =  $request->input('video_title','');
    $video_content =  $request->input('video_content','');
    $thumb =  $request->input('thumb','');
    $state = $request->input('state','0');

    if ($tab[0] !=null){
      $tabs  = '';
      foreach ($tab as $img){
        $tabs.=$img.',';
      }
      $tab = rtrim($tabs, ',');
    }else{
      return '前填写标签';
    }

    if (!strlen($video_title)>0){
      return '请填写标题';
    }
    if (strlen($video_content)<6){
      return '文字内容要求大于6个字符';
    }
    if ($thumb == '/web/images/icon-add.png'){
      return '请上传封面图';
    }


    $id =  $request->input('id');
    if (!$id){
      $video = new Video();
    }else{
      $video =Video::where('id',$id)->first();

    }

    $video->user_id = $username->id;
    $video->user_thumb = $username->thumb;
    $video->video_title = $video_title;
    $video->video_thumb = $thumb;
    $video->content = $video_content;
    $video->video_url = $video_url;
    $video->tab = $tab;
    $video->state = $state;
    if (!$video->save()){
      return '存储失败 ';
    }
    return '1';


  }

}