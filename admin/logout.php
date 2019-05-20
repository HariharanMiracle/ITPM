<?php
session_start();
if(isset($_SESSION['adm_user'])){
session_destroy();
header("Location:index.php");}
?>