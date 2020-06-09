
<?php
	if ( ! session_id() ) {

	session_start();

	}
    $first_name = "";
    $last_name = "";
    $email = "";
    $username = "";
    $password = "";
    $errors = array();
	// ne conectam la baza de date
	$db =  mysqli_connect('localhost', 'root', '', 'mum') or die($db);



	// daca dam click pe butonul Create
	if(isset($_POST['create'])) {
		$first_name = mysqli_real_escape_string($db,$_POST['first_name']);
		$last_name = mysqli_real_escape_string($db,$_POST['last_name']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);

	$sql = "SELECT username FROM users WHERE username ='$username'";
	$result = mysqli_query($db, $sql);

	// ne asiguram ca datele au fost introduse corect
	if(empty($first_name)) {
       array_push($errors, "First name is required");
	}
	if(empty($last_name)) {
       array_push($errors, "Last name is required");
	}
	if(empty($email)) {
       array_push($errors, "E-mail  is required");
	}
	if(empty($username)) {
       array_push($errors, "Username  is required");
	}
	if(empty($password)) {
       array_push($errors, "Password  is required");
	}
	if (mysqli_num_rows($result) > 0) {
		array_push($errors, "Username already exists. Please use a different username.");
	}


	// daca nu sunt erori, salvam contul in baza de date
	if(count($errors) == 0) {
	   $sql = "INSERT INTO `users` (`firstname`, `lastname`, `e-mail`, `username`, `password`)
	               VALUES ('$first_name', '$last_name', '$email','$username','$password')";
	   mysqli_query($db, $sql);

	   // logheaza utilizatorul dupa ce si-a creat cont
	   $_SESSION['username'] = $username;
	   $_SESSION['success'] = "You are now logged in";
       header('location: My account(L).php');

	  }


	}

	//logheaza utilizatorul din formularu de log in
    if (isset($_POST['login'])) {

    	$username = mysqli_real_escape_string($db,$_POST['username']);
    	$password = mysqli_real_escape_string($db,$_POST['password']);

    	if(empty($username)) {
       array_push($errors, "Username  is required");
		}
		if(empty($password)) {
		   array_push($errors, "Password  is required");
		}

		if (count($errors) == 0 ) {

			$query = "SELECT * FROM users WHERE username ='$username' AND password =
			'$password'";
			$result = mysqli_query($db, $query);

			if (mysqli_num_rows($result) > 0) {
                	$_SESSION['username'] = $username;
	                $_SESSION['success'] = "You are now logged in";




				if ($_SESSION['username'] != "ADMIN") {

                    header('location: My account(L).php');
                }


			    if ($_SESSION['username'] == 'ADMIN') {
                    header('location: My account(Admin).php');
			    }

				}
				else
				{
 				array_push($errors, "Wrong username/password combination");
 				}


			}
	    }

	     if (isset($_POST['send'])) {

	     $username =  $_SESSION['username'];
	     $id = mysqli_real_escape_string($db,$_POST['id']);
	     $comment = mysqli_real_escape_string($db,$_POST['comment']);
	     if(!empty($comment)) {
	     $sql = "INSERT INTO `comments` (`user_name`, `song_id`, `text`)
	             VALUES ('$username', '$id', '$comment')";
	       mysqli_query($db, $sql);
	   }


	   }

	 if(isset($_POST['favoritesong'])){

		 $username = $_SESSION['username'];
		 $id = mysqli_real_escape_string($db,$_POST['id']);
			 $sql = "SELECT id from favorite_songs where username = '$username' and song_id = '$id'";
		 $result = mysqli_query($db, $sql);

		 if (mysqli_num_rows($result) > 0) {
		 	$sql = "DELETE from favorite_songs where username = '$username' and song_id = '$id'";
	 			 mysqli_query($db, $sql);
		 }
		 else{
			 $sql = "INSERT INTO favorite_songs (username, song_id) VALUES ('$username', '$id')";
			 mysqli_query($db, $sql);
		 }

	 }

	 if(isset($_POST['favoriteartist'])){

		 $username = $_SESSION['username'];
		 $song = mysqli_real_escape_string($db,$_POST['song']);
		 $id = mysqli_real_escape_string($db,$_POST['id']);
		 $query = mysqli_query($db, "SELECT a.id FROM artists a join songs b on b.artist_id = a.id where b.id='$id'");
		 while ($row = $query->fetch_assoc()){
         $ids = $row['id'];
		   }
         $sql = "SELECT id from favorite_artists where username = '$username' and artist_id = '$ids'";
		 $result = mysqli_query($db, $sql);

		 if (mysqli_num_rows($result) > 0) {
		 	$sql = "DELETE from favorite_artists where username = '$username' and artist_id = '$ids'";
	 			 mysqli_query($db, $sql);
		 }
		 else{
			 $sql = "INSERT INTO favorite_artists (username, artist_id) VALUES ('$username', '$ids')";
			 mysqli_query($db, $sql);
		 }
       
	 }

	 if(isset($_POST['add'])){
		$id = mysqli_real_escape_string($db,$_POST['id']);
	    $name = mysqli_real_escape_string($db,$_POST['name']);
	    $country = mysqli_real_escape_string($db,$_POST['country']);
	    if((!empty($name)) && (!empty($country))){
	   $sql = "INSERT INTO `artists` (`id`, `name`, `country`)
	               VALUES ('$id', '$name', '$country')";
	   mysqli_query($db, $sql);}
	 }

	 if(isset($_POST['add2'])){
		$id = mysqli_real_escape_string($db,$_POST['id']);
	    $name = mysqli_real_escape_string($db,$_POST['name']);
	    $aid = mysqli_real_escape_string($db,$_POST['artistid']);
	    $year = mysqli_real_escape_string($db,$_POST['year']);
	    if((!empty($name)) && (!empty($year))){
	   $sql = "INSERT INTO `albums` (`id`, `name`, `artist_id`,`release_year`)
	               VALUES ('$id', '$name', '$aid', '$year')";
	   mysqli_query($db, $sql);}
	 }
	  if(isset($_POST['add3'])){
		$id = mysqli_real_escape_string($db,$_POST['id']);
	    $name = mysqli_real_escape_string($db,$_POST['name']);
	    $aid = mysqli_real_escape_string($db,$_POST['artistid']);
	    $alid = mysqli_real_escape_string($db,$_POST['albumid']);
	    $genre = mysqli_real_escape_string($db,$_POST['genre']);
	    if((!empty($name)) && (!empty($year))){
	   $sql = "INSERT INTO `albums` (`id`, `name`, `artist_id`,` album_id,` `genre`)
	               VALUES ('$id', '$name', '$aid', '$alid')";
	   mysqli_query($db, $sql);}
	 }



	//logout
	if(isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: My account.php');
	}






?>
