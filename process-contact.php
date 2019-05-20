<?php
include "../functions/connect.php";

extract($_POST);

$sql =mysql_query("INSERT INTO `tbl_contact`(`name`, `email`, `phone`, `subject`, `message`) VALUES ('$name','$email','$phone','$subject','$message') ");

 if($sql==true)
{
echo '<script language="javascript">';
echo 'alert("Successfully Added")';
echo '</script>';
echo '<meta http-equiv="refresh" content="0;url=contact.php" />';
}
?>