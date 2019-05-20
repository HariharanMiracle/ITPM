<?php
 include "../../functions/connect.php";
   extract($_POST);


  $fname = str_replace("'","`",$fname); 
  $fname = mysql_real_escape_string($fname);
  
  $lname = str_replace("'","`",$lname); 
  $lname = mysql_real_escape_string($lname); 
          
  $username = str_replace("'","`",$username); 
  $username = mysql_real_escape_string($username); 

  $password = str_replace("'","`",$password); 
  $password = mysql_real_escape_string($password);
  $password = md5($password);

   $sql ="INSERT INTO `tbl_teacher`(`fname`, `mname`, `lname`, `uname`, `pwd`) VALUES ('$fname','$mname','$lname','$username','$password')";
   $run = mysql_query($sql);

                    if($run==true)
                                  {
                                        echo '<script language="javascript">';
                                        echo 'alert("Successfully Added")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=add.php" />';
                                  }

?>