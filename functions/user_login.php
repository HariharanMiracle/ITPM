<?php 

    session_start();
    
    include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $pwd = md5($password);

    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);

    $query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$pwd'";
    $result = mysql_query($query) or die ("Verification error");
    $array = mysql_fetch_array($result);
    
    if ($array['username'] == $username){
        $_SESSION['username'] = $username;
        $_SESSION['fname'] = $array['fname'];
        $_SESSION['lname'] = $array['lname'];
        $_SESSION['user_Id'] = $array['user_Id'];
        header("Location: ../student/home.php");
    }
    
    else{
        echo '<script language="javascript">';
        echo 'alert("Incorrect username or password")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=../student/index.php" />';
    }
   
?>