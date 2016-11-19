<?php

namespace App\Http\Controllers\Web\View;

use App\Http\Controllers\Controller;
use App\Models\Commit;
use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller{


  public function toBook(Request $request){
//第几页

    $page = 2;
    $users = Book::paginate(20);
    $book_page = $request->get('page','1');
    $username = $request->session()->get('username');
    if (!$username){
      $username = '';
      return view('web/book',['users' => $users])->with('username',$username)
        ->with('page',$page)->with('book_page',$book_page);
    }else if ($username->statue != 1){
      $message = '用户激活后才能进行添加操作';
      return view('web/statue')->with('username',$username)->with('page',$page)->with('message',$message);
    }

    return view('web/book',['users' => $users])->with('username',$username)
                            ->with('page',$page)->with('book_page',$book_page);
  }



  public function addBook(Request $request){
    $page = 2;

    $request->session()->put('book_content_img',null);
    $username = $request->session()->get('username');
    if (!$username){
      $message = '用户登录后才能进行添加操作';
      return view('web/statue')->with('username',$username)->with('page',$page)->with('message',$message);
    }else if ($username->statue != 1){
      $message = '用户激活后才能进行添加操作';
      return view('web/statue')->with('username',$username)->with('page',$page)->with('message',$message);
    }


    return view('web/addBook')->with('username',$username)
      ->with('page',$page);
  }



  public function book_list(Request $request){
//第几页
    $page = 2;
    $username = $request->session()->get('username');





    //观看人数+1
    $book_id = $request->get('id','');
    $book = Book::where('id',$book_id)->first();
    $see = $book->see;
    $book->see = $see + 1;
    if ($book->save()){
      $book = Book::where('id',$book_id)->first();
    }



    $commit = Commit::where('book_id',$book_id)->get();
    $show =false;

    if (!$username){

      return view('web/book_list')->with('username',$username)
        ->with('page',$page)->with('book',$book)->with('show',$show)->with('commits',$commit);
    }else if ($username->statue != 1){
      $message = '用户激活后才能进行添加操作';
      return view('web/statue')->with('username',$username)->with('page',$page)->with('message',$message);
    }

    $show = Commit::where(['book_id'=>$book_id,'user_id'=>$username->id])->first();
    if ($show){
      $show = true;
    }else{
      $show = false;
    }

    return view('web/book_list')->with('username',$username)
      ->with('page',$page)->with('book',$book)->with('show',$show)->with('commits',$commit);
  }


}