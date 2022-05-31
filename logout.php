<?php

session_start(); 
session_destroy(); 
header("location:../home/home.html?msg=logout");
?>