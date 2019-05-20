<?php
require 'db_con.php';

session_start();
$sid=$_SESSION['stdid'];

       
        $slectstring3 = "select * from tblstudents where StudentId = '$sid'";
        $result2 = $con->query($slectstring3);
        $row2 = $result2->fetch_array();

        if($row2["enroll"] == null || $row2["enroll"] == ""){
            echo "You have not enrolled for any course still!!!";
        }
        else{
            $cid = $row2["enroll"];
            $slectstring1 = "select * from course where CourseId = '$cid'";
            $result1 = $con->query($slectstring1);
            
            if($row1 = $result1->fetch_array()){
                $cour = $row1["CourseId"];
                $Ctitle = $row1["Ctitle"];
                $descr = $row1["descr"];
                $appUni = $row1["appUni"];
                $entry = $row1["entry"];
                $courseFee = $row1["courseFee"];

                ?>
                    <h1>Your course details</h1>
                    <hr/>
                    <h3>Course Id: <?php echo $cour; ?></h3><br/>
                    <h3>Course Title: <?php echo $Ctitle; ?></h3><br/>
                    <h3>Description: <?php echo $descr; ?></h3><br/>
                    <h3>Approved by: <?php echo $appUni; ?></h3><br/>
                    <h3>Entry Requirements: <?php echo $entry; ?></h3><br/>
                    <h3>Course Fee: <?php echo $courseFee; ?></h3><br/>
                    <p style = "font-size: 20px"></p> <a href = "unenrollDb.php">Un Enroll</a>
                <?php
                
            }
            else{
                echo "Something went wrong!!!";
            }


        }

        
                    
                

?>  