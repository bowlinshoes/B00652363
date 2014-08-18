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

            $unirightvar = $_SESSION['user_id'];
            $module = mysql_query("SELECT module_one, module_two FROM person WHERE id = '$rightvar'");

            //get value of module code
            if (mysql_num_rows($module)) 
            {
                $value = mysql_fetch_assoc($module);
                $code1 = $value['module_one'];
                $code2 = $value['module_two'];

            }

            $uniresult = mysql_query("SELECT * FROM uni_clip WHERE module_code = '$code1' OR module_code = '$code2'"); 

            while ($unirow = mysql_fetch_array($uniresult)) 
            {
                echo '<a href="javascript:;"><li id="news" onclick="getClipDetails(this.value)" value='.$unirow['clip_id'].'">'.$unirow['clip_title'].'</li></a>';

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