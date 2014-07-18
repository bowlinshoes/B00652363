<?php
  ob_start();
  session_start();

  if (isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
  {
?>
    <!-- Navigation -->
        <div class="navigation">
          <div class="container">
            <ul class="nav nav-pills pull-left">
              <li><a href="#">About</a></li>
              <li><a href="#">News</a></li>
            </ul>

            <ul class="nav nav-pills pull-right">
              <li><a href="myclipadee.php">My Clipadee</a></li>
              <li><a href="include/signout.php">Sign Out</a></li>
              <li><a href="include/signout.php">Help</a></li>
            </ul>
          </div>
        </div>
<?php 
      }
      else
      {
?>
        <!-- Navigation -->
        <div class="navigation">
          <div class="container">
            <ul class="nav nav-pills pull-left">
              <li><a href="#">About</a></li>
              <li><a href="#">News</a></li>
            </ul>

            <ul class="nav nav-pills pull-right">
              <li><a href="signin.php">Sign In</a></li>
              <li><a href="signup.php">Sign Up</a></li>
              <li><a href="include/signout.php">Help</a></li>
            </ul>
          </div>
        </div>
    <?php 
      }
    ?>