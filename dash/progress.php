<?php

require 'db_con.php';

session_start();
$username = $_SESSION["stdid"];

$slectstring1 = "select * from tblstudents where StudentId = '$username'";
$result = $con->query($slectstring1);
$row = $result->fetch_array();

if($row["id"] == ""){
    //Prompt error
}
else{
    $id = $row["id"];
    $slectstring2 = "select * from marks where Sid = '$id' AND mark IS NOT NULL";
    $result1 = $con->query($slectstring2);

    ?>
        <html>
            <head>
                <style type="text/css">
                    table, th, td {
                        border: 1px solid black;
                    }
                </style>
            </head>


            <body>
                <div style = "text-align: center;">
                    <h2>Progress-report</h2>
                    <h2><?php echo $username; ?></h2>
                </div>
                <hr/>
                <table style = "width: 81.8%; float: left; margin-left: 133px;">
                    <tr>
                        <th>Subject-Id</th>
                        <th>Subject_Name</th> 
                        <th>Marks</th>
                        <th>Remarks</th>
                    </tr>

                    <?php
                        $counter = 0;
                        while($row1 = $result1->fetch_array()) {
                            $subid = $row1["SubId"];
                            $mark = $row1["mark"];
                            $remark = $row1["remarks"];

                            $subIdArr[$counter] = $subid;
                            $markArr[$counter] = $mark;
                            $remrkArr[$counter] = $remark;
                            
                            $slectstring3 = "select * from subject where SubId = '$subid'";
                            $result2 = $con->query($slectstring3);
                            $row2 = $result2->fetch_array();
                            
                            $name = $row2["subName"];
                            $subNameArr[$counter] = $name;
                            
                            ?>
                                <tr>
                                <td><?php echo $subid; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $mark; ?></td>
                                <td><?php echo $remark; ?></td>
                                </tr>
                            <?php
                            $counter++;
                        }?>

                </table>
                <?php 
                    $x = 0;
                    $tot = 0;
                    $a = 0;
                    $b = 0;
                    while($x < $counter){
                        $tot = $tot + $markArr[$x];
                        $x++;
                    }
                    $avg = $tot / $x;

                    if ($avg > 75){
                        $avgCom = "is a very good average, one of the best average and Keep it up!!!";
                    }
                    else if ($avg > 50){
                        $avgCom = "is a normal average, but try to improve and practice alot of questions then you can get a good result.";
                    }
                    else {
                        $avgCom = "is not that good, but get some advice from the relevant teacher, you can get good results.";
                    }

                    $goodSub = null;
                    $badSub = null;
                    $ax = 0;
                    $bx = 0;
                    while($a < $counter){
                        if($markArr[$a] >= 65){
                            $goodSub[$ax] = $subNameArr[$a];
                            $ax++;
                        }
                        $a++;
                    }

                    while($b < $counter){
                        if($markArr[$b] < 65){
                            $badSub[$bx] = $subNameArr[$b];
                            $bx++;
                        }
                        $b++;
                    }

                ?>
                <br/>
                <div>
                    <div style = "padding: 20px; float:left; margin-left: 10%; margin-top: 20px; width: 400px; height: 400px; border: 3px solid black">
                        <h1><u>Report</u></h1> 
                        <h3>Total : <?php echo $tot ?></h3>   
                        <h3>Average : <?php echo number_format($avg, 2); ?></h3>
                        <h3>Total-Subjects : <?php echo $x ?></h3>                         
                    </div>
                    <div style = "padding: 20px; float:left; margin-left: 15%; width: 400px; margin-top: 20px; height: 400px; border: 3px solid black">
                        <div id="piechart"></div>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            // Load google charts
                            google.charts.load('current', {'packages':['corechart']});
                            google.charts.setOnLoadCallback(drawChart);
                            // Draw the chart and set the chart values
                            function drawChart() {
                              var data = google.visualization.arrayToDataTable([
                              ['Subject', 'Marks']
                              <?php
                                    $i = 0;
                                    while($i < $counter){
                                        ?>,['<?php echo $subNameArr[$i]; ?>', <?php echo $markArr[$i]; ?>]<?php
                                        $i++;  
                                    }
                                    
                              ?>

                            ]);

                              // Optional; add a title and set the width and height of the chart
                              var options = {'title':'MY PROGRESS', 'width':360, 'height':360};

                              // Display the chart inside the <div> element with id="piechart"
                              var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                              chart.draw(data, options);
                            }
                            </script>
                            <p>This chart will show your contribution for each subject...</p>
                    </div>
                </div><br/>
                <div style = "float: left; height: 240px; width: 80%; margin-left: 10%; margin-top: 20px; border: 3px solid black; padding: 10px;">
                    <h3>Comments: </h3>
                    <h4>Your average <?php echo $avgCom; ?></h4>
                    <?php
                        if($goodSub != null){
                            $a_i = count($goodSub);
                        }
                        else{
                            $a_i = 0;
                        }
                        if($badSub != null){
                            $b_i = count($badSub);
                        }
                        else{
                            $b_i = 0;
                        }


                        if($goodSub != null && $badSub != null){
                            //normal
                            $commm = "Check your remarks, your results are average!!! Practice alot of excersises. If u can't understand the topics contact your subject teacher and get some explaination."; 
                        }
                        else if($goodSub != null && $badSub == null){
                            //good
                            $commm = "Wow, all your remarks are good, keep it up!!! Amazing, you are really good, maintain this academic ability. Read and explore more from the library.";  
                        }
                        else if($goodSub == null && $badSub != null){
                            //bad
                            $commm = "Your remarks are not that good, please get some advice from you class teacher!!! Practice alot of excersises. If u can't understand the topics contact your subject teacher and get some explaination."; 
                        }
                        else{
                            //something wrong
                            $commm = "Something wrong"; 
                        }
                        
                        if($a_i > 0){
                            echo "<h4>";
                            echo "You have good marks in these subject(s) ";
                            $cont1 = 0;
                            while($cont1 < $a_i){
                                echo ",  ";
                                echo $goodSub[$cont1];
                                $cont1++;
                            }
                            echo ".";
                            echo "</h4>";  
                        }
                        else{
                            echo "";
                        }

                        if($b_i > 0){
                            echo "<h4>";
                            echo "Concentrate in these subject(s) ";
                            $cont2 = 0;
                            while($cont2 < $b_i){
                                echo ",  ";
                                echo $badSub[$cont2];
                                $cont2++;
                            }
                            echo ".";
                            echo "</h4>";
                        }
                        else{
                            echo "";
                        }
                        echo "<h4>";
                        echo $commm;
                        echo "</h4>";
                    ?>
                </div>
            </body>
        </html>
        
    <?php  
}

?>
