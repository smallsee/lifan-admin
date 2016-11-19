@extends('web/master')
@section('title','app首页')
<link rel="stylesheet" href="{{ asset('/web/css/index.css') }}">
@section('content')


  {{--幻灯片--}}
  <div id="scrollView">
    <ul>
      <li>
        <div class="scrollXiaohai-firstPic">
          <a href="#"><img src="{{asset('web/images/1.jpg')}}" width="100%" height="100%"></a>
          <div  class="scrollXiaohai-firstPic-P">
            sdasidshakbzxcujzhis
          </div>
        </div>

        <div class="right">
          <div class="scrollXiaohai-second">
            <a href="#"><img src="{{asset('web/images/2.jpg')}}" width="100%" height="100%"></a>
            <div  class="scrollXiaohai-firstPic-P">
              sdasidshakbzxcujzhis
            </div>
          </div>
          <div class="scrollXiaohai-third">
            <a href="#"><img src="{{asset('web/images/3.jpg')}}" width="100%" height="100%"></a>
            <div  class="scrollXiaohai-firstPic-P">
              sdasidshakbzxcujzhis
            </div>
          </div>
        </div>
      </li>

      <li>
        <div class="scrollXiaohai-firstPic">
          <a href="#"><img src="{{asset('web/images/4.jpg')}}" width="100%" height="100%"></a>
          <div  class="scrollXiaohai-firstPic-P">
            sdasidshakbzxcujzhis
          </div>
        </div>

        <div class="right">
          <div class="scrollXiaohai-second">
            <a href="#"><img src="{{asset('web/images/5.jpg')}}" width="100%" height="100%"></a>
            <div  class="scrollXiaohai-firstPic-P">
              sdasidshakbzxcujzhis
            </div>
          </div>
          <div class="scrollXiaohai-third">
            <a href="#"><img src="{{asset('web/images/6.jpg')}}" width="100%" height="100%"></a>
            <div  class="scrollXiaohai-firstPic-P">
              sdasidshakbzxcujzhis
            </div>
          </div>
        </div>
      </li>

      <li>
        <div class="scrollXiaohai-firstPic">
          <a href="#"><img src="{{asset('web/images/7.jpg')}}" width="100%" height="100%"></a>
          <div  class="scrollXiaohai-firstPic-P">
            sdasidshakbzxcujzhis
          </div>
        </div>

        <div class="right">
          <div class="scrollXiaohai-second">
            <a href="#"><img src="{{asset('web/images/8.jpg')}}" width="100%" height="100%"></a>
            <div  class="scrollXiaohai-firstPic-P">
              sdasidshakbzxcujzhis
            </div>
          </div>
          <div class="scrollXiaohai-third">
            <a href="#"><img src="{{asset('web/images/9.jpg')}}" width="100%" height="100%"></a>
            <div  class="scrollXiaohai-firstPic-P">
              sdasidshakbzxcujzhis
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>

  <div class="index-nav-title" style="background: url('{{asset("/web/images/diy_head.png")}}') 40% -3% no-repeat "></div>
  {{--搞定作者--}}
  <div id="fd-people" style="width:1200px;height: 250px;margin: 0 auto;background-color: red">
    <ul style="width: 100%;height: 100%;">
      <li>
        <div class="fd-people-top">
          <img src="{{asset('/web/images/2.jpg')}}" alt="" height="125px" width="232px">
          <img class="fd-people-thumb" src="{{asset('/web/images/1.jpg')}}" alt="" style="">
        </div>

        <div class="fd-people-bottom">
          <div><b>sdasdadas</b></div>
          <div>zxczxcsadas</div>
        </div>
      </li>

      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>

  <div class="index-nav-title" style="background: url('{{asset("/web/images/diy_head.png")}}') 40% 30% no-repeat "></div>

  {{--搞定scrillView--}}
  <div id="scroll-author-video">
    <div class="slider-wrapper scroll-author-video-left" style="width: 600px;height: 400px;position: relative;float: left">
      <div id="slider" class="nivoSlider" style="width: 600px;height: 400px">
        <img src="{{asset('/web/images/1.jpg')}}" alt="" width="100%" height="100%">
        <img src="{{asset('/web/images/2.jpg')}}" alt="" width="100%" height="100%">
        <img src="{{asset('/web/images/3.jpg')}}" alt="" width="100%" height="100%">
        <img src="{{asset('/web/images/4.jpg')}}" alt="" width="100%" height="100%">

      </div>
      <div id="indicatorContainer" ></div>
    </div>

    <div class="scroll-author-video-right" style="position: relative;overflow: hidden">


      <div style="width: 100%;height: 100% ;background-color: white;" class="active scroll-author-video-right-tab">
        <p>xzsadwqde</p>
        <div class="scroll-author-video-author">
          <img src="{{asset('/web/images/8.jpg')}}" alt="5">
          <div class="scroll-author-video-author-icon" >
            <div><i class="icon-user"></i><span>:sadsadasa</span></div>
            <div><i class="icon-time"></i><span>:sadsadasa</span></div>
          </div>
          <div class="scroll-author-video-author-see">
            <span class="icon-eye-open"></span>
            <span class="icon-comment"></span>
            <span class="icon-star"></span>
            <span>4</span>
            <span>0</span>
            <span>5</span>
          </div>
        </div>
        <div class="scroll-author-video-author-content">
