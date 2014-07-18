<?php

$location = "localhost";
$user = "clipadee";
$pass = "clipadee";
$database = "clipadee";
$table = "person";

$connect = mysql_connect($location, $user, $pass);
	if (!$connect)
	{
		die('Connection Failed: ' . mysql_error());
	} 
	mysql_select_db($database, $connect);


//Insert the information into the database with the commands:
$user_info = "INSERT INTO $table (firstname, lastname, email, username, password) 
				VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '$_POST[username]', '$_POST[password]')";

if (!mysql_query($user_info, $connect)) { die('Error: ' . mysql_error()); }
echo "Your information was added to the database.";
mysql_close($connect); 

?>