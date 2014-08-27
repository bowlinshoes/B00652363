<?php

	include("../include/connection.php");

	//clean data before use
	function clean($value)
	{
		return mysql_real_escape_string($value);
	}

	//post form variables
	if (count($_POST))
	{
		//prepare form variables for database
		foreach ($_POST as $column => $value)
							${$column} = clean($value);

		//perform mysql update
		$result = mysql_query("UPDATE clip SET ".$col."='".$val."'
								WHERE ".$w_col."='".$w_val."'")
									or die ('Unable to update Clip.');
	
	}

?>