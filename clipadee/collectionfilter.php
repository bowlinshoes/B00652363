<?php
    ob_start();
    session_start();

    // Get drop down value from url
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
<form>
    <select id ="filter" onchange="getTopicDetails(this.value)" >
        <option value=""> Select a Topic </option>

        <?php    
            $rightvar = $_SESSION['user_id'];
            $result = mysql_query("SELECT * FROM topic WHERE collection_id = '".$val."'");

            while ($row = mysql_fetch_array($result)) 
            {
        ?>
    
        <option value="<?php echo $row['topic_id'];?>"><?php echo $row['topic_title'];?></option>

        <?php
            } //Close while{} loop
        ?>

    </select>
</form>

        
<?php  
    mysql_close($connect);
?>
