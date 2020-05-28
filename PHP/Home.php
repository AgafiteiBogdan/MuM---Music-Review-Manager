
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
                <a href="Home.php" class="nav-links">Home</a>
            </li>
            <li>
                <a href="News.php" class="nav-links">News</a>
            </li>
            <li>
                <a href="My account.php" class="nav-links">My account</a>
            </li>
            <li>
                <a href="Log in.php" class="nav-links">Log In</a>
            </li>
        </ul>
</nav>
<div class="flex-container">
    <div style="margin-right: 200px;">
  <p style class="Text1">Find music </p>
  <p style class="Text2">you love.</p>
    </div>
   <div class="form" method="post" style="width: 700px; margin-left: 50px;">
  <form  method="post" action="Home.php">
    <select class="custom-select " name="genre" id="genre">
      <option>Categories:</option>
    <?php 
      $sql = mysqli_query($db, "SELECT DISTINCT genre FROM `songs` where genre != '$genre' order by genre" );
    while ($row = $sql->fetch_assoc()){
      $option = $row['genre'];
       echo "<option value='$option'>$option</option>";
     }
    ?>
    </select>
   <select class="custom-select" name="artist" id="artist">
      <option>Artist:</option>
        <?php

    $sql = mysqli_query($db, "SELECT  b.name from artists b join albums c on b.id=c.artist_id  join Songs a on c.id = a.album_id order by b.name");
    while ($row = $sql->fetch_assoc()){
      $option2 = $row['artist'];
       echo "<option value='$option2'>$option2</option>";
       }
      
    ?>
    </select>
    <select class="custom-select" name="song" id="song">
      <option>Song:</option>
      <?php echo $option3; ?>
    </select>
   <input type="submit" value="Submit" name="submit" />
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




