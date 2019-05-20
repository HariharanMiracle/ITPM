<?php
require 'db_con.php';
   
session_start();
$sid=$_SESSION['stdid'];

$sql1 = "UPDATE `tblstudents` SET `enroll`= NULL WHERE StudentId = '$sid'";
if(mysqli_query($con, $sql1)){
    echo "Updated successfully!!!";
}
else{
    echo "ERROR: Could not able to execute $sql. "
    . mysqli_error($con);
}
 
?>  