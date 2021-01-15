<?php 

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "projectsdb";
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 
 if(!$conn){
     die('ERROR DATABASE');
 }
?>