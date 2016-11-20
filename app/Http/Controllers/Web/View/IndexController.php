<?php

namespace App\Http\Controllers\Web\View;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Video;


class IndexController extends Controller{

  public function toIndex(Request $request){
//第几页
    $page = 0;
    $username = $request->session()->get('username');

    $user = User::skip(0)->take(5)->get();
    $hot_img = Book::where('state','1')->where('home','1')->orderBy('see','desc')->skip(0)->take(4)->get();
    $home_video = Video::where('state','1')->orderBy('created_at','desc')->skip(0)->take(5)->get();
    $good_video = Video::where('state','1')->where('home','1')->orderBy('see','desc')->skip(0)->take(5)->get();
    $big_img = Book::where('state','1')->where('home','1')->orderBy('created_at','desc')->skip(0)->take(3)->get();
    $small_img = Book::where('state','1')->where('home','1')->orderBy('created_at','desc')->skip(3)->take(6)->get();

    return view('web/index')->with('username',$username)
                            ->with('page',$page)->with('home_videos',$home_video)->with('good_videos',$good_video)->with('hot_imgs',$hot_img)->with('big_imgs',$big_img)->with('small_img',$small_img)->with('users',$user);
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