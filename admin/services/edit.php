<?php  

    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }


  $serv_id = $_GET['id'];
  $services = New Services();
  $singleproduct = $services->single_service($serv_id);

?>
  
        
        <div class="row">
         <div class="col-lg-12">
            <h3 class="page-header"><b>Update Product</b></h3>
          </div>
          <!-- /.col-lg-12 -->
       </div>
       <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">
 
              <div class="row"> 
                <div class="col-lg-9">
                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-3 control-label" for=
                        "serv_name" style="font-size:15px;">Service name:</label>

                        <div class="col-md-8">
                              <input class="form-control  " id="serv_name" name="serv_name" type="text" value="<?php echo $singleproduct->serv_name; ?>">
                        </div>
                      </div>
                    </div>  

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-3 control-label" for=
                        "price" style="font-size:15px;">Estimated Price</label>

                        <div class="col-md-8">
                              <input class="form-control  " id="serv_price" name="serv_price"  type="number" value="<?php echo $singleproduct->serv_price; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-3 control-label" for=
                        "ctype_a" style="font-size:15px;">Type A vehicles price</label>

                        <div class="col-md-8">
                              <p style="font-size: 10px;color:red;">Sedan / Hatchback / Coupe / Convertible </p>
                              <input class="form-control  " id="ctype_a" name="ctype_a"  type="number" value="<?php echo $singleproduct->ctype_a; ?>">
                        </div>
                      </div>
                    </div> 
                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-3 control-label" for=
                        "ctype_b" style="font-size:15px;">Type B vehicles price</label>

                        <div class="col-md-8">
                              <p style="font-size: 10px;color:red;">SUV / MiniSuv / Crossover </p>
                              <input class="form-control  " id="ctype_b" name="ctype_b"  type="number" value="<?php echo $singleproduct->ctype_b; ?>">
                        </div>
                      </div>
                    </div> 
                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-3 control-label" for=
                        "ctype_c" style="font-size:15px;">Type C vehicles price</label>

                        <div class="col-md-8">
                        <p style="font-size: 10px;color:red;">Pick-up Truck / MPV / Truck </p>
                              <input class="form-control  " id="ctype_c" name="ctype_c"  type="number" value="<?php echo $singleproduct->ctype_c; ?>">
                        </div>
                      </div>
                    </div> 
                      <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-3 control-label" for=
                        "description" style="font-size:15px;">Description:</label>

                        <div class="col-md-8"> 
                          <input  id="serv_id" name="serv_id"   type="hidden" value="<?php echo $singleproduct->serv_id; ?>">
                        <textarea class="form-control  " id="description" name="description" cols="1" rows="5" ><?php echo $singleproduct->description; ?>
                        </textarea>
                          
                        </div>
                      </div>
                    </div>


                
              <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-3 control-label" for=
                        "idno"></label>

                        <div class="col-md-8">
                                <button class="btn  btn-primary" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                                <a href="index.php" class="btn  btn-primary" name="back"><span class="fa fa-arrow-left fw-fa"></span> Back</a>
                    </div>
                      </div>
            </div> 
                </div>
                <div class="col-lg-3">
                  <img class="" style="height:400px; margin-left: -250px;" src="<?php echo web_root.'admin/images/2.png' ?>" />
                </div>
              
  
              </div>
 
  
      
<!--/.fluid-container--> 
 </form>