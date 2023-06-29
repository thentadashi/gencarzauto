		
<?php
	require_once ("../include/initialize.php");
  		if (!isset($_SESSION['CUSID'])){
      			redirect("index.php");
     	}



	
		if (isset($_POST['id'])){
			if ($_POST['actions']=='confirm') {
							# code...
					$status	= 'Confirmed';
			}
			elseif($_POST['actions']=='ongoing') {
							# code...
					$status	= 'Ongoing';	
			}
			elseif($_POST['actions']=='done') {
							# code...
					$status	= 'Done';	
			}
			elseif ($_POST['actions']=='cancel'){
							# code...
					$status	= 'Cancelled';
			}

				$Schedules = New Schedules();
				$Schedules->remarks = $status;
				$Schedules->update($_POST['id']);
		}


		
		if(isset($_POST['close'])){
			unset($_SESSION['sched_id']);
			redirect(web_root.'index.php'); 
		}

		if (isset($_POST['sched_id'])){
			$_SESSION['sched_id'] = $_POST['sched_id'];
		}

				// unsetting notify msg
				$Schedules = New Schedules();
				$Schedules->HVIEW = 1;
				$Schedules->update($_SESSION['sched_id']);  

				$query = "SELECT * FROM `tblschedule` s ,`tblcustomer` c 
					WHERE   s.`CUSTOMERID`=c.`CUSTOMERID` and sched_id='".$_SESSION['sched_id']."'";
					$mydb->setQuery($query);
					$cur = $mydb->loadSingleResult();

?>
 

<div class="modal-dialog" style="width:60%">
  <div class="modal-content">
	<div class="modal-header">
		<button class="close" id="btnclose" data-dismiss="modal" type= "button">×</button>
		 <span id="printout2">
			<table>
				<tr>
					<td align="center"> 
					<img src="<?php echo web_root; ?>images/home/NC LOGO.png"   alt="Image">
					</td> 
				</tr>
			</table>
 	 <div class="modal-body"> 
    <?php 
	    $query = "SELECT * FROM `tblschedule` s ,`tblcustomer` c 
		WHERE   s.`CUSTOMERID`=c.`CUSTOMERID` and sched_id=".$_SESSION['sched_id'];
		$mydb->setQuery($query);
		$cur = $mydb->loadSingleResult();
			if($cur->remarks == 'Confirmed'){
    ?>
    			<h4>Your booking has been confirmed</h4><br/>
					<h5>DEAR Ma'am/Sir ,</h5>
					<h5>We are pleased to inform you that your car service booking has been confirmed. We appreciate your trust in our services and look forward to providing you with exceptional car care.</h5>
					<hr/>
					<h4><strong>Schedule Details</strong></h4>
						<div class="row">
							<div class="col-md-6">
								<p> Schedule NUMBER : <?php echo $_SESSION['sched_id']; ?></p>
							</div>
							<div class="col-md-6">
								<p>Name : <?php echo $cur->FNAME . ' '.  $cur->LNAME ;?></p>
								<p>Address : <?php echo $cur->STREETADD.' '.$cur->BRGYADD.' '.$cur->CITYADD;?></p>
								<p>Phone number : <?php echo $cur->PHONE;?></p>
							</div>
						</div>
<?php 
				}
			
			
			
			elseif($cur->remarks=='Cancelled'){
					echo "Your booking has been cancelled due to lack of communication and incomplete information.";
			}
			
			elseif($cur->remarks=='Pending'){
					echo "<h5>Your booking is on process. Please check your profile for notification of confirmation.</h5>";
			}

			elseif($cur->remarks=='Ongoing'){
					echo "<h5>We would like to inform you that your car service booking is currently underway. Our team is diligently working on servicing your vehicle to ensure its optimal performance and safety.</h5>";
			}

			elseif($cur->remarks=='Done'){
		 
?>
 	 				<h4>Booking Service Has been completed!</h4><br/>
 					<h5>DEAR Ma'am/Sir ,</h5>
					<h5>We are delighted to inform you that your car service booking has been successfully completed. Our team has diligently worked on your vehicle, ensuring that all the necessary maintenance and repairs have been carried out to the highest standards.</h5>
		 			<hr/>
		 			<h4><strong>Booking Information</strong></h4>
		 				<div class="row">
		 					<div class="col-md-6">
		 						<p> Booking NUMBER : <?php echo $_SESSION['sched_id']; ?></p>
		 					</div>
		 					<div class="col-md-6">
							 	<p>Name : <?php echo $cur->FNAME . ' '.  $cur->LNAME ;?></p>
								<p>Address : <?php echo $cur->STREETADD.' '.$cur->BRGYADD.' '.$cur->CITYADD;?></p>
								<p>Phone number : <?php echo $cur->PHONE;?></p>
		 					</div>
		 				</div>
                        
<?php 
			}

			else{
				echo "<h5>Your order is on process. Please check your profile for notification of confirmation.</h5>";
				} 