zsss
        </div>
        <div class="scroll-author-video-author-more">
          < 更多 <
        </div>
      </div>

      <div style="width: 100%;height: 100%;background-color: red;" class="scroll-author-video-right-tab">2</div>
      <div style="width: 100%;height: 100%;background-color: gainsboro;" class="scroll-author-video-right-tab">3</div>
      <div style="width: 100%;height: 100%;background-color: green;" class="scroll-author-video-right-tab">4</div>
    </div>
  </div>

  <div class="index-nav-title" style="background: url('{{asset("/web/images/diy_head.png")}}') 40% 65% no-repeat "></div>

  <div id="bette_video" style="margin: 0 auto">
    <ul>
      <li> <img src="{{asset('/web/images/1.jpg')}}" alt="" width="100%" height="100%">
          <div class="bette_video_author">
            <div class="bette_video_author_video">
              <img src="{{asset('/web/images/1.jpg')}}" alt="" width="100%" height="242px" >
              <p>zjhcdsadsand,znxczxcxzknsdadzcasdadsadsadsadsahk</p>
              <div class="bette_video_author_video_name">
                <div class="left">asdhlnzxncuisdhaljdlasjdjsal</div>
                <div class="right">10</div>
                <div class=" icon-comments right"></div>
                <div class="right">5</div>
                <div class="icon-eye-open right"></div>

              </div>
            </div>
            <div class="bette_video_author_content">
              <div class="bette_video_author_content_tab">MAD</div>
              <div class="bette_video_author_content_content">
                asdkusadksanknzxkchsalsaldsjaaldjnlmzx,nckznxcnkandjs
                asdsanzxnckhsjdlas,bnzjxbcasjldjasildsladlksamnl
              </div>
            </div>
          </div>
      </li>
      <li> <img src="{{asset('/web/images/2.jpg')}}" alt="" width="100%" height="100%"></li>
      <li> <img src="{{asset('/web/images/3.jpg')}}" alt="" width="100%" height="100%"></li>
      <li> <img src="{{asset('/web/images/4.jpg')}}" alt="" width="100%" height="100%"></li>
      <li> <img src="{{asset('/web/images/5.jpg')}}" alt="" width="100%" height="100%"></li>
    </ul>
  </div>

  <div class="index-nav-title" style="background: url('{{asset("/web/images/diy_head.png")}}') 40% 101% no-repeat "></div>

  <div id="hot_img">

    <div class="bette_video_author_video">
      <div class="bette_video_author_video_category">图片</div>
      <div class="bette_video_author_video_mask"></div>
      <img src="{{asset('/web/images/1.jpg')}}" alt="" width="100%" height="270px" >
      <div class="bottom">
        <p>zjhcdsadsand,znxczxcxzknsdadzcasdadsadsadsadsahk</p>
        <div class="bette_video_author_video_name">
          <div class="left">asdhlnzxncuisdhaljdlasjdjsal</div>
          <div class="right">10</div>
          <div class=" icon-comments right"></div>
          <div class="right">5</div>
          <div class="icon-eye-open right"></div>
        </div>
      </div>

    </div>

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