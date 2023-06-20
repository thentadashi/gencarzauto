
<?php
require_once ("../../include/initialize.php");
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }


// if (isset($_POST['id'])){

// if ($_POST['actions']=='confirm') {
// 							# code...
// 	$status	= 'Confirmed';	
// 	// $remarks ='Your order has been confirmed. The ordered products will be yours in the exact date and time that you have set.';
	 
// }elseif ($_POST['actions']=='cancel'){
// 	// $order = New Order();
// 	$status	= 'Cancelled';
// 	// $remarks ='Your order has been cancelled due to lack of communication and incomplete information.';
// }

// $order = New Order();
// $order->STATS       = $status;
// $order->update($_POST['id']);


// }

if(isset($_POST['close'])){
	unset($_SESSION['serv_id']);
}

if (isset($_POST['serv_id'])){
	$_SESSION['serv_id'] = $_POST['serv_id'];
}


$query = "SELECT * FROM `tblschedule` s
          JOIN `tblcustomer` c ON s.`CUSTOMERID` = c.`CUSTOMERID`
          JOIN `services` srv ON s.`serv_name` = srv.`serv_name`
          WHERE s.`sched_id` = ".$_SESSION['serv_id'];

		$mydb->setQuery($query);
		$cur = $mydb->loadSingleResult();


?>

<div class="modal-dialog" style="width: 70%">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" id="btncloses" data-dismiss="modal" type="button">×</button>
        <h2>Schedule Number: <?php echo $_SESSION['serv_id']; ?></h2>
      </div>
      <div class="modal-body">
        <div class="row" style="margin: 2%">
          <div class="col-md-6">Name: <?php echo $cur->cus_name;?></div>
          <div class="col-md-6">Address: <?php echo $cur->CUSHOMENUM . ' ' . $cur->STREETADD . ' ' . $cur->BRGYADD . ' ' . $cur->CITYADD . ' ' . $cur->PROVINCE . ' ' . $cur->COUNTRY; ?></div>
        </div>

        <table id="table" class="table" width="100%">
			<thead>
				<tr>
					<th width="10%"><font size="3">PRODUCT Image</font></th>
					<th width="10%"><font size="3">Product Name</th>
					<th width="15%"><font size="3">Estimated Price</th>
					<th width="15%"><font size="3">Time taken</th>
					<th width="10"><font size="3">Date</th> 
					<th width="10%"><font size="3">Mechanic</th> 
					<th width="10%"><font size="3">Status</th>
					<!-- <th></th>  -->
				</tr>
				</thead>
				<tbody>
					<?php
						$query = "SELECT * FROM `tblschedule` s
						JOIN `tblcustomer` c ON s.`CUSTOMERID` = c.`CUSTOMERID`
						JOIN `services` srv ON s.`serv_name` = srv.`serv_name`
						WHERE s.`sched_id` = ".$_SESSION['serv_id'];
						$mydb->setQuery($query);
						$cur = $mydb->loadResultList();
						foreach ($cur as $result) {
						echo '<tr>';  
						echo '<td><img src="'.web_root.'admin/services/'. $result->images.'" width="60px" height="60px" title="'.$result->serv_name.'"/></td>';
						echo '<td><font size="3">'. $result->serv_name.'</font></td>';
						echo '<td> <font size="3">&#8369 '.number_format($result->serv_price,2).'</font> </td>';
						echo '<td align="center" ><font size="3">'. $result->time.'</font></td>';
						echo '<td align="center" ><font size="3">'. $result->date.'</font></td>';
						echo '<td align="center" ><font size="3">'. $result->mech_name.'</font></td>';
						?>
						<?php
						echo '<td id="status" ><font size="3">'. $result->remarks.'</font></td>';
						echo '</tr>';
						}
					?> 
				</tbody>
		<?php 
		$query = "SELECT * FROM `tblschedule` s
		JOIN `tblcustomer` c ON s.`CUSTOMERID` = c.`CUSTOMERID`
		JOIN `services` srv ON s.`serv_name` = srv.`serv_name`
		WHERE s.`sched_id` = ".$_SESSION['serv_id'];
		$mydb->setQuery($query);
		$cur = $mydb->loadSingleResult();

		// if ($cur->PAYMENTMETHOD=="Cash on Delivery") {
		// 	# code...
		// 	$price = 10;
		// }else{
		// 	$price = 0;
		// }
		//   $tot =   $cur->DELFEE  - 25.00;
		?>
	 
	 </table>

<hr />

<div class="row">
  <div class="col-md-6 pull-left">
	<div>Date Created: <?php echo date_format(date_create($cur->date_created), "M/d/Y h:i:s"); ?></div>
  </div>
</div>
</div>

<div class="modal-footer">
<button onclick="tablePrint();" class="btn btn_fixnmix pull-right" id="print">
  <span class="fa fa-print"></span> Print
</button>
<button style="margin-right: 10px" class="btn btn_fixnmix" id="btnclose" data-dismiss="modal" type="button">
  Close
</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
function tablePrint(){ 
 // document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,table=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
   
    return false; 

    } 
 
</script>
<script>


  var table = document.getElementById('table');
    var items = table.getElementsByTagName('output');
    var sum = 0;

    // total price
    for(var i=0; i<items.length; i++)
        sum +=  parseInt(items[i].value);        
// for cart
    var totprice = document.getElementById('sum');
    totprice.innerHTML =  sum.toFixed(2);
    </script>
