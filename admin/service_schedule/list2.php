<div class="table-responsive">
  <?php
  if (!isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
  }
  $mech = $_SESSION['USERID'];
  check_message();
  ?>

<?php
$query = "SELECT * FROM tblschedule WHERE remarks = 'Requested' and USERID ='$mech'";
$mydb->setQuery($query);
$cur = $mydb->executeQuery();

if ($cur === false) {
    // Handle query execution error
    $error = mysqli_error($mydb->getConnection()); // Get the specific error message
    // Handle or display the error as needed
    echo "Query execution error: " . $error;
} else {
    $rowscount = $mydb->num_rows($cur);
    $res = isset($rowscount) ? $rowscount : 0;

    if ($res > 0) {
        $Requested = '<span style="color:red;">(' . $res . ')</span>';
    } else {
        $Requested = '<span> (' . $res . ')</span>';
    }
}

$query = "SELECT * FROM tblschedule WHERE remarks = 'Ongoing' and USERID ='$mech'";
$mydb->setQuery($query);
$cur = $mydb->executeQuery();

if ($cur === false) {
    // Handle query execution error
    $error = mysqli_error($mydb->getConnection()); // Get the specific error message
    // Handle or display the error as needed
    echo "Query execution error: " . $error;
} else {
    $rowscount = $mydb->num_rows($cur);
    $res = isset($rowscount) ? $rowscount : 0;

    if ($res > 0) {
        $Ongoing = '<span style="color:red;">(' . $res . ')</span>';
    } else {
        $Ongoing = '<span> (' . $res . ')</span>';
    }
}

$query = "SELECT * FROM tblschedule WHERE remarks = 'Done' and USERID ='$mech'";
$mydb->setQuery($query);
$cur = $mydb->executeQuery();

if ($cur === false) {
    // Handle query execution error
    $error = mysqli_error($mydb->getConnection()); // Get the specific error message
    // Handle or display the error as needed
    echo "Query execution error: " . $error;
} else {
    $rowscount = $mydb->num_rows($cur);
    $res = isset($rowscount) ? $rowscount : 0;

    if ($res > 0) {
        $Done = '<span style="color:red;">(' . $res . ')</span>';
    } else {
        $Done = '<span> (' . $res . ')</span>';
    }
}

$query = "SELECT * FROM tblschedule WHERE remarks = 'Cancelled' and USERID ='$mech'";
$mydb->setQuery($query);
$cur = $mydb->executeQuery();

if ($cur === false) {
    // Handle query execution error
    $error = mysqli_error($mydb->getConnection()); // Get the specific error message
    // Handle or display the error as needed
    echo "Query execution error: " . $error;
} else {
    $rowscount = $mydb->num_rows($cur);
    $res = isset($rowscount) ? $rowscount : 0;

    if ($res > 0) {
        $Cancelled = '<span style="color:red;">(' . $res . ')</span>';
    } else {
        $Cancelled = '<span> (' . $res . ')</span>';
    }
}

$query = "SELECT * FROM tblschedule WHERE remarks = 'Pending' and USERID ='$mech'";
$mydb->setQuery($query);
$cur = $mydb->executeQuery();

if ($cur === false) {
    // Handle query execution error
    $error = mysqli_error($mydb->getConnection()); // Get the specific error message
    // Handle or display the error as needed
    echo "Query execution error: " . $error;
} else {
    $rowscount = $mydb->num_rows($cur);
    $res = isset($rowscount) ? $rowscount : 0;

    if ($res > 0) {
        $Pending = '<span style="color:red;">(' . $res . ')</span>';
    } else {
        $Pending = '<span> (' . $res . ')</span>';
    }
}

$query = "SELECT * FROM tblschedule WHERE remarks = 'Confirmed' and USERID ='$mech'";
$mydb->setQuery($query);
$cur = $mydb->executeQuery();

