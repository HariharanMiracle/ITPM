<?php
include "../../functions/connect.php";
if($_GET['quiz_Id'])
{
$id=$_GET['quiz_Id'];
 $sql = "DELETE FROM tbl_quiz WHERE quiz_Id='$id'";
 mysql_query( $sql);
}

?>