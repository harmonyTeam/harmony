


<html>
  <head>
    <meta charset="utf-8">
    <title>글쓰기</title>

    <script language="javascript">

    function check_submit(){

      if(document.writeForm.title.value==""){
        alert('제목을 입력하세요');
        document.writeForm.title.focus();
        return;
      }
      else if(document.writeForm.message.value==""){
        alert('내용을 입력하세요');
        document.writeForm.message.focus();
        return;
      }
      else{
        document.writeForm.action="/modifyAction/<?php echo $id; ?>/<?php echo $user_id; ?>";
        document.writeForm.submit();
      }
    }

    </script>
  </head>
  <body>

      <div class="os">
      <table border=2>
             <caption> 글쓰기 </caption>
             <form action=/modifyAction/<?php echo $id; ?>/<?php echo $user_id; ?> method="post" name="writeForm" enctype="multipart/form-data">
                 <tr>
                     <th>제목: </th>
                     <td><input type="text" placeholder="제목을 입력하세요. " name="title" size="30"></td>
                 </tr>
                 <tr>
                     <th>내용: </th>
                     <td><textarea cols="75" rows="18" placeholder="내용을 입력하세요. " name="message"></textarea></td>
                 </tr>
                 </table>
                 <a href="javascript:check_submit();">글수정</a>
                 <!-- <input type="submit" value='글수정' class="right"> -->
                 <input type="hidden" name="_method" value="put">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
             </form>
      </div>

    </body>
</html>
