<?php
include "../../functions/connect.php";
if($_GET['comment_Id'])
{
$id=$_GET['comment_Id'];
 $sql = "DELETE FROM comment WHERE comment_Id='$id'";
 mysql_query( $sql);
}

?>