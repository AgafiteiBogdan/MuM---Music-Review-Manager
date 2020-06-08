<?php
    
	$db =  mysqli_connect('localhost', 'root', '', 'mum') or die($db);
	
	$sql = "SELECT * FROM users" ;
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>FirstName</th>";
                echo "<th>LastName</th>";
                echo "<th>E-mail</th>";
                echo "<th>username</th>";
                  echo "<th>password</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['E-mail'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                 echo "<td>" . $row['password'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db); 
}
 
// Close connection
mysqli_close($db);
?>

