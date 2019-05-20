<?php
		include "../functions/connect.php";
        $comment = mysql_real_escape_string($_POST['comment']);
        $userid = $_POST['userid'];
        $postid = $_POST['postid'];
        date_default_timezone_set("Asia/Taipei");
        $datetime=date("Y-m-d h:i:sa");
        $comment = mysql_query("Insert into tbl_comment (comment,sub_Id,user_Id,datetime) values ('$comment','$postid','$userid','$datetime') ");
        $sql = mysql_query("SELECT * from tbl_comment as c join tbl_user as u on c.user_Id=u.user_Id where sub_Id='$postid' and c.user_Id='$userid' 
        					and c.datetime='$datetime'");

	 while($row=mysql_fetch_assoc($sql)){
                    echo "<label>Comment by: </label> ".$row['fname']." ".$row['lname']."<br>";
                     echo '<label class="pull-right">'.$row['datetime'].'</label>';
                     echo "<p class='well'>".$row['comment']."</p>";
              }



              ?>