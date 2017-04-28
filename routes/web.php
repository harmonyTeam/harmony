<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login/login');
});

Route::get('/login', function(){
    return view('login/login');
});

Route::post('/loginAction', 'Login\LoginController@loginAction');

Route::post('/logoutAction', 'Login\LoginController@logoutAction');

Route::get('/store', function(){
    return view('login/store');
});
Route::post('/storeAction','Login\LoginController@storeAction');

Route::get('/write', function(){
    return view('board/write');
});

Route::post('/writeAction', 'Board\BoardController@writeAction');

Route::get('/list', 'Board\BoardController@listAction');

Route::get('/read/{id?}', 'Board\BoardController@readAction');

Route::get('/deleteAction/{id?}/{user_id}', 'Board\BoardController@deleteAction');

Route::get('/modify/{id}/{user_id}', function($id,$user_id){
  return view('board/modify')->with('id',$id)->with('user_id',$user_id);

});

Route::put('/modifyAction/{id}/{user_id}', 'Board\BoardController@modifyAction');

Route::get('/idCheck/{user_id}', 'Login\LoginController@idCheckAction');

// 마이페이지 매칭 서비스 라우터
// Route::get('/myPage/matching', 'MyPage\MusicBoardController@playListAction');
// Route::get('/myPage/matching/{user_id}', 'MyPage\MusicBoardController@playListAction');

// 임시 마이페이지 매칭 라우터
Route::post('/myPage/album', 'MyPage\MusicBoardController@albumListAction');



?>
