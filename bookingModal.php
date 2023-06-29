<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document" style="width:1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookingModalLabel">Book Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2 class="title text-center">Booked Services</h2>
        <table id="bookedServicesTable" class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Service</th>
              <th>Type</th>
              <th>Date</th>
              <th>Time</th>
              <th>Mechanic</th>
              <th>Price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- The booked services will be dynamically added here -->
          </tbody>
        </table>
        <form id="bookingForm">
          <div class="form-group">
            <label for="serviceName">Service type <code style="color:red;">*</code></label>
            <input type="text" class="form-control" id="serviceName" name="serviceName" disabled required>
            <input type="hidden" id="serviceId">
            <input type="hidden" id="customerId" value="<?php echo $_SESSION['CUSID']?>">
            <input type="hidden" id="userid">
          </div>
          <div class="form-group">
            <label for="carType">Car Type <code style="color:red;">*</code></label>
            <select class="form-control" id="carType" required>
              <option value="">Select your car type</option>
              <option value="ctype_a"  data-service-id="1">Car Type 1 (Sedan / Hatchback / Coupe)</option>
              <option value="ctype_b"  data-service-id="2">Car Type 2 (SUV / MiniSuv / Crossover)</option>
              <option value="ctype_c"  data-service-id="3">Car Type 3 (Pick-up Truck / MPV / Truck)</option>
              <!-- Add more car types as needed -->
            </select>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" disabled required>
          </div>
          <div class="form-group">
            <label for="scheduleDate">Date<code style="color:red;">*</code></label>
            <div id="dateError" style="color: red;"></div>
            <input type="date" class="form-control datepicker" id="scheduleDate" name="scheduleDate" required>
          </div>
          <div class="form-group">
              <label for="time">Time <code style="color:red;">*</code></label>
              <select class="form-control timepicker" id="time" name="time" required>
                <option value="">Select Arival time</option>
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
                          <label for="mechanic">Mechanic <code style="color:red;">*</code></label>
                          <select class="form-control" id="mechanic" name="mechanic" required onchange="generateServiceOptions()">
                            <option value="">select mechanic</option>
                            <?php
                              // Fetch mechanics from the database and populate the select options
                              $query = "SELECT * FROM `tbluseraccount` WHERE `U_ROLE` = 'mechanic'";
                              $mydb->setQuery($query);
                              $mechanics = $mydb->loadResultList();

                              foreach ($mechanics as $mechanic) {
                                echo '<option value="' .$mechanic->USERID.' '.$mechanic->U_NAME.'">'.$mechanic->U_NAME.'</option>';
                              }
                            ?>
                          </select>
                        </div>
        </form>
        <div class="text-center">
          <button type="button" class="btn btn-success" style="display: block;" id="submitBooking" onclick="submitBooking()">Add Service</button>
          <button type="button" class="btn btn-success" style="display: none;" id="submitBooking2" onclick="submitBooking2()">Add more Service</button>
        </div>
        <div class="text-center">
          <button type="button" class="btn btn-primary" onclick="processBooking()">Process Booking</button>
        </div>
      </div>
    </div>
  </div>
</div>

