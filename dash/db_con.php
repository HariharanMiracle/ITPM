<?php
$con = mysqli_connect("localhost", "root", "", "library");
if(mysqli_connect_errno())
{
    echo "fail to connect". mysqli_connect_error();
   
}else
{
    //connected
}
?>