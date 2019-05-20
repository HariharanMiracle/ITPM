<?php
 include "../../functions/connect.php";
 date_default_timezone_set("Asia/Taipei");
                        $datetime=date("Y-m-d h:i:sa");
   extract($_POST);
  $sql = mysql_query("INSERT INTO `tbl_topic`(`title`, `content`, `datetime_posted`, `cat_Id`) VALUES ('$title','$content','$datetime','$category')");

  if($sql==true)
      {
            echo '<script language="javascript">';
            echo 'alert("Successfully Added")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=add.php" />';
      }
                        
                        


?>