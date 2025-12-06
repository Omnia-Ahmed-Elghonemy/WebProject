<?php
// Database connection parameters
$conn=mysqli_connect("localhost","root","","test1");
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>