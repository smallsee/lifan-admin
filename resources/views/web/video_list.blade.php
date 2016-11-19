@extends('web/master')


@section('title', '视频观看日')

@section('content')

<div id="book_list">
  <div class="book_list_user">
    <div>
      <img src="{{$video->user_thumb}}" alt="">
    </div>
  </div>
  <div class="book_list_image">
    <div class="book_list_title">
      {{$video->video_title}}
    </div>
    <div class="book_list_content">
      <div class="content_create_time" style="width: 100%;height: 20px;margin-bottom: 10px;">
        <p class="icon-time" style="margin-right: 10px;font-size: 22px; color: #F6697A;"></p>{{$video->updated_at}}
      </div>
      <video controls="controls" src="http://{{$video->video_url}}"  class="content_video" style="width: 100%;margin-bottom:20px;background-color: gray">

      </video>

      @if($show)
        <div class="book_list_show">
          zcsdoiadoisadnsadosahdhsaohdiosa
        </div>
      @else
        <div class="book_list_hide">
          <span onclick="baiduCallBack()">回复后才能看到隐藏的东西哦</span>
        </div>
      @endif
    </div>
  </div>
</div>

@foreach($commits as $commit)
  <div class="book_commit">
    <div class="book_commit_user">
      <div>
        <img src="{{$commit->user_thumb}}" alt="">
      </div>
    </div>

    <div class="book_commit_content">
      {{$commit->video_content}}
    </div>
  </div>
@endforeach


<div id="book_list_mask">
  <textarea id="book_list_baidu"></textarea>
  <button class="book_list_baidu_call">回复</button>
  <button class="book_list_baidu_close">关闭</button>
</div>


@endsection

@section('my-js')

  <script>
    var main = $('#book_list');
    var user = $('.book_list_user');

    var mask = $('#book_list_mask');
    var hP = $('.book_list_image');
    mask.css({
      opacity:0,
      zIndex:-1
    })

    var $img =$('.book_list_content_image img');

    $(window).on('scroll',function(){
      var bookH =hP.height();
      main.height(bookH+5);
      user.height(bookH);

    });



    function baiduCallBack(){
      console.log('{{$username}}');
      if ('{{$username}}'.length > 0){
        mask.css({
          opacity:1,
          zIndex:5
        })
      }else{
        dialog.toconfirm('请登录后再回复');
      }

    }


    $('.book_list_baidu_close').click(function(){
      mask.css({
        opacity:0,
        zIndex:-1
      })
    })
    KindEditor.ready(function(K){
      window.editor = K.create('#book_list_baidu',{
        uploadJson : "{{asset('/api/book_add')}}",
        afterBlur : function(){this.sync();}, //
      })
    });

    $('.book_list_baidu_call').click(function(){
      var content= $('#book_list_baidu').val();
      console.log(content);
      $.ajax({
        type: "POST",
        url: "{{asset('/api/book_commit')}}",
        cache: false,
        data: { video_content:content,video_id:"{{$video->id}}",_token: "{{csrf_token()}}"},
        success: function(data) {
          if (data == 0){
            dialog.success('回复完成,点击确定回来看贴吧','{{asset("/video_list?id=")}}{{$video->id}}');
          }else{
            dialog.error(data);
          }
        },
        error: function(xhr, status, error) {
          console.log(xhr);
          console.log(status);
          console.log(error);
        }
      });
    })
  </script>

@endsection
