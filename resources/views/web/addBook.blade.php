
@extends('web/master')
@section('title','app首页')
@section('content')
  <div class="lifan-inputBox">
    <label>隐藏的信息:</label>
    <textarea type="text" id="book-content"  cols="50" rows="5" >
      </textarea>
  </div>

  <div class="lifan-inputBox">
    <label>本子标题:</label>
    <input placeholder="说点什么"  name="book_title" >
  </div>

  <div class="row cl">
    <label class="form-label col-3">封面图：</label>
    <div class="formControls col-5">
      <img id="preview_id" src="{{asset('/web/images/icon-add.png')}}" style="border: 1px solid #B8B9B9; width: 100px; height: 100px;" onclick="$('#input_id').click()" />
      <input type="file" name="imgFile" id="input_id" style="display: none;" onchange="return uploadImageToServer('input_id','images', 'preview_id','{{asset("/api/book_add")}}');" />
    </div>
  </div>

  <div >
    <label>标签:</label>
    <input class="lifan-video-checkBox" type="checkbox"  value="动漫图集" >动漫图集
    <input class="lifan-video-checkBox" type="checkbox"  value="杂志画集" >杂志画集
    <input class="lifan-video-checkBox" type="checkbox"  value="网站推荐" >网站推荐
    <input class="lifan-video-checkBox" type="checkbox"  value="游戏CG" >游戏CG
    <input class="lifan-video-checkBox" type="checkbox"  value="个人动画" >个人动画
  </div>

  <textarea name="baidu" id="baidueditor" cols="50" rows="20"></textarea>


  <button onclick="uploadBaidu()">上传</button>

@endsection

@section('my-js')
  <script>

    KindEditor.ready(function(K){
      window.editor = K.create('#baidueditor',{
        uploadJson : "{{asset('/api/book_add')}}",
        afterBlur : function(){this.sync();} //
      })
    });




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
        data: { checkArr:checkArr,book_title:book_title,content:content,parent_id: parent_id,thumb:thumb,_token: "{{csrf_token()}}"},
        success: function(data) {

          console.log(data);
          if (data == 1){
            dialog.success('成功添加',"{{asset('/book')}}");
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
