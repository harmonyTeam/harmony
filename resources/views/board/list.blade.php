<?php
echo "<table class='table'>
  <thead>
    <th>글번호</th>
    <th>제목</th>
    <th>작성자</th>
    <th>날짜</th>";
echo "$boards";
foreach ($boards as $board) {
  echo "<tr>";
  echo "<td>{$board['id']}</td>";
  echo "<td><a href='/read/{$board['id']}'>{$board['title']}</td></a>";
  echo "<td>{$board['user_id']}</td>";
  echo "<td>{$board['updated_at']}</td>";
  echo "</tr>";

}

echo "<form class='' action='/write' method='get'>";
echo " <input type='submit' name='' value='글쓰기'>";
echo "</form>";
echo "  </thead>
</table>";
 ?>
