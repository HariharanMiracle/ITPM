<?php
require 'db_con.php';
   
session_start();
$sid=$_SESSION['stdid'];
$cid = $_GET['id'];

$slectstring1 = "select * from subject where cid = '$cid'";
$result = $con->query($slectstring1);

$slectstring2 = "select * from tblstudents where StudentId = '$sid'";
$result2 = $con->query($slectstring2);

if($row2 = $result2->fetch_array()){
        $id = $row2["id"];
        
        $sql = "UPDATE tblstudents SET enroll='$cid' WHERE id ='$id'";

        $c = 1;

        if(mysqli_query($con, $sql)){
            while($row1 = $result->fetch_array()) {
                $subID = $row1["SubId"];
                $sql1 = "insert into marks (`Sid`, `SubId`) values ('$id', '$subID')";
                if(mysqli_query($con, $sql1)){
                    echo "Subject ";
                    echo $c;
                    echo " added successfully!!!";
                    echo "<br/>";
                    $c++;
                }
                else{
                    echo "ERROR: Could not able to execute $sql. "
                    . mysqli_error($con);
                }
            }
            echo "Enrolled successfully.";
        }
        else {
            echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($con);
        }

        

}
else{
    echo "Something went wrong";
}

        



?>  