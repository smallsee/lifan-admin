@extends('web/master')


@section('title', '视频')
<link rel="stylesheet" href="{{asset('/web/css/video.css')}}">
@section('content')

<div id="video-hot">
  <div id="video-hot-scrollView" style="float: left">
    <ul>
      <li><a href="#"><img src="{{asset('web/images/1.jpg')}}" width="100%" height="100%"></a></li>
      <li><a href="#"><img src="{{asset('web/images/2.jpg')}}" width="100%" height="100%"></a></li>
      <li><a href="#"><img src="{{asset('web/images/3.jpg')}}" width="100%" height="100%"></a></li>
      <li><a href="#"><img src="{{asset('web/images/4.jpg')}}" width="100%" height="100%"></a></li>
      <li><a href="#"><img src="{{asset('web/images/5.jpg')}}" width="100%" height="100%"></a></li>
    </ul>
  </div>

  <div id="video-hot-items">

    @foreach($video_hots as $video_hot)
      <a href="{{asset('/video_list?id=')}}{{$video_hot->id}}">
      <div class="video-hot-item">
        <div class="video-hot-item-mask"></div>
        <div class="video-hot-item-title">{{$video_hot->video_title}}</div>
        <div class="video-hot-item-icon icon-play-circle"></div>
        <img src="{{$video_hot->video_thumb}}" alt="" width="100%" height="100%">
      </div>
      </a>
    @endforeach

  </div>
</div>


  <div class="shouldSeeVideo" >
    <div class="left">

      <div class="top">
        <a href="#">
          <i class="icon-music"></i>
          <span style="font-size: 16px">推荐视频</span>
          <span style="font-size: 14px">more</span>
        </a>
        <span style="margin-left: 10px;font-size: 12px;color: black">点击音乐播放按钮会有惊喜，雅蠛蝶~,san</span>
      </div>

      <div class="bottom">
        <div class="bottom-item">
          <div class="img">
            <a href="#">
              <img src="{{asset('/web/images/1.jpg')}}" alt="">
            </a>

          </div>
          <div class="item-bottom">
            <p>自行车卡受打击</p>
            <div class="item-bottom-user">
              <img src="{{asset('/web/images/2.jpg')}}" alt="">
              <div class="">10</div>
              <div class=" icon-comments "></div>
              <div class="">5</div>
              <div class="icon-eye-open"></div>
            </div>
          </div>
        </div>

        <div class="bottom-item"></div>
        <div class="bottom-item"></div>
        <div class="bottom-item"></div>
        <div class="bottom-item"></div>
        <div class="bottom-item"></div>
        <div class="bottom-item"></div>
        <div class="bottom-item"></div>
      </div>
    </div>
    <div class="right">
      <div class="top">推荐(=·ω·=)~</div>

      <div class="bottom">

        <div class="bottom-item">
          <div class="img">
            <img src="{{asset('/web/images/3.jpg')}}" alt="">
            <span>1</span>
          </div>
          <div class="right">
            <p>sasdsadzxclhsalnxmbckhnksadksandbsandsandjksadljsaldjslajdlsajldjlsajdlsajldiwquoejqwjeiwqjoejowqjiejwqojeowqjejwqoejqwojeqa</p>
            <div>5453654</div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="shouldSeeVideo"  style="margin-top: 20px">
  <div class="left">

    <div class="top">
      <a href="#">
        <i class="icon-music"></i>
        <span style="font-size: 16px">推荐视频</span>
        <span style="font-size: 14px">more</span>
      </a>
      <span style="margin-left: 10px;font-size: 12px;color: black">点击音乐播放按钮会有惊喜，雅蠛蝶~,san</span>
    </div>

    <div class="bottom">
      <div class="bottom-item">
        <div class="img">
          <a href="#">
            <img src="{{asset('/web/images/1.jpg')}}" alt="">
          </a>

        </div>
        <div class="item-bottom">
          <p>自行车卡受打击</p>
          <div class="item-bottom-user">
            <img src="{{asset('/web/images/2.jpg')}}" alt="">
            <div class="">10</div>
            <div class=" icon-comments "></div>
            <div class="">5</div>
            <div class="icon-eye-open"></div>
          </div>
        </div>
      </div>

      <div class="bottom-item"></div>
      <div class="bottom-item"></div>
      <div class="bottom-item"></div>
      <div class="bottom-item"></div>
      <div class="bottom-item"></div>
      <div class="bottom-item"></div>
      <div class="bottom-item"></div>
    </div>
  </div>
  <div class="right">
    <div class="top">推荐(=·ω·=)~</div>

    <div class="bottom">

      <div class="bottom-item">
        <div class="img">
          <img src="{{asset('/web/images/3.jpg')}}" alt="">
          <span>1</span>
        </div>
        <div class="right">
          <p>sasdsadzxclhsalnxmbckhnksadksandbsandsandjksadljsaldjslajdlsajldjlsajdlsajldiwquoejqwjeiwqjoejowqjiejwqojeowqjejwqoejqwojeqa</p>
          <div>5453654</div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('my-js')
  <script src="{{asset('/web/js/video-hot-scrollView.js')}}"></script>

@endsection
