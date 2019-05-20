<?php
require 'db_con.php';
   
session_start();
$sid=$_SESSION['stdid'];

$slectstring1 = "select * from tblstudents where StudentId = '$sid' AND enroll IS NULL";
$result1 = $con->query($slectstring1);
if($row1 = $result1->fetch_array()){
    $slectstring3 = "select * from course";
        $result2 = $con->query($slectstring3);
        
        $counter1 = 0;
        
        while($row2 = $result2->fetch_array()) {
            $cname = $row2["Ctitle"];
            $cid = $row2["CourseId"];
            ?>
                    <p style = "font-size: 20px">  <?php echo $cname; ?> : </p> <a href = "vCourse.php?id=<?php echo $cid ?>&">View Course</a>
                    <hr/>

                <?php
                $counter1 = $counter1 + 1;
            }
            
            if($counter1 == 0){
                //no student records
            }
}
else{
    echo "You have already enrolled to a course";
}

       
 
?>  