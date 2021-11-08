<?php
 
 $host="localhost";
 $user="root";
 $pass="";
 $db_name="blogdb";

 $conn=new mysqli($host,$user,$pass,$db_name);


 if($conn=>connect_erro){
 	die('databse connection error'.$conn->connect_erro); 
 }

 ?>