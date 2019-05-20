<?php  
     if (!isset($_SESSION['IDNO'])){
      redirect(web_root."index.php");
     }
 
?>
 
<div class="row">
      <div class="col-lg-12"> 
            <h3 class="page-header">Student Grades </h3>
       	 
       		</div>
        	<!-- /.col-lg-12 -->
   		 	    <form action="controller.php?action=delete" Method="POST">  
			      <div class="table-responsive">			
				<table id="dash-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				 <thead>
				  	<thead> 
				  		<th>Subject</th>
				  		<th>Description</th> 
				  		<th>Unit</th> 
				  		<th>Year Level</th>
				  		<th>Semester</th> 
				  		<th>Average</th>
				  		<th>Remarks</th>
				 
				  	</thead>	
				  </thead> 
				  <tbody>
				  	<?php  
				  	// `GRADE_ID`, `IDNO`, `SUBJ_ID`, `INST_ID`, `SYID`,
				  	//  `FIRST`, `SECOND`, `THIRD`, `FOURTH`, `AVE`, `DAY`, `G_TIME`, `ROOM`, `REMARKS`, `COMMENT`

						$sql = "SELECT * FROM `studentsubjects` st,`subject` s WHERE st.`SUBJ_ID`=s.`SUBJ_ID` and st.`IDNO`='".$_SESSION['IDNO']."'";
				  		$mydb->setQuery($sql);

				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
						 

				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>'; 
				  		echo '<td>'. $result->SUBJ_CODE.'</td>';
				  		echo '<td>'. $result->SUBJ_DESCRIPTION.'</td>';
				  		echo '<td>' . $result->UNIT.'</a></td>'; 
				  		echo '<td>'. $result->LEVEL.'</td>'; 
				  		echo '<td>'. $result->SEMESTER.'</td>';
				  		echo '<td>'. $result->AVERAGE.'</td>'; 
				  		echo '<td>'. $result->OUTCOME.'</td>'; 
				  	
				  		 
				  		// echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$result->SUBJ_ID.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span></a>
				  		// 			 <a title="Delete" href="controller.php?action=delete&id='.$result->SUBJ_ID.'" class="btn btn-danger btn-xs" ><span class="fa fa-trash-o fw-fa"></span> </a>
				  		// 			 </td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
 
				<!-- <div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
 -->
			</div>
				</form>
	

</div> <!---End of container-->

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>