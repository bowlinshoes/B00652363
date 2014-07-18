<?php

$location = "localhost";
$user = "clipadee";
$pass = "clipadee";
$database = "clipadee";
$table = "clip";

$connect = mysql_connect($location, $user, $pass);
	if (!$connect)
	{
		die('Connection Failed: ' . mysql_error());
	} 
	mysql_select_db($database, $connect);

    $title = (isset($_POST['title']) ? $_POST['title'] : null);
    $url = (isset($_POST['url']) ? $_POST['url'] : null);
    $clipnote = (isset($_POST['clipnote']) ? $_POST['clipnote'] : null);

//Insert the information into the database with the commands:
$clip_update = "UPDATE clip
				SET clip_title='$title', clip_url='$url', clip_note='$clipnote'
				WHERE clip_id='$val'";



if (!mysql_query($clip_update, $connect)) { die('Error: ' . mysql_error()); }
echo "Your information was added to the database.";
mysql_close($connect); 

?>