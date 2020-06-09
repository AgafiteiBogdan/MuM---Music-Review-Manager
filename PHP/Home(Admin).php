
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
                <a href="My account.php?logout='1'" class="nav-links">Log out</a>
            </li>
        </ul>
</nav>
<div class="flex-container">
    <div style="margin-right: 200px;">
  <p style class="Text1">Find music you'll love</p>
    </div>
   <div class="form" method="post" style="width: 700px; margin-left: 50px;" >
  <form  method="post" action="Songs(Admin).php">
   <input type="submit" value="Search" name="submit" >
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
