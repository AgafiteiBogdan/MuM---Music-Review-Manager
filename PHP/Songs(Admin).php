
<?php include_once ('connection.php');
 ?>
<style>
<style>
<?php include 'C:\xampp\htdocs\MuM\CSS\Songs.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Songs</title>
<meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="body">

<nav class="navbar">
     <span class="navbar-toggle" id="js-navbar-toggle">
            <i class="fa fa-bars"></i>
        </span>
        <a href="Home.php" class="logo">MuM</a>
        <ul class="main-nav" id="js-menu">

            <li>
                <a href="Home.php" class="nav-links">Home</a>
            </li>
            <li>
                <a href="News.php" class="nav-links">News</a>
            </li>
            <li>
                <a href="My account.php" class="nav-links">My account</a>
            </li>
            <li>
                <a href="Log out.php" class="nav-links">Log out</a>
            </li>
        </ul>
</nav>
<div class="flex-container">
<div class="sidebar" id="sidebar">
  <a href="News.php"><i class="fa fa-fire icon" id="image"></i>News</a>
  <div style="border-bottom: 1px solid  #D3D3D3;">
  <a href="#"><i class="fa fa-microphone" id="image"></i>Artists</a>
  <a href="#"><i class="fa fa-list-music" id="image"><i class="fa fa-archive" id="image"></i></i>Albums</a>
  <a href="Songs(Admin).php" class="active"><i class="fa fa-music" id="image"></i>Songs</a>
  <a href="#"><i class="fa fa-calendar" id="image"></i>Year</a>
  <a href="#"><i class="fa fa-ellipsis-v" id="image"></i>Genres</a>
  <a href="#" style="margin-bottom: 10px"><i class="fa fa-bar-chart" id="image"></i>Statistics</a>
  </div>
  <div>
  <a href="#" style="margin-top: 10px; padding-left: 30px;">MY INTERESTS</a>
  <a onclick="myFunction()" href="#"><i class="fa fa-play-circle" id="image"></i>My Playlists</a>
  <a href="My favorite artists" ><i class="fa fa-star" id="image"></i>My favorite artists</a>
  <a href="My favorite songs.php"><i class="fa fa-star" id="image"></i>My favorite songs</a>
  <a href onclick="myFunction()"href="#"><i class="fa fa-clock-o" id="image"></i>Recently Played</a>
  </div>
</div>
<?php
  require 'update.php';
                   $sql =  "SELECT a.id as 'id', a.name as 'song', b.name as 'artist', c.name as 'album', c.release_year as 'year', a.genre as 'genre'from artists b join albums c on b.id=c.artist_id  join Songs a on c.id = a.album_id order by a.id, b.name, c.name;";
 if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
      ?>
      <div style ="overflow-x: scroll;"class="tableFixHead">
        <table>
            <thread>
                <th>ID</th>
                <th>Name</th>
                 <th>Artist </th>
                <th>Album</th>
                  <th>Genre</th>
                   <th>Details</th>

            </thread>
            <?php
        while($row = mysqli_fetch_array($result)){ ?>
            <tr  id="<?php echo $row['id'] ?>">

                <td data-target="id"><?php echo $row['id'] ?></td>
                <td data-target="song"><?php echo $row['song'] ?></td>
                <td data-target="artist"><?php echo $row['artist'] ?></td>
                <td data-target="album"><?php echo $row['album'] ?></td>
                <td data-target="genre"><?php echo $row['genre'] ?></td>
                 <td>
                  <button data-id = "<?php echo $row['id'] ?>" style="color:white;  border: none; background-color: #FF4500;  padding: 10px 20px;" type="button" name="Button" onclick = "myModal(<?php echo $row['id'] - 1?>)">Details</button></td>


      <div class="modal" id="myModal">

<div class="modal-content">

    <span onclick = "closeModal(<?php echo $row['id'] - 1?>)" class="close" >&times;</span>
    <div class="container">
  <form action="Songs(Admin).php" method="post">
    <input type="hidden" id="id" name="id" required ="required" value="<?php echo $row['id'] ?>">
    <div class="row">
      <div class="col-25">
        <label for="song">Song</label>
      </div>
      <div class="col-75">
     <input type="text" id="song1" name="song" required ="required" value="<?php echo $row['song'] ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="atist">Artist</label>
      </div>
      <div class="col-75">
        <input type="text" id="artist" name="artist" required ="required" value="<?php echo $row['artist'] ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="album">Album</label>
      </div>
      <div class="col-75">
        <input type="text" id="album" name="album" required ="required" value="<?php echo $row['album'] ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="year">Year</label>
      </div>
      <div class="col-75">
        <input type="text" id="year" name="year" required ="required" value="<?php echo $row['year'] ?>">

      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Genre</label>
      </div>
      <div class="col-75">
        <select id="country" name="genre">
           <?php

    $genre = $row['genre'];
    $sql = mysqli_query($db, "SELECT DISTINCT genre FROM `songs` where genre = '$genre'");
    while ($row = $sql->fetch_assoc()){
    echo "<option value='$genre'>$genre</option>";
    }
    $sql = mysqli_query($db, "SELECT DISTINCT genre FROM `songs` where genre != '$genre' order by genre" );
    while ($row = $sql->fetch_assoc()){
      $option = $row['genre'];
       echo "<option value='$option'>$option</option>";
    }

    ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div>
        <div class="rating">
<span style="font-size: 22px; margin-right: 144px; margin-top: 20px;">☆</span><span style="font-size: 22px;">☆</span><span style="font-size: 22px;">☆</span><span style="font-size: 22px;">☆</span><span style="font-size: 22px;">☆</span>
 <label for="rating" style="margin-right: 41px;">Rating</label>
</div>
  </div>
</div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Comment</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="comment" placeholder="Write something.." style="height:100px;"></textarea>
      </div>
    </div>
    <div class="row">
      <div style="align-self: : right; margin-right: 50px;">
      <input type="submit" style="margin-top: 20px;" value="Send" name="send">
    </div>
    </div>

  </form>
</div>

<?php

        }

        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

?>
</div>
</div>
</div>
</div>


<script>/*script pentru afisarea ferestrei pop-up*/
function myFunction() {
  alert("You have to be logged in!");
}
</script>
<script> /*script pentru deschiderea meniului cand fereastra este minimizata*/
let mainNav = document.getElementById('js-menu');
let navBarToggle = document.getElementById('js-navbar-toggle');

navBarToggle.addEventListener('click', function () {
  mainNav.classList.toggle('active');
});
</script>
<script>

function myModal(id) {
  modal = document.getElementsByClassName("modal")[id];
  modal.style.display = "block";
   }

function closeModal(id) {
  modal = document.getElementsByClassName("modal")[id];
  modal.style.display = "none";
   }

//cand utilizatorul da click oriunde in afara ferestrei, aceasta de va inchide
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
