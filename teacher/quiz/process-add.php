<?php
 include "../../functions/connect.php";
    extract($_POST);


  $sql = mysql_query("INSERT INTO `tbl_quiz`(`question_name`, `answer1`, `answer2`, `answe3`, `answer4`, `answer`) VALUES ('$question_name','$answer1','$answer2','$answer3','$answer4','$answer')");

  if($sql==true)
      {
            echo '<script language="javascript">';
            echo 'alert("Successfully Added")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=add.php" />';
      }
                        
                        


?>