<?php
session_start();
require 'core.php';
session_destroy();

//location user returns to when the sign out
//header('Location: '.$http_referer);
header("Location: \clipadee/signin.php");
 
?>