<?php

include 'dbconfig.php';

 //creating a new connection object using mysqli 
 $conn = new mysqli($servername, $username, $password, $dbname);

 //if there is some error connecting to the database
 //with die we will stop the further execution by displaying a message causing the error 
 if ($conn->connect_error) {
 	 die("Connection failed: " . $conn->connect_error);
	}

 //if everything is fine

 //creating an array for storing the data 
 $list_seminar = array(); 

 //this is our sql query 
 $sql = "SELECT name FROM seminar;";

 //creating an statement with the query
 $stmt = $conn->prepare($sql);

 //executing that statement
 $stmt->execute();

 //binding results for that statement 
 $stmt->bind_result($name);

 //looping through all the records
 while($stmt->fetch()){
	
	 //pushing fetched data in an array 
	 $temp = [
		 'name'=>$name
		];
	
	 //pushing the array inside the seminar array 
	 array_push($list_seminar, $temp);
	}

 //displaying the data in json format 
 echo json_encode($list_seminar);