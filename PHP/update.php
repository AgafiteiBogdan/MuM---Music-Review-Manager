
<?php

 $db =  mysqli_connect('localhost', 'root', '', 'mum') or die($db);
 $option = "";
if(isset($_POST['send']))
 {
    $id = mysqli_real_escape_string($db,$_POST['id']);
    $song = mysqli_real_escape_string($db,$_POST['song']);
    $artist = mysqli_real_escape_string($db,$_POST['artist']);
    $album = mysqli_real_escape_string($db,$_POST['album']);
    $year = mysqli_real_escape_string($db,$_POST['year']);
    $genre = mysqli_real_escape_string($db,$_POST['genre']);

  $update = "UPDATE artists b join albums c on b.id=c.artist_id  join Songs a on c.id = a.album_id 
  SET a.name = '$song', b.name = '$artist', c.name = '$album', c.release_year = '$year', a.genre = '$genre' where a.id = '$id'";
  mysqli_query($db, $update);

}

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
                 

               }else{
               	array_push($errors, "Wrong username/password combination");

				}

				if ($_SESSION['username'] != "ADMIN") {
				               
                    header('location: My account(L).php');
                }


			    if ($_SESSION['username'] == 'ADMIN') {
                    header('location: My account(Admin).php');
			    }
                


			}
	    }


 