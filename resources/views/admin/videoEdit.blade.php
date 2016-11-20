@extends('admin/master')
@section('title','视频添加')
@section('content')
<div class="pd-20">
  <form action="" method="post" class="form form-horizontal" id="form-member-add">
    <div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>视频标题：</label>
      <div class="formControls col-5">
        <input type="text" class="input-text"  placeholder="" id="member-name" name="video_title" datatype="*2-16" nullmsg="视频名称不能为空" value="{{$video->video_title}}">
      </div>
      <div class="col-4"> </div>
    </div>

    <div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>缩略图：</label>
      <div class="formControls col-5">
        <img id="video_preview_id" src="{{$video->video_thumb}}" style="border: 1px solid #B8B9B9; width: 100px; height: 100px;" onclick="$('#input_id').click()" />
        <input type="file" name="imgFile" id="input_id" style="display: none;" onchange="return uploadImageToServer('input_id','images', 'video_preview_id','{{asset("/api/book_add")}}');" nullmsg="缩略图不能为空" />
      </div>
      <div class="col-4"> </div>
    </div>
    <div class="row cl">
      <label class="form-label col-3">视频：</label>
      <div class="formControls col-9"> <span class="btn-upload form-group">
        {{--<input class="input-text upload-url" type="text" name="uploadfile-2" id="uploadfile-2" readonly  datatype="*" nullmsg="请添加视频！" style="width:200px">--}}
          <progress id="progress" value="0" max="100"></progress>

          <button id="VideoUploading" class="btn btn-warning radius" ></button>

        <a href="javascript" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 上传视频</a>
        <input id="xiaohai_video" multiple name="file" type="file" class="input-file" onchange="upload()">

        <input id="token" name="token" type="hidden" value="{{$token}}">
        </span> </div>
    </div>

    <div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>视频标题：</label>
      <div class="formControls col-8">
        <div>{{$video->video_url}}</div>
      </div>

    </div>



    <div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>标签:</label>
      <div class="formControls col-5 skin-minimal">
        <div class="radio-box">
          @if(in_array("人妻", $tab))
            <input class="lifan-video-checkBox"  type="checkbox" checked  value="人妻" datatype="*" nullmsg="是否发布！">
          @else
            <input class="lifan-video-checkBox"  type="checkbox"  value="人妻" datatype="*" nullmsg="是否发布！">
          @endif
          <label>人妻</label>
        </div>
        <div class="radio-box">
          @if(in_array("人妻", $tab))
            <input class="lifan-video-checkBox"  type="checkbox" checked  value="萝莉" datatype="*" nullmsg="是否发布！">
          @else
            <input class="lifan-video-checkBox"  type="checkbox"  value="萝莉" datatype="*" nullmsg="是否发布！">
          @endif
          <label>萝莉</label>
        </div>
        <div class="radio-box">
          @if(in_array("人妻", $tab))
            <input class="lifan-video-checkBox"  type="checkbox" checked  value="制服" datatype="*" nullmsg="是否发布！">
          @else
            <input class="lifan-video-checkBox"  type="checkbox"  value="制服" datatype="*" nullmsg="是否发布！">
          @endif
          <label>制服</label>
        </div>

        <div class="radio-box">
          @if(in_array("人妻", $tab))
            <input class="lifan-video-checkBox"  type="checkbox" checked  value="痴女" datatype="*" nullmsg="是否发布！">
          @else
            <input class="lifan-video-checkBox"  type="checkbox"  value="痴女" datatype="*" nullmsg="是否发布！">
          @endif
          <label>痴女</label>
        </div>

        <div class="radio-box">
          @if(in_array("人妻", $tab))
            <input class="lifan-video-checkBox"  type="checkbox" checked  value="触手" datatype="*" nullmsg="是否发布！">
          @else
            <input class="lifan-video-checkBox"  type="checkbox"  value="触手" datatype="*" nullmsg="是否发布！">
          @endif
          <label>触手</label>
        </div>

        <div class="radio-box">
          @if(in_array("人妻", $tab))
            <input class="lifan-video-checkBox"  type="checkbox" checked  value="MAD" datatype="*" nullmsg="是否发布！">
          @else
            <input class="lifan-video-checkBox"  type="checkbox"  value="MAD" datatype="*" nullmsg="是否发布！">
          @endif
          <label>MAD</label>
        </div>
      </div>
      <div class="col-4"> </div>
    </div>



    <div class="row cl">
      <label class="form-label col-3">视频简介：</label>
      <div class="formControls col-5">
        <textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,100)">{{$video->content}}</textarea>
        <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
      </div>
      <div class="col-4"> </div>
    </div>
    <div class="row cl">
      <div class="col-9 col-offset-3">
        <input class="btn btn-primary radius" onclick="video_upload()" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
      </div>
    </div>
  </form>
</div>
</div>
@endsection

@section('my-js')
<script type="text/javascript">
  $('#VideoUploading').hide();


  $(function(){
    $('.skin-minimal input').iCheck({
      checkboxClass: 'icheckbox-blue',
      radioClass: 'iradio-blue',
      increaseArea: '20%'
    });

    $("#form-member-add").Validform({
      tiptype:2,
      callback:function(form){
        form[0].submit();
        var index = parent.layer.getFrameIndex(window.name);
        parent.$('.btn-refresh').click();
        parent.layer.close(index);
      }
    });
  });

  var randNumber = Math.random() * 10000;
  var video_name = '{{$video->video_url}}';
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
          console.log(video_name);
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
    var video_content = $('#form-member-add .textarea').val();
    var thumb = $('#video_preview_id').attr('src');

    var video_url = 'oejvtim90.bkt.clouddn.com/' + video_name;
    var tab = checkArr;
    $.ajax({
      type: "POST",
      url: "{{asset('/api/addVideo')}}",
      cache: false,
      data: { id:"{{$video->id}}",state:"{{$video->state}}",tab:tab,video_url:video_url,video_title:video_title,video_content: video_content,thumb:thumb,_token: "{{csrf_token()}}"},
      success: function(data) {
        if(data == '1'){
          dialog.success('视频上传成功,请返回视频页',"{{asset('/admin/video')}}")
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



</script>
@endsection