<style>
<?php include 'C:\xampp\htdocs\MuM\CSS\News.css'; ?>
</style>
<?php include_once ('connection.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Statistics</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="body">

<nav class="navbar">
     <span class="navbar-toggle" id="js-navbar-toggle">
            <i class="fa fa-bars"></i>
        </span>
        <a href="Home(Admin).php" class="logo">MuM</a>
        <ul class="main-nav" id="js-menu">

            <li>
                <a href="Home(Admin).php" class="nav-links">Home</a>
            </li>
            <li>
                <a href="News(Admin).php" class="nav-links">News</a>
            </li>
            <li>
                <a href="My account(Admin).php" class="nav-links">My account</a>
            </li>
            <li>
              <p><a href="My account.php?logout='1'" class="nav-links">Log out</a></p>
            </li>
        </ul>
</nav>
<div class="flex-container">
<div class="sidebar" id="sidebar">
  <a href="News(Admin).php"><i class="fa fa-fire icon" id="image"></i>News</a>
  <div style="border-bottom: 1px solid  #D3D3D3;">
  <a href="Artists(Admin).php"><i class="fa fa-microphone" id="image"></i>Artists</a>
  <a href="Albums(Admin).php"><i class="fa fa-list-music" id="image"><i class="fa fa-archive" id="image"></i></i>Albums</a>
  <a href="Songs(Admin).php"><i class="fa fa-music" id="image"></i>Songs</a>
  <a href="Year(Admin).php"><i class="fa fa-calendar" id="image"></i>Year</a>
  <a href="Genres(Admin).php"><i class="fa fa-ellipsis-v" id="image"></i>Genres</a>
  <a class="active" href="Statistics.php" style="margin-bottom: 10px"><i class="fa fa-bar-chart" id="image"></i>Statistics</a>
  </div>
  <div>
  <a href="#" style="margin-top: 10px; padding-left: 30px;">MY INTERESTS</a>
  <a onclick="myFunction()" href="#"><i class="fa fa-play-circle" id="image"></i>My Playlists</a>
  <a href="My favorite artists(Admin).php ><i class="fa fa-star" id="image"></i>My favorite artists</a>
  <a href="My favorite songs(Admin).php"><i class="fa fa-star" id="image"></i>My favorite songs</a>
  <a href onclick="myFunction()"href="#"><i class="fa fa-clock-o" id="image"></i>Recently Played</a>
  </div>
</div>
</div>


<div class = "statistici" >
  <?php
  $arrayFS=$arrayCS=$arrayUC=$arrayFAS=$arrayFA=0;

  $sql = "SELECT s.name as 'sname', a.name as 'aname' , count(*) as 'c' from favorite_songs fa join songs s on s.id = fa.song_id join artists a on s.artist_id = a.id GROUP by song_id order by c desc";
  if($result = mysqli_query($db,$sql)){
    if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    $nr_aparitii = $row['c'];
    $song = $row['sname'];
    $artist = $row['aname'];
    ?>
    <p style="font-size: 30px;"> The most favorite song is: <?php echo $song?><p> Singed by: <?php echo $artist ?><br> It is favorited by: <?php echo $nr_aparitii ?> people.</p>
    <?php
    $arrayFS = array($song,$artist,$nr_aparitii);
    }
}

  $sql = "SELECT s.name as 'song', a.name as 'aname', count(*) as 'c' from comments c join songs s on s.id = c.song_id join artists a on s.artist_id = a.id group by song_id order by c desc";
  if($result = mysqli_query($db,$sql)){
    if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    $nr_aparitii = $row['c'];
    $song = $row['song'];
    $artist = $row['aname'];
    ?>
    <p style="font-size: 30px;"> The most commented song is: <?php echo $song ?><p>Singed by:<?php echo $artist ?><br> It has: <?php echo $nr_aparitii ?> comments.</p>
    <?php
    $arrayCS = array($song, $artist,$nr_aparitii);
    }
  }

  $sql = "SELECT user_name as 'user', count(id) as 'c' from comments group by user_name order by c desc ";
  if($result = mysqli_query($db,$sql)){
    if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);
    $nr_aparitii = $row['c'];
    $user = $row['user'];
    ?>
    <p style="font-size: 30px;">The most active user is <?php echo $user ?><p>He/She added: <?php echo $nr_aparitii ?> comments.</p>
    <?php
    $arrayUC = array($user,$nr_aparitii);
    }
  }

  $sql = "SELECT fs.id, a.name as 'aname', count(a.id) as 'c' from favorite_songs fs join songs s on s.id = fs.song_id join artists a on a.id = s.artist_id group by a.id order by c desc";
  if($result = mysqli_query($db,$sql)){
    if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);
    $nr_aparitii = $row['c'];
    $artist = $row['aname'];
    ?>
    <p style="font-size: 30px;"> The artist that has the most songs added to favorite by users is: <?php echo $artist ?><p> Songs added at favorite: <?php echo $nr_aparitii?> times.</p>
    <?php
    $arrayFAS = array($artist,$nr_aparitii);
    }
  }

  $sql = " SELECT a.name as 'aname', count(*) as 'c' from favorite_artists fa join artists a on fa.artist_id = a.id group by fa.artist_id order by c desc";
  if($result = mysqli_query($db,$sql)){
    if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);
    $nr_aparitii = $row['c'];
    $artist = $row['aname'];
    ?>
    <p style="font-size: 30px;"> The most favorited artist is <?php echo $artist?><p> Added as favorite by: <?php echo $nr_aparitii ?> users.</p>
    <?php
    $arrayFA = array($artist,$nr_aparitii);

    }
  }

// pentru export
  $list = array($arrayFS,$arrayCS,$arrayUC,$arrayFAS,$arrayFA);
?>

  <Button  type = "Button"  class = "Button" onclick = "createExport($list)" name = "CreateExport"  value = "Export Statistici">Export</Button>



</div>

<script>/*script pentru afisarea ferestrei pop-up*/
function myFunction() {
  alert("You have to be logged in!");
}
</script>

<script>
function createExport($list){
  <?php
    $openFile= fopen('file.csv', 'w');

    foreach ($list as $fields) {
        fputcsv($openFile, $fields);
    }
    fclose($openFile);
    ?>
}
</script>

<script> /*script pentru deschiderea meniului cand fereastra este minimizata*/
let mainNav = document.getElementById('js-menu');
let navBarToggle = document.getElementById('js-navbar-toggle');

navBarToggle.addEventListener('click', function () {
  mainNav.classList.toggle('active');
});
</script>

</body>
</html>
