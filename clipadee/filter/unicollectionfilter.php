<?php include("../include/connection.php"); ?>

<!-- Generates List of Topics in Collection -->
<table>
  <?php

    $val = $_GET["collectionID"];
    session_start();

    if ($val == '-1') 
    {

      //$rightvar = $_SESSION['user_id'];
      $result = mysql_query("SELECT * FROM uni_topic ORDER BY topic_title");

      while ($row = mysql_fetch_array($result)) 
      {

          echo '<a href="javascript:;"><li onclick="getUniTopicDetails(this.value)" value='.$row['topic_id'].'">'.$row['topic_title'].'</li></a>';

      }

      //echo '<a href="javascript:;"><li onclick="getTopicDetails(-2)">OnClick Button</li></a>';
      //echo '<a href="javascript:;"><li onclick="getTopicDetails(this.value)" value='.$row['value'].'">'.$row['name'].'</li></a>';
    
    } else 
      {
        $result = mysql_query("SELECT * FROM uni_topic WHERE collection_id = '".$val."' ORDER BY topic_title");

          while ($row = mysql_fetch_array($result)) 
          {

            echo '<tr>';
            echo '<td width="500px"><a href="javascript:;"><li class="uni" onclick="getUniTopicDetails(this.value)" value='.$row['topic_id'].'">'.$row['topic_title'].'</li></a></td>';

            $rightvar = $_SESSION['user_id'];
            $getstatus = mysql_query("SELECT lecturer FROM person WHERE id = '$rightvar'");

            //get value of module code
            if (mysql_num_rows($getstatus)) 
            {
                $value = mysql_fetch_assoc($getstatus);
                $status = $value['lecturer'];

            }

            //if user has lecturer status they can delete topics
            if ($status == 1) 
            {
              echo '<td><a href="#" id="'.$row['topic_id'].'" class="del_topic"><img src="images/delete.png" HEIGHT="15px" title="Delete Topic" alt="Delete Topic"></a></td>';
            }

            echo '</tr>';

          }
      }
  ?>
</table>
            
<?php mysql_close($connect); ?>
