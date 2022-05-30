<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/

// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect("localhost:3306","user","admin","trialbio");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>