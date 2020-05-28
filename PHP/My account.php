
<style>
<?php include 'C:\xampp\htdocs\MuM\CSS\My account.css'; ?>
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
    <div>
    <p style class="Text1">Create an account or Log In </p>
    <p style class="Text2">to get started.</p>
    <div class="submit">
    <form action="Sign up.php">
    <input type="submit" id="signup"  value="Sign Up"><br>
    </form>
    <form action ="Log in.php">
    <input type="submit" id= "login" value="Log In">
    </form>
    </div>
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