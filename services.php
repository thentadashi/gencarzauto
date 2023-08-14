<section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="item active">
                <div class="col-sm-12" style="margin:0px;margin-left:-50px">
                  <img src="images/home/P2.JPG" class="girl img-responsive" alt="" />
                </div>
              </div>
              <div class="item">
              <div class="col-sm-12" style="margin:0px;margin-left:-50px">
                  <img src="images/home/P1.JPG" class="girl img-responsive" alt="" />
                </div>
              </div>
              <div class="item">
              <div class="col-sm-12" style="margin:0px;margin-left:-50px">
                  <img src="images/home/P3.JPG" class="girl img-responsive" alt="" />
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
                           <?php echo ' <a href="'.web_root.'index.php?q=details&serv_id='.$result->serv_id.'&service='.$result->serv_name.'">;'?><img src="<?php  echo web_root.'admin/services/'. $result->images; ?>" alt="" /></a>
                         <?php }else{ ?>

                           <?php echo ' <a href="">;'?><img src="<?php  echo web_root.'admin/services/'. $result->images; ?>" alt="" /></a>


                        <?php }?>

                        </div>
                        <h2>&#8369 <?php  echo number_format($result->serv_price); ?></h2>
                        <p style="color:#333;"><?php  echo    $result->serv_name; ?></p>
                        
                        <?php  if (isset($_SESSION['CUSID'])){  ?>
                          <button type="button" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#bookingModal" 
                            data-serv-id="<?php echo $result->serv_id; ?>"
                            data-serv-name="<?php echo $result->serv_name; ?>"
                            data-serv-price="<?php echo $result->serv_price; ?>"
                            onclick="openBookingModal(this.getAttribute('data-serv-id'), this.getAttribute('data-serv-name'), this.getAttribute('data-serv-price'))"
                          >
                            <i class="fa fa-calendar-check-o"></i> Book now
                          </button>
                         <?php }else{ ?>

                          <button type="button" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#smyModal"><i class="fa fa-calendar-check-o"></i>Book now</button>


                        <?php }?>
                      </div>
                    </div>
                </div>

              </div>
            </div>
          </form>
               <?php include('bookingModal.php');?>
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

<!-- error modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document" style="display: flex; align-items: center; justify-content: center;margin-top:200px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="color:red"><i class="bi bi-emoji-expressionless-fill"></i> Please fill in all the required fields.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="errorModal2" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document" style="display: flex; align-items: center; justify-content: center;margin-top:200px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="color:red"><i class="bi bi-emoji-expressionless-fill"></i> Please book any of our services before processing the schedule</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="errorModal3" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document" style="display: flex; align-items: center; justify-content: center;margin-top:200px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Data Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="color:red"><i class="bi bi-emoji-expressionless-fill"></i>Error: Seems like you placed that exact <strong>service</strong>, <strong>type of car</strong> on the same <strong>Date!</strong> </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="bookinStatus" class="modal">
  <div class="modal-dialog" style="display: flex; align-items: center; justify-content: center;margin-top:200px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Booking Processing Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="modalMessage"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="refreshPage()">Close</button>
      </div>
    </div>
  </div>
</div>


  </section>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-KyZXEAg3QhqLMpG8r+Y9j4IkMZU2KiNyz32aLpA7x2g=" crossorigin="anonymous"></script>

  <script>
  function refreshPage() {
    location.reload(); // Reload the current page
    }
</script>


  <script>
  // Get the current date
  var currentDate = new Date().toISOString().split('T')[0];

  // Add an event listener to the date input
  var dateInput = document.getElementById('scheduleDate');
  dateInput.addEventListener('change', function() {
    var selectedDate = this.value;
    var selectedDay = new Date(selectedDate).getDay(); // Get the day of the week (0-6, where 0 is Sunday)

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
    } else if (selectedDay === 0) { // Sunday
      // Display an error message for Sundays
      document.getElementById('dateError').textContent = 'Please select a date other than Sunday Because the shop is close every Sunday.';
      dateInput.setCustomValidity('Please select a date other than Sunday.');
      dateInput.value = ''; // Clear the input value for Sundays
    } else {
      // Clear the error message
      document.getElementById('dateError').textContent = '';
      dateInput.setCustomValidity('');
    }
  });
