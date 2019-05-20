<?php require_once '../../functions/connect.php';?>
<!DOCTYPE html>
<html>
<head>
<title>ACS E-Learning</title>
<meta charset='utf-8'>
<link rel='stylesheet' href='css/style.css'/>
 <link rel="icon" type="image/png"  href="../../images/favicon.png">
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
<h1>Practice what you have learn!</h1>

<?php $response=mysql_query("select * from tbl_quiz");?>

<form method='post' id='quiz_form'>
<?php while($result=mysql_fetch_array($response)){ ?>
<div id="question_<?php echo $result['quiz_Id'];?>" class='questions'>
<h2 id="question_<?php echo $result['quiz_Id'];?>"><?php echo $result['quiz_Id'].".".$result['question_name'];?></h2>
<div class='align'>
<input type="radio" value="1" id='radio1_<?php echo $result['quiz_Id'];?>' name='<?php echo $result['quiz_Id'];?>'>
<label id='ans1_<?php echo $result['quiz_Id'];?>' for='1'><?php echo $result['answer1'];?></label>
<br/>
<input type="radio" value="2" id='radio2_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'>
<label id='ans2_<?php echo $result['quiz_Id'];?>' for='1'><?php echo $result['answer2'];?></label>
<br/>
<input type="radio" value="3" id='radio3_<?php echo $result['quiz_Id'];?>' name='<?php echo $result['quiz_Id'];?>'>
<label id='ans3_<?php echo $result['quiz_Id'];?>' for='1'><?php echo $result['answe3'];?></label>
<br/>
<input type="radio" value="4" id='radio4_<?php echo $result['quiz_Id'];?>' name='<?php echo $result['quiz_Id'];?>'>
<label id='ans4_<?php echo $result['quiz_Id'];?>' for='1'><?php echo $result['answer4'];?></label>
<input type="radio" checked='checked' value="5" style='display:none' id='radio4_<?php echo $result['quiz_Id'];?>' name='<?php echo $result['id'];?>'>
</div>
<br/>
<input type="button" id='next<?php echo $result['quiz_Id'];?>' value='Next!' name='question' class='butt'/>
</div>
<?php }?>
</form>
<div id='result'>
<img src='results.jpg' alt='Results'/>
<br/>
</div>

<div id="demo1" class="demo" style="text-align:center;font-size: 25px;">00:00:00</div>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/watch.js"></script>
<script>
$(document).ready(function(){
	$('#demo1').stopwatch().stopwatch('start');
	var steps = $('form').find(".questions");
	var count = steps.size();
	steps.each(function(i){
		hider=i+2;
		if (i == 0) { 	
    		$("#question_" + hider).hide();
    		createNextButton(i);
        }
		else if(count==i+1){
			var step=i + 1;
			//$("#next"+step).attr('type','submit');
            $("#next"+step).on('click',function(){
			
			   submit();
                
            });
	    }
		else{
			$("#question_" + hider).hide();
			createNextButton(i);
		}
		
	});
    function submit(){
	     $.ajax({
						type: "POST",
						url: "ajax.php",
						data: $('form').serialize(),
						success: function(msg) {
						  $("#quiz_form,#demo1").addClass("hide");
						  $('#result').show();
						  $('#result').append(msg);
						}
	     });
	
	}
	function createNextButton(i){
		var step = i + 1;
		var step1 = i + 2;
        $('#next'+step).on('click',function(){
        	$("#question_" + step).hide();
        	$("#question_" + step1).show();
        });
	}
	setTimeout(function() {
	      submit();
	}, 50000);
});
</script>
</body>
</html>