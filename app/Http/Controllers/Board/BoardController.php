<?php

namespace App\Http\Controllers\Board;

use App\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//게시판 컨트롤러
class BoardController extends Controller
{
   // 게시판 글 쓰기
    public function writeAction(Request $request){
      $user_id = $request->session()->get('user_id','');

      $title = $request->input('title');
      $message = $request->input('message');

      $board = new Board;
      $board->title = $title;
      $board->message = $message;
      $board->user_id = $user_id;
      $board->save();

      echo "<script>location.href='list';</script>";
    }

    //게시판 글 리스트
    public function listAction(){
      $boards=Board::all();
      return view('board/list', compact('boards'));

    }

    //게시판 글 내용보기
    public function readAction($id){
      $boards = Board::where('id',$id)->get();
      return view('board/read', compact('boards'));

    }

    //게시판 글 삭제
    public function deleteAction($id,$user_id){
      $user_ids = session()->get('user_id');
      if ($user_ids == $user_id) {
        $boards = Board::where('id',$id)->delete();
        $boards = Board::all();

        return view('board/list', compact('boards'));
      }
      else {
        echo "<script>alert('글쓴이가 아닙니다.');</script>";
        echo "<script>history.back();</script>";
      }
    }

    // 게시판 글 수정
    public function modifyAction(Request $request,$id,$user_id){
      $user_ids = $request->session()->get('user_id');

      if($user_id == $user_ids){
      $title = $request->input('title');
      $message = $request->input('message');


      Board::where('id',$id)->update(array('title'=>$title,'message'=>$message));
      $boards=Board::all();

      return view('board/list',compact('boards'));
    }
    else {
      echo "<script>alert('글쓴이가 아닙니다.');</script>";
      echo "<script>history.back();</script>";
    }

    }

}
?>
