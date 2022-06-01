<?php
$con = mysqli_connect("localhost:3306","root","0000","login");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>