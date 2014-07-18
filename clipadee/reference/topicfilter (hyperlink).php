<?php
        ob_start();
        session_start();

        //get drop down value from url
        $val = $_GET["drdnVal"];


        $host = "localhost"; // host name 
        $mysql_user = "clipadee"; // mysql username 
        $mysql_pass = "clipadee"; // mysql password 
        $database = "clipadee"; // database name 

        // connect to server and select databse.
        $connect = mysql_connect($host, $mysql_user, $mysql_pass);

        if (!$connect)
        {
            die('Connection Failed: ' . mysql_error());
        } 

        // select database name
        mysql_select_db($database, $connect);

?>


<!-- Generates Topic Filter Dropdown -->
<table>

        <?php    
            $rightvar = $_SESSION['user_id'];
            $result = mysql_query("SELECT * FROM clip WHERE topic_id = '".$val."'");

            while ($row = mysql_fetch_array($result)) 
            {
        ?>
    
        <button type="button" value="<?php echo $row['clip_id'];?>"><?php echo $row['clip_title'];?></button>

        <?php
            } //Close while{} loop
        ?>

</table>

        
<?php  
    mysql_close($connect);
?>