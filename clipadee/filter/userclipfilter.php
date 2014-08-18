<?php

  include("../include/connection.php");

  // DATABASE: Get current row
  
  //get value from dropdown
  $val = $_GET["clipID"];

  $result = mysql_query("SELECT * FROM clip WHERE clip_id = $val");
  $row = mysql_fetch_assoc($result);

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


<form id="ajax-form" class="autosubmit" method="POST" action="./php/userautosave.php">

    <br/>
    Title: <br/><textarea rows="1" style="width:640px" name="clip_title" id="fixed"><?php echo $row['clip_title'] ?></textarea><br/>
    URL: <br/><textarea rows="1" style="width:640px" name="clip_url" id="fixed"><?php echo $row['clip_url'] ?></textarea><br/>
    ClipNote: <br/><textarea style="width:640px; height:200px" name="clip_note" id="tinyeditor"><?php echo $row['clip_note'] ?></textarea><br/>

    <input id="where" type="hidden" name="clip_id" value="<?php echo $row['clip_id'] ?>" />

</form>

<p id="notice"></p>
