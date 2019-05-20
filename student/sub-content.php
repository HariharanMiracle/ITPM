<?php
  session_start();
  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
  }
  else
  {
    header("Location:../index.php");
  }
$username=$_SESSION['username'];
$userid = $_SESSION['user_Id'];
if($_POST){
  $name = $_POST['name'];
  $content = $_POST['commentContent'];
  $handle = fopen("comments.html","a");
   date_default_timezone_set("Asia/Taipei");
        $datetime=date("Y-m-d h:i:sa");
  fwrite($handle, "<b>"."<p class='well'>".$name."</b>:<br/>".$content."<label class='pull-right'>$datetime</label>"."</p>"."<br/>");
  fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>ACS E-Learning</title>
	 <link rel="icon" type="image/png"  href="../images/favicon.png">
	<link rel="stylesheet" media="screen" href="../http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css"> 
	<link rel="stylesheet" href="../css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="../css/style.css">
    <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'> 
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="../js/html5shiv.js"></script>
	<script src="../js/respond.min.js"></script>
	<![endif]-->
 <script>
//This script is to disable copy and paste.
  function disableCopy(e){
    return false
  }
   
  function reEnable(){
    return true
  }
   
  document.onselectstart=new Function ("return false")
  if (window.sidebar){
    document.onmousedown=disableCopy
    document.onclick=reEnable
  }

</script>
</head>
<body ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="home.php">
					<img src="../images/logo.png" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="active"><a href="home.php">Home</a></li>
		
					<li class="dropdown">
						<a href="../#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $username;?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="user-details.php">Profile</a></li>
							<li><a href="../functions/user_logout.php">Logout</a></li>
						</ul>
					</li>
					

				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->
	<!-- /.navbar -->

	<header id="head" class="secondary">
            <div class="container">
                    <h1>Topics</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing eliras scele!</p>
                </div>
    </header>


<div class="container">


</div>
	<div id="courses">
		<section class="container">
			<h3>Topic Content</h3>
      <a href="quiz/index.php" class="pull-right btn btn-primary">Practice</a>
			<div class="row">
				<div class="col-md-12">
					<div class="featured-box"> 
					 			
			<?php
        require_once "../functions/connect.php";
       

        $sql = mysql_query("SELECT * FROM `tbl_subtopic`  WHERE `sub_Id`=".$_GET["sub_Id"]);
        if(mysql_num_rows($sql)==0)
        {
        echo "<p class='alert alert-danger'>"."No Post have been found"."</p>";
        }
        else                            
        {
        while($row=mysql_fetch_array($sql)){   
        $id = $row['sub_Id'];
        $title = $row['sub_title'];
        $topic = $row['topic_Id'];
        $content = $row['sub_content'];
        $datetime = $row['datetime'];

     
        ?>
   
        <p>Topic Title: <?php echo $title;?></p>
        <p>Main Topic: <?php echo $topic;?></p>
        <p>Date and Time: <?php echo $datetime;?></p>
        <p>Content: <br><?php echo $content;?></p>
        <hr>


  <?php
}
}
  ?>

       	 				</div>
					</div>
							
				</div>
				
			</div>
	<div class="container">
		 <div id="comments">
      <?php include "comments.html";?>

              <?php 
     /*         $postid= $_GET['sub_Id'];
              $sql = mysql_query("SELECT * from tbl_comment as c join tbl_user as u on c.user_Id=u.user_Id where sub_Id='$postid' order by datetime");
             
              while($row=mysql_fetch_assoc($sql)){
                    echo "<label>Comment by: </label> ".$row['fname']." ".$row['lname']."<br>";
                     echo '<label class="pull-right">'.$row['datetime'].'</label>';
                     echo "<p class='well'>".$row['comment']."</p>";
              }

      */

              ?>
             
            </div>
            <div class="container">

    <form class="form-horizontal" method="POST">
        <fieldset>
        <legend>Comment</legend>
                                
     
           <textarea name="commentContent"class="form-control" required></textarea><br>
           <input type="hidden" name="name" value=<?php echo $username;?>>
            <input type="submit" value="Post" class="btn btn-primary pull-right">
                                     

                                      
        </fieldset>
     </form>
      </div>
  
     


	</div>
  <!--
	<script>

$("#save").click(function(){
var postid = $("#postid").val();
var userid = $("#userid").val();
var comment = $("#commenttxt").val();
var datastring = 'postid=' + postid + '&userid=' + userid + '&comment=' + comment;
if(!comment){
  alert("Please enter some text comment");
}
else{
  $.ajax({
    type:"POST",
    url: "addcomment.php",
    data: datastring,
    cache: false,
    success: function(result){
      document.getElementById("commenttxt").value=' ';
      $("#comments").append(result);
    }
  });
}
return false;
})

</script>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="../js/modernizr-latest.js"></script> 
	<script type='text/javascript' src='../js/jquery.min.js'></script>
    <script type='text/javascript' src='../js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='../js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='../js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='../js/camera.min.js'></script> 
    <script src="../js/bootstrap.min.js"></script> 
	<script src="../js/custom.js"></script>

    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
				height: '600',
				loader: 'false',
				pagination: true,
				thumbnails: false,
				hover: false,
                playPause: false,
                navigation: false,
				opacityOnGrid: false,
				imagePath: 'images/'
			});

		});
      
	</script>

    
</body>
</html>
