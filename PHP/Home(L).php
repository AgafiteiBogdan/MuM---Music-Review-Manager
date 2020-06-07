
<style>
<?php include 'C:\xampp\htdocs\MuM\CSS\Home.css'; ?>
</style>
<?php include 'connection.php'; ?>
<head>
<title>Home</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-image: url('imagine1.png');">

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
    <div style="margin-right: 200px;">
  <p style class="Text1">Find music </p>
  <p style class="Text2">you love.</p>
    </div>
   <div class="form" method="post" style="width: 700px; margin-left: 50px;" >
  <form  method="post" action="Home.php">
    <select class="custom-select " name="genre" id="genre">
      <option>Categories:</option>
    <?php
      $sql = mysqli_query($db, "SELECT DISTINCT genre FROM `songs` where genre != '$genre' order by genre" );
    while ($row = $sql->fetch_assoc()){
      $option1 = $row['genre'];
       echo "<option value='$option1'>$option1</option>";
     }
    ?>
    </select>
   <select  class="custom-select" name="artist" id="artist" >
      <option>Artist:</option>
      <script >
     function showArtists() {
  <?php  $genre = $_POST['genre'];
   $sql = mysqli_query($db, "SELECT DISTINCT a.name FROM  artists a join songs s on a.id=s.artist_id  where s.genre = 'pop' " );
    while ($row = $sql->fetch_assoc()){
      $option2 = $row['name'];
       echo "<option value='$option2'>$option2</option>";
     }
     ?>
     showArtists();
}  </script>
    </select>
    <select class="custom-select" name="song" id="song">
      <option>Song:</option>

    </select>
   <input type="submit" value="Submit" name="submit" >
   </form>
   </div>
</div>
<script>
let mainNav = document.getElementById('js-menu');
let navBarToggle = document.getElementById('js-navbar-toggle');

navBarToggle.addEventListener('click', function () {
  mainNav.classList.toggle('active');
});


</script>
</body>
</html>
