<?php
	include("include/connection.php");
 
  $id="1";
  $name=$_POST["name"];
 
  $query=mysql_query("INSERT INTO collection(id,collection_title) values('$id','$name') ");
 
 
  if($query){
    echo "Collection Added";
  }
  else{
    echo "Error in sending your comment";
  }

?>