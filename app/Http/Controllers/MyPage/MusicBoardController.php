<?php

namespace App\Http\Controllers\MyPage;

use App\MusicBoard;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/***************************************************
******* MyPage MusicBoard Class*******
*****************************************************/
class MusicBoardController extends Controller
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

    public function playListAction($user_id)
    // public function playListAction()
    {
        // 섹션으로 값가져오기
        $sessionID = session('user_id');
        $id = User::where('user_id',$sessionID)->get();
        // echo $id[0]['id'];

        $userMusics = Musicboard::where('album_number',$user_id)->get();
        // echo $userMusics;
        $allMusics = Musicboard::where('user_id',$id[0]['id'])->where('album_number',NULL)->get();
        // echo $allMusics;
        // return view('mypage/album_details', compact('userMusics','allMusics'));
        return view('mypage/album_details')->with('userMusics',$userMusics)->with('allMusics',$allMusics);
    }


    public function destroy(Mypage $mypage)
    {
        //
    }
}
