<?php
include "../../functions/connect.php";
if($_GET['sub_Id'])
{
$id=$_GET['sub_Id'];
 $sql = "DELETE FROM tbl_subtopic WHERE sub_Id='$id'";
 mysql_query( $sql);
}

?>