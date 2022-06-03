<?php
$con = mysqli_connect("localhost:3306","user","admin","trialbio");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>