<?php

namespace App\Http\Controllers\Login;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    //사용자 확인 후 로그인 가능
    public function loginAction(Request $request) {
        $user_id = $request->input('user_id');
        $user_pass = $request->input('user_pass');
        session(['user_id' => $user_id]);

        // $user_id = $request->session()->get('user_id','');

        $users=User::where('user_id',$user_id)->where('user_pass',$user_pass)->get();




        if(!empty($users[0]['user_id'])){
          return view('login/login');
          // header('Location:/login');
        }
        else {
          echo "<script>alert('로그인 실패');</script>";
          echo "<script>history.back();</script>";
        }

    }


    // 회원가입 (DB에 값넣기)
    public function storeAction(Request $request){

      $user_name = $request->input('user_name');
      $user_id = $request->input('user_id');
      $user_pass = $request->input('user_pass');
      $user_pass2 = $request->input('user_pass2');


      // $user_idc는 DB user_id값과 사용자로부터 입력값이 맞을때 DB에서 가져온다
      $user_idc = User::where('user_id',$user_id)->get();

      // 공백있을경우 회원가입 불가능
      if(empty($user_name)){
        echo "<script>alert('이름 입력하세요');</script>";
        echo "<script>history.back();</script>";
      }
      elseif (empty($user_id)) {
        echo "<script>alert('아이디 입력하세요');</script>";
        echo "<script>history.back();</script>";
      }
      elseif (empty($user_pass)) {
        echo "<script>alert('비밀번호 입력하세요');</script>";
        echo "<script>history.back();</script>";
      }
      elseif(empty($user_pass2)) {
        echo "<script>alert('비밀번호 입력하세요');</script>";
        echo "<script>history.back();</script>";
      }

      // 아이디 중복확인 결과와 비밀번호가 맞을경우만 회원가입 가능
      if(empty($user_idc[0])){

        if($user_pass == $user_pass2){

          $users = new User;
          $users->user_id = $user_id;
          $users->user_pass = $user_pass;

          $users->save();

          return view('login/confirm');
        }
        else {
          echo "<script>alert('비밀번호 확인하세요');</script>";
          echo "<script>history.back();</script>";

        }
      }
      else {
        echo "<script>alert('아이디 확인하세요.');</script>";
        echo "<script>history.back();</script>";
      }



    }

    // 로그아웃
    public function logoutAction(Request $request){
      $session = $request->session()->put('user_id');
      return Redirect('/login');

    }


  // 아이디 중복 체크
  public function idCheckAction($user_id){
    $userID = User::where('user_id',$user_id)->get();

    if(empty($userID[0])){
      echo "사용 할 수 있습니다.";
    }
    else{
      echo "사용 할 수 없습니다.";

    }
  }

}


?>
