@extends('template')
<?php
$user_id = session()->get('user_id','');

if(!empty($user_id[0])){
  echo $user_id;
  echo "님 어서오세요";
  echo "<html><body>
  <form class='' action='/logoutAction' method='post'>
  <input type='submit' value=로그아웃>";
  ?>
  {{csrf_field()}}
  <?php
  echo "</form>
  </body>
  </html>";
}
else {
  echo "<html>
    <head>
      <meta charset='utf-8'>
      <title>로그인 페이지</title>
    </head>
    <body>
      <form class='' action='/loginAction' method='post'>
          아이디:<input type='text' name='user_id' ><br>
          비밀번호: <input type='Password' name='user_pass' ><br>
          <input type='submit' value='로그인'>
          <input type='button' value='회원가입' onclick=location.href='store';>";
          ?>
         {{csrf_field()}}
         <?php
      echo "</form>
    </body>
  </html>";
}
?>