</script>





<script>
function openBookingModal(serviceId, serviceName, servicePrice) {
  document.getElementById('serviceId').value = serviceId;
  document.getElementById('serviceName').value = serviceName;
  document.getElementById('carType').value = '';
}


function submitBooking() {
  
  // Retrieve the data from the form
  var serviceName = document.getElementById('serviceName').value;
  var carType = document.getElementById('carType').value;
  var price = document.getElementById('price').value;
  var date = document.getElementById('scheduleDate').value;
  var time = document.getElementById('time').value;
  var sid = document.getElementById('serviceId').value;
  var mechanic = document.getElementById('mechanic').value;
  var mechanicArray = mechanic.split(' ');

  var mechID = mechanicArray[0];
  var mechName = mechanicArray[1];

  var userid = document.getElementById('userid').value = mechID;

  if (!serviceName || !carType || !date || !time || !mechanic) {
      $('#errorModal').modal('show');
    return;
  }

    var tableBody = document.getElementById('bookedServicesTable').getElementsByTagName('tbody')[0];

    var existingRows = tableBody.getElementsByTagName('tr');
    for (var i = 0; i < existingRows.length; i++) {
      var row = existingRows[i];
      var existingServiceCell = row.cells[1].textContent;
      var existingCarTypeCell = row.cells[2].textContent;

      if (existingServiceCell === serviceName && existingCarTypeCell === carType) {
        $('#errorModal3').modal('show');
        return;
      }
    }
  // Example: Create a new row in the booked services table
  var table = document.getElementById('bookedServicesTable').getElementsByTagName('tbody')[0];
  var row = table.insertRow();
  var serviceId = row.insertCell(0);
  var serviceCell = row.insertCell(1);
  var carTypeCell = row.insertCell(2);
  var dateCell = row.insertCell(3);
  var timeCell = row.insertCell(4);
  var mechanicCell = row.insertCell(5);
  var priceCell = row.insertCell(6);
  var actionsCell = row.insertCell(7);

  serviceId.textContent = sid;
  serviceCell.textContent = serviceName;
  carTypeCell.textContent = carType;
  dateCell.textContent = date;
  timeCell.textContent = time;
  mechanicCell.textContent = mechName;
  priceCell.textContent = price;
  actionsCell.innerHTML = '<button type="button" class="btn btn-danger remove-button" onclick="removeBooking(this)">Remove</button>';


  // Clear the form inputs
  document.getElementById('serviceName').value = '';
  document.getElementById('carType').value = '';
  document.getElementById('scheduleDate').value = date;
  document.getElementById('scheduleDate').disabled = true;
  document.getElementById('time').value = time;
  document.getElementById('time').disabled = true;
  document.getElementById('mechanic').value = mechanic;
  document.getElementById('mechanic').disabled = true;

  var submitButton2 = document.getElementById("submitBooking2");
  var submitButton = document.getElementById("submitBooking");
  submitButton.style.display = "block";

}

// //add more booking
// function submitBooking2() {
//     // Close the modal
//     var submitButton2 = document.getElementById("submitBooking2");
//     var submitButton = document.getElementById("submitBooking");
//     submitButton2.style.display = "none";
//     submitButton.style.display = "block";
// }


//remove button
document.addEventListener('click', function(event) {
  var target = event.target;
  if (target.classList.contains('remove-button')) {
    removeBooking(target);
  }
});

function removeBooking(button) {
  var row = button.closest('tr');
  row.remove();
  clearFormInputs(); // Clear the form inputs and reset the form
}


