<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/web/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/nivo-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/book.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/book_list.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/lib/layer/skin/layer.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/font-awesome.min.css') }}">
  </head>
  <body>
  {{--回到顶部--}}
    <div id="scrollToTop"></div>
  {{--头部--}}
  <header id="lifan-header">
    <ul>
      <li><a href="/">首页</a></li>
      <li>音乐模式</li>
      <li><a href="weibo">微博</a></li>
      @if($username != null)

        @if($username->username != null)
          <li style="float: right;width: auto ;cursor: pointer" onclick="dialog.confirm('是否注销','{{asset("/login")}}')"><p>注销</p></li>
          <li style="float: right;width: auto"><p>尊敬的用户:{{$username->username}}</p></li>

        @else
          <li style="float: right"><a href="{{asset('/login')}}">登录</a></li>
          <li style="float: right"><a href="{{asset('/register')}}" >注册</a></li>
        @endif

      @else
        <li style="float: right"><a href="{{asset('/login')}}">登录</a></li>
        <li style="float: right"><a href="{{asset('/register')}}" >注册</a></li>
      @endif

    </ul>
  </header>

  {{--banner--}}
  <div id="lifan-banner">
    <div class="lifan-middle">
      <div class="lifan-username">
        @if($username != null)

          @if($username->thumb != null)

            <img src="{{$username->thumb}}" alt="1">
          @else
            <img src="{{asset('/web/images/6.jpg')}}" alt="1">
          @endif

        @else
          <img src="{{asset('/web/images/6.jpg')}}" alt="1">
        @endif

      </div>
    </div>

  </div>
  {{--nav导航--}}
  <div id="lifan-nav">
    <ul>
      <li page="0"><a href="{{asset('/')}}">主页</a></li>
      <li page="1"><a href="{{asset('/video')}}">视频</a></li>
      <li page="2"><a href="{{asset('/book')}}">本子</a></li>
      <li page="3"><a href="{{asset('/music')}}">音乐</a></li>
      <li page="4"><a href="{{asset('')}}">论坛</a></li>
      <div class="lifan-nav-cur"></div>
    </ul>
  </div>
  @yield('content')

  <footer style="width: 100%;height: 100px;">
    <div class="footer-middle" style="width: 1200px;height: 100%;margin: 0 auto; border-top: 1px solid #e8e1e1;margin-top: 10px;">
      <div>Copyright © 2011 - 2016 FD Professional Version by </div>
    </div>

  </footer>
  </body>
  <script src="{{ asset('/web/lib/jquery.js') }}"></script>
  <script src="{{ asset('/web/lib/radialIndicator.js') }}"></script>
  <script src="{{ asset('/web/lib/jquery.nivo.slider.pack.js') }}"></script>
  <script src="{{ asset('/web/lib/picture.js') }}"></script>
  <script src="{{ asset('/web/lib/kindeditor/kindeditor.js') }}"></script>
  <script src="{{ asset('/web/js/uploadFile.js') }}"></script>
  <script src="{{ asset('/web/lib/layer/layer.js') }}"></script>
  <script src="{{ asset('/web/lib/layer/dialog.js') }}"></script>
  <script src="{{ asset('/web/lib/titleBar.js') }}"></script>
  <script src="{{ asset('/web/lib/scrollToTop.js') }}"></script>
  <script src="{{ asset('/web/js/book.js') }}"></script>
  <script src="{{ asset('/web/js/header.js') }}"></script>
  <script src="{{ asset('/web/js/nav.js') }}"></script>
  <script src="{{ asset('/web/lib/scrollView.js') }}"></script>



  <script>
    var lifan_nav_ul =$('#lifan-nav ul');
    var lifan_nav_li =$('#lifan-nav li');
    var lifan_nav_div =$('#lifan-nav .lifan-nav-cur');
    var li_num = $('#lifan-nav li').length;

    lifan_nav_div.css({
      left:'{{$page}}' * (lifan_nav_div.width() + 10)
    });

    for(var i=0;i<li_num-1;i++){
      lifan_nav_li.on('mouseover',function(){
        lifan_nav_div.css({
          'left':$(this).index()* (lifan_nav_div.width() + 10)
        })
      })
    }
    lifan_nav_ul.on('mouseout',function(){
      lifan_nav_div.css({
        left:'{{$page}}' * (lifan_nav_div.width() + 10)
      });
    })
//    lifan_nav_ul.hover(function(){
//      console.log('adsa')
//    });

    {{--lifan_nav_li.hover(function(){--}}
        {{--lifan_nav_div.animate({--}}
          {{--left:$(this).attr('page') * (lifan_nav_div.width() + 10)--}}
        {{--})--}}
    {{--},function(){--}}
      {{--lifan_nav_div.animate({--}}
        {{--left:'{{$page}}' * (lifan_nav_div.width() + 10)--}}
      {{--})--}}
    {{--});--}}


    $('#scrollToTop').BackToTop({style:{backgroundColor:null,backgroundUrl:'/web/images/black-cat.png'}})




  </script>
  @yield('my-js')
  </html>