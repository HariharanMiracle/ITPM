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
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../../assets/styles.css" rel="stylesheet" media="screen">
        <link href="../../assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="../../vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
                                        <a tabindex="-1" href="../account-details.php">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="../logout.php">Logout</a>
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
                        <li >
                            <a href="../home.php"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                       
                        <li>
                        <?php
                                    include '../../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_topic");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                            <a href="index.php"><span class="badge badge-success pull-right"><?php echo $percent;?></span> Topic</a>
                        </li>
                       
                        <li>
                        <?php
                                    include '../../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_quiz");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                            <a href="../quiz/index.php"><span class="badge badge-info pull-right"><?php echo $percent;?></span> Quiz</a>
                        </li>
                        <li  class="active">
                        <?php
                                    include '../../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_comment");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                            <a href="../quiz/index.php"><span class="badge badge-info pull-right"><?php echo $percent;?></span> Comment</a>
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
                                        <li class="active">Comment</li>
	                                  
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                
                   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">List of Topic</div>
                                 <div class="pull-right">
                                

                            </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                              <thead>
                                        <tr>
                                           
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        
                                        include "../../functions/connect.php";
                                      
                                        $sql = "SELECT * FROM `tbl_comment` ";
                                        $run = mysql_query($sql);

                                        while($row=mysql_fetch_array($run)){
                                            $id = $row['comment_Id'];
                                            echo '<tr class="odd gradeX" id="rec">';
                                            echo "<td>".$row['comment_Id']."</td>";
                                            echo "<td>".$row['datetime']."</td>";
                                             echo "<td>".
                                            '<div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="500" data-close-others="false">
                                                Action
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                           
                                            <li><a href="#"  comment_Id="'.$row['comment_Id'].'" class="delbutton" title="Click To Delete"><span class="glyphicon glyphicon-trash"></span> Delete</a></li>
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
       <script src="../../vendors/jquery-1.9.1.js"></script>
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../vendors/datatables/js/jquery.dataTables.min.js"></script>


        <script src="../../assets/scripts.js"></script>
        <script src="../../assets/DT_bootstrap.js"></script>
         <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("comment_Id");

//Built a url to send
var info = 'comment_Id=' + del_id;
 if(confirm("Are you sure you want to delete this Record?"))
          {

 $.ajax({
   type: "GET",
   url: "delete.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents("#rec").animate({ backgroundColor: "#fbc7c7" }, "fast")
        .animate({ opacity: "hide" }, "slow");
 }

return false;

});

});
</script>
        <script>
        $(function() {
            
        });
        </script>
    </body>

</html>