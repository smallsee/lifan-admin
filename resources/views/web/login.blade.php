@extends('web/master')


@section('title', '登录')

@section('content')

<form id="lifan-login">
  <div class="lifan-inputBox">
    <label>账号:</label>
    <input placeholder="说点什么"  name="username" >
  </div>

  <div class="lifan-inputBox">
    <label>密码:</label>
    <input type="password" name="password" >
  </div>

  <div class="lifan-inputBox">
    <label>验证码:</label>
    <input type="text" name="validate_code" >
    <img src="api/makeEmail" alt="1" onclick="$(this).attr('src',$(this).attr('src')+'?'+Math.random())">
  </div>

</form>
<div class="lifan-inputBox">
  <button onclick="onLoginClick()">登录</button>
  <a href="register"><button>注册s</button></a>
</div>

@endsection

@section('my-js')
  <script src="{{asset('/web/lib/jquery-validation/dist/jquery.validate.js')}}"></script>
  <script>

    $("#lifan-login").validate({
      rules:{
        username:{
          required:true,
          minlength:4,
          maxlength:20
        },
        password:{
          required:true,
          minlength:5,
          maxlength:20
        },
        validate_code:{
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
          minlength:'最少不少于5位数',
          maxlength:'最多不超过20位数'
        },
        validate_code:{
          required: "必填",
        }
      }

    });
    function onLoginClick() {
      var pass = $('#lifan-login').valid() ? true : false;
      console.log($('#lifan-login').valid() ? '填写正确' : '填写错误');
      if (pass){

      var username = '';
      var password = '';
      var validate_code = '';

      username = $('input[name=username]').val();
      password = $('input[name=password]').val();
      validate_code = $('input[name=validate_code]').val();


      $.ajax({
        type: "POST",
        url: "{{asset('/api/login')}}",
        cache: false,
        data: { username: username,password: password,
          validate_code: validate_code, _token: "{{csrf_token()}}"},
        success: function(data) {
          if (data == 0){
            dialog.success('登录成功点击跳转',"{{asset('/')}}");
          }else{
            dialog.error(data);
          }
        },
        error: function(xhr, status, error) {

        }
      });
      }
    }
  </script>

@endsection
