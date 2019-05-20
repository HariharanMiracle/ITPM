<?php
  session_start();
  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
  }
  else
  {
    header("Location:../index.php");
  }
$username=$_SESSION['username'];
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
</head>
<body>
	<!-- Fixed navbar -->
	<<div class="navbar navbar-inverse">
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
                    <h1>Categories</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing eliras scele!</p>
                </div>
    </header>


<div class="container">


</div>
	<div id="courses">
		<section class="container">
			<h3>Different Categories</h3>
			<div class="row">
				<div class="col-md-4">
					<div class="featured-box"> 
					 			<?php
                                        
                                        include "../functions/connect.php";
                                      
                                        $sql = "SELECT * FROM `tbl_category` ";
                                        $run = mysql_query($sql);

                                        while($row=mysql_fetch_array($run)){
                                        
                                            $id = $row['cat_Id'];
                                         	$name = $row['name'];
                                         	$description = $row['description'];
                                            ?>
						<div class="text">
							<h3><?php
							echo "<a href='cat-content.php?cat_Id=".$row["cat_Id"]."'>$name</a>";
							?></h3>
							<p><?php echo $description;?></p>
							</div>
							    <?php }?>
					</div>
				</div>
				
			</div>

		</section>
	</div>
  
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
