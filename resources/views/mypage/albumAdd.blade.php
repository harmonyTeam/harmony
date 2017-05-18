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
        document.writeForm.album_write.focus();
        return;
      }
      else if(document.writeForm.message.value == ''){
        alert('내용을 입력하세요');
        document.writeForm.album_content.focus();
        return;
      }
      else if(document.writeForm.message.value == ''){
        alert('사진을 선택하세요');
        document.writeForm.album_picture.focus();
        return;
      }
      else{
        document.writeForm.action='/albumAddAction';
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
               <form action='/addAlbumAction' method='post' name='writeForm' enctype=multipart/form-data'>
                   <tr>
                       <th>제목: </th>
                       <td><input type='text' placeholder='제목을 입력하세요.' name='album_title' size='30'></td>
                   </tr>
                   <tr>
                       <th>내용: </th>
                       <td><textarea cols='75' rows='18' placeholder='내용을 입력하세요.' name='album_content'></textarea></td>
                   </tr>
                   <tr>
                       <th>사진첨부: </th>
                       <td>파일첨부<input type='file' name='album_picture' value=''></td>
                   </tr>
                   </table>
                     <input type='submit' value='앨범생성'>";

                   ?>

                    {{csrf_field()}}
                   <?php

                  echo " </form>
                         </div>
                         </body></html>";

}
?>
