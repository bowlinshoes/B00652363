<!-- Sign In Details -->
<div class="signedin">
    <?php 
      require 'include/core.php';
      require 'include/connection.php';

      $table = "person";

      if(loggedin())
      {
        $rightvar = $_SESSION['user_id'];
        $result = mysql_query("SELECT * FROM $table WHERE id = $rightvar") or die(mysql_error());  
            
        $data = mysql_fetch_array($result);  

        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $userid = $data['id'];
        $username = $data['username'];

        /*
        echo "<font color = #464646> Signed In As: $username </font>" 
        . '<a  href="include/signout.php"><input type="button"  value="Sign Out"/></a>';
        */

        echo "Signed in as: ";
        echo $username;

      }
    ?>
</div>