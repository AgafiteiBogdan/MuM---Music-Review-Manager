<style>
<?php include 'C:\xampp\htdocs\MuM\CSS\My Account(Admin).css'; ?>
</style>
<?php include_once ('connection.php');
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>My account</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar">
     <span class="navbar-toggle" id="js-navbar-toggle">
            <i class="fa fa-bars"></i>
        </span>
        <a href="Home.php" class="logo">MuM</a>
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
   <?php $query = mysqli_query($db, "SELECT max(id)+1 as id FROM artists");
         while ($row = $query->fetch_assoc()){
         $ids = $row['id'];
           }
         $query = mysqli_query($db, "SELECT max(id)+1 as id FROM albums");
         while ($row = $query->fetch_assoc()){
         $id2 = $row['id'];
           }
         $query = mysqli_query($db, "SELECT max(id)+1 as id FROM songs");
         while ($row = $query->fetch_assoc()){
         $id3 = $row['id'];
           }?>
    <img src="user.jpg" class="img"><br>
        <strong style="font-size: 40px;"><?php echo $_SESSION['username']; ?></strong>  
  <div>
  <form method="post"  class="form">
    <?php $poz = 0; ?>
    <input type="button" onclick = "myModal()" value="Add artist" name ="addartist"style="margin-bottom: 20px;">
    <input type="button" onclick = "myModal2()" value="Add album" name="addalbum" style="margin-bottom: 20px;">
    <input type="button"onclick = "myModal3()" value="Add song" name="addsong">
  </form>
    <div class="modal" id="myModal">
                 
<div class="modal-content">
    <span onclick = "closeModal()" class="close" >&times;</span>
   
    <div class="container">
  <form  method="post">
   <div class="row">
    <div style="align-self: : right; margin-right: 50px; font-size: 30px; padding: 20px;">
      <p>Add artist</p>
   </div>
</div>
    <div class="row">
      <div class="col-25">
        <label for="atist">ID</label>
      </div>
      <div class="col-75">
        <input type="text" id="artist" name="id" required ="required" value="<?php echo $ids; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="album">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="album" name="name" required ="required" value="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="year">Country</label>
      </div>
      <div class="col-75">
        <input type="text" id="year" name="country" required ="required" value="">
    
      </div>
    </div> 
     <div class="row">
    <div class="col-75">
    <div style="align-self: : right; margin-right: -105px;">
      <input type="submit" style="margin-top: 20px;" value="Add" name="add">
    </div>
   </div>
</div>
  </form>
</div>
</div>
</div>
   <div class="modal" id="myModal2">
                 
<div class="modal-content">
    <span onclick = "closeModal2()" class="close" >&times;</span>
   
    <div class="container">
  <form  method="post">
   <div class="row">
    <div style="align-self: : right; margin-right: 50px; font-size: 30px; padding: 20px;">
      <p>Add album</p>
   </div>
</div>
    <div class="row">
      <div class="col-25">
        <label for="atist">ID</label>
      </div>
      <div class="col-75">
        <input type="text" id="artist" name="id" required ="required" value="<?php echo $id2; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="album">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="album" name="name" required ="required" value="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Artist id</label>
      </div>
      <div class="col-75">
        <select id="country" name="artistid">
           <?php
    $sql = mysqli_query($db, "SELECT DISTINCT id FROM `artists` order by id" );
    while ($row = $sql->fetch_assoc()){
      $option1 = $row['id'];
       echo "<option value='$option'>$option1</option>";
    }

    ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="year">Release year</label>
      </div>
      <div class="col-75">
        <input type="text" id="year" name="year" required ="required" value="">
    
      </div>
    </div> 
     <div class="row">
    <div class="col-75">
    <div style="align-self: : right; margin-right: -105px;">
      <input type="submit" style="margin-top: 20px;" value="Add" name="add2">
    </div>
   </div>
</div>
  </form>
</div>
</div>
</div>
   <div class="modal" id="myModal3">
                 
<div class="modal-content">
    <span onclick = "closeModal3()" class="close" >&times;</span>
   
    <div class="container">
  <form  method="post">
   <div class="row">
    <div style="align-self: : right; margin-right: 50px; font-size: 30px; padding: 20px;">
      <p>Add song</p>
   </div>
</div>
    <div class="row">
      <div class="col-25">
        <label for="atist">ID</label>
      </div>
      <div class="col-75">
        <input type="text" id="artist" name="id" required ="required" value="<?php echo $id3; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="album">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="album" name="name" required ="required" value="">
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="country">Artist id</label>
      </div>
      <div class="col-75">
        <select id="country" name="artistid">
           <?php
    $sql = mysqli_query($db, "SELECT DISTINCT id FROM `artists` order by id" );
    while ($row = $sql->fetch_assoc()){
      $option1 = $row['id'];
       echo "<option value='$option1'>$option1</option>";
    }

    ?>
        </select>
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="country">Album id</label>
      </div>
      <div class="col-75">
        <select id="country" name="albumid">
           <?php
    $sql = mysqli_query($db, "SELECT DISTINCT id FROM `albums` order by id" );
    while ($row = $sql->fetch_assoc()){
      $option1 = $row['id'];
       echo "<option value='$option'>$option1</option>";
    }

    ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="year">Genre</label>
      </div>
      <div class="col-75">
        <input type="text" id="year" name="genre" required ="required" value="">
    
      </div>
    </div> 
     <div class="row">
    <div class="col-75">
    <div style="align-self: : right; margin-right: -105px;">
      <input type="submit" style="margin-top: 20px;" value="Add" name="add3">
    </div>
   </div>
</div>
  </form>
</div>
</div>
</div>
</div>   
</div>

<script> /*script pentru deschiderea meniului cand fereastra este minimizata*/
let mainNav = document.getElementById('js-menu');
let navBarToggle = document.getElementById('js-navbar-toggle');

navBarToggle.addEventListener('click', function () {
  mainNav.classList.toggle('active');
});
</script>
<script>

function myModal(id) {
  modal = document.getElementById("myModal");
  modal.style.display = "block";
   }

function closeModal(id) {
  modal = document.getElementById("myModal");
  modal.style.display = "none";
   }
function myModal2(id) {
  modal = document.getElementById("myModal2");
  modal.style.display = "block";
   }

function closeModal2(id) {
  modal = document.getElementById("myModal2");
  modal.style.display = "none";
   }
function myModal3(id) {
  modal = document.getElementById("myModal3");
  modal.style.display = "block";
   }

function closeModal3(id) {
  modal = document.getElementById("myModal3");
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