<?php
session_start();
if(isset($_SESSION['username'])){
session_destroy();
header("Location:../student/index.php");}
?>