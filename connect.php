<?php
$server_name = "localhost";
$user_name = "root";
$pass = "";
//$db = "easygaadi";
$db = "shopping";
$conn_error = "not connected";

if(@!mysql_connect($server_name,$user_name,$pass) || @!mysql_select_db($db))
{
	die($conn_error);
} else { 
  echo "<span style='background-color:yellow'>Connected to Database Successfully!!</span><br>";
  }
 

?>