<?php include("include/connection.php"); ?>

<!-- Generates List of Topics in Collection -->
<form>
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

            //echo '<a href="javascript:;"><li onclick="getTopicDetails(-2)">OnClick Button</li></a>';
            //echo '<a href="javascript:;"><li onclick="getTopicDetails(this.value)" value='.$row['value'].'">'.$row['name'].'</li></a>';


        
        } else 
            {
                $result = mysql_query("SELECT * FROM topic WHERE collection_id = '".$val."' ORDER BY topic_title");

                    while ($row = mysql_fetch_array($result)) 
                    {

                        echo '<a href="javascript:;"><li onclick="getTopicDetails(this.value)" value='.$row['topic_id'].'">'.$row['topic_title'].'</li></a>';

                    }
            }
    ?>
</form>
            
<?php  
    mysql_close($connect);
?>
