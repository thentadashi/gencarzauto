
    <section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="item active">
                <div class="col-sm-6">
                  <h1 cls="text-success" style="color:#D9602B;"><b>Hatchback Cars</b><br>
                  <h2>Features</h2>
                                <p>
                                The cargo extension is the most distinguished feature of a hatchback. It can be found at the back of the rear seat. 
                                A rear seat’s back can be moved forward to extend the ride’s cargo space. Today’s cargo space features a foldable extension that’s ideally created for maximum storage. 
                                </p>
                  <h4>Services</h4>
                                <a href="#" class="btn btn-primary" style="margin-bottom: 5px;">Oil / Oil filter change </a>
                                <a href="#" class="btn btn-primary"style="margin-bottom: 5px;">Wiper blades replacement </a>
                                <a href="#" class="btn btn-primary"style="margin-bottom: 5px;">Replace air filter</a>
                                <a href="#" class="btn btn-primary"style="margin-bottom: 5px;">Scheduled maintenance</a>
                </div>
                <div class="col-sm-6" style="margin-top:100px;">
                  <img src="images/home/hatch-1.png" class="girl img-responsive" alt="" />
                </div>
              </div>
              <div class="item">
                <div class="col-sm-6">
                    <h1 class="text-primary" style="color:#007bff;"><b>Sedan Cars</b></h1>
                    <h2>Features</h2>
                                <p>
                                    Four doors, two rows of seats, and separate compartments for the passengers, engine, and cargo. Sedans are generally the most fuel-efficient automotive
                                     class that can comfortably accommodate four to five adults, which makes them a popular choice for family cars
                                </p>
                  <h4>Services</h4>
                                <a href="#" class="btn " style="margin-bottom: 5px;background-color:#007bff;color:#f2f2f2;">Oil / Oil filter change </a>
                                <a href="#" class="btn "style="margin-bottom: 5px;background-color:#007bff;color:#f2f2f2;">Wiper blades replacement </a>
                                <a href="#" class="btn "style="margin-bottom: 5px;background-color:#007bff;color:#f2f2f2;">Replace air filter</a>
                                <a href="#" class="btn "style="margin-bottom: 5px;background-color:#007bff;color:#f2f2f2;">Scheduled maintenance</a>
                </div>
                <div class="col-sm-6">
                  <img src="images/home/sedan1.png" class="girl img-responsive" style="margin-top:110px;padding-bottom:93px;" alt="" />
                </div>
              </div>
              
              <div class="item">
                <div class="col-sm-6">
                    <h1 style="color:#111;"><strong>Pick-up Trucks </strong></h1>
                    <h2>Features</h2>
                                <p>
                                a light-duty truck that has an enclosed cabin, and a back end made up of a cargo bed that is enclosed by three low walls with no roof (this cargo bed back end sometimes consists of a tailgate and removable covering)
                              <h4>Services</h4>
                                <a href="#" class="btn " style="margin-bottom: 5px;background-color:#333;color:#f2f2f2;">Oil / Oil filter change </a>
                                <a href="#" class="btn "style="margin-bottom: 5px;background-color:#333;color:#f2f2f2;">Wiper blades replacement </a>
                                <a href="#" class="btn "style="margin-bottom: 5px;background-color:#333;color:#f2f2f2;">Replace air filter</a>
                                <a href="#" class="btn "style="margin-bottom: 5px;background-color:#333;color:#f2f2f2;">Scheduled maintenance</a>
                </div>
                <div class="col-sm-6">
                  <img src="images/home/pickup.png" class="girl img-responsive" style="margin-top:80px;" alt="" />
                </div>
              </div>

              <div class="item">
                <div class="col-sm-6">
                    <h1 style="color:#111;"><strong>SUV Cars</strong></h1>
                    <h2>Features</h2>
                                <p>
                                a fairly loose term but one that generally refers to stylish, sleek looking vehicles that offer elegant city driving but also handle rugged terrain thanks to a typical 4x4 capability. SUVs can come in any size – small, midsize or large.
                              <h4>Services</h4>
                                <a href="#" class="btn " style="margin-bottom: 5px;background-color:#333;color:#f2f2f2;">Oil / Oil filter change </a>
                                <a href="#" class="btn "style="margin-bottom: 5px;background-color:#333;color:#f2f2f2;">Wiper blades replacement </a>
                                <a href="#" class="btn "style="margin-bottom: 5px;background-color:#333;color:#f2f2f2;">Replace air filter</a>
                                <a href="#" class="btn "style="margin-bottom: 5px;background-color:#333;color:#f2f2f2;">Scheduled maintenance</a>
                </div>
                <div class="col-sm-6">
                  <img src="images/home/suv.png" class="girl img-responsive" style="margin-top:55px;" alt="" />
                </div>
              </div>
              
            </div>
            
            <a href="#slider-carousel" class="left control-carousel hidden-xs sel" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs sel" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
          
        </div>
      </div>
    </div>
  </section><!--/slider-->

  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
            <?php include 'sidebar.php'; ?>
        </div>
        
        <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Featured Items</h2>

            <?php

            $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
            WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 ";
            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();
           
            foreach ($cur as $result) { 

              ?>
               <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PRODISPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
            <?php if($result->PROSTATS == "Available"){?>
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center" style="height:400px;">
                      <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                      <h2>&#8369 <?php  echo number_format($result->PRODISPRICE, 2, '.', ','); ?></h2>
                      <p><?php  echo    $result->OWNERNAME; ?></p>
                      <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>

                    </div>
                    <div class="product-overlay">




                      <div class="overlay-content" >

                        <div class="productinfo text-center">
                          <?php  if (isset($_SESSION['CUSID'])){  ?>
                           <?php echo ' <a href="'.web_root.'index.php?q=details&proid='.$result->PROID.'">;'?><img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" /></a>
                         <?php }else{ ?>

                           <?php echo ' <a href="">;'?><img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" /></a>


                        <?php }?>

                        </div>
                        <h2>&#8369 <?php  echo number_format($result->PRODISPRICE, 2, '.', ','); ?></h2>
                        <p style="color:#333;"><?php  echo    $result->OWNERNAME; ?></p>

                       <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                      </div>
                    </div>
                </div>

                                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                    <li>
                              <?php     
                            if (isset($_SESSION['CUSID'])){  

                              echo ' <a href="'.web_root. 'customer/controller.php?action=addwish&proid='.$result->PROID.'" title="Add to wishlist"><i class="fa fa-plus-square"></i>Add to wishlist</a></a>
                            ';

                             }else{
                               echo   '<a href="#" title="Add to wishlist" class="proid"  data-target="#smyModal" data-toggle="modal" data-id="'.  $result->PROID.'"><i class="fa fa-plus-square"></i>Add to wishlist</a></a>
                            ';
                            }  
                            ?>

                    </li> 
                  </ul>
                </div>
              </div>
            </div>
            <?php } ?>
          </form>
       <?php  } ?>
            
          </div><!--features_items--> 
          
          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>
            
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active"> 
                         <?php 
                    $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                    WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 limit 3 ";
                    $mydb->setQuery($query);
                    $cur = $mydb->loadResultList();
                   
                    foreach ($cur as $result) { 
                  ?>
                      <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
                  <div class="col-sm-4" >
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                      <h2>&#8369 <?php  echo number_format($result->PRODISPRICE); ?></h2>
                          <p><?php  echo    $result->OWNERNAME; ?></p>
                           <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </form>
                  <?php } ?>
                </div>
                <div class="item">  
                  <?php 
                    $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                    WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 limit 3,3";
                    $mydb->setQuery($query);
                    $cur = $mydb->loadResultList();
                   
                    foreach ($cur as $result) { 
                  ?>
                      <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                          <h2>&#8369 <?php  echo $result->PRODISPRICE; ?></h2>
                          <p><?php  echo    $result->OWNERNAME; ?></p>
                           <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </form>
                  <?php } ?>
                </div>
                <div class="item">  
                  <?php 
                    $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                    WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  AND PROQTY>0 limit 6,9";
                    $mydb->setQuery($query);
                    $cur = $mydb->loadResultList();
                   
                    foreach ($cur as $result) { 
                  ?>
                      <form   method="POST" action="cart/controller.php?action=add">
            <input type="hidden" name="PROPRICE" value="<?php  echo $result->PROPRICE; ?>">
            <input type="hidden" id="PROQTY" name="PROQTY" value="<?php  echo $result->PROQTY; ?>">

            <input type="hidden" name="PROID" value="<?php  echo $result->PROID; ?>">
                  <div class="col-sm-4">
                    <div class="product-image-wrapper">
                      <div class="single-products">
                        <div class="productinfo text-center">
                          <img src="<?php  echo web_root.'admin/products/'. $result->IMAGES; ?>" alt="" />
                          <h2>&#8369 <?php  echo $result->PRODISPRICE; ?></h2>
                          <p><?php  echo    $result->OWNERNAME; ?></p>
                           <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </form>
                  <?php } ?>
                </div>
              </div>
               <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>      
            </div>
          </div><!--/recommended_items-->
          
        </div>
      </div>
    </div>
  </section>