if ($cur === false) {
    // Handle query execution error
    $error = mysqli_error($mydb->getConnection()); // Get the specific error message
    // Handle or display the error as needed
    echo "Query execution error: " . $error;
} else {
    $rowscount = $mydb->num_rows($cur);
    $res = isset($rowscount) ? $rowscount : 0;

    if ($res > 0) {
        $Confirmed = '<span style="color:red;">(' . $res . ')</span>';
    } else {
        $Confirmed = '<span> (' . $res . ')</span>';
    }
}

$query = "SELECT * FROM tblschedule WHERE remarks = 'Inactive' and USERID ='$mech'";
$mydb->setQuery($query);
$cur = $mydb->executeQuery();

if ($cur === false) {
    // Handle query execution error
    $error = mysqli_error($mydb->getConnection()); // Get the specific error message
    // Handle or display the error as needed
    echo "Query execution error: " . $error;
} else {
    $rowscount = $mydb->num_rows($cur);
    $res = isset($rowscount) ? $rowscount : 0;

    if ($res > 0) {
        $inc = '<span style="color:red;">(' . $res . ')</span>';
    } else {
        $inc = '<span> (' . $res . ')</span>';
    }
}
?>


  <div class="row" width="100%">
    <div class="col-lg-3">
      <h3 class="page-header"><b>List of Scheduled Services</b></h3>
    </div>
    <div class="col-lg-9" style="margin-top:60px">
      <div>
        <button id="btnAllSched" class="btn"><strong>All</strong></button>
        <button id="btnPendingSched" class="btn"><strong>Pending <?php echo $Pending;?></strong></button>
		    <button id="btnConfirmSched" class="btn"><strong>Confirmed <?php echo $Confirmed;?></strong></button>
		    <button id="btnOngoing" class="btn"><strong>Ongoing <?php echo $Ongoing;?></strong></button>
        <button id="btnDoneSched" class="btn"><strong>Completed <?php echo $Done;?></strong></button> 
        <button id="btnCancelledSched" class="btn"><strong>Cancelled <?php echo $Cancelled;?></strong></button>
        <button id="btnreqSched" class="btn"><strong>Requested <?php echo $Requested;?></strong></button>
        <button id="btnInactiveSched" class="btn"><strong>Inactive <?php echo $inc;?></strong></button>
      </div>
    </div>
  </div>

  <form action="controller.php?action=delete" Method="POST">
    <div class="table-responsive">
      <table id="example" class="table table-striped" width="100%" style="font-size:18px" cellspacing="0">
        <thead>
          <tr>
            <th width="1%">#</th>
            <th width="5%">Sched #</th>
            <th width="15%">Customer</th>
            <th width="15%">time</th>
            <th width="15%">Date</th>
            <th width="15%">Est. Price</th>
            <th width="15%">Mechanic</th>
            <th width="15%">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM `tblschedule` s
          INNER JOIN `tblcustomer` c ON s.`CUSTOMERID` = c.`CUSTOMERID` WHERE USERID = '$mech'
          ORDER BY `sched_id` DESC";
          $mydb->setQuery($query);
          $cur = $mydb->loadResultList();
          foreach ($cur as $result) {

            $timeRange = $result->time; // Assuming $result->date contains the time range in the format "hh:mm - hh:mm"

                                                // Split the time range into start and end times
            $times = explode(" - ", $timeRange);
            $startTime = $times[0];
            $endTime = $times[1];
                                                
                                                // Convert the start time to AM/PM format
            $startTimeParts = explode(":", $startTime);
            $startHour = intval($startTimeParts[0]);
            $startMinute = intval($startTimeParts[1]);
            $startPeriod = ($startHour < 12) ? "AM" : "PM";
            $startHour = ($startHour > 12) ? ($startHour - 12) : $startHour;
            $startTimeAMPM = $startHour . ":" . sprintf("%02d", $startMinute) . " " . $startPeriod;
                                                
                                                // Convert the end time to AM/PM format
            $endTimeParts = explode(":", $endTime);
            $endHour = intval($endTimeParts[0]);
            $endMinute = intval($endTimeParts[1]);
            $endPeriod = ($endHour < 12) ? "AM" : "PM";
            $endHour = ($endHour > 12) ? ($endHour - 12) : $endHour;
            $endTimeAMPM = $endHour . ":" . sprintf("%02d", $endMinute) . " " . $endPeriod;
                                                
                                                // Concatenate the formatted start and end times
            $formattedTimeRange = $startTimeAMPM . " - " . $endTimeAMPM;

            
            echo '<tr class="order-row" data-status="' . $result->remarks . '">';

            echo '<td width="3%" align="center">
                    </td>';

            echo '<td>
            <a href="#" style="color:#6c7293" title="View list Of ordered" data-target="#myModal2" data-toggle="modal" class="sched" data-id="'.$result->sched_id.'">'.$result->sched_id.'</a>
                  </td>';

            echo '<td>
                    <a href="index.php?view=customerdetails&customerid='.$result->CUSTOMERID.'" style="color:#6c7293" title="View customer information">'.$result->FNAME.' '.$result->LNAME.'</a>
                  </td>';

            echo '<td>
                  '.$formattedTimeRange.'
                </td>';

            echo '<td>
                    '. date_format(date_create($result->date),"M/d/Y").'
                  </td>';

            echo '<td>
                    &#8369;'.number_format($result->price, 2).'
                  </td>';

            echo '<td>
                    '.$result->mech_name.'
                  </td>';

                  if ($result->remarks == 'Requested') { echo '<td>
                    <a href="#" style="color:#6c7293" data-toggle="modal" data-target="#mee" data-message="'.$result->message.'">'.$result->remarks.'</a>
                  </a>
                </td>';}else{
                  echo '<td>
                  '.$result->remarks.'
                </td>';
                }
//  if ($_SESSION['U_ROLE']=='Mechanic') {
//             if ($result->remarks == 'Pending') {
//               echo '<td width="18%">
//                       <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal" data-link="controller.php?action=edit&id='.$result->sched_id.'&customerid='.$result->CUSTOMERID.'&actions=cancel">Cancel</a>
//                       <a href="controller.php?action=edit&id='.$result->sched_id.'&customerid='.$result->CUSTOMERID.'&actions=confirm" class="btn btn-primary">Confirm</a>
//                     </td>';
//             } elseif ($result->remarks == 'Confirmed') {
//               echo '<td>
//                       <a href="controller.php?action=edit&id='.$result->sched_id.'&customerid='.$result->CUSTOMERID.'&actions=ongoing" class="btn btn-success">Ongoing</a>
//                       <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal" data-link="controller.php?action=edit&id='.$result->sched_id.'&customerid='.$result->CUSTOMERID.'&actions=cancel">Cancel</a>
//                     </td>';
//             } elseif ($result->remarks == 'Ongoing') {
//               echo '<td>
//                       <a href="controller.php?action=edit&id='.$result->sched_id.'&customerid='.$result->CUSTOMERID.'&actions=done" class="btn btn-success">Service Completed</a>
//                     </td>';
//             } elseif ($result->remarks == 'Done') {
//               echo '<td>
//                       <a href="controller.php?action=edit&id='.$result->sched_id.'&customerid='.$result->CUSTOMERID.'&actions=confirm" class="btn btn-success" disabled>Completed</a>
//                     </td>';
//             }
//             elseif ($result->remarks == 'Requested') {
//               echo '<td>
//                       <a href="controller.php?action=edit&id='.$result->sched_id.'&customerid='.$result->CUSTOMERID.'&actions=req" class="btn btn-success">Cancel</a>
//                       <a href="controller.php?action=edit&id='.$result->sched_id.'&customerid='.$result->CUSTOMERID.'&actions=con" class="btn btn-success">Continue Sched</a>
//                     </td>';
//             } else {
//               echo '<td>
//                       <a href="#" class="btn btn-danger" disabled>Cancelled</a>
//                     </td>';
//             }
//           }else{
//             echo '<td>
//             <a href="#" class="btn btn-warning" disabled>view only</a>
//           </td>';
//           }
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
      <div class="btn-group"></div>
    </div>
  </form>
  
  <div class="modal fade" id="mee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="meelLabel">Customer Reason for Cancellation</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <!-- Content of the modal -->
        <p id="modalMessage"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

 <div id="cancelModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cancel Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Please select a reason for canceling:</p>
        <select class="form-control" id="cancelReason">
          <option value="reason1">Schedule Unavailability</option>
          <option value="reason2">Schedule Conflict</option>
          <option value="reason3">Booking Error</option>
          <option value="reason4">Booking Inactive</option>
          <option value="other">Other</option>
        </select>
        <input type="text" class="form-control mt-3" id="otherReason" placeholder="Enter other reason" style="display: none;margin-top:15px;">
      </div>
      <div class="modal-footer">
        <button id="confirmCancel" class="btn btn-primary">Confirm Cancel</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade" id="myModal2" tabindex="-1"></div><!-- /.modal -->

  <!-- Include jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="../js/jquery.min.js"></script>

  <!-- jQuery code for filtering -->
  <script>
    $(document).ready(function() {
      // Filter buttons click event handlers

      $("#btnAllSched").click(function() {
        $(".order-row").show(); // Show all order rows
      });

	  if ($.fn.DataTable.isDataTable('#example')) {
			$('#example').DataTable().destroy();
		}

		// Initialize DataTable with page length
		var table = $('#example').DataTable({
			"pageLength": 10, // Set the number of rows to display per page
			// Other configuration options...
		});
	  
      $("#btnPendingSched").click(function() {
        $(".order-row").hide(); // Hide all order rows
        $(".order-row[data-status='Pending']").show(); // Show order rows with status 'Pending'
      });

	  $("#btnConfirmSched").click(function() {
        $(".order-row").hide(); // Hide all order rows
        $(".order-row[data-status='Confirmed']").show(); // Show order rows with status 'Pending'
      });

	  $("#btnOngoing").click(function() {
        $(".order-row").hide(); // Hide all order rows
        $(".order-row[data-status='Ongoing']").show(); // Show order rows with status 'Pending'
      });

      $("#btnDoneSched").click(function() {
        $(".order-row").hide(); // Hide all order rows
        $(".order-row[data-status='Done']").show(); // Show order rows with status 'Delivered'
      });

      $("#btnCancelledSched").click(function() {
        $(".order-row").hide(); // Hide all order rows
        $(".order-row[data-status='Cancelled']").show(); // Show order rows with status 'Cancelled'
      });

      $("#btnreqSched").click(function() {
        $(".order-row").hide(); // Hide all order rows
        $(".order-row[data-status='Requested']").show(); // Show order rows with status 'Cancelled'
      });
      $("#btnInactiveSched").click(function() {
        $(".order-row").hide(); // Hide all order rows
        $(".order-row[data-status='Inactive']").show(); // Show order rows with status 'Cancelled'
      });

    
    });
  </script>
<script>
  $(document).ready(function() {
    var cancelLink = '';
  
    $('#cancelReason').change(function() {
      var selectedReason = $(this).val();
      if (selectedReason === 'other') {
        $('#otherReason').show();
      } else {
        $('#otherReason').hide();
      }
    });
  
    $('#confirmCancel').click(function(e) {
      e.preventDefault(); // Prevent the default behavior of the button
      
      var cancelReason = $('#cancelReason').val();
      if (cancelReason === 'other') {
        cancelReason = $('#otherReason').val();
      }
      
      var newLink = cancelLink + '&reason=' + cancelReason;
      window.location.href = newLink;
    });
  
    $('a[data-target="#cancelModal"]').click(function() {
      cancelLink = $(this).data('link');
    });
  });
</script>

<script>
  $(document).ready(function() {
    $('#mee').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var message = button.data('message'); // Extract value from data-message attribute
      var modal = $(this);
      modal.find('.modal-body #modalMessage').text(message); // Set the message in the modal
    });
  });
</script>
</div>