function clearFormInputs() {
  document.getElementById('serviceName').value = '';
  document.getElementById('carType').value = '';
  document.getElementById('scheduleDate').value = date;
  document.getElementById('scheduleDate').disabled = true;
  document.getElementById('time').value = time;
  document.getElementById('time').disabled = true;
  document.getElementById('mechanic').value = mechanic;
  document.getElementById('mechanic').disabled = true;e;

  var submitButton2 = document.getElementById("submitBooking2");
  var submitButton = document.getElementById("submitBooking");
  submitButton2.style.display = "none";
  submitButton.style.display = "block";
}



  function processBooking() {
  // Get the table body element
  var tableBody = document.getElementById('bookedServicesTable').getElementsByTagName('tbody')[0];
  var customerId = document.getElementById('customerId').value;
  var userid = document.getElementById('userid').value;

  // Retrieve the data from the table rows
  var rows = tableBody.getElementsByTagName('tr');
  var bookingData = [];

  for (var i = 0; i < rows.length; i++) {
    var row = rows[i];
    var Id = row.cells[0].textContent;
    var Service = row.cells[1].textContent;
    var carType = row.cells[2].textContent;
    var date = row.cells[3].textContent;
    var time = row.cells[4].textContent;
    var mechanic = row.cells[5].textContent;
    var price = row.cells[6].textContent;

    bookingData.push({
      serv_id: Id,
      serv_name: Service,
      carType: carType,
      date: date,
      time: time,
      mechanic: mechanic,
      price: price
    });
  }


  if (bookingData.length === 0 || !customerId) {
    // Display an error modal
    $('#errorModal2').modal('show');
    return; // Stop further execution
  }

  // Log the data in the console
  console.log("Booking Data:", {
    bookings: bookingData,
    CUID: customerId,
    USERID: userid
  });

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'process_booking.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the response from the server
      console.log(xhr.responseText); // Log the response for debugging
      try {
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
          var tableBody = document.getElementById('bookedServicesTable').getElementsByTagName('tbody')[0];
          // Clear the table body content
          tableBody.innerHTML = '';
          // Booking processed successfully
          // Display a success message in the modal
          var modalMessage = document.getElementById('modalMessage');
          modalMessage.innerHTML = 'Booking processed successfully.';
          // Show the modal
          $('#bookinStatus').modal('show');
          $('#bookingModal').modal('hide');
        } else {
          // Booking processing failed
          // Display an error message in the modal
          var modalMessage = document.getElementById('modalMessage');
          modalMessage.innerHTML = 'Booking processing failed. ' + response.message;
          modalMessage.classList.add('error-message');
          $('#bookinStatus').modal('show');
        }
      } catch (error) {
        console.error(error); // Log any JSON parsing errors
      }
    }
  };

  // Set the data to be sent to the server
  var data = 'bookings=' + JSON.stringify(bookingData) + '&customerId=' + encodeURIComponent(customerId) + '&USERID=' + encodeURIComponent(userid);
  xhr.send(data);
}


</script>












<script>
document.addEventListener('DOMContentLoaded', function() {
  var carTypeSelect = document.getElementById('carType');
  carTypeSelect.addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var selectedCarType = selectedOption.value;
    var serviceIdInput = document.getElementById('serviceId').value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          var response = xhr.responseText;
          var priceElement = document.getElementById('price');
          response = response.replace(/"/g, '');

          // Format the response as a Philippine peso amount
          var formattedPrice = '₱' + parseFloat(response).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

          // Set the formatted price as the value of the price element
          priceElement.value = formattedPrice;
          
          // Log the response data
          console.log(response);
        } else {
          var priceElement = document.getElementById('price');
          priceElement.textContent = 'Failed to retrieve price from the server.';
        }
      }
    };

    
    xhr.open('POST', 'retrieve_price.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    console.log(selectedCarType, serviceIdInput);
    xhr.send('carType=' + encodeURIComponent(selectedCarType) + '&serviceId=' + encodeURIComponent(serviceIdInput));
  });
});
</script>


