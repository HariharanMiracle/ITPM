<?php


function dbcon(){
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "db_elearning";

	$con = mysql_connect($host,$user,$pwd) or die ("ERROR Connecting to Database");

	$sel = mysql_select_db($db);
}

function dbclose(){
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "db_elearning";

	$con = mysql_connect($host,$user,$pwd) or die ("ERROR Connecting to Database");

	$sel = mysql_select_db($db);

	mysql_close($con);
}

function category(){
	dbcon();
	$sel = mysql_query("SELECT * from tbl_category");

	if($sel==true){
		while($row=mysql_fetch_assoc($sel)){
			extract($row);
			echo '<option value='.$cat_Id.'>'.$name.'</option>';
		}
	}


	dbclose();
}
function sub(){
	dbcon();
	$sel = mysql_query("SELECT * from tbl_topic");

	if($sel==true){
		while($row=mysql_fetch_assoc($sel)){
			extract($row);
			echo '<option value='.$topic_Id.'>'.$title.'</option>';
		}
	}


	dbclose();
}


?>