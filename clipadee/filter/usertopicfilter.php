<?php include("../include/connection.php"); ?>

<!-- Updates List of Clips based on Topic Filter -->

    <ul id="list">

        <?php    

        //get value from dropdown
        $val = $_GET["topicID"];
        session_start(); 

        if ($val == '-2') 
        { 
            $rightvar = $_SESSION['user_id'];
            //$rightvar = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

            $result = mysql_query("SELECT * FROM clip WHERE id = $rightvar ORDER BY clip_title");  
            //$result = mysql_query("SELECT * FROM clip WHERE id = '1' ORDER BY clip_title");

            while ($row = mysql_fetch_array($result)) 
            {
                echo '<a href="javascript:;"><li id="news" onclick="getClipDetails(this.value)" value='.$row['clip_id'].'">'.$row['clip_title'].'</li></a>';

            }

        } else 
            {
                //$result = mysql_query("SELECT * FROM clip WHERE topic_id = '".$val."'");
                $result = mysql_query("SELECT * FROM clip WHERE topic_id = '".$val."' ORDER BY clip_title");
                while ($row = mysql_fetch_array($result)) 
                {
                    echo '<a href="javascript:;"><li id="news" onclick="getClipDetails(this.value)" value='.$row['clip_id'].'">'.$row['clip_title'].'</li></a>';

                }
            }

        ?>

        <span class="empty-item">no results</span>

    </ul>
  
<?php  
    mysql_close($connect);
?>