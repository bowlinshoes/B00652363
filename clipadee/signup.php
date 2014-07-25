<?php

	$location = "localhost";//host name 
	$mysql_user = "clipadee";//mysql username 
	$mysql_pass = "clipadee";//mysql password 
	$database = "clipadee";//database name
	$table = "person";//table name

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


	//insert the information into the database with the commands:
	$user_info = "INSERT INTO $table (firstname, lastname, email, username, password) 
					VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '$_POST[username]', '$_POST[password]')";

	if (!mysql_query($user_info, $connect)) 
	{ 
		die('Error: ' . mysql_error()); 
	}
		echo "Your information was added to the database.";
		mysql_close($connect); 

?>