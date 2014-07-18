<?php
$host = "localhost"; // host name 
$mysql_user = "clipadee"; // mysql username 
$mysql_pass = "clipadee"; // mysql password 
$database = "clipadee"; // database name 

// connect to server and select databse.
$connect = mysql_connect($host, $mysql_user, $mysql_pass);
	if (!$connect)
  	{
    	die('Connection Failed: ' . mysql_error());
  	} 

	mysql_select_db($database, $connect);

?>