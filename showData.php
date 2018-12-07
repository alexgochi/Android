<?php

include 'dbconfig.php';

//creating a new connection object using mysqli 
 $conn = mysqli_connect($servername, $username, $password) or die ("connection failed");
 mysqli_select_db($conn, $dbname) or die ("db selection failed");
 
			$result = mysqli_query($conn, "SELECT name FROM seminar");
		
		while($row = mysqli_fetch_assoc($result)) {
			$tmp[] = $row;
			
		}
		echo json_encode($tmp);
		mysqli_close($conn);
?>