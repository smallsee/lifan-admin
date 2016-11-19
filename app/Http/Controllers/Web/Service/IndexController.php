<?php

namespace App\Http\Controllers\Web\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tool\Validate\ValidateCode;
use App\Models\M3Result;
use App\Tool\SMS\Sms;
use App\Models\M3Email;
use App\Tool\UUID;
use Mail;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller{

  public function makeEmail(Request $request){
    $validateCode = new ValidateCode;
    $request->session()->put('validate_code', $validateCode->getCode());
    return $validateCode->doimg();
  }


  public function register(Request $request){

    $email = $request->input('email', '');
    $phone = $request->input('phone', '');
    $password = $request->input('password', '');
    $validate_code = $request->input('validate_code', '');
    $username = $request->input('username', '');
    $phone_code = $request->input('phone_code', '');
    $user_thumb = $request->input('thumb', '');

    if ($validate_code != $request->session()->get('validate_code')){
      return '验证码不对';
    }

    if (!$email && !$phone && !$username){
      return '不能为空号';
    }

    $email_sql = User::where('email',$email)->first();
    $username_sql = User::where('username',$username)->first();
    $phone_sql = User::where('phone',$phone)->first();


    if ($email_sql || $username_sql || $phone_sql){
      return '用户名已经存在';
    }


    //手机注册
    if ($phone != null){
      if ($phone_code != $request->session()->get('phone_code')){
        return '手机验证码出错';
      }
      $member = new User;
      $member->username = $username;
      $member->password = md5('xiaohai'.$password);
      $member->email = $email;
      $member->statue = 1;
      $member->thumb = $user_thumb;
      if(!$member->save()){
        return '注册异常';
      }


      return 1;

    }else if ($email != null){ //邮件注册
      $member = new User;
      $member->username = $username;
      $member->password = md5('xiaohai'.$password);
      $member->email = $email;
      $member->statue = 0;
      $member->thumb = $user_thumb;
      $member->save();

      $uuid = UUID::create();
      $email = $request->input('email', '');
      $m3_email = new M3Email;
      $m3_email->to = $email;
      $m3_email->cc = 'xiaohai@speakez.cn';
      $m3_email->subject = '小海';
      $m3_email->content = 'http://www.Hlifan.com/api/validate_email'
        . '?member_id=' . $member->id
        . '&code=' . $uuid
        . '&time=' . date('Y-m-d H-i-s', time() + 24*60*60);
      $request->session()->put('email_code',$uuid);
      Mail::send('web/email_register', ['m3_email' => $m3_email], function ($m) use ($m3_email) {
        // $m->from('hello@app.com', 'Your Application');
        $m->to($m3_email->to, '尊敬的用户')
          ->cc($m3_email->cc)
          ->subject($m3_email->subject);
      });

      return 2;
    }

  }

  public function sendMSM(Request $request){


    $phone = $request->input('phone', '');
    if($phone == '') {

      return '手机号不能为空';
    }
    if(strlen($phone) != 11 || $phone[0] != '1') {

      return '手机格式不正确';
    }

    $code = '';
    $charset = '1234567890';
    $_len = strlen($charset) - 1;
    for ($i = 0;$i < 6;++$i) {
      $code .= $charset[mt_rand(0, $_len)];
    }
    $sms = new Sms(array('api_key' => '99ebc75be305718b0e66c5a37ce6f1fc' , 'use_ssl' => FALSE ));
    $res = $sms->send( $phone, '验证码:'.$code.'【动漫说】');

    if( $res ){
      if( isset( $res['error'] ) &&  $res['error'] == 0 ){


        $request->session()->put('phone_code',$code);
        return '成功';

      }else{

        return '错误';
      }
    }else{

    }

    return '成功';

  }

  public function sendEmail(Request $request){

    $uuid = UUID::create();
    $email = $request->input('email', '');
    $m3_email = new M3Email;
    $m3_email->to = $email;
    $m3_email->cc = 'xiaohai@speakez.cn';
    $m3_email->subject = '小海';
    $m3_email->content = 'http://www.Hlifan.com/api/validate_email'
      . '?member_id=' . 'ssss'
      . '&code=' . $uuid
      . '&time=' . date( time() + 24*60*60);
    $request->session()->put('email_code',$uuid);

    Mail::send('web/email_register', ['m3_email' => $m3_email], function ($m) use ($m3_email) {
      // $m->from('hello@app.com', 'Your Application');
      $m->to($m3_email->to, '尊敬的用户')
        ->cc($m3_email->cc)
        ->subject($m3_email->subject);
    });


  }

  public function login(Request $request){
    $password = $request->input('password', '');
    $validate_code = $request->input('validate_code', '');
    $username = $request->input('username', '');

    $validate_code_true = $request->session()->get('validate_code');
    if ($validate_code_true != $validate_code ){
      return '验证码错误';
    }
    $email = User::where('email',$username)->first();
    $phone = User::where('phone',$username)->first();
    $username = User::where('username',$username)->first();
    if (!$username && !$phone && !$email){
      return '用户名不存在';
    }
    $password_md5 = md5('xiaohai'.$password);
    if ($username){
      if ($password_md5 != $username->password ){
        return '密码错误';
      }else{
        $request->session()->put('username',$username);
      }
    }
    if ($email){
      if ($password_md5 != $email->password ){
        return '密码错误';
      }else{
        $request->session()->put('username',$email);
      }
    }
    if ($phone){
      if ($password_md5 != $phone->password ){
        return '密码错误';
      }else{
        $request->session()->put('username',$phone);
      }
    }

    return 0;

  }

  public function  validate_email(Request $request){
    $time = $request->get('time');
    $code = $request->get('code');
    $member_id = $request->get('member_id');
    $time_now =  date( time());
    if ($time_now > $time){
      return '已经过期了,请重新发送邮件';
    }
    if ($code != $request->session()->get('email_code')){
      return '邮件代码不对,请重新发送';
    }
    $to_statue = User::where('id',$member_id)->first();
    if ($to_statue){
      $to_statue->statue = 1;
      $to_statue->save();
      $request->session()->put('username',$to_statue);
    }else{
      return '找不到行号';
    }

    return Redirect::to("/login");

  }

}