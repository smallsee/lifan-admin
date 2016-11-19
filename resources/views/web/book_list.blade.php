@extends('web/master')


@section('title', '本子观看日')

@section('content')

<div id="book_list">
  <div class="book_list_user">
    <div>
      <img src="{{$book->user_thumb}}" alt="">
    </div>
  </div>
  <div class="book_list_image">
    <div class="book_list_title">
      {{$book->book_title}}
    </div>
    <div class="book_list_content">
      <div class="content_create_time" style="width: 100%;height: 20px;margin-bottom: 10px;">
        <p class="icon-time" style="margin-right: 10px;font-size: 22px; color: #F6697A;"></p>{{$book->updated_at}}
      </div>

      <div class="book_list_content_image">
        {{$book->book_list}}
      </div>

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
      {{$commit->content}}
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
    var pic = $('.book_list_content_image');
    var mask = $('#book_list_mask');
    var hP = $('.book_list_image');
    mask.css({
      opacity:0,
      zIndex:-1
    })
    var list = pic.text();

    pic.html(list);
    var $img =$('.book_list_content_image img');

    setTimeout(function () {
      $img.each(function(index,value){
        if ($(value).width() > $('.book_list_content_image').width()){
          $(value).animate({
            width:'100%'
          },100)
        }

      });
    },300);
    $(window).on('scroll',function(){
      var bookH =hP.height();
      main.height(bookH+5);
      user.height(bookH);
      $img.each(function(index,value){
        if ($(value).width() > $('.book_list_content_image').width()){
          $(value).animate({
            width:'100%'
          },100)
        }
      });
    });


    $img.each(function(index,value){
      var img = $(value).attr('src');
      $(value).attr('data-role','lightbox').attr('data-source',img).attr('data-group','group-1')
              .attr('data-id',index).attr('data-caption','o(╯□╰)o');
      if ($(value).width() > $('.book_list_content_image').width()){
        $(value).css({
          width:'100%'
        })
      }

    });

    var lightbox = new LightBox({
      speed:300,
      maxWidth:'auto',
      maxHeight:'auto',
      maskOpacity:0.5,
      scalePic:1
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
        data: { content:content,book_id:"{{$book->id}}",_token: "{{csrf_token()}}"},
        success: function(data) {
          if (data == 0){
            dialog.success('回复完成,点击确定回来看贴吧','{{asset("/book/list?id=")}}{{$book->id}}');
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
