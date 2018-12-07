<?php

include 'dbconfig.php';

$con = mysqli_connect($servername, $username, $password, $dbname) or die ('Unable to connect');

if(mysqli_connect_error($con))
{
	echo "Failed to Connect to Databases".mysqli_connect_error();
} 

$sql = "SELECT * FROM seminar";

$result = mysqli_query($con, $sql);
if($result)
{
	while($row=mysqli_fetch_array($result))
	{
		$flags[] = $row;
	}
	
	print(json_encode($flags));
}
mysqli_close($con);

?>