<?php

	$location = "localhost";//host name 
	$mysql_user = "clipadee";//mysql username 
	$mysql_pass = "clipadee";//mysql password 
	$database = "clipadee";//database name

	//connect to server
	$connect = mysql_connect($location, $mysql_user, $mysql_pass);
	if (!$connect)
	{
		die('Connection Failed: ' . mysql_error());
	}

	//select databse
	$select = mysql_select_db($database, $connect);
	if (!$select)
	{
		die('Unable to select database');
	}

?>