<?php

namespace App\Http\Controllers\Album;

use App\Album;
use App\User;
use App\MusicBoard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    // public function albumListAction(Request $request) // GET 모드
    public function albumListAction() // POST 모드
    {
      // 섹션으로 값가져오기
      $user_id = session('user_id');

      $myAlbum = Album::where('user_id',$user_id)->get();;
      return view('mypage/album', compact('myAlbum'));
    }
    public function addAlbumAction(Request $request)
    {
      $sessionID = $request->session()->get('user_id','');
      $user_id = User::where('user_id',$sessionID)->get();

      $userMusics = Musicboard::where('user_id',$user_id[0]['id'])->get();
      // echo count($userMusics);
      $album_number = count($userMusics);
      $album_title = $request->input('album_title');
      $album_content = $request->input('album_content');
      $album_picture = $request->input('album_picture');



      $album = new Album;
      $album->album_number = $album_number;
      $album->album_title = $album_title;
      $album->album_picture = $album_picture;
      $album->album_content = $album_content;
      $album->user_id = $sessionID;
      $album->save();

      echo "<script>location.href='myPage/album';</script>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
}

?>
