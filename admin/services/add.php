<?php
   if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

      // $autonum = New Autonumber();
      // $result = $autonum->single_autonumber(4);

?> 
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data"    >
 <div class="row">
         <div class="col-lg-12">
            <h3 class="page-header"><b>Add new product</b></h3>
          </div>
          <!-- /.col-lg-12 -->
</div> 
     <div class="row">
        <div class="col-lg-9">
              <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-3 control-label" for=
                      "serv_name" style="font-size:15px;">Service name:</label>

                      <div class="col-md-8">
                            <input class="form-control input" id="serv_name" name="serv_name" placeholder=
                            "Service name" type="text" value="">
                      </div>
                    </div>
                  </div>  

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-3 control-label" for=
                      "serv_price"  style="font-size:15px;">Service Price:</label>

                      <div class="col-md-8">
                             <input class="form-control input" id="serv_price" name="serv_price" placeholder=
                            "Service Price" type="number" value="">
                      </div>
                    </div>
                  </div> 

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-3 control-label" for=
                      "description"  style="font-size:15px;">Description:</label>

                      <div class="col-md-8"> 
                      <textarea class="form-control input" id="description" name="description" cols="1" rows="3" ></textarea>
                      </div>
                    </div>
                  </div>


  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-3" align = "right"for=
                      "image"  style="font-size:15px;">Product Image:</label>

                      <div class="col-md-8">
                        <label 
                          style="
                            color:#f2f2f2;
                            border-radius:5px;
                            border: 1px solid #ccc;
                            display: inline-block;
                            padding: 5px 12px;cursor: pointer;
                            background-color:#D9602B;
                            font-size:15px;
                          ">
                          <input type="file" name="image" value="" id="image" style="display:none;"/>
                          Upload Image
                        </label>
                      </div>
                    </div>
                  </div>
            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-3 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn  btn-primary" name="save" type="submit" ><span class="fa fa-save fw-fa"></span><b> Save</b></button>
                        <a href="index.php" class="btn  btn-primary" name="back"><span class="fa fa-arrow-left fw-fa"></span> Back</a>
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
        </div>
        <div class="col-lg-3">
          <img class="" style="height:400px; margin-left: -250px;" src="<?php echo web_root.'admin/images/2.png' ?>" />
        </div>
      </div>
          
        </form>
      

       