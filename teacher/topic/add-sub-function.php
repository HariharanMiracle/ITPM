<?php
 include "../../functions/connect.php";
    extract($_POST);
 date_default_timezone_set("Asia/Taipei");
                        $datetime=date("Y-m-d h:i:sa");

  $sql = mysql_query("INSERT INTO `tbl_subtopic`(`sub_title`, `sub_content`, `datetime`, `topic_Id`) VALUES  ('$title','$content','$datetime','$topic')");

  if($sql==true)
      {
            echo '<script language="javascript">';
            echo 'alert("Successfully Added")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=add-sub.php" />';
      }
                        
                        


?>