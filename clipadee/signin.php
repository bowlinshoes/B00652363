<!DOCTYPE html>
<html lang="en">

  <head>
  <title>Clipadee | Sign In</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="font.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/clipadee.css">
    <link type="text/css" rel="stylesheet" href="css/clipstrap.css">
    <link rel="icon" type="image/png" href="http://goo.gl/alB2ZQ">
  </head>

  <body>

    <!-- Header -->
    <div class="header">
      <div class="clipadee-logo">
        <a href="index.php"><img src="http://goo.gl/IdMSPm" HEIGHT="30" alt="Clipadee logo"></a>
      </div>
    </div>


    <!-- Navigation: if signed out navigation bar is navin.php else navigation bar is navout.php -->    
    <?php include("include/navigation.php"); ?>


    <!-- Sign In Details --> 
    <?php 
      require 'include/signedin.php';

      if(isset($_POST['username'])&&isset($_POST['password']))
      {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_hash=md5($password);
        $table = "person";

        // echo $password_hash; 
        if(!empty($username)&&!empty($password))
        {
          $query = mysql_query("SELECT * FROM $table WHERE username ='".$username."' AND password ='".$password_hash."'") or die(mysql_error()); 
           
          $data = mysql_fetch_array($query);
       
          $test = $data['password'];
       
          $query_run = $query;
          $query_num_rows = mysql_num_rows($query_run);

            if($query_num_rows==0)
            {
              echo 'Invalid username/password combination.';
            }
            else if($query_num_rows==1)
            {
              echo 'ok';
              $user_id= mysql_result($query_run,0,'id');
              $user_id=$data['id'];
              $_SESSION['user_id'] = $user_id;
              //header("Location:".$_SERVER['PHP_SELF']. "");
              header("Location: myclipadee.php");
            }
        }
        else
        {
          echo 'You must supply a username and password';
        }
      }
    ?>


    <!-- Sign In Details -->
    <div class="user">
      <div class="container">
        <h2>Welcome Back</h2>
        <hr>
        <div class="text">
          <p>Clipadee helps you organise YouTube videos into useful collections everything across all the computers, phones and tablets you use.
          <h4>Clip It</h4>
          <p>Save a YouTube video to your Clipadee<p>
          <h4>Add Notes</h4>
          <p>At Clipadee we let the video do the talking but also allow you to save some notes so you can remember key information.<p>
          <h4>Share It</h4>
          <p>Share your topics and notes with classmates.<p>
        </div>

        <form action="<?php echo $current_file; ?>" method="post">
          Username: <br/><input type="text" name="username"/><br/>
          Password: <br/><input type="password" name="password"><br/>      
          <input type="submit" value="Sign In"/>
        </form>
      </div>
    </div>

  </body>

</html>