<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      foreach ($myAlbum as $myAlbums) {

        echo "<a href ='album/{$myAlbums['id']}'><div style='margin:20 30px;float:left;width:150px;height:150px;border:1px solid black; ba'>";
        echo $myAlbums['album_title'];
        echo "</div></a>";
      }
     ?>
     <form class="" action="/myPage/album/add" method="get">
        <input type="submit" name="" value="앨범추가">
     </form>
  </body>
</html>
