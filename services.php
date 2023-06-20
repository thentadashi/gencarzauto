
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
            <h2 class="title text-center">Services</h2>

            <?php

            $query = "SELECT * FROM `services`";
            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();
           
            foreach ($cur as $result) { 

              ?>
          <form   method="POST" action="">
            <input type="hidden" name="serv_price" value="<?php  echo $result->serv_price; ?>">
            <input type="hidden" name="serv_id" value="<?php  echo $result->serv_id; ?>">
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center" style="height:400px;">
                      <img src="<?php  echo web_root.'admin/services/'. $result->images; ?>" alt="" />
                      <h2>&#8369 <?php  echo number_format($result->serv_price); ?></h2>
                      <p><?php  echo    $result->serv_name; ?></p>
                      <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-calendar-check-o"></i>Book now</button>

                    </div>
                    <div class="product-overlay">




                      <div class="overlay-content" >

                        <div class="productinfo text-center">
                          <?php  if (isset($_SESSION['CUSID'])){  ?>
                           <?php echo ' <a href="'.web_root.'index.php?q=details&serv_id='.$result->serv_id.'">;'?><img src="<?php  echo web_root.'admin/services/'. $result->images; ?>" alt="" /></a>
                         <?php }else{ ?>

                           <?php echo ' <a href="">;'?><img src="<?php  echo web_root.'admin/services/'. $result->images; ?>" alt="" /></a>


                        <?php }?>

                        </div>
                        <h2>&#8369 <?php  echo number_format($result->serv_price); ?></h2>
                        <p style="color:#333;"><?php  echo    $result->serv_name; ?></p>
                        
                        <?php  if (isset($_SESSION['CUSID'])){  ?>
                          <button type="button" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#scheduleModal<?php echo $result->serv_id; ?>"><i class="fa fa-calendar-check-o"></i>Book now</button>
                         <?php }else{ ?>

                          <button type="button" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#smyModal"><i class="fa fa-calendar-check-o"></i>Book now</button>


                        <?php }?>
                      </div>
                    </div>
                </div>

              </div>
            </div>
          </form>
                <!-- Create the modal -->
                <div class="modal fade" id="scheduleModal<?php echo $result->serv_id; ?>" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="padding-bottom:35px;">
                        <h4 class="modal-title" id="scheduleModalLabel">Schedule Details</h4>
                        <button type="button" class="close" style="font-size:25px" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <?php
                        $userID = $_SESSION['CUSID'];
                        $Customer = New Customer();
                        $singlecustomer = $Customer->single_customer($userID);
                      ?>

                      <div class="modal-body">
                        <!-- Schedule form -->
                        <form id="scheduleForm" method="POST" action="customer/controller.php?action=addsched">
                          <div class="text-center">
                          <h5><strong>Service Selected</strong></h5>
                            <h3><strong><?php echo $result->serv_name; ?> <i class="fa fa-tools"></i></strong></h3>
                          </div>
                          <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $singlecustomer->FNAME.' '. $singlecustomer->LNAME; ?>" required>
                          </div>
                          <div class="form-group">
                            <input type="hidden" class="form-control" id="serv_id" name="serv_id" value="<?php echo $result->serv_id; ?>">
                            <input type="hidden" class="form-control" id="serv_name" name="serv_name" value="<?php echo $result->serv_name; ?>">
                            <input type="hidden" class="form-control" id="CUSTOMERID" name="CUSTOMERID" value="<?php echo $singlecustomer->CUSTOMERID; ?>">
                          </div>
                          <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $singlecustomer->EMAILADD; ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $singlecustomer->PHONE; ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $singlecustomer->STREETADD.','.$singlecustomer->BRGYADD.','.$singlecustomer->CITYADD; ?>" required>
                          </div>
                          <div class="form-group">
                            <label for="scheduleDate">Date:</label>
                            <div id="dateError" style="color: red;"></div>
                            <input type="date" class="form-control datepicker" id="scheduleDate" name="scheduleDate" required>
                          </div>
                          <div class="form-group">
                            <label for="scheduleTime">Time:</label>
                            <select class="form-control timepicker" id="scheduleTime" name="scheduleTime" required>
                              <?php
                                // Generate the time options in the desired format
                                $startHour = 8;
                                $endHour = 18;
                                $timeOptions = '';

                                for ($hour = $startHour; $hour < $endHour; $hour++) {
                                  $time = str_pad($hour, 2, '0', STR_PAD_LEFT);
                                  $nextHour = str_pad($hour + 1, 2, '0', STR_PAD_LEFT);

                                  $timeOptions .= '<option value="' . $time . ':00 - ' . $nextHour . ':00">' . date('h:ia', strtotime($time . ':00')) . ' - ' . date('h:ia', strtotime($nextHour . ':00')) . '</option>';
                                }

                                echo $timeOptions;
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="mechanic">Mechanic:</label>
                            <select class="form-control" id="mechanic" name="mechanic" required>
                              <option value="">select mechanic</option>
                              <?php
                                // Fetch mechanics from the database and populate the select options
                                $query = "SELECT * FROM `tbluseraccount` WHERE `U_ROLE` = 'mechanic'";
                                $mydb->setQuery($query);
                                $mechanics = $mydb->loadResultList();

                                foreach ($mechanics as $mechanic) {
                                  echo '<option value="' . $mechanic->USERID . '|' . $mechanic->U_NAME . '">'.$mechanic->U_NAME.'</option>';
                                }
                              ?>
                            </select>
                          </div>
                          <div class="text-right">
                            <a href="index.php?q=services" class="btn btn-default add-to-cart"><i class="fa fa-arrow-left"></i>Close</a>
                            <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-calendar-check-o"></i>Book now</button>
                          </div>
                          <div class="panel-footer">
                            <a href="<?php echo web_root?>"><img src="images/home/NC LOGO.png" alt="" /></a>
                          </div> 
                      </form>
                      </div>
                    </div>
                  </div>
                </div>


       <?php  } ?>
            
          </div><!--features_items--> 
          
          <div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Recommended Services</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $query = "SELECT * FROM services";
            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();

            $counter = 0; // Initialize a counter

            foreach ($cur as $result) {
                // Open a new item div on every third iteration
                if ($counter % 3 == 0) {
                    echo '<div class="item' . ($counter == 0 ? ' active' : '') . '">';
                }
            ?>
            <form method="POST" action="cart/controller.php?action=add">
                <input type="hidden" name="serv_price" value="<?php echo $result->serv_price; ?>">
                <input type="hidden" name="serv_id" value="<?php echo $result->serv_id; ?>">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<?php echo web_root . 'admin/services/' . $result->images; ?>" alt="" />
                                <h2>&#8369 <?php echo number_format($result->serv_price); ?></h2>
                                <p><?php echo $result->serv_name; ?></p>
                                <button type="submit" name="btnorder" class="btn btn-default add-to-cart"><i class="fa fa-calendar-check-o"></i>Book now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
                $counter++; // Increment the counter

                // Close the item div on every third iteration or when it's the last item
                if ($counter % 3 == 0 || $counter == count($cur)) {
                    echo '</div>';
                }
            }
            ?>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div><!--/recommended_items--><!--/recommended_items-->
          
        </div>
      </div>
    </div>
  </section>

          




  <script>
  // Get the current date
  var currentDate = new Date().toISOString().split('T')[0];

  // Add an event listener to the date input
  var dateInput = document.getElementById('scheduleDate');
  dateInput.addEventListener('change', function() {
    var selectedDate = this.value;

    // Compare the selected date with the current date
    if (selectedDate < currentDate) {
      // Display an error message for past dates
      document.getElementById('dateError').textContent = 'Please select a future date.';
      dateInput.setCustomValidity('Please select a future date.');
      dateInput.value = ''; // Clear the input value for past dates
    } else if (selectedDate === currentDate) {
      // Display an error message for current date
      document.getElementById('dateError').textContent = 'Please select a future date, not the current date.';
      dateInput.setCustomValidity('Please select a future date, not the current date.');
      dateInput.value = ''; // Clear the input value for the current date
    } else {
      // Clear the error message
      document.getElementById('dateError').textContent = '';
      dateInput.setCustomValidity('');
    }
  });
</script>