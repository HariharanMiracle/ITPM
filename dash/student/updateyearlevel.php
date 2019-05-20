<br/>

<?php
$student = New Student();
$res = $student->single_student($_SESSION['IDNO']);

$studdetails = New StudentDetails();
$details = $studdetails->single_StudentDetails($_SESSION['IDNO']); 
?>
 
<form action="student/controller.php?action=edit" class="form-horizontal " method="post" >
	<div class="table-responsive">
	<div class="col-md-8"><h2>Update Accounts</h2></div> 
		<table class="table">
			<tr>
				<td><label>Id</label></td>
				<td >
					<input class="form-control input-md" readonly id="IDNO" name="IDNO" placeholder="Student Id" type="text" value="<?php echo isset($_SESSION['IDNO']) ? $_SESSION['IDNO'] : '' ?>">
				</td>
				<td colspan="4"></td>

			</tr>
			<tr>
				<td><label>Firstname</label></td>
				<td>
					<input required="true" readonly="true"  class="form-control input-md" id="FNAME" name="FNAME" placeholder="First Name" type="text" value="<?php echo $res->FNAME; ?>">
 				</td>
				<td><label>Lastname</label></td>
				<td colspan="2">
					<input required="true" readonly="true" class="form-control input-md" id="LNAME" name="LNAME" placeholder="Last Name" type="text" value="<?php echo $res->LNAME; ?>">
				</td> 
				<td>
					<input class="form-control input-md" readonly="true" id="MI" name="MI" placeholder="MI" type="text" value="<?php echo $res->MNAME; ?>">
				</td>
			</tr>
			<tr>
				<td><label>Address</label></td>
				<td colspan="5"  >
				<input required="true"  class="form-control input-md" id="PADDRESS" name="PADDRESS" placeholder="Permanent Address" type="text" value="<?php echo $res->HOME_ADD; ?>">
				</td> 
			</tr>
			<tr>
				<td ><label>Sex </label></td> 
				<td colspan="2">
					<label>
					<?php
					 if ($res->SEX=='Female') {
					 	# code...
					 	echo '<input checked id="optionsRadios1" checked="true"  name="optionsRadios" type="radio" value="Female">Female 
						 <input id="optionsRadios2"  name="optionsRadios" type="radio" value="Male"> Male';
					 }else{
					 		echo '<input checked id="optionsRadios1" name="optionsRadios" type="radio" value="Female">Female 
						 <input id="optionsRadios2"  checked="true"  name="optionsRadios" type="radio" value="Male"> Male';
					 }
					?>
					</label>
				</td>
				<td    ><label>Date of birth</label></td>
				<td colspan="2"> 
				<div class="input-group" >
                  <div class="input-group-addon"> 
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input  required="true" name="BIRTHDATE"  id="date_picker"  type="text" class="form-control input-md"   
                  data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="<?php echo date_format(date_create($res->BDAY),'m/d/Y'); ?>">
				   </div>             
				</td>
				 
			</tr>
			<tr><td><label>Place of Birth</label></td>
				<td colspan="5">
				<input required="true"  class="form-control input-md" id="BIRTHPLACE" name="BIRTHPLACE" placeholder="Place of Birth" type="text" value="<?php echo $res->BPLACE; ?>">
			   </td>
			</tr>
			<tr>
				<td><label>Nationality</label></td>
				<td colspan="2"><input required="true"  class="form-control input-md" id="NATIONALITY" name="NATIONALITY" placeholder="Nationality" type="text" value="<?php echo $res->NATIONALITY; ?>">
							</td>
				<td><label>Religion</label></td>
				<td colspan="2"><input  required="true" class="form-control input-md" id="RELIGION" name="RELIGION" placeholder="Religion" type="text" value="<?php echo $res->RELIGION; ?>">
				</td>
				
			</tr>
			<tr>
			<td><label>Contact No.</label></td>
				<td colspan="3">
				  <input required="true"  class="form-control input-md" id="CONTACT" name="CONTACT" placeholder="Contact Number" type="text" value="<?php echo $res->CONTACT_NO; ?>">
			</td>
				  
				<td><label>Civil Status</label></td>
				<td colspan="2"> 
				<?php
				 if ($res->STATUS=='Single') {
				 	# code...
					echo '<select class="form-control input-sm" name="CIVILSTATUS"> 
								 <option selected="true" value="Single">Single</option>
								 <option value="Married">Married</option> 
								 <option value="Widow">Widow</option>
							</select>';
				 }elseif ($res->STATUS=='Married') {
				 	# code...
				 	echo '<select class="form-control input-sm" name="CIVILSTATUS"> 
								 <option value="Single">Single</option>
								 <option selected="true" value="Married">Married</option> 
								 <option value="Widow">Widow</option>
							</select> ';

				 }elseif ($res->STATUS=='Widow') {
				 	echo '<select class="form-control input-sm" name="CIVILSTATUS"> 
								 <option  value="Single">Single</option>
								 <option value="Married">Married</option> 
								 <option selected="true" value="Widow">Widow</option>
							</select> ';
				 }
				?> 
				</td>
			</tr>
			<tr>
				<td><label>Username</label></td>
				<td colspan="6">
				  <input required="true" readonly="true"  class="form-control input-md" id="USER_NAME" name="USER_NAME" placeholder="Username" type="text"value="<?php echo $res->ACC_USERNAME; ?>">
				</td>
		 
			</tr>
			<tr>
				<td><label>Gaurdian</label></td>
				<td colspan="2">
					<input required="true"  class="form-control input-md" id="GUARDIAN" name="GUARDIAN" placeholder="Parents/Guardian Name" type="text"value="<?php echo $details->GUARDIAN; ?>">
				</td>
				<td><label>Contact No.</label></td>
				<td colspan="2"><input  required="true" class="form-control input-md" id="GCONTACT" name="GCONTACT" placeholder="Contact Number" type="text"value="<?php echo $details->GCONTACT; ?>"></td>
			</tr>
			<tr>
			<td></td>
				<td colspan="5">	
					<button class="btn btn-success btn-lg" name="save" type="submit">Save</button>
				</td>
			</tr>
		</table>
	</div>
</form>