<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicQuitousController extends Controller
{
    function audioHarmony(){

        $user_id = session()->get('user_id', '');   //유저 세션정보

        $musics = [
            '/audio/bass.wav',
            '/audio/drum.wav',
            '/audio/Down_N_Dirty.wav',
            '/audio/Garage.wav',
            '/audio/RetroFuture Dirty.wav',
            '/audio/The_End_Is_Near.wav',
        ];          //db로 불러올 것

        return view('musicQuitous.musicQuitous')->with('musics',$musics);
    }

    function test(Request $request){
        $file = $request->all();
        $user_file = date( 'YmdHis')."ua.mid";

        $file['data']->move(public_path('uploads'), $user_file);
        $o = array( 0 => '파일 업로드 성공했습니다.');
        echo json_encode($o);
    }

}
