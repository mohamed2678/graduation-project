<?php 
session_start(); //start sasseion

session_unset(); //unset data

session_destroy(); //clear data 

header('location: index.php');

exit(); 