<?php

  include("../include/connection.php");
  
  //get value from dropdown
  $val = $_GET["clipID"];

  //get the clip_url value based on dropdown selection
  $result = mysql_query("SELECT * FROM clip WHERE clip_id = $val");
  $row = mysql_fetch_assoc($result);
  $url = $row['clip_url'];

  //check to see if the url is a slideshare link
  if (strpos($url, 'slideshare') !== false)
  { 
    //unique api key provided by slideshare
    $ts=time();
    $secret='6wixtyMY';
    $hash=sha1($secret.$ts);
    $key='vUGAbhdd';

    //slideshare api get slideshow information method
    $apiurl='https://www.slideshare.net/api/2/';
    $method = 'get_slideshow';
    $location = $apiurl.$method."?api_key=".$key."&ts=".$ts."&hash=".$hash."&slideshow_url=".$url;

    //convert xml variable to php
    $xml=simplexml_load_file("$location");

    //read the id child only
    $id = $xml->ID;      

    //emebed slideshare presentation
    echo '<iframe src="//www.slideshare.net/slideshow/embed_code/' . $id 
        . '" width="640" height="380" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen> </iframe> 
        <div style="margin-bottom:5px">';

  } else//if not assume it is a youtube link
    {
      //code to isolate youtube id from url
      preg_match  (
                    '/[\\?\\&]v=([^\\?\\&]+)/',
                    $url,
                    $matches
                  );
                
      $id = $matches[1];  
      $width = '640';
      $height = '385';

      //emebed youtube video
      echo '<object width="' . $width . '" height="' . $height . '"><param name="movie" value="http://www.youtube.com/v/' . $id 
          . '&amp;hl=en_US&amp;fs=1?rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/' 
          . $id . '&amp;hl=en_US&amp;fs=1?rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="' 
          . $width . '" height="' . $height . '"></embed></object>';
    }

?>

<!-- clip information fields -->
<form id="ajax-form" class="autosubmit" method="POST" action="./php/userautosave.php">

    <br/>
    Title: <br/><textarea rows="1" style="width:640px" name="clip_title" id="fixed"><?php echo $row['clip_title'] ?></textarea><br/>
    YouTube / Slideshare URL: <br/><textarea rows="1" style="width:640px" name="clip_url" id="fixed"><?php echo $row['clip_url'] ?></textarea><br/>
    ClipNote: <br/><textarea style="width:640px; height:200px" name="clip_note" id="tinyeditor"><?php echo $row['clip_note'] ?></textarea><br/>

    <input id="where" type="hidden" name="clip_id" value="<?php echo $row['clip_id'] ?>" />

</form>

<p id="notice"></p>