<?php include("../include/connection.php"); ?>

<!-- Generates List of Topics in Collection -->
<table>
  <?php

    $val = $_GET["collectionID"];
    session_start();

    if ($val == '-1') 
    {

      //$rightvar = $_SESSION['user_id'];
      $result = mysql_query("SELECT * FROM topic ORDER BY topic_title");

      while ($row = mysql_fetch_array($result)) 
      {
        echo '<a href="javascript:;"><li onclick="getTopicDetails(this.value)" value='.$row['topic_id'].'">'.$row['topic_title'].'</li></a>';
      }
    
    } else 
      {
        $result = mysql_query("SELECT * FROM topic WHERE collection_id = '".$val."' ORDER BY topic_title");

        while ($row = mysql_fetch_array($result)) 
        {
          echo '<tr>';
          echo '<td width="100%"><a href="javascript:;"><li class="user" onclick="getTopicDetails(this.value)" value='.$row['topic_id'].'">'.$row['topic_title'].'</li></a></td>';
          echo '<td><a href="#" id="'.$row['topic_id'].'" class="del_topic"><img src="http://goo.gl/audtbz" HEIGHT="15px" title="Delete Topic" alt="Delete Topic"></a></td>';
          echo '</tr>';
        }
      }
  ?>
</table>
          
<?php mysql_close($connect); ?>
