<?php
error_reporting(0);
include("../include/connection.php");

if(isset($_POST) && count($_POST))
{	
	$clip_title = mysql_real_escape_string($_POST['clip_title']);
	date_default_timezone_set('Europe/London');//change clock to UK timezone as opposed to reading from server
	$clip_created = date('Y-m-d H:i:s');
	$clip_url = mysql_real_escape_string($_POST['clip_url']);
	$topic_id=$_POST['topic_id'];

	session_start();
	$id = $_SESSION['user_id'];

	$item_id = $_POST['item_id'];
	$action = $_POST['action'];

	//check user status and set table accordingly
	$getstatus = mysql_query("SELECT lecturer FROM person WHERE id = '$id'");
  if (mysql_num_rows($getstatus)) 
  {
    $value = mysql_fetch_assoc($getstatus);
    $status = $value['lecturer'];
  }

  if ($status == 1) 
	{
		$table = "uni_clip";
	} else
		{
  		$table = "clip"; 
		}

	//save or delete clip
	if($action == "save")
	{
		mysql_query("INSERT INTO $table VALUES('','".$clip_title."','".$clip_created."','".$clip_url."','".$clip_note."','".$topic_id."','".$id."')");
		$lid = mysql_insert_id();
		if($lid){
			echo json_encode(
				array(
				"success" => "1",
				"row_id" => $lid,//auto incrrement value in ID
				"clip_title" => htmlentities($clip_title),
				"clip_url" => htmlentities($clip_url),
				"email" => htmlentities($email),
				"phone" => htmlentities($phone),
				)
			);
		}

		else{
			echo json_encode(array("success" => "0"));
		}

	}
	else if($action == "delete"){
		//echo "delete from info where id = '".$item_id."'";
		$res = mysql_query("DELETE FROM $table WHERE clip_id = '".$item_id."'");
		if($res){
			echo json_encode(array( "success" => "1","item_id" => $item_id));
		}else{
			echo json_encode(array("success" => "0"));
		}	

	}
}else{
	echo json_encode(array("success" => "0"));
}

?>