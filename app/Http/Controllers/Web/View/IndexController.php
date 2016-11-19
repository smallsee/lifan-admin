<?php

namespace App\Http\Controllers\Web\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class IndexController extends Controller{

  public function toIndex(Request $request){
//第几页
    $page = 0;
    $username = $request->session()->get('username');

    if (!$username){
      $username = '';
      return view('web/index')->with('username',$username)
        ->with('page',$page);
    }else if ($username->statue != 1){

      $message = '用户激活后才能进行添加操作';
      return view('web/statue')->with('username',$username)->with('page',$page)->with('message',$message);
    }

    return view('web/index')->with('username',$username)
                            ->with('page',$page);
  }

  public function toLogin(Request $request){

    $page = 0;
    $username = $request->session()->put('username',null);
    $code = $request->session()->get('validate_code');


    return view('web/login')->with('code',$code)->with('username',$username)
      ->with('page',$page);
  }

  public function toRegister(Request $request){

    $page = 0;
    $username = $request->session()->put('username',null);
    $code = $request->session()->get('validate_code');



    return view('web/register')->with('code',$code)->with('username',$username)
      ->with('page',$page);
  }


}