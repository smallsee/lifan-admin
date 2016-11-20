@extends('web/master')
@section('title','app首页')
<link rel="stylesheet" href="{{ asset('/web/css/index.css') }}">
@section('content')


  {{--幻灯片--}}
  <div id="scrollView">
    <ul>

      @foreach($big_imgs as $key => $big_img)
      <li>
        <div class="scrollXiaohai-firstPic">
          <a href="{{asset('/book/list?id=')}}{{$big_img->id}}"><img src="{{$big_img->book_thumb}}" width="100%" height="100%"></a>
          <div  class="scrollXiaohai-firstPic-P">
            {{$big_img->book_title}}
          </div>
        </div>

        <div class="right">
          <div class="scrollXiaohai-second">
            <a href="{{asset('/book/list?id=')}}{{$small_img[$key]->id}}"><img src="{{$small_img[$key]->book_thumb}}" width="100%" height="100%"></a>
            <div  class="scrollXiaohai-firstPic-P">
              {{$small_img[$key]->book_title}}
            </div>
          </div>
          <div class="scrollXiaohai-third">
            <a href="{{asset('/book/list?id=')}}{{$small_img[$key+3]->id}}"><img src="{{$small_img[$key+3]->book_thumb}}" width="100%" height="100%"></a>
            <div  class="scrollXiaohai-firstPic-P">
              {{$small_img[$key+3]->book_title}}
            </div>
          </div>
        </div>
      </li>
      @endforeach


    </ul>
  </div>

  <div class="index-nav-title" style="background: url('{{asset("/web/images/diy_head.png")}}') 40% -3% no-repeat "></div>
  {{--搞定作者--}}
  <div id="fd-people" style="width:1200px;height: 250px;margin: 0 auto">
    <ul style="width: 100%;height: 100%;">
      @foreach($users as $user)
      <li>
        <div class="fd-people-top">
          <img src="{{$user->thumb}}" alt="" height="125px" width="232px">
          <img class="fd-people-thumb" src="{{$user->thumb}}" alt="" style="">
        </div>
        <div class="fd-people-bottom">
          <div><b>sdasdadas</b></div>
          <div>{{$user->username}}</div>
        </div>
      </li>
      @endforeach

    </ul>
  </div>

  <div class="index-nav-title" style="background: url('{{asset("/web/images/diy_head.png")}}') 40% 30% no-repeat "></div>

  {{--搞定scrillView--}}
  <div id="scroll-author-video">
    <div class="slider-wrapper scroll-author-video-left" style="width: 600px;height: 400px;position: relative;float: left">
      <div id="slider" class="nivoSlider" style="width: 600px;height: 400px">
        @foreach($home_videos as $home_video)
          <a href="{{asset('/video_list?id=')}}{{$home_video->id}}">
        <img src="{{$home_video->video_thumb}}" alt="" width="100%" >
          </a>
        @endforeach
      </div>
      <div id="indicatorContainer" ></div>
    </div>

    <div class="scroll-author-video-right" style="position: relative;overflow: hidden">

      @foreach($home_videos as $home_video)
      <div style="width: 100%;height: 100% ;background-color: white;" class="active scroll-author-video-right-tab">
        <p>{{$home_video->video_title}}</p>
        <div class="scroll-author-video-author">

          <img src="{{$home_video->user_thumb}}" alt="5">

          <div class="scroll-author-video-author-icon" >
            <div><i class="icon-user"></i><span>:{{$home_video->id}}</span></div>
            <div><i class="icon-time"></i><span>:{{$home_video->updated_at}}</span></div>
          </div>
          <div class="scroll-author-video-author-see">
            <span class="icon-eye-open"></span>
            <span class="icon-comment"></span>
            <span class="icon-star"></span>
            <span>{{$home_video->see}}</span>
            <span>{{$home_video->reply}}</span>
            <span>5</span>
          </div>
        </div>
        <div class="scroll-author-video-author-content">
          {{$home_video->content}}
        </div>
        <div class="scroll-author-video-author-more">
          < 更多 <
        </div>
      </div>
      @endforeach


    </div>
  </div>

  <div class="index-nav-title" style="background: url('{{asset("/web/images/diy_head.png")}}') 40% 65% no-repeat "></div>

  <div id="bette_video" style="margin: 0 auto">
    <ul>
      @foreach($good_videos as $good_video)
      <li> <a href="{{asset('/video_list?id=')}}{{$good_video->id}}">
          <img src="{{$good_video->video_thumb}}" alt="" width="100%" >
          </a>
          <div class="bette_video_author">
            <div class="bette_video_author_video">
              <img src="{{$good_video->user_thumb}}" alt="" width="100%" height="242px" >
              <p>{{$good_video->video_title}}</p>
              <div class="bette_video_author_video_name">
                <div class="left">by:{{$good_video->user_id}}</div>
                <div class="right">{{$good_video->reply}}</div>
                <div class=" icon-comments right"></div>
                <div class="right">{{$good_video->see}}</div>
                <div class="icon-eye-open right"></div>

              </div>
            </div>
            <div class="bette_video_author_content">
              <div class="bette_video_author_content_tab">{{$good_video->tab}}</div>
              <div class="bette_video_author_content_content">
                {{$good_video->content}}
              </div>
            </div>
          </div>
      </li>
      @endforeach

    </ul>
  </div>

  <div class="index-nav-title" style="background: url('{{asset("/web/images/diy_head.png")}}') 40% 101% no-repeat "></div>

  <div id="hot_img">

    @foreach($hot_imgs as $hot_img)
    <div class="bette_video_author_video" style="margin-right: 20px">
      <div class="bette_video_author_video_category">图片</div>
      <a href="{{asset('/book/list?id=')}}{{$hot_img->id}}"><div class="bette_video_author_video_mask"></div></a>
      <img src="{{$hot_img->book_thumb}}" alt=""  height="270px" >
      <div class="bottom">
        <p>{{$hot_img->book_title}}</p>
        <div class="bette_video_author_video_name">
          <div class="left">by:{{$hot_img->username}}</div>
          <div class="right">{{$hot_img->reply}}</div>
          <div class=" icon-comments right"></div>
          <div class="right">{{$hot_img->see}}</div>
          <div class="icon-eye-open right"></div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection

@section('my-js')

  <script src="{{asset('/web/js/scrollView.js')}}"></script>
  <script src="{{asset('/web/js/scroll-author-video.js')}}"></script>
  <script src="{{asset('/web/js/bette_video.js')}}"></script>
  <script>

    $('.bette_video_author_video_mask').hover(function(){
      $('.bette_video_author_video_category').css({
        zIndex:6
      },function(){
        zIndex:1
      })
    })


  </script>
@endsection