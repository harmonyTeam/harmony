<?php
echo "<html>
  <head>
    <meta charset='utf-8'>
    <title></title>
  </head>
  <body>";

    $user_id = session()->get('user_id','');
    if (empty($user_id[0])) {
      echo "<script>alert('로그인 후 이용하세요.');</script>";
      echo "<script>location.href='/login';</script>";
    }
    else {


    echo "<form class='' action='/deleteAction/{$boards[0]['id']}/{$boards[0]['user_id']}' method='get'>";


      echo "<table class='table'>
          <th>글번호</th>
          <th>제목</th>
          <th>내용</th>
          <th>작성자</th>
          <th>날짜</th>";


        echo "<tr>";
        echo "<td>{$boards[0]['id']}</a>";
        echo "<td>{$boards[0]['title']}</a>";
        echo "<td>{$boards[0]['message']}</a>";
        echo "<td>{$boards[0]['user_id']}";
        echo "<td>{$boards[0]['updated_at']}</td>";
        echo "</tr>";




    echo "<input type='submit' name='' value='글 삭제하기'>";

    echo "<input type='button' name='' value='글 수정하기' onclick=location.href='/modify/{$boards[0]['id']}/{$boards[0]['user_id']}'>";

    echo "</form>



  </body>
</html>";
}
?>
