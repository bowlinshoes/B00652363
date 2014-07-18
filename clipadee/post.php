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
    $clip_note = (isset($_POST['clip_note']) ? $_POST['clip_note'] : null);
    $clip_id = (isset($_POST['clip_id']) ? $_POST['clip_id'] : null);

//Insert the information into the database with the commands:
$clip_update = "UPDATE clip
				SET clip_title='$title', clip_url='$url', clip_note='$clip_note'
				WHERE clip_id='$clip_id'";


if (!mysql_query($clip_update, $connect)) { die('Error: ' . mysql_error()); }
echo "Your information was added to the database.";
mysql_close($connect); 

?>



