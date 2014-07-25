<?php include("include/connection.php"); ?>


<!-- Generates Topic Filter Dropdown -->
<form>
    <select id ="filter" onchange="getTopicDetails(this.value)" >
        <option value=""> Select a Topic </option>

        <?php

            //get value from dropdown
            $val = $_GET["drdnVal"];

            $result = mysql_query("SELECT * FROM topic WHERE collection_id = '".$val."'");

            while ($row = mysql_fetch_array($result)) 
            {
        ?>
    
        <option value="<?php echo $row['topic_id'];?>"><?php echo $row['topic_title'];?></option>

        <?php
            }//lose while{} loop
        ?>

    </select>
</form>

        
<?php  
    mysql_close($connect);
?>
