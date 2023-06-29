<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title;?></title>

<!-- Bootstrap Core CSS -->
<link href="<?php echo web_root; ?>admin/css/bootstrap.min10.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="<?php echo web_root; ?>admin/css/metisMenu.min.css" rel="stylesheet">

<!-- Timeline CSS -->
<link href="<?php echo web_root; ?>admin/css/timeline.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?php echo web_root; ?>admin/css/sb-admin-5.css" rel="stylesheet">
 

<!-- Custom Fonts -->
<link href="<?php echo web_root; ?>admin/font/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link href="<?php echo web_root; ?>admin/font/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- DataTables CSS -->
<link href="<?php echo web_root; ?>admin/css/dataTables.bootstrap.css" rel="stylesheet">

<!-- datetime picker CSS -->
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="<?php echo web_root; ?>css/datepicker.css" rel="stylesheet" media="screen">

<link href="<?php echo web_root; ?>admin/css/costum.css" rel="stylesheet">

<link href="<?php echo web_root; ?>admin/css/ekko-lightbox.css" rel="stylesheet">

</head>


  <?php
   admin_confirm_logged_in();
  ?> 

<?php
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
        $order = '<span style="color:red;">(' . $res . ')</span>';
    } else {
        $order = '<span> (' . $res . ')</span>';
    }
}
?>

<?php
$query = "SELECT * FROM tblschedule WHERE remarks = 'Pending'";
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
        $order2 = '<span style="color:red;">(' . $res . ')</span>';
    } else {
        $order2 = '<span> (' . $res . ')</span>';
    }
}
?>

<?php
$query = "SELECT * FROM tblschedule WHERE remarks = 'Pending' and USERID=".$_SESSION['USERID'];
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
        $order3 = '<span style="color:red;">(' . $res . ')</span>';
    } else {
        $order3 = '<span> (' . $res . ')</span>';
    }
}
?>

<?php
$query = "SELECT * FROM tblsummary WHERE PAYMENTMETHOD = 'Cash'";
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
        $onlineOrder = '<span style="color:red;">(' . $res . ')</span>';
    } else {
        $onlineOrder = '<span> (' . $res . ')</span>';
    }
}
?>

      
<body style="background-color:#191c24;">
 
   <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top  " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>

                 <h2 ><a class="navbar-brand"  href="<?php echo web_root; ?>admin/index.php" ><p style="font-size: 23px;color:#ffab00;padding-left:20px;" ><b>Gencarz Auto</b></p></a></h2>

            </div>
            <!-- /.navbar-header -->



            <ul class="nav navbar-top-links navbar-right"> 

                 <li class="dropdown">
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo web_root; ?>admin/products/index.php?view=add"><i class="fa fa-barcode fa-fw"></i> Product</a>
                        </li>
                        <li><a href="<?php echo web_root; ?>admin/category/index.php?view=add"><i class="fa fa-list-alt  fa-fw"></i> Category</a>
                        </li>
                            <?php if ($_SESSION['U_ROLE']=='Administrator') {
                            # code...
                        ?>
                         <li><a href="<?php echo web_root; ?>admin/user/index.php?view=add"><i class="fa fa-user  fa-fw"></i> User</a>
                            </li>
                        <?php }?>
                        
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
<?php
 $user = New User();
$singleuser = $user->single_user($_SESSION['USERID']);

?> 
                <!-- /.dropdown -->
                <li class="dropdown" style="color:#191c24;">
                    <a class="dropdown-toggle"   data-toggle="dropdown" href="#">
                       Settings <i class="fa fa-caret-down"></i>
                            
                    </a>
                    <ul class="dropdown-menu dropdown-acnt" style="color:#191c24;">

                          <div class="divpic" > 
                            <a href="" data-target="#usermodal"  data-toggle="modal" > 
                                <img title="profile image" width="70" height="80" src="<?php echo web_root.'admin/user/'.$singleuser ->USERIMAGE ?>">  
                            </a>
                          </div> 
                    

                      <div class="divtxt" >
                        <li ><a style="color:#191c24;" href="<?php echo web_root; ?>admin/user/index.php?view=edit&id=<?php echo $_SESSION['USERID']; ?>"> <?php echo $_SESSION['U_NAME']; ?>

                         </a>
                      <li><a style="color:#191c24;" title="Edit" href="<?php echo web_root; ?>admin/user/index.php?view=edit&id=<?php echo $_SESSION['USERID']; ?>"  >Edit My Profile</a>
                                    
                        </li>
                          </li>
                           <li><a style="color:#191c24;" href="<?php echo web_root; ?>admin/logout.php"><i class="fa fa-sign-out fa-fw"></i> Log Out</a>
                        </li> 
                  </div>
                     
                         
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul> 
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">


                                    <!-- /.dropdown -->

                                               
                            <p style="padding-left: 10px;color: #f2f2f2;"> 
                                <img title="profile image" width="70" height="70" style="border-radius: 45px;"src="<?php echo web_root.'admin/user/'.$singleuser ->USERIMAGE ?>"> 
                                    <span style="
                                        position: absolute;
                                        left: 23%;
                                        width: 15px;
                                        height: 15px;
                                        background-color: green;
                                        color: green;
                                        border-radius: 100%;
                                        text-align: center;
                                        font-size: 50px;
                                        line-height: 2.7;
                                        top: 52px;
                                        border: 2px solid #2c2e33;
                                    ">
                                    </span> 
                                    <?php echo $_SESSION['U_NAME']; ?> 

                                <span style="position: absolute;left: 35%;width: 15px;height: 15px;color:#ffab00 ;text-align: center;font-size: 12px;line-height: 2.7;top: 40px;"> <?php echo $_SESSION['U_ROLE']; ?></span>
                            </p>
                    
                            

 
                    <!-- /.dropdown-user -->
                    <ul class="nav" id="side-menu" style="padding-top: 10px;font-size:18px;">
                      
                    <?php if ($_SESSION['U_ROLE'] == 'Administrator' || $_SESSION['U_ROLE'] == 'Encoder' || $_SESSION['U_ROLE'] == 'Staff') { ?>
                         <li>
                            <a href="<?php echo web_root; ?>admin/Dashboard/index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li> 
                        <p style="color: #ffab00;font-size:12px;margin-left:30px;"><i>Shop Sales Menu</i></p>
                        <li>
                            <a href="<?php echo web_root; ?>admin/POS/index.php" ><i class="fa  fa-file-text fa-fw"></i> POS </a>
                          
                        </li>
                        <li>
                             <a href="<?php echo web_root; ?>admin/orders/index.php"  ><i class="fa fa-shopping-cart fa-fw"></i> Online Orders <?php echo $order; ?></a>
                        </li>

                        <li>
                             <a href="<?php echo web_root; ?>admin/orders/index.php?view=Walk-in"  ><i class="fa fa-shopping-cart fa-fw"></i> Walk-in Orders <?php echo $onlineOrder; ?></a>
                        </li>
                        <p style="color: #ffab00;font-size:12px;margin-left:30px;"><i>Items and Products</i></p>
                        <li>
                             <a href="<?php echo web_root; ?>admin/products/index.php" ><i class="fa fa-bar-chart fa-fw"></i> Products </a>
                        </li>
                           
                         <li>
                             <a href="<?php echo web_root; ?>admin/category/index.php" ><i class="fa fa-list fa-fw"></i>  Categories </a>
                         </li>
                         <p style="color: #ffab00;font-size:12px;margin-left:30px;"><i>Services and Booking</i></p>
                         <li>
                             <a href="<?php echo web_root; ?>admin/services/index.php" ><i class="fa fa-wrench fa-fw"></i> Services </a>
           
                        </li>
                    <?php }else{?>
                        <p style="color: #ffab00;font-size:12px;margin-left:30px;"><i>Services and Booking</i></p>
                        <li>
                             <a href="<?php echo web_root; ?>admin/service_schedule/index.php" ><i class="fa fa-calendar fa-fw"></i>  Booked Schedules <?php echo $order3; ?></a>
            
                        </li>
                    <?php }; ?>
                        <?php if ($_SESSION['U_ROLE']=='Administrator') {
                            # code...
                        ?>
                        <li>
                             <a href="<?php echo web_root; ?>admin/service_schedule/index.php" ><i class="fa fa-calendar fa-fw"></i>  Booked Schedules <?php echo $order2; ?></a>
            
                        </li>
                        <p style="color: #ffab00;font-size:12px;margin-left:30px;"><i>Settings</i></p>
                         <li>
                             <a href="<?php echo web_root; ?>admin/settings/index.php" ><i class="fa fa-gear fa-fw"></i>  Product Settings </a>
            
                        </li>
                        <li>
                             <a href="<?php echo web_root; ?>admin/autonumber/index.php" ><i class="fa fa-sort-asc fa-fw"></i>  Autonumber </a>
            
                        </li>
                          <li>
                            <a href="<?php echo web_root; ?>admin/user/index.php" ><i class="fa fa-user fa-fw"></i> Users </a>
                          
                        </li>
                        <p style="color: #ffab00;font-size:12px;margin-left:30px;"><i>Report</i></p>
                         <li>
                            <a href="<?php echo web_root; ?>admin/report/index.php" ><i class="fa  fa-file-text fa-fw"></i> Report </a>
                          
                        </li>
                 <?php }  ?>
 
 
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

            <!-- Modal -->
                    <div class="modal fade" id="usermodal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">×</button>

                                    <h4 class="modal-title" id="myModalLabel">Profile Image.</h4>
                                </div>

                                <form action="<?php echo web_root; ?>admin/user/controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                            <div class="col-md-12">
                                                <div class="rows">
                                                    <img title="profile image" width="500" height="360" src="<?php echo web_root.'admin/user/'.$singleuser ->USERIMAGE ?>">  
                          
                                                </div>
                                            </div><br/>
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8">

                                                            <input type="hidden" name="MIDNO" id="MIDNO" value="<?php echo $_SESSION['USERID']; ?>">
                                                              <input name="MAX_FILE_SIZE" type=
                                                            "hidden" value="1000000"> <input id=
                                                            "photo" name="photo" type=
                                                            "file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Photo</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                                  <!-- Modal for entering quantity -->
<div class="modal fade" id="quantityModal" tabindex="-1" role="dialog" aria-labelledby="quantityModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="quantityModalLabel">Enter Quantity</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="quantityInput">Quantity to set:</label>
          <input type="number" class="form-control" id="quantityInput" placeholder="Enter quantity" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="setQuantityBtn">Set Quantity</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for performing addition/subtraction -->
<div class="modal fade" id="calculationModal" tabindex="-1" role="dialog" aria-labelledby="calculationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="calculationModalLabel">Increase / Decrease</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="calculationInput">Enter qty to Increase / Decrease:</label>
          <input type="number" class="form-control" id="calculationInput" placeholder="Enter a value" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="additionBtn">Add</button>
        <button type="button" class="btn btn-primary" id="subtractionBtn">Subtract</button>
      </div>
    </div>
  </div>
</div>
  

  <div id="page-wrapper">
               
            <div class="row" >
      
                <div class="col-lg-12"> 
                    
                    <?php 
                    if ($title<>'Dashboard'){
                       echo   '<p class="breadcrumb" style="margin-top: 25px;background-color:white;"> 
                        <b><a style=" color: #111;" href="index.php" title="'. $title.'" >'. $title.'</a> </b>
                        '.(isset($header) ? '  '. $header : '').'  </p>'  ;
                    } ?>
                
                        <?php   check_message();  ?> 
 

                  <?php require_once $content; ?>
                    
                </div>
                       <!-- /.col-lg-12 -->
                                              <img class="" style="margin-top: 30px; margin: 50px;" src="<?php echo web_root.'admin/images/lg.png' ?>" />
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
 
 


<!-- jQuery -->
<script src="<?php echo web_root; ?>admin/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo web_root; ?>admin/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo web_root; ?>admin/js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo web_root; ?>admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo web_root; ?>admin/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo web_root; ?>admin/js/ekko-lightbox.js"></script>
<script src="<?php echo web_root; ?>admin/js/sb-admin-2.js"></script> 
    
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>admin/js/janobe.js"></script> 
  <script type="text/javascript">
  $(document).on("click", ".PROID", function () {
    // var id = $(this).attr('id');
      var proid = $(this).data('id')
    // alert(proid)
       $(".modal-body #proid").val( proid )

      });

</script>
<script>
    $(document).ready(function() {
        $('.serv_id').click(function() {
            var serv_id = $(this).data('id');
            $('#serv_id').val(serv_id);
        });
    });
</script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {  
         var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],  
          // "sort": false,
        //ordering start at column 1
        "order": [[ 6, 'desc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
 


     
 $(document).ready(function() {
    $('#dash-table').DataTable({
                responsive: true ,
                  "sort": false
        });
 
    });


 
$('.date_pickerfrom').datetimepicker({
  format: 'mm/dd/yyyy',
   startDate : '01/01/2000', 
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1, 
    startView: 2,
    minView: 2,
    forceParse: 0 

    });


$('.date_pickerto').datetimepicker({
  format: 'mm/dd/yyyy',
   startDate : '01/01/2000', 
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1, 
    startView: 2,
    minView: 2,
    forceParse: 0   

    });
// $(function() {
//         var dates = $( "#date_pickerfrom, #date_pickerto" ).datepicker({                                   
//             defaultDate:'',
//             changeMonth: true,
//             numberOfMonths: 1,
//             onSelect: function( selectedDate ) {
//             var now =Date();
//                 var option = this.id == "from" ? "minDate" : "maxDate",
//                     instance = $(this).data("datepicker"),
//                     date = $.datepicker.parseDate(
//                         instance.settings.dateFormat ||
//                         $.datepicker._defaults.dateFormat,
//                         selectedDate, instance.settings );
//                 dates.not( this ).datepicker( "option", option, date );
//             }
//         });

  
$('#date_picker').datetimepicker({
  format: 'mm/dd/yyyy',
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0,
     changeMonth: true,
      changeYear: true,
      yearRange: '1945:'+(new Date).getFullYear() 
    });




</script>  
<script>
  $(document).ready(function() {
  var quantityInput = $('#PROQTY');

  // Increase quantity button click event
  $('#increaseQty').click(function() {
    quantityInput.val(parseInt(quantityInput.val()) + 1);
  });

  // Decrease quantity button click event
  $('#decreaseQty').click(function() {
    var currentQuantity = parseInt(quantityInput.val());
    if (currentQuantity > 0) {
      quantityInput.val(currentQuantity - 1);
    }
  });

  // Show quantity modal
  $('#PROQTY').click(function() {
    $('#quantityModal').modal('show');
  });

  // Set quantity button click event
  $('#setQuantityBtn').click(function() {
    var enteredQuantity = parseInt($('#quantityInput').val());
    if (!isNaN(enteredQuantity)) {
      quantityInput.val(enteredQuantity);
    }
    $('#quantityModal').modal('hide');
  });

  // Show calculation modal
  $('#additionBtn, #subtractionBtn').click(function() {
    $('#calculationModal').modal('show');
  });

  // Addition button click event
  $('#additionBtn').click(function() {
    var inputValue = parseInt($('#calculationInput').val());
    if (!isNaN(inputValue)) {
      quantityInput.val(parseInt(quantityInput.val()) + inputValue);
    }
    $('#calculationModal').modal('hide');
  });

  // Subtraction button click event
  $('#subtractionBtn').click(function() {
    var inputValue = parseInt($('#calculationInput').val());
    if (!isNaN(inputValue)) {
      var currentQuantity = parseInt(quantityInput.val());
      if (currentQuantity >= inputValue) {
        quantityInput.val(currentQuantity - inputValue);
      }
    }
    $('#calculationModal').modal('hide');
  });
});

 </script>
  
</body> 
      <footer><p  style="text-align: center;font-weight: bold;">Copyright &copy; Bachelor of Science Information Technology</p></footer>
</html>