@extends('web/master')


@section('title', '注册')

@section('content')

<form id="lifan-register">
  <div class="lifan-inputBox">
    <label>账号:</label>
    <input placeholder="说点什么"  name="username" >
  </div>

  <div class="lifan-inputBox">
    <label>密码:</label>
    <input id="lifan-register-password" type="password" name="password" >
  </div>

  <div class="lifan-inputBox">
    <label>重复密码:</label>
    <input type="password" name="re-password" >
  </div>

  <div class="lifan-inputBox">
    <label>手机注册:</label>
    <input type="radio" name="type" value="phone" checked="true" onclick="onTypeChoose($(this).val())">
    <label>短信:</label>
    <input type="radio" name="type" value="email" onclick="onTypeChoose($(this).val())">
  </div>

  <div id="lifan-inputBox-phone" class="lifan-inputBox">
    <label>手机注册:</label>
    <input type="text" name="phone" >
    <div id="lifan-inputBox-sendMsM" onclick="onSendMsM()">发送短信</div>

  </div>

  <div id="lifan-inputBox-phone_code" class="lifan-inputBox">
    <label>手机验证码:</label>
    <input  type="text" name="phone_code" >
  </div>

  <div id="lifan-inputBox-email" class="lifan-inputBox">
    <label>邮箱注册:</label>
    <input type="text" name="email">
    <button onclick="onEmail()">邮箱测试</button>
  </div>

  <div class="lifan-inputBox">
    <label>验证码:</label>
    <input type="text" name="validate_code" >
    <img src="api/makeEmail" alt="1" onclick="$(this).attr('src',$(this).attr('src')+'?'+Math.random())">
  </div>

</form>

<div class="row cl">
  <label class="form-label col-3">用户头像：</label>
  <div class="formControls col-5">
    <img id="preview_id" src="{{asset('/web/images/icon-add.png')}}" style="border: 1px solid #B8B9B9; width: 100px; height: 100px;" onclick="$('#input_id').click()" />
    <input type="file" name="imgFile" id="input_id" style="display: none;" onchange="return uploadImageToServer('input_id','images', 'preview_id','{{asset("/api/book_add")}}');" />
  </div>
</div>

<div class="lifan-inputBox">
  <button onclick="onLoginClick()">登录1</button>

</div>

@endsection

@section('my-js')
  <script src="{{ asset('/web/lib/jquery-validation/dist/jquery.validate.js') }}"></script>
  <script>

    var sendMsM = true;
    $('#lifan-inputBox-email').hide();
    $('#lifan-inputBox-phone_code').hide();
   function onTypeChoose(data){
    if (data == 'phone'){
      $('#lifan-inputBox-email').hide();
      $('#lifan-inputBox-phone').show();
    }else{
      $('#lifan-inputBox-email').show();
      $('#lifan-inputBox-phone').hide();
    }
   }

   function onEmail(){
     var email = $('input[name=email]').val();
     $.ajax({
       type: "POST",
       url: "{{asset('/api/sendEmail')}}",
       cache: false,
       data: {  email:email,_token: "{{csrf_token()}}"},
       success : function(data) {


         console.log(data)

       },
       error: function(xhr, status, error) {

       }
     });
   }

   function onSendMsM(){
     var num = 10;

     var phone = $('input[name=phone]').val();

     if (phone.length<0){
       dialog.error('手机号码不能为空')
     }else if(phone.length<10 || phone.length>13 ){
       dialog.error('手机号码不对')
     }
     if(sendMsM){
       $.ajax({
         type: "POST",
         url: '/api/sendMSM',
         cache: false,
         data: {  phone:phone,_token: "{{csrf_token()}}"},
         success : function(data) {


           console.log(data)

         },
         error: function(xhr, status, error) {

         }
       });
     }

     if (sendMsM){
       sendMsM = false;
       var interval = window.setInterval(function() {
         $('#lifan-inputBox-sendMsM').html(--num + 's 重新发送');
         if(num == 0) {
           window.clearInterval(interval);
           $('#lifan-inputBox-sendMsM').html('重新发送');
           sendMsM = true;
         }
       }, 1000);
     }





     $('#lifan-inputBox-phone_code').show();



   }

    $("#lifan-register").validate({
      rules:{
        username:{
          required:true,
          minlength:4,
          maxlength:20
        },
        password:{
          required:true,
          minlength:4,
          maxlength:20
        },
        "re-password":{
          required:true,
          equalTo:'#lifan-register-password'
        },
        phone:{
          required:true,
          number:true,
          minlength:10,
          maxlength:12
        },
        email:{
          required:true,
          email:true
        },
        validate_code:{
          required:true,
        },
        phone_code:{
          required:true,
        }
      },
      messages:{
        username:{
          required: "必填",
          minlength:'最少不少于4位数',
          maxlength:'最多不超过20位数'
        },
        password:{
          required: "必填",
          minlength:'最少不少于4位数',
          maxlength:'最多不超过20位数'
        },
        're-password':{
          required: "必填",
          equalTo:"两次密码需要一致"
        },
        phone:{
          required: "必填",
          number:'必须是数字',
          minlength:'手机号码没有那么短',
          maxlength:'手机号码没有那么长'
        },
        email:{
          required: "必填",
          email:'请填写正确的邮箱'
        },

        validate_code:{
          required: "必填",
        }
      }

    });
    function onLoginClick() {
      var pass = $('#lifan-register').valid() ? true : false;
      if (pass){
        var username = '';
        var password = '';
        var phone = '';
        var email = '';
        var validate_code = '';
        var phone_code = '';

        username = $('input[name=username]').val();
        password = $('input[name=password]').val();
        phone = $('input[name=phone]').val();
        email = $('input[name=email]').val();
        validate_code = $('input[name=validate_code]').val();
        phone_code = $('input[name=phone_code]').val();
        var thumb = $('#preview_id').attr('src');

        $.ajax({
        type: "POST",
        url: "{{asset('/api/register')}}",
        cache: false,
        data: { username: username,password: password,phone:phone,email:email,phone_code:phone_code,
        validate_code: validate_code,thumb:thumb ,_token: "{{csrf_token()}}"},
        success: function(data) {
          console.log(data);
          if (data == 2){
            dialog.success('注册成功,请立刻激活邮箱然后登录','/login');
          }else if(data == 1){
            dialog.success('成功注册前往登录页','/login');
          }else{
            dialog.error(data)
          }

        },
        error: function(xhr, status, error) {
        console.log(xhr);
        console.log(status);
        console.log(error);
        }
        });
      }

    }




  </script>

@endsection