?>
<hr/>
 <h4><strong>Booking Information</strong></h4>
		<table id="table" class="table">
			<thead>
				<tr>
					<th>Image</th>
					<!-- <th>PRODUCT</th>? -->
					<th>Service</th>
					<!-- <th>DATE ORDER</th>  -->
					<th>Estimated Price</th>
					<th>Time</th>
					<th>Date</th>
					<th>Vehicle type</th>
					<th></th> 
				</tr>
				</thead>
				<tbody>
 
				<?php
				 $subtot=0;
				  $query = "SELECT * FROM  `tblcustomer` c,  `tblschedorder` o,  `tblschedule` s,`services` ss
                            WHERE o.`sched_id` = s.`sched_id` 
                            AND o.serv_id = ss.serv_id
                            AND s.`CUSTOMERID` = c.`CUSTOMERID` 
                            AND o.`sched_id`=".$_SESSION['sched_id'];
				  		    $mydb->setQuery($query);
				  		    $cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
						echo '<tr>';  
				  		echo '<td ><img src="'.web_root.'admin/services/'. $result->images.'" width="60px" height="60px" title="'.$result->serv_name.'"/></td>';
				  		echo '<td>'. $result->serv_name.'</td>';

                        if ($result->ctype == 'ctype_a') {
                            $price = $result->ctype_a;
                            $cartype = "Car Type A";
                        }elseif ($result->ctype == 'ctype_b') {
                            $price = $result->ctype_b;
                            $cartype = "Car Type B";
                        }
                        elseif ($result->ctype == 'ctype_c') {
                            $price = $result->ctype_c;
                            $cartype = "Car Type C";
                        }

				  		// echo '<td>'.date_format(date_create($result->ORDEREDDATE),"M/d/Y h:i:s").'</td>';
				  		echo '<td> &#8369 '. number_format($price,2).' </td>';
				  		echo '<td align="center" >'. $result->time.'</td>';
                        echo '<td align="center" >'. $result->date.'</td>';
                        echo '<td align="center" >'. $cartype.'</td>';
				  		echo '</tr>';

				  		$subtot +=$price;
				}
				?> 
			</tbody>
		<tfoot >
		<?php 
				 $query = "SELECT * FROM `tblschedule` s ,`tblcustomer` c 
				WHERE   s.`CUSTOMERID`=c.`CUSTOMERID` and sched_id=".$_SESSION['sched_id'];
                $mydb->setQuery($query);
                $cur = $mydb->loadSingleResult();
		?>

	 </tfoot>
       </table> <hr/>
 		<div class="row">
		  	<div class="col-md-6 pull-left">
		  	 <div>Booking Date : <?php echo date_format(date_create($cur->date_created),"M/d/Y h:i:s"); ?></div> 
		  		<div>Payment Method : Cash</div>

		  	</div>
		  	<div class="col-md-6 pull-right">
		  		<p align="right" style="">Estimated Price : &#8369 <?php echo number_format($subtot,2);?></p>
		  	</div>
		  </div>
		 
		  <?php
		  if($cur->remarks=="Confirmed" || $cur->remarks=="Done"){
		  ?>
		   <hr/> 
		  <div class="row">
		 		 <p>Please print this as a proof of Booking</p><br/>
		  	        <p>We hope you enjoy to see you in the shop. Have a nice day!</p>
		  	        Sincerely.</p>
		  	  		  	  <p>Gencarz Unlimited</p>
		  	  <h4><a href="###"><?php  echo $cur->mech_name;?></a></h4>
		  </div>
		  <?php }?>
  </div> 

</span>

		<div class="modal-footer">
		 <div id="divButtons" name="divButtons">
		<?php if($cur->remarks!='Pending' || $cur->remarks!='Cancelled' ){ ?> 
     
                <button  onclick="tablePrint2();" class="btn btn_fixnmix pull-right "><span class="glyphicon glyphicon-print" ></span> Print</button>     
             
        <?php } ?>
			<button class="btn btn-pup" id="btnclose" data-dismiss="modal" type="button">Close</button> 
		 </div> 
		</div>
	<!-- </form> -->
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
 </div>
