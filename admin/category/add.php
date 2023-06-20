
<?php
     if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

?>
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST">

    <div class="row">
         <div class="col-lg-12">
            <h3 class="page-header"><b>Add New Category</b></h3>
          </div> 
       </div> 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CATEGORY">Category:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="CATEGORY" name="CATEGORY" placeholder=
                            "Category" type="text" value="">
                      </div>
                    </div>
                  </div>


            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                         <button class="btn btn-primary" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      <a href="index.php" class="btn btn-primary"><span class="fa fa-arrow-left"></span>&nbsp;<strong>Back</strong></a>
                     
                     </div>
                    </div>
                  </div> 

        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
      
 