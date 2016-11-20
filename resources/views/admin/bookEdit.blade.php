@extends('admin/master')
@section('title','视频添加')
@section('content')
  <div class="pd-20">
    <form action="" method="post" class="form form-horizontal" id="form-member-add">
      <div class="row cl">
        <label class="form-label col-3"><span class="c-red">*</span>本子标题：</label>
        <div class="formControls col-5">
          <input type="text" class="input-text" value="{{$book->book_title}}" placeholder="" id="member-name" name="book_title" datatype="*2-16" nullmsg="本子名称不能为空">
        </div>
        <div class="col-4"> </div>
      </div>

      <div class="row cl">
        <label class="form-label col-3"><span class="c-red">*</span>缩略图：</label>
        <div class="formControls col-5">
          <img id="preview_id" src="{{$book->book_thumb}}" style="border: 1px solid #B8B9B9; width: 100px; height: 100px;" onclick="$('#input_id').click()" />
          <input type="file" name="imgFile" id="input_id" style="display: none;" onchange="return uploadImageToServer('input_id','images', 'preview_id','{{asset("/api/book_add")}}');" nullmsg="缩略图不能为空" />
        </div>
        <div class="col-4"> </div>
      </div>


      <div class="row cl">
        <label class="form-label col-3"><span class="c-red">*</span>标签:</label>
        <div class="formControls col-5 skin-minimal">
          <div class="radio-box">
            @if(in_array("动漫画集", $tab))
              <input class="lifan-video-checkBox"  checked type="checkbox"  value="动漫画集" datatype="*">
            @else
              <input class="lifan-video-checkBox" type="checkbox"   value="动漫画集" datatype="*" >
            @endif

            <label>动漫画集</label>
          </div>
          <div class="radio-box">
            @if(in_array("杂志画集", $tab))
              <input class="lifan-video-checkBox"  checked type="checkbox"  value="杂志画集" datatype="*" nullmsg="是否发布！">
            @else
              <input class="lifan-video-checkBox" type="checkbox"   value="杂志画集" datatype="*" nullmsg="是否发布！">
            @endif
            <label>杂志画集</label>
          </div>
          <div class="radio-box">
            @if(in_array("网站推荐", $tab))
              <input class="lifan-video-checkBox"  checked type="checkbox"  value="网站推荐" datatype="*" nullmsg="是否发布！">
            @else
              <input class="lifan-video-checkBox" type="checkbox"   value="网站推荐" datatype="*" nullmsg="是否发布！">
            @endif
            <label>网站推荐</label>
          </div>

          <div class="radio-box">
            @if(in_array("游戏CG", $tab))
              <input class="lifan-video-checkBox"  checked type="checkbox"  value="游戏CG" datatype="*" nullmsg="是否发布！">
            @else
              <input class="lifan-video-checkBox" type="checkbox"   value="游戏CG" datatype="*" nullmsg="是否发布！">
            @endif
            <label>游戏CG</label>
          </div>

          <div class="radio-box">
            @if(in_array("个人动画", $tab))
              <input class="lifan-video-checkBox"  checked type="checkbox"  value="个人动画" datatype="*" nullmsg="是否发布！">
            @else
              <input class="lifan-video-checkBox" type="checkbox"   value="个人动画" datatype="*" nullmsg="是否发布！">
            @endif
            <label>个人动画</label>
          </div>

        </div>
        <div class="col-4"> </div>
      </div>



      <div class="row cl">
        <label class="form-label col-3">隐藏信息：</label>
        <div class="formControls col-5">
          <textarea id="book-content" name="" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入5个字符" datatype="*5-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,100)">{{$book->content}}</textarea>
          <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
        </div>
        <div class="col-4"> </div>
      </div>

      <div class="row cl">
        <label class="form-label col-3"><span class="c-red">*</span>本子内容：</label>
        <div class="col-5">
          <textarea   name="baidu" id="baidueditor" cols="50" rows="20">{{$book->book_list}}</textarea>
        </div>
      </div>


      <div class="row cl">
        <div class="col-9 col-offset-3">
          <input class="btn btn-primary radius" onclick="uploadBaidu()" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
      </div>
    </form>
  </div>
  </div>
@endsection

@section('my-js')
  <script type="text/javascript">
    $('#VideoUploading').hide();

    KindEditor.ready(function(K){
      window.editor = K.create('#baidueditor',{
        uploadJson : "{{asset('/api/book_add')}}",
        afterBlur : function(){this.sync();} //
      })
    });


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
    var video_name = '';


    function uploadBaidu(){
      var parent_id= $('#baidueditor').val();
      var thumb = $('#preview_id').attr('src');
      var content = $('#book-content').val();
      var book_title = $('input[name=book_title]').val();

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
      if (parent_id.length<6){
        dialog.error('内容要输入要大于6个字符哦');
        return
      }


      $.ajax({
        type: "POST",
        url: "{{asset('/api/book')}}",
        cache: false,
        data: { id:"{{$book->id}}",state:"{{$book->state}}",checkArr:checkArr,book_title:book_title,content:content,parent_id: parent_id,thumb:thumb,_token: "{{csrf_token()}}"},
        success: function(data) {

          console.log(data);
          if (data == 1){
            dialog.success('成功添加',"{{asset('/admin/book')}}");
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