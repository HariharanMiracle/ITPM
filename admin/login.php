<?php
    session_start();
	
	include '../functions/connect.php';

	$username = $_POST['adm_user'];
    $password = $_POST['adm_pwd'];
	$pwd = md5($password);

	$username = mysql_real_escape_string($_POST['adm_user']);
    $password = mysql_real_escape_string($_POST['adm_user']);

    $query = "SELECT * FROM tbl_admin WHERE adm_user = '$username' AND adm_pwd = '$pwd'";
    $result = mysql_query($query) or die ("Verification error");
    $array = mysql_fetch_array($result);
    
    if ($array['adm_user'] == $username){
        $_SESSION['adm_user'] = $username;
        header("Location:home.php");
    }
    
    else{
    	echo '<script language="javascript">';
        echo 'alert("Incorrect username or password")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=index.php" />';
    }


?>
