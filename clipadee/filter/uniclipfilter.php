<?php

  include("../include/connection.php");

  // DATABASE: Get current row
  
  //get value from dropdown
  $val = $_GET["clipID"];

  $result = mysql_query("SELECT * FROM uni_clip WHERE clip_id = $val");
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


        session_start();
        $rightvar = $_SESSION['user_id'];
        $val = $_GET["clipID"];
        $result2 = mysql_query("SELECT * FROM uni_note WHERE id = '$rightvar' AND clip_id = '$val'");
        $row2 = mysql_fetch_assoc($result2);
        
        //create student note if it doesn't already exist
        if (mysql_num_rows($result2) )
        {
            //do nothing
        }
        else
        {
            $add = mysql_query("INSERT INTO uni_note (clip_id, id) VALUES ('$val', '$rightvar')");

        }


        $getstatus = mysql_query("SELECT lecturer FROM person WHERE id = '$rightvar'");

            //get value of module code
            if (mysql_num_rows($getstatus)) 
            {
                $value = mysql_fetch_assoc($getstatus);
                $status = $value['lecturer'];

            }

            //if user lecture they can delete topics
            if ($status == 1) 
            {
  ?>

              <form id="ajax-form" class="autosubmit" method="POST" action="./php/uniautosave.php">

              <br/>
              Title: <br/><textarea rows="1" style="width:640px;" name="clip_title" id="fixed"><?php echo $row['clip_title'] ?></textarea><br/>
              URL: <br/><textarea rows="1" style="width:640px;" name="clip_url" id="fixed" ><?php echo $row['clip_url'] ?></textarea><br/>
              ClipNote: <br/><textarea style="width:640px;height:200px" name="clip_note"><?php echo $row['clip_note'] ?></textarea><br/>

              <input id="where" type="hidden" name="clip_id" value="<?php echo $row['clip_id'] ?>" />

              </form>

              <p id="notice"></p>

  <?php 
            } else
              {
  ?>
                <form>
                <br/>
                Title: <br/><textarea disabled rows="1" style="width:640px;" name="clip_title" id="fixed"><?php echo $row['clip_title'] ?></textarea><br/>
                Lecture Note: <br/><textarea disabled style="width:640px;height:200px" name="clip_note" id="fixed"><?php echo $row['clip_note'] ?></textarea><br/>
                </form>


                <form id="ajax-form" class="autosubmit" method="POST" action="./php/unistudentsave.php">
                Student Note: <br/><textarea style="width:640px;height:200px" name="student_note"><?php echo $row2['student_note'] ?></textarea><br/>
                <input id="where" type="hidden" name="clip_id" value="<?php echo $row2['clip_id'] ?>" />
                </form>

                <p id="notice"></p>

  


  <?php
                }

?>
