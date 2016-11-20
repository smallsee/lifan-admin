<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
  Route::get('/', 'Web\View\IndexController@toIndex');
  Route::get('/book', 'Web\View\BookController@toBook');
  Route::get('/login', 'Web\View\IndexController@toLogin');
  Route::get('/addBook', 'Web\View\BookController@addBook');
  Route::get('/register', 'Web\View\IndexController@toRegister');
  Route::get('/api/makeEmail', 'Web\Service\IndexController@makeEmail');
  Route::post('/api/register', 'Web\Service\IndexController@register');
  Route::post('/api/login', 'Web\Service\IndexController@login');
  Route::post('/api/sendMSM', 'Web\Service\IndexController@sendMSM');
  Route::post('/api/sendEmail', 'Web\Service\IndexController@sendEmail');
  Route::get('/api/validate_email', 'Web\Service\IndexController@validate_email');



  Route::get('/api/book_list/{type}', 'Web\Service\BookController@bookList');
  Route::any('/api/book_add', 'Web\Service\BookController@addBook');
  Route::any('/api/book', 'Web\Service\BookController@book');
  Route::any('/book/list', 'Web\View\BookController@book_list');

  Route::any('/api/book_commit', 'Web\Service\CommitController@book_commit');


  Route::any('/video', 'Web\View\VideoController@toVideo');
  Route::any('/addVideo', 'Web\View\VideoController@toAddVideo');
  Route::any('/api/addVideo', 'Web\Service\VideoController@addVideo');
  Route::any('/video_list', 'Web\View\VideoController@video_list');



  Route::any('/admin/book', 'Web\View\AdminController@book');
  Route::any('/api/book/del', 'Web\View\AdminController@bookDel');




  Route::any('/xiaohaiAdmin', 'Admin\View\AdminController@toAdmin');
  Route::any('/pc', 'Admin\View\AdminController@toPc');

  Route::any('/admin/video', 'Admin\View\AdminController@toVideo');
  Route::any('/admin/video/add', 'Admin\View\AdminController@toVideoAdd');
  Route::any('/admin/video/edit', 'Admin\View\AdminController@toVideoEdit');
  Route::any('/api/videoState', 'Admin\Service\AdminController@changState');
  Route::any('/api/videoDel', 'Admin\Service\AdminController@videoDel');

  Route::any('/admin/book', 'Admin\View\AdminController@toBook');
  Route::any('/admin/book/add', 'Admin\View\AdminController@toBookAdd');
  Route::any('/admin/book/edit', 'Admin\View\AdminController@toBookEdit');
  Route::any('/api/bookState', 'Admin\Service\AdminController@changBookState');
  Route::any('/api/bookDel', 'Admin\Service\AdminController@bookDel');
});
