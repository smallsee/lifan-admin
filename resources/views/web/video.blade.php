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


@endsection

@section('my-js')
  <script src="{{asset('/web/js/video-hot-scrollView.js')}}"></script>

@endsection
