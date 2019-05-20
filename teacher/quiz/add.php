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
    <link rel="stylesheet" type="text/css" href="../../vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../../assets/styles.css" rel="stylesheet" media="screen">
         <link rel="icon" type="image/png"  href="../../images/favicon.png">
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
                       
                        <li >
                        <?php
                                    include '../../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_topic");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                            <a href="../topic/index.php"><span class="badge badge-success pull-right"><?php echo $percent;?></span> Topic</a>
                        </li>
                       
                        <li class="active">
                        <?php
                                    include '../../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_quiz");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                            <a href="../quiz/index.php"><span class="badge badge-info pull-right"><?php echo $percent;?></span> Quiz</a>
                        </li>
                        <!--
                          <li>
                        <?php
                                    include '../../functions/connect.php';

                                    $result=mysql_query("SELECT count(*) as total from tbl_comment");
                                    $data=mysql_fetch_assoc($result);
                                    $percent = $data['total'];
                                    
                                    ?>
                            <a href="../comment/index.php"><span class="badge badge-info pull-right"><?php echo $percent;?></span> Comment</a>
                        </li>
                        -->
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
                                        <li class="active">Quiz</li>
	                                  
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                
                 <div class="row-fluid">
                     <div class="span12">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Quiz</div>
                            </div>
                            <div class="block-content collapse in">
                             <form method="POST" action="process-add.php">
                               
                                <label>Question</label>
                               
                        
                            <!-- block -->
                     
                             <div class="block-content collapse in">
                                   <textarea id="ckeditor_full" name="question_name"></textarea>
                                </div>

                                <label>Choices</label>
                                <input type="text" class="form-control" name="answer1" placeholder="answer1"required><br>
                                <input type="text" class="form-control" name="answer2" placeholder="answer2"required><br>
                                <input type="text" class="form-control" name="answer3" placeholder="answer3"required><br>
                                <input type="text" class="form-control" name="answer4" placeholder="answer4"required><br>
                                <label>Correct Answer</label>
                                <input type="text" class="form-control" name="answer" placeholder="correct answer"required>
                            <!-- /block -->
                    
                                <!--
                                    <label>topic</label>
                                    <select class="form-control" name="category">
                                        <option></option>
                                        <?php include "function.php"; topic(); ?>
                                    </select>
                                    -->
                                        <br>
                                        <input type="submit" class="btn btn-primary" value="Publish">
                                    </form>
                                                  
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
         <script src="../../vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
        <script src="../../vendors/jquery-1.9.1.min.js"></script>
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

        <script src="../../vendors/ckeditor/ckeditor.js"></script>
        <script src="../../vendors/ckeditor/adapters/jquery.js"></script>

        <script type="text/javascript" src="../../vendors/tinymce/js/tinymce/tinymce.min.js"></script>

        <script src="../../assets/scripts.js"></script>
        <script>
        $(function() {
            // Bootstrap
            $('#bootstrap-editor').wysihtml5();

            // Ckeditor standard
            $( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
                { name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],          // Defines toolbar group without name.
                { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
            ]});
            $( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
        });

        // Tiny MCE
        tinymce.init({
            selector: "#tinymce_basic",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });

        // Tiny MCE
        tinymce.init({
            selector: "#tinymce_full",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons",
            image_advtab: true,
            templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
            ]
        });

        </script>
    </body>

</html>