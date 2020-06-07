<style>
<?php include 'C:\xampp\htdocs\MuM\CSS\News.css'; ?>
</style>
<?php include_once ('connection.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>News</title>
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
                <a href="Home(L).php" class="nav-links">Home</a>
            </li>
            <li>
                <a href="News(L).php" class="nav-links">News</a>
            </li>
            <li>
                <a href="My account(L).php" class="nav-links">My account</a>
            </li>
            <li>
              <p><a href="My account.php?logout='1'" class="nav-links">Log out</a></p>
            </li>
        </ul>
</nav>
<div class="flex-container">
<div class="sidebar" id="sidebar">
  <a class="active" href="News(L).php"><i class="fa fa-fire icon" id="image"></i>News</a>
  <div style="border-bottom: 1px solid  #D3D3D3;">
  <a href="Artists(L).php"><i class="fa fa-microphone" id="image"></i>Artists</a>
  <a href="Albums(L).php"><i class="fa fa-list-music" id="image"><i class="fa fa-archive" id="image"></i></i>Albums</a>
  <a href="Songs(L).php"><i class="fa fa-music" id="image"></i>Songs</a>
  <a href="Year(L).php"><i class="fa fa-calendar" id="image"></i>Year</a>
  <a href="Genres(L).php"><i class="fa fa-ellipsis-v" id="image"></i>Genres</a>
  <a href="Statistics(L).php" style="margin-bottom: 10px"><i class="fa fa-bar-chart" id="image"></i>Statistics</a>
  </div>
  <div>
  <a href="#" style="margin-top: 10px; padding-left: 30px;">MY INTERESTS</a>
  <a onclick="myFunction()" href="#"><i class="fa fa-play-circle" id="image"></i>My Playlists</a>
  <a href="My favorite artists.php" ><i class="fa fa-star" id="image"></i>My favorite artists</a>
  <a href="My favorite songs.php"><i class="fa fa-star" id="image"></i>My favorite songs</a>
  <a href onclick="myFunction()"href="#"><i class="fa fa-clock-o" id="image"></i>Recently Played</a>
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

</body>
</html>
