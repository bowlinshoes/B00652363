<?php
error_reporting(0);
include("../include/connection.php");

if(isset($_POST) && count($_POST))
{
	$topic_title = mysql_real_escape_string($_POST['topic_title']);
	date_default_timezone_set('Europe/London');//change clock to UK timezone as opposed to reading from server
	$topic_created = date('Y-m-d H:i:s');
	$collection_id=$_POST['collection_id'];

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
		$table = "uni_topic";
	} else
		{
  		$table = "topic"; 
		}

	//save or delete topic
	if($action == "save")
	{

		mysql_query("INSERT INTO $table VALUES('','".$topic_title."','".$topic_created."','".$collection_id."','".$id."')"); 
		$lid = mysql_insert_id();
		if($lid){
			echo json_encode(
				array(
				"success" => "1",
				"row_id" => $lid,//auto incrrement value in ID
				"topic_title" => htmlentities($topic_title),
				"lname" => htmlentities($lname),
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
		$res = mysql_query("DELETE FROM $table WHERE topic_id = '".$item_id."'");
		if($res){
			echo json_encode(array( "success" => "1","item_id" => $item_id));
		}else{
			echo json_encode(array("success" => "0"));
		}	

	}
}else
	{
		echo json_encode(array("success" => "0"));
	}

?>