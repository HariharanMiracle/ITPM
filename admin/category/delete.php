<?php
include "../../functions/connect.php";
if($_GET['cat_Id'])
{
$id=$_GET['cat_Id'];
 $sql = "DELETE FROM tbl_category WHERE cat_Id='$id'";
 mysql_query( $sql);
}

?>