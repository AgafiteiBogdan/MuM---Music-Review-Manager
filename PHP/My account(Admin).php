<style>
<?php include 'C:\xampp\htdocs\MuM\CSS\My Account(L).css'; ?>
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
    <img src="user.jpg" class="img"><br>
    <?php if (isset($_SESSION["username"])): ?>
        <strong style="font-size: 40px;"><?php echo $_SESSION['username']; ?></strong>
       
    <?php endif ?>

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