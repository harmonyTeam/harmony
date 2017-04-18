<?php

namespace App\Http\Controllers\Musicboard;

use App\Musicboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/***************************************************
******* MyPage Mathing Class****
*****************************************************/
class MatchingController extends Controller
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

    public function playListAction($id)
    {
        $userMusics = Musicboard::where('id',$id)->get();
        return view('mypage/matching_blade.php', compact('userMusics'));
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
