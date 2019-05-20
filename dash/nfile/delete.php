
<?php
extract($_REQUEST);
include('db.php');

$sql=query("select * from upload where id='$del'");
$row=mysql_fetch_array($sql);

unlink("files/$row[name]");

mysql_query("delete from upload where id='$del'");

header("Location:index.php");

?>