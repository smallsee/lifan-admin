@extends('web/master')


@section('title', '视频')
<link rel="stylesheet" href="{{ asset('/web/css/addVideo.css') }}">
@section('content')

  <div class="lifan-inputBox">
    <label>视频标题:</label>
    <input placeholder="说点什么"  name="video_title" >
  </div>

  <div class="row cl">
    <label class="form-label col-3">封面图：</label>
    <div class="formControls col-5">
      <img id="video_preview_id" src="{{asset('/web/images/icon-add.png')}}" style="border: 1px solid #B8B9B9; width: 100px; height: 100px;" onclick="$('#input_id').click()" />
      <input type="file" name="imgFile" id="input_id" style="display: none;" onchange="return uploadImageToServer('input_id','images', 'video_preview_id','{{asset("/api/book_add")}}');" />
    </div>
  </div>

  <div class="lifan-inputBox">
    <label>简介:</label>
    <input placeholder="说点什么"  name="video_content" >
  </div>

  <div class="lifan-inputBox">
    <label>上传视频:</label>
    <input id="xiaohai_video" multiple name="file" type="file" class="input-file" onchange="upload()">
    <progress id="progress" value="0" max="100"></progress>
    <label id="progress_uploading"></label>

    <input id="token" name="token" type="hidden" value="{{$token}}">
  </div>

  <div >
    <label>标签:</label>
    <input class="lifan-video-checkBox" type="checkbox"  value="ss" >ss
    <input class="lifan-video-checkBox" type="checkbox"  value="aa" >aa
    <input class="lifan-video-checkBox" type="checkbox"  value="vv" >vv
  </div>

  <button onclick="video_upload()">上传</button>

@endsection

@section('my-js')
  <script>
    var randNumber = Math.random() * 10000;
    var video_name = '';

    function video_upload(){
      var $checkbox = $('.lifan-video-checkBox');
      var checkArr = [];
      $.each($checkbox,function(index,val){
        if (val.checked){
            checkArr.push(val.value);
        }
      });
      if (!checkArr[0]){
        dialog.error('请选择标签');
        return
      }
      if (video_name == ''){
        dialog.error('请上传视频');
        return
      }

      var video_title = $('input[name=video_title]').val();
      var video_content = $('input[name=video_content]').val();
      var thumb = $('#video_preview_id').attr('src');
      var video_url = 'oejvtim90.bkt.clouddn.com/' + video_name;
      var tab = checkArr;
      $.ajax({
        type: "POST",
        url: "{{asset('/api/addVideo')}}",
        cache: false,
        data: { tab:tab,video_url:video_url,video_title:video_title,video_content: video_content,thumb:thumb,_token: "{{csrf_token()}}"},
        success: function(data) {

          if(data == '1'){
            dialog.success('视频上传成功,请返回视频页',"{{asset('/video')}}")
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


    }

    function upload(){

      var Cts = $('#xiaohai_video')[0].files[0];
      console.log(Cts);
      if (Cts.type.indexOf("video") < 0  ){
        dialog.error('最好上传mp4格式的视频')
        return
      }
      var fd = new FormData();
      fd.append("file",$('#xiaohai_video')[0].files[0]);
      fd.append("token",$("#token").val());
      fd.append("key","xiaohai-video"+randNumber);
      var xhr = new XMLHttpRequest();
      xhr.addEventListener('progress', function(e) {
        var done = e.loaded || e.loaded, total = e.total || e.total;
        console.log('xhr上传进度: ' + (Math.floor(done/total*1000)/10) + '%');
      }, false);
      if ( xhr.upload ) {
        xhr.upload.onprogress = function(e) {
          var done = e.loaded || e.loaded, total = e.total || e.total;
          console.log('xhr.upload上传进度: ' + done + ' / ' + total + ' = ' + (Math.floor(done/total*1000)/10) + '%');
          $('#progress_uploading').html( (Math.floor(done/total*1000)/10) + '%');
          document.getElementById("progress").value = Math.floor(done/total*1000)/10;
          $('#VideoUploading').show().html((Math.floor(done/total*1000)/10) + '%')
          if ((Math.floor(done/total*1000)/10) == 100 ){
            $('#VideoUploading').removeClass('btn-warning').addClass('btn-success');
            video_name = "xiaohai-video"+randNumber;
          }
        };
      }
      xhr.onreadystatechange = function(e) {
        if ( 4 == this.readyState ) {
          console.log(['xhr upload complete', e]);
        }
      };
      xhr.open('post', 'http://up.qiniu.com?', true);
      xhr.send(fd);
    }

  </script>
@endsection
