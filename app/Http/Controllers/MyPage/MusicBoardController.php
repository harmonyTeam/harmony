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

    public function playListAction(Request $request)
    // public function playListAction()
    {
        // 섹션으로 값가져오기
        $user_id = $request->session()->get('user_id','');
        // echo $user_id;

        // $id = User::where('user_id', $user_id)->get();
        $id = User::where('user_id',$user_id)->get();
        echo $id[0]['id'];

        $userMusics = Musicboard::where('user_id',$id[0]['id'])->get();
        // echo $userMusics[0]['good_count'];

        return view('mypage/matching', compact('userMusics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mypage  $mypage
     * @return \Illuminate\Http\Response
     */
    public function show(Mypage $mypage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mypage  $mypage
     * @return \Illuminate\Http\Response
     */
    public function edit(Mypage $mypage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mypage  $mypage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mypage $mypage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mypage  $mypage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mypage $mypage)
    {
        //
    }
}
