
<?php

 $db =  mysqli_connect('localhost', 'root', '', 'mum') or die($db);
 $option = "";
if(isset($_POST['ok']))
 {
    $id = mysqli_real_escape_string($db,$_POST['id']);
    $song = mysqli_real_escape_string($db,$_POST['song']);
    $artist = mysqli_real_escape_string($db,$_POST['artist']);
    $album = mysqli_real_escape_string($db,$_POST['album']);
    $year = mysqli_real_escape_string($db,$_POST['year']);
    $genre = mysqli_real_escape_string($db,$_POST['genre']);

  $update = "UPDATE artists b join albums c on b.id=c.artist_id  join Songs a on c.id = a.album_id 
  SET a.name = '$song', b.name = '$artist', c.name = '$album', c.release_year = '$year', a.genre = '$genre' where a.id = '$id'";
  mysqli_query($db, $update);

}

 