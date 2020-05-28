
<style>
<?php include 'C:\xampp\htdocs\MuM\CSS\Sign up.css'; ?>
</style>
<?php include('connection.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Sign up</title>
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
        <form method="post" action="Sign up.php" class="signup">
            <?php include('SignUpErrors.php');?>
                <i class="fa fa-user icon" style="font-size: 120px;"></i>
                <input type="text" placeholder="first name" name="first_name" value="<?php echo $first_name; ?>"><br>
                <input type="text" placeholder="last name" name="last_name" value="<?php echo $last_name; ?>"><br>
                <input type="text" placeholder="e-mail" name="email" value="<?php echo $email; ?>"><br>
                <input type="text" placeholder="username" name="username" value="<?php echo $username; ?>"><br>
                <input type="password" placeholder="password" name="password" value="<?php echo $password; ?>"><br>
                <button type="submit" value="Create" name="create">Create</button>
                
        </form>
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