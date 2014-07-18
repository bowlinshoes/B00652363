<?php
        ob_start();
        session_start();

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


 <html>
 <body>
    <form method="POST" action="action.php">
        <input type="submit" name="Selection Sort" value="NW_Update"/>
    </form>
</body>
</html>


<?php
    if(isset($_POST['nw_update'])){
        echo("You clicked button one!");
        //and then execute a sql query here
    }
    else {
    echo" dhur";
    }
?>