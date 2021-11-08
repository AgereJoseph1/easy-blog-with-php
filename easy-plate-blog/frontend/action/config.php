<?php
 
 $host="localhost";
 $user="root";
 $pass="";
 $db_name="blogdb";

 $conn=new MySQLi($host,$user,$pass,$db_name);


 if($conn->connect_error){
 	die('databse connection error'.$conn->connect_error); 
 }

 ?>