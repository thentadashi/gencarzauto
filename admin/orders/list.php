<div class="table-responsive">
  <?php
  if (!isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
  }

  check_message();
  ?>

<?php
$query = "SELECT * FROM tblsummary WHERE ORDEREDSTATS = 'Requested'";
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

$query = "SELECT * FROM tblsummary WHERE ORDEREDSTATS = 'Pending'";
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

$query = "SELECT * FROM tblsummary WHERE ORDEREDSTATS = 'Confirmed'";
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

$query = "SELECT * FROM tblsummary WHERE ORDEREDSTATS = 'Cancelled'";
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

$query = "SELECT * FROM tblsummary WHERE ORDEREDSTATS = 'Delivered'";
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
        $Delivered = '<span style="color:red;">(' . $res . ')</span>';
    } else {
        $Delivered = '<span> (' . $res . ')</span>';
    }
}

$query = "SELECT * FROM tblsummary WHERE ORDEREDSTATS = 'Shipped'";
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
        $Shipped = '<span style="color:red;">(' . $res . ')</span>';
    } else {
        $Shipped = '<span> (' . $res . ')</span>';
    }
}
?>


  <div class="row" width="100%">
    <div class="col-lg-2">
      <h3 class="page-header"><b>List of Orders Online</b></h3>
    </div>
    <div class="col-lg-10" style="margin-top:60px">
      <div>
        <button id="btnAllOrders" class="btn"><strong>All Orders</strong></button>
        <button id="btnPendingOrders" class="btn"><strong>Pending<?php echo $Pending;?></strong></button>
		    <button id="btnConfirmOrders" class="btn"><strong>Confirmed<?php echo $Confirmed;?></strong></button>
		    <button id="btnShippedOrders" class="btn"><strong>Need to ship <?php echo $Shipped;?></strong></button>
        <button id="btnDeliveredOrders" class="btn"><strong>Delivered<?php echo $Delivered;?></strong></button>
        <button id="btnCancelledOrders" class="btn"><strong>Cancelled<?php echo $Cancelled;?></strong></button>
        <button id="btnreqOrders" class="btn"><strong>Requested <?php echo $Requested;?></strong></button>
      </div>
    </div>
  </div>

  <form action="controller.php?action=delete" Method="POST">
    <div class="table-responsive">
      <table id="example" class="table table-striped" width="100%" style="font-size:18px" cellspacing="0">
        <thead>
          <tr>
            <th width="1%">#</th>
            <th width="5%">Order#</th>
            <th width="15%">Customer</th>
            <th width="15%">DateOrdered</th>
            <th width="15%">Price</th>
            <th width="15%">PaymentMethod</th>
            <th width="15%">Status</th>
            <th width="30%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM `tblsummary` s,`tblcustomer` c 
                    WHERE s.`CUSTOMERID`=c.`CUSTOMERID` AND PAYMENTMETHOD !='Cash' ORDER BY `ORDEREDNUM` DESC ";
          $mydb->setQuery($query);
          $cur = $mydb->loadResultList();
          foreach ($cur as $result) {
            echo '<tr class="order-row" data-status="'. $result->ORDEREDSTATS .'">';

            echo '<td width="3%" align="center">
                    </td>';

            echo '<td>
                    <a href="#" style="color:#6c7293" title="View list Of ordered" data-target="#myModal" data-toggle="modal" class="orders" data-id="'.$result->ORDEREDNUM.'">'.$result->ORDEREDNUM .'</a> 
                  </td>';
            if($result->CUSTOMERID != 1){

            echo '<td>
                    <a href="index.php?view=customerdetails&customerid='.$result->CUSTOMERID.'" style="color:#6c7293" title="View customer information">'. $result->FNAME.' '. $result->LNAME.'</a>
                  </td>';
            }else{
              echo '<td>
              <p href="" style="color:#111" title="View customer information">'. $result->FNAME.' '. $result->LNAME.'</p>
            </td>';
            }

            echo '<td>
                    '. date_format(date_create($result->ORDEREDDATE),"M/d/Y h:i:s").'
                  </td>';

            echo '<td>
                    &#8369;'.number_format($result->PAYMENT, 2).'
                  </td>';

            echo '<td>
                    '.$result->PAYMENTMETHOD.'
                  </td>';

                  if ($result->ORDEREDSTATS == 'Requested') { echo '<td>
                    <a href="#" style="color:#6c7293" data-toggle="modal" data-target="#mee" data-message="'.$result->cusmessage.'">'.$result->ORDEREDSTATS.'</a>
                  </a>
                </td>';}else{
                  echo '<td>
                  '.$result->ORDEREDSTATS.'
                </td>';
                }

            if ($result->ORDEREDSTATS == 'Pending') {
              echo '<td width="18%">
                      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal" data-link="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=cancel">Cancel</a>
                      <a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=confirm" class="btn btn-primary">Confirm</a>
                    </td>';
            } elseif ($result->ORDEREDSTATS == 'Confirmed') {
              echo '<td>
                      <a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=ship" class="btn btn-success">Shipped</a>
                      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal" data-link="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=cancel">Cancel</a>
                    </td>';
            } elseif ($result->ORDEREDSTATS == 'Shipped') {
              echo '<td>
                      <a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=deliver" class="btn btn-success">Delivered</a>
                      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal" data-link="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=cancel">Cancel</a>
                    </td>';
            } elseif ($result->ORDEREDSTATS == 'Delivered') {
              echo '<td>
                      <a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=confirm" class="btn btn-success" disabled>Delivered</a>
                    </td>';
            }
            elseif ($result->ORDEREDSTATS == 'Requested') {
              echo '<td>
                      <a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=req" class="btn btn-success">Cancel</a>
                      <a href="controller.php?action=edit&id='.$result->ORDEREDNUM.'&customerid='.$result->CUSTOMERID.'&actions=con" class="btn btn-success">Continue Order</a>
                    </td>';
            } 
            elseif ($result->ORDEREDSTATS == 'PAID') {
              echo '<td>
                        <a href="#" class="btn btn-success" disabled>Walk-in-customer</a>
                    </td>';
            }else {
            
              echo '<td>
                      <a href="#" class="btn btn-danger" disabled>Cancelled</a>
                    </td>';
            }
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
          <option value="reason1">Product Unavailability</option>
          <option value="reason2">Pricing Error</option>
          <option value="reason3">Address Issue</option>
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

  <div class="modal fade" id="myModal" tabindex="-1"></div><!-- /.modal -->

  <!-- Include jQuery library -->

  <script src="../js/jquery.min.js"></script>

  <!-- jQuery code for filtering -->
  <script>
    $(document).ready(function() {
      // Filter buttons click event handlers

      $("#btnAllOrders").click(function() {
        $(".order-row").show(); // Show all order rows
      });

	  if ($.fn.DataTable.isDataTable('#example')) {
			$('#example').DataTable().destroy();
		}

		// Initialize DataTable with page length
		var table = $('#example').DataTable({
			"pageLength": 100, // Set the number of rows to display per page
			// Other configuration options...
		});
    $('#example').wrap('<div style="max-height: 550px; overflow-y: auto;"></div>');
	  
      $("#btnPendingOrders").click(function() {
        $(".order-row").hide(); // Hide all order rows
        $(".order-row[data-status='Pending']").show(); // Show order rows with status 'Pending'
      });

	  $("#btnConfirmOrders").click(function() {
        $(".order-row").hide(); // Hide all order rows
        $(".order-row[data-status='Confirmed']").show(); // Show order rows with status 'Pending'
      });

	  $("#btnShippedOrders").click(function() {
        $(".order-row").hide(); // Hide all order rows
        $(".order-row[data-status='Shipped']").show(); // Show order rows with status 'Pending'
      });

      $("#btnDeliveredOrders").click(function() {
        $(".order-row").hide(); // Hide all order rows
        $(".order-row[data-status='Delivered']").show(); // Show order rows with status 'Delivered'
      });

      $("#btnCancelledOrders").click(function() {
        $(".order-row").hide(); // Hide all order rows
        $(".order-row[data-status='Cancelled']").show(); // Show order rows with status 'Cancelled'
      });

      $("#btnreqOrders").click(function() {
        $(".order-row").hide(); // Hide all order rows
        $(".order-row[data-status='Requested']").show(); // Show order rows with status 'Cancelled'
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

