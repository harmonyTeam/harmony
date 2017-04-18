<!DOCTYPE html>
<?php
echo "<html>
  <head>
    <meta charset='utf-8'>
    <title>게시판</title>

    <script language='javascript'>

    function check_submit(){
      if(document.writeForm.title.value == ''){
        alert('제목을 입력하세요');
        document.writeForm.title.focus();
        return;
      }
      else if(document.writeForm.message.value == ''){
        alert('내용을 입력하세요');
        document.writeForm.message.focus();
        return;
      }
      else{
        document.writeForm.action='/writeAction';
        document.writeForm.submit();
      }
    }

    </script>
  </head>";

$user_id = session()->get('user_id','');
if(empty($user_id[0])){
  echo "<script>alert('로그인 후 이용 바랍니다.');</script>";
  echo "<script>location.href='/login';</script>";

}
else {
  echo "<body>

        <div class='os'>
        <table border=2>
               <caption> 글쓰기 </caption>
               <form action='/writeAction' method='post' name='writeForm' enctype=multipart/form-data'>
                   <tr>
                       <th>제목: </th>
                       <td><input type='text' placeholder='제목을 입력하세요.' name='title' size='30'></td>
                   </tr>
                   <tr>
                       <th>내용: </th>
                       <td><textarea cols='75' rows='18' placeholder='내용을 입력하세요.' name='message'></textarea></td>
                   </tr>
                   </table>
                     <a href='javascript:check_submit();'>글등록</a>";

                   ?>

                    {{csrf_field()}}
                   <?php

                  echo " </form>
                         </div>
                         </body></html>";

}
?>
