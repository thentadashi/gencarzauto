<section id="cart_items">
    <div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Shopping Cart</li>
        </ol>
      </div>
      <div class="table-responsive cart_info"> 
        <?php  

  // if (!isset($_SESSION['USERID'])){
  //     redirect("index.php"); 
check_message();  
 
?>
            
                         <table  class="table table-condensed" id="table" >
                         <thead> 
                          <tr class="cart_menu"> 
                             <td  >Product</td>
                             <td width="15%"><span style="margin-left: 25px">Action</span></td>
                             <td >Product name</td>
                             <td  width="15%" >Price</td>
                             <td  width="20%" >Quantity</td> 
                             <td  width="15%" >Total</td>  
                          </tr>
                         </thead>  
                          
                             <?php



                              if (!empty($_SESSION['gcCart'])){ 

                                echo '<script>totalprice()</script>';

                                  $count_cart = count($_SESSION['gcCart']);

                                for ($i=0; $i < $count_cart  ; $i++) { 
 
                                       $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                                                 WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  and p.`PROID` = '".@$_SESSION['gcCart'][$i]['productid']."'";
                                       $mydb->setQuery($query);
                                      $cur = $mydb->loadResultList();
                                
                                
                                 foreach ($cur as $result) {

                                ?>
                                <tr>
                                  <td>  
                                    <img src="<?php echo web_root. 'admin/products/'.$result->IMAGES; ?>"  onload="  totalprice() " width="50px" height="50px"> 
                                  <br/> 
                                 </td>
                                 <td>
                                   
                                        <?php    
                                          
                                              
                                            if (isset($_SESSION['CUSID'])){  

                                              echo ' <a href="'.web_root. 'customer/controller.php?action=addwish&proid='.$result->PROID.'" class="btn btn-default check_out"  title="Add to wishlist">Add to wishlist</a>
             ';
                                           
                                             }else{
                                               echo   '<a href="#"  class="btn btn-default check_out" title="Add to wishlist" class="proid"  data-target="#smyModal" data-toggle="modal" data-id="'.  $result->PROID.'">Add to wishlist</a>
             ';
                                            } 
                                  



                                          ?>





                                 </td>
                                  <td>  
                                    <?php echo  $result->OWNERNAME ; ?>
                                  </td>
                                  <td>
                                    <input type="hidden"    id ="PROPRICE<?php echo $result->PROID;  ?>" name="PROPRICE<?php echo $result->PROID; ?>" value="<?php echo  $result->PRODISPRICE ; ?>" >
                                     
                                  &#8369  <?php echo  number_format($result->PRODISPRICE, 2,'.',',') ; ?>
                                  </td>
                                  <td class="input-group custom-search-form" >
                                       <input type="hidden" maxlength="3" class="form-control input-sm"  autocomplete="off"  id ="ORIGQTY<?php echo $result->PROID;  ?>" name="ORIGQTY<?php echo $result->PROID; ?>" value="<?php echo $result->PROQTY; ?>"   placeholder="Search for...">
                                        
                                        <input type="number" style="margin-top:10px;" maxlength="3" data-id="<?php echo $result->PROID;  ?>" class="QTY form-control input-sm"  autocomplete="off"  id ="QTY<?php echo $result->PROID;  ?>" name="QTY<?php echo $result->PROID; ?>" value="<?php echo $_SESSION['gcCart'][$i]['qty']; ?>"   placeholder="Search for...">
                                        <span class="input-group-btn">
                                                <a title="Remove Item" style="margin-top:10px;" class="btn btn-danger btn-sm" id="btnsearch" name="btnsearch" href="cart/controller.php?action=delete&id=<?php echo $result->PROID; ?>">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </span>
                                       
                                        </td>
                                      
                                        <input type="hidden"    id ="TOT<?php echo $result->PROID;  ?>" name="TOT<?php echo $result->PROID; ?>" value="<?php echo  $result->PRODISPRICE ; ?>" >
                                   
                                        <td>
                                        &#8369
                                          <output style="margin-left:15px;margin-top:-27px" id="Osubtot<?php echo $result->PROID ?>">
                                            <?php echo number_format($_SESSION['gcCart'][$i]['price'], 2, '.', ','); ?>
                                          </output>
                                        </td>
                                </tr>
         
                            <?php  
                                 }
                               }
                               }else{ 
                                  echo "<h1>There is no item in the cart.</h1>";
                               } 
                            ?>  
                                
                      </table> 

                                <hr>
                                <div style="background-color:#f2f2f2;color:#111;">
                                  <div class="panel-footer">
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <a href="<?php echo web_root?>"><img src="images/home/NC LOGO.png" alt="" /></a>
                                      </div>
                                      <div class="col-lg-6">
                                        <h4 align="right" style="padding-right:80px;margin-right:35px;padding-top:20px;">Total</h4>
                                        <h4 align="right" style="padding:20px;margin-right:35px;padding-top:10px;">&#8369; <span id="sum">0</span></h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        
    </div>
  </div>  
 
</section>
<section id="do_action">
    <div class="container">
      <div class="heading">
        <h3>What would you like to do next?</h3>
        <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
      </div>
      <div class="row">
     <form action="index.php?q=orderdetails" method="post">
   <a href="index.php?q=product" class="btn btn-default check_out pull-left ">
   <i class="fa fa-arrow-left fa-fw"></i>
   Add New Order
   </a>

     <?php    
  
                     $countcart =isset($_SESSION['gcCart'])? count($_SESSION['gcCart']) : "0";
                   if ($countcart > 0){
  
                  if (isset($_SESSION['CUSID'])){  
               
                    echo '<button type="submit"  name="proceed" id="proceed" class="btn btn-default check_out btn-pup pull-right">
                            Proceed And Checkout
                            <i class="fa  fa-arrow-right fa-fw"></i>
                            </button>';
                 
                   }else{
                     echo   '<a data-target="#smyModal" data-toggle="modal" class="btn btn-default check_out signup pull-right" href="">
                              Proceed And Checkout
                              <i class="fa  fa-arrow-right fa-fw"></i>
                              </a>';
                  } 
                }



                ?>
 </form>
      </div>
    </div>
  </section><!--/#do_action-->