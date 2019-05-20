<?php
    session_start();
	
	include '../functions/connect.php';

	$username = $_POST['uname'];
    $password = $_POST['pwd'];
	$pwd = md5($password);

	$username = mysql_real_escape_string($_POST['uname']);
    $password = mysql_real_escape_string($_POST['pwd']);

    $query = "SELECT * FROM tbl_teacher WHERE uname = '$username' AND pwd = '$password'";
    $result = mysql_query($query) or die ("Verification error");
    $array = mysql_fetch_array($result);
    
    if ($array['uname'] == $username){
        $_SESSION['uname'] = $username;
        header("Location:home.php");
    }
    
    else{
    	echo '<script language="javascript">';
        echo 'alert("Incorrect username or password")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=index.php" />';
    }


?>
