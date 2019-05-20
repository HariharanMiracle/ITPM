<?php
   include "../../functions/connect.php";
   extract($_POST);

   $sql = mysql_query("INSERT INTO `tbl_category`(`name`, `description`)  VALUES ('$cat_name','$cat_desc')");

    
                    if($sql==true)
                                  {
                                        echo '<script language="javascript">';
                                        echo 'alert("Successfully Added")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=index.php" />';
                                  }
                        
                        
                    ?>