<?php
// Database connection parameters
$conn=mysqli_connect("localhost","root","","furniture_store");
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>