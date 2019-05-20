<?php 
if(!isset($_SESSION['IDNO'])){
  redirect(web_root."admin/index.php");
}

                      // $autonum = New Autonumber();
                      // $res = $autonum->single_autonumber(2);

?> 
  <style type="text/css">
  .row {
    margin-bottom: 10px;
  }
  </style>
 <form class="" action="<?php echo web_root; ?>student/controller.php?action=postblog" method="POST">

           <div class="row">
         <div class="col-lg-12">
            <h3 class="page-header">Post New Announcement</h3>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
  
                  <div class="row">
                    <div class="col-md-12">
                       <label class="col-md-2 control-label" for=
                      "ANNOUNCEMENT_TEXT">Title:</label>
                        <div class="col-md-10">
                           <input class="form-control input-sm" id="ANNOUNCEMENT_TEXT" name="ANNOUNCEMENT_TEXT" placeholder=
                            "Title" type="text" value="">
                        </div>
                    </div>
                  </div> 

                  <div class="row">
                    <div class="col-md-12">
                       <label class="col-md-2 control-label" for=
                      "ANNOUNCEMENT_WHAT">Body:</label>
                        <div class="col-md-10">
                          <textarea  class="form-control input-sm" id="ANNOUNCEMENT_WHAT" name="ANNOUNCEMENT_WHAT" placeholder=
                            "Body" rows="12" cols="60"></textarea>
                        </div>
                    </div>
                  </div>       
                
              

            
             <div class="row">
                    <div class="col-md-12">
                      <label class="col-md-2 control-label" for=
                      "idno"></label>

                      <div class="col-md-10">
                       <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Submit</button> 
                          <!-- <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>List of Users</strong></a> -->
                       </div>
                    </div>
                  </div>

               
        
          
        </form>
       