<?php include("include/connection.php"); ?>


<!-- Generates Clip Filter Dropdown -->
<form>
    <select id ="filter" onchange="getClipDetails(this.value)" >
        <option value=""> Select a Clip </option>

        <?php    

            //get value from dropdown
            $val = $_GET["drdnVal"];

            $result = mysql_query("SELECT * FROM clip WHERE topic_id = '".$val."'");

            while ($row = mysql_fetch_array($result)) 
            {
        ?>
    
        <option value="<?php echo $row['clip_id'];?>"><?php echo $row['clip_title'];?></option>

        <?php
            } //Close while{} loop
        ?>

    </select>
</form>

        
<?php  
    mysql_close($connect);
?>