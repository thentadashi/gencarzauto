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
                          <select class="form-control" id="mechanic" name="mechanic" required onchange="generateServiceOptions()">
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
                        <div id="serviceFieldsContainer">
                          <!-- Existing service input field -->
                          <div class="form-group">
                            <label for="service">Service:</label>
                            <input type="text" class="form-control" name="service[]" required>
                          </div>
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