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
        $username = $data['username'];
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];

        echo "Signed in as: " . "<b>" . $firstname . " " . $lastname . "</b>";

      }
    ?>
</div>