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


<!-- Generates Clip Filter Dropdown -->
<form method="post" action="post.php">
<table>
    <tr>

    <?php    
        $rightvar = $_SESSION['user_id'];
        $result = mysql_query("SELECT * FROM clip WHERE clip_id = '".$val."'");

    while ($row = mysql_fetch_array($result)) 
    {
        $url = $row['clip_url'];
        preg_match  (
                        '/[\\?\\&]v=([^\\?\\&]+)/',
                        $url,
                        $matches
                    );
                
        $id = $matches[1];  
        $width = '640';
        $height = '385';

        echo '<object width="' . $width . '" height="' . $height . '"><param name="movie" value="http://www.youtube.com/v/' . $id 
            . '&amp;hl=en_US&amp;fs=1?rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/' 
            . $id . '&amp;hl=en_US&amp;fs=1?rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="' 
            . $width . '" height="' . $height . '"></embed></object>';

    ?>
        
        <br/>
        Title: <br/><input style="width:640px;" type='text' name="title" id="title" value="<?php echo $row['clip_title'];?>"><br/>
        URL: <br/><input style="width:640px;" type='text' name="url" id="url" value="<?php echo $row['clip_url'];?>"><br/>
        ClipNote: <br/><textarea style="width:640px;" id="clip_note" name="clip_note"><?php echo $row['clip_note'];?></textarea><br/>

        <input type='hidden' name="clip_id" id="clip_id" value="<?php echo $row['clip_id'];?>">
        <input name="update" type="submit" id="update" value="Update">

<?php
    } //Close while{} loop
?>
    </tr>
</table>
</form>
     
<?php  
    mysql_close($connect);
?>