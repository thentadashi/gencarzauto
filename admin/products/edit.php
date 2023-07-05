<?php  

    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }


  $PROID = $_GET['id'];
  $product = New Product();
  $singleproduct = $product->single_product($PROID);

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
                        "OWNERNAME" style="font-size:15px;">Product name:</label>

                        <div class="col-md-8">
                              <input class="form-control input-sm" id="OWNERNAME" name="OWNERNAME" placeholder=
                              "Owner Name" type="text" value="<?php echo $singleproduct->OWNERNAME; ?>">
                        </div>
                      </div>
                    </div>  

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-3 control-label" for=
                        "brand" style="font-size:15px;">Brand name:</label>

                        <div class="col-md-8">
                              <input class="form-control input-sm" id="brand" name="brand" placeholder=
                              "Phone Number" type="text" value="<?php echo $singleproduct->brand; ?>">
                        </div>
                      </div>
                    </div> 
                      <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-3 control-label" for=
                        "PRODESC" style="font-size:15px;">Description:</label>

                        <div class="col-md-8"> 
                          <input  id="PROID" name="PROID"   type="hidden" value="<?php echo $singleproduct->PROID; ?>">
                        <textarea class="form-control input-sm" id="PRODESC" name="PRODESC" cols="1" rows="5" ><?php echo $singleproduct->PRODESC; ?>
                        </textarea>
                          
                        </div>
                      </div>
                    </div>
                  

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-3 control-label" for=
                        "CATEGORY" style="font-size:15px;">Category:</label>

                        <div class="col-md-8">
                        <select class="form-control input-sm" name="CATEGORY" id="CATEGORY">
                            <option value="None">Select Category</option>
                            <?php
                              //Statement

                          $category = New Category();
                            $singlecategory = $category->single_category($singleproduct->CATEGID);
                            echo  '<option SELECTED  value='.$singlecategory->CATEGID.' >'.$singlecategory->CATEGORIES.'</option>';


                            $mydb->setQuery("SELECT * FROM `tblcategory` where CATEGID <> '".$singlecategory->CATEGID."'");
                            $cur = $mydb->loadResultList();
                          foreach ($cur as $result) {
                            echo  '<option  value='.$result->CATEGID.' >'.$result->CATEGORIES.'</option>';
                            }
                            ?>
            
                          </select> 
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-3 control-label" for=
                        "ORIGINALPRICE" style="font-size:15px;">Original Price:</label>

                        <div class="col-md-3">
                          <input class="form-control input-sm" id="ORIGINALPRICE" name="ORIGINALPRICE" placeholder=
                              "Original Price" type="number" value="<?php echo $singleproduct->ORIGINALPRICE; ?>">
                        </div>
                        <label class="col-md-2 control-label" for=
                        "PROPRICE" style="font-size:15px;">Price:</label>

                        <div class="col-md-3">
                          <input class="form-control input-sm" id="PROPRICE" name="PROPRICE" placeholder=
                              "Price" type="number" step="any" value="<?php echo $singleproduct->PROPRICE; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-3 control-label" for="PROQTY" style="font-size: 15px;">Quantity:</label>
                        <div class="col-md-5">
                          <div class="input-group">
                            <input class="form-control input-sm" id="PROQTY" name="PROQTY" placeholder="Quantity" type="number" value="<?php echo $singleproduct->PROQTY; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="input-group">
                            <div style="margin-left: -50px;">
                              <span class="input-group-btn">
                                  <button class="btn btn-primary btn-sm" id="changeQuantityBtn" type="button" data-toggle="modal" data-target="#quantityModal">Set quantity</button>
                                </span>
                            </div>
                            <span class="input-group-btn">
                              <button class="btn btn-primary btn-sm" id="performCalculationBtn" type="button" data-toggle="modal" data-target="#calculationModal">Increse/Decrease</button>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>

<!-- Rest of the code remains the same -->


                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-3 control-label" for=
                      "ALERT"  style="font-size:15px;">Stock Alert:</label>

                      <div class="col-md-8">
                         <input class="form-control input" id="ALERT" name="ALERT" placeholder=
                            "Stock alert qty" type="number" value="<?php echo $singleproduct->ALERT; ?>">
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

