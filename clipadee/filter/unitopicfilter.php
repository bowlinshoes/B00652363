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
                echo '<a href="javascript:;"><li id="news" onclick="getUniClipDetails(this.value)" value='.$row['clip_id'].'">'.$row['clip_title'].'</li></a>';

            }

        } else 
            {
                //$result = mysql_query("SELECT * FROM clip WHERE topic_id = '".$val."'");
                $result = mysql_query("SELECT * FROM uni_clip WHERE topic_id = '".$val."' ORDER BY clip_title");
                while ($row = mysql_fetch_array($result)) 
                {
                    echo '<table>';
                    echo '<tr>';
                    echo '<td width="500px"><a href="javascript:;"><li id="news" onclick="getUniClipDetails(this.value)" value='.$row['clip_id'].'">'.$row['clip_title'].'</li></a></td>';


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
                      echo '<td><a href="#" id="'.$row['clip_id'].'" class="del_clip"><img src="images/delete.png" HEIGHT="15px" title="Delete Clip" alt="Delete Clip"></a></td>';
                    }

                    echo '</tr>';
                    echo '</table>';

                }
            }

        ?>

        <span class="empty-item">no results</span>

    </ul>
  
<?php  
    mysql_close($connect);
?>