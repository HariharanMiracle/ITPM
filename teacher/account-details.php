<?php
  session_start();
  if (isset($_SESSION['uname'])&&$_SESSION['uname']!=""){
  }
  else
  {
    header("Location:index.php");
  }
$uname=$_SESSION['uname'];
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>ACS E-Learning</title>
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="../assets/styles.css" rel="stylesheet" media="screen">
         <link rel="icon" type="image/png"  href="../images/favicon.png">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="../vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><?php echo ucfirst($uname);?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="account-details.php">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                     
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="home.php"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                       
                        <li>
                        <?php
                                    include '../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_topic");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                            <a href="topic/index.php"><span class="badge badge-success pull-right"><?php echo $percent;?></span> Topic</a>
                        </li>
                       
                        <li>
                        <?php
                                    include '../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_quiz");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                            <a href="quiz/index.php"><span class="badge badge-info pull-right"><?php echo $percent;?></span> Quiz</a>
                        </li>
                     
                    </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                 
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="#">Dashboard</a> <span class="divider">/</span>	
	                                    </li>
                                        <li class="active">Account Details</li>
	                                  
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    
                      <div class="row-fluid">
                     <div class="span6">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Teacher</div>
                            </div>
                            <div class="block-content collapse in">
                             <?php
                            include "../functions/connect.php";

                            $sql = mysql_query("SELECT * FROM `tbl_teacher` WHERE `uname`='$uname'");
                            while ($run = mysql_fetch_array($sql)) {
                                extract($run);
                                
                            }
                            ?>
                               <form method="POST"> 
                                   <label>First Name</label>
                                   <input type="text" class="form-control" name="fname" value=<?php echo $fname;?>>
                                   <label>Middle Name</label>
                                   <input type="text" class="form-control" name="mname" value=<?php echo $mname;?>>
                                   <label>Last Name</label>
                                    <input type="text" class="form-control" name="lname" value=<?php echo $lname;?>>
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" value=<?php echo $uname;?>>
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" value=<?php echo $pwd;?>><br>
                                    <input type="submit" name="edit"class="btn btn-primary" value="Update">
                               </form>
                            </div>
                            </div>
                           <?php
                                include "../functions/connect.php";
                                extract($_POST);
                                    if(isset($edit))
                                    {

                    $s = mysql_query("UPDATE `tbl_teacher` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`uname`='$username',`pwd`='$password' WHERE `uname`='$uname'")
                                                                    or die(mysql_error()); 
                                        if($s==true){
                                            echo '<script language="javascript">';
                                            echo 'alert("Successfully Updated")';
                                            echo '</script>';
                                            echo '<meta http-equiv="refresh" content="0;url=index.php" />';
                                        }
                                                
                                    }

                              ?>
                               
                        </div>
                        <!-- /block -->
                    </div>
                 
                   
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; 2015</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="../vendors/jquery-1.9.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="../assets/scripts.js"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
    </body>

</html>