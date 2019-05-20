<?php
  session_start();
  if (isset($_SESSION['adm_user'])&&$_SESSION['adm_user']!=""){
  }
  else
  {
    header("Location:index.php");
  }
$adm_user=$_SESSION['adm_user'];
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Admin Home Page</title>
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
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><?php echo $adm_user;?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="account/index.php">Profile</a>
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

                                    $result=mysql_query("SELECT count(*) as total from tbl_teacher");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                            <a href="teacher/index.php"><span class="badge badge-success pull-right"><?php echo $percent;?></span> Teachers</a>
                        </li>
                        <li>
                        <?php
                                    include '../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_user");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                            <a href="students/index.php"><span class="badge badge-success pull-right"><?php echo $percent;?></span> Students</a>
                        </li>

                        <li>
                          <?php
                                    include '../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_category");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                            <a href="category/index.php"><span class="badge badge-info pull-right"><?php echo $percent;?></span> Categories</a>
                        </li>
                        <li>
                        <?php
                                    include '../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_contact");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                            <a href="message/index.php"><span class="badge badge-info pull-right"><?php echo $percent;?></span> Messages</a>
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
	                                  
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Statistics</div>
                                <div class="pull-right"><span class="badge badge-warning">View More</span>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                             <?php
                                    include '../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_teacher");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'] * 0.1;
                                    
                                    ?>
                                <div class="span3">
                                    <div class="chart" data-percent="73"><?php echo $percent;?></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Teachers</span>

                                    </div>
                                </div>
                                <div class="span3">
                                 <?php
                                    include '../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_user");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'] * 0.1;
                                    
                                    ?>
                                    <div class="chart" data-percent="53"><?php echo $percent;?></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Students</span>

                                    </div>
                                </div>
                                <div class="span3">
                                 <?php
                                    include '../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_category");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'] * 0.1;
                                    
                                    ?>
                                    <div class="chart" data-percent="83"><?php echo $percent;?></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Categories</span>

                                    </div>
                                </div>
                                <div class="span3">
                                 <?php
                                    include '../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_contact");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'] * 0.1;
                                    
                                    ?>
                                    <div class="chart" data-percent="13"><?php echo $percent;?></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Messages</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                 <?php
                                    include '../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_user");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                                    <div class="muted pull-left">Users</div>
                                    <div class="pull-right"><span class="badge badge-info"><?php echo $percent;?></span>

                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                           
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        
                                        include "../functions/connect.php";
                                      
                                        $sql = "SELECT * FROM `tbl_user` ";
                                        $run = mysql_query($sql);

                                        while($row=mysql_fetch_array($run)){
                                            $id = $row['user_Id'];
                                            echo '<tr class="odd gradeX" id="rec">';?>
                                           <?php
                                            echo "<td>".$row['fname']."</td>";
                                            echo "<td>".$row['username']."</td>";
                                             echo "<td>".
                                            '<div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="500" data-close-others="false">
                                                Action
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="students/index.php"><span class="glyphicon glyphicon-edit"></span> View</a></li>
                                           
                                            </ul>
                                            </div>'
                                                    ."</td>";
        
                                            echo "</tr>";
                                 
                                     
                                        }
                                    

                                        ?>
                                   
                                        
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                              <?php
                                    include '../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_teacher");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Teachers</div>
                                    <div class="pull-right"><span class="badge badge-info"> <?php echo $percent;?></span>

                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                           
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        
                                        include "../functions/connect.php";
                                      
                                        $sql = "SELECT * FROM `tbl_teacher` ";
                                        $run = mysql_query($sql);

                                        while($row=mysql_fetch_array($run)){
                                            $id = $row['teacher_Id'];
                                            echo '<tr class="odd gradeX" id="rec">';?>
                                           <?php
                                            echo "<td>".$row['fname']."</td>";
                                            echo "<td>".$row['uname']."</td>";
                                             echo "<td>".
                                            '<div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="500" data-close-others="false">
                                                Action
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="teacher/index.php"><span class="glyphicon glyphicon-edit"></span> View</a></li>
                                            </ul>
                                            </div>'
                                                    ."</td>";
        
                                            echo "</tr>";
                                 
                                     
                                        }
                                    

                                        ?>
                                   
                                        
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                             <?php
                                    include '../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_teacher");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Categories</div>
                                    <div class="pull-right"><span class="badge badge-info"><?php echo $percent;?></span>

                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped">
                                       <thead>
                                        <tr>
                                           
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        
                                        include "../functions/connect.php";
                                      
                                        $sql = "SELECT * FROM `tbl_category` ";
                                        $run = mysql_query($sql);

                                        while($row=mysql_fetch_array($run)){
                                            $id = $row['cat_Id'];
                                            echo '<tr class="odd gradeX" id="rec">';
                                           echo "<td>".$row['cat_Id']."</td>";
                                            echo "<td>".$row['name']."</td>";
                                             echo "<td>".
                                            '<div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="500" data-close-others="false">
                                                Action
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="category/index.php"><span class="glyphicon glyphicon-edit"></span> View</a></li>
                                            
                                            </ul>
                                            </div>'
                                                    ."</td>";
        
                                            echo "</tr>";
                                 
                                     
                                        }
                                    

                                        ?>
                                   
                                        
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                  <?php
                                    include '../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_contact");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                                    <div class="muted pull-left">Messages</div>
                                    <div class="pull-right"><span class="badge badge-info"><?php echo $percent;?></span>

                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped">
                                       <thead>
                                        <tr>
                                           
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        
                                        include "../functions/connect.php";
                                      
                                        $sql = "SELECT * FROM `tbl_contact` order by `contact_Id` DESC";
                                        $run = mysql_query($sql);

                                        while($row=mysql_fetch_array($run)){
                                            $id = $row['contact_Id'];
                                            echo '<tr class="odd gradeX" id="rec">';
                                           
                                            echo "<td>".$row['name']."</td>";
                                                 echo "<td>".$row['email']."</td>";
                                             echo "<td>".
                                            '<div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="500" data-close-others="false">
                                                Action
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                             <li><a href="message/index.php"><span class="glyphicon glyphicon-edit"></span> View</a></li>
                                            </ul>
                                            </div>'
                                                    ."</td>";
        
                                            echo "</tr>";
                                 
                                     
                                        }
                                    

                                        ?>
                                   
                                        
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
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