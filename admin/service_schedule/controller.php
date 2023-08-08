

<?php
require_once ("../../include/initialize.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
 
switch ($action) {
	case 'add' :
	
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;


	}



		function doEdit(){
			global $mydb;


			if ($_GET['actions'] == 'confirm') {
				$status = 'Confirmed';
				$remarks = 'Your Service Booking Schedule is confirmed';
                $message = '';
			} elseif ($_GET['actions'] == 'con') {
				$status = 'Confirmed';
				$remarks = 'Your Service Booking Schedule cannot be cancelled and your Service Booking Schedule has been confirmed.';
			} elseif ($_GET['actions'] == 'ongoing') {
				$status = 'Ongoing';
				$remarks = 'Your Service Booking Schedule is ongoing.';
                $message = '';
			} elseif ($_GET['actions'] == 'done') {
				$status = 'Done';
				$remarks = 'Your Service Booking is complete. If you need assistance or have questions, contact us. Thank you for choosing our services.';
                $message = '';
			} elseif ($_GET['actions'] == 'req') {
				$status = 'Cancelled';
				$remarks = 'Your Service Booking been cancelled as you requested.';
                $message = '';
			} elseif ($_GET['actions'] == 'cancel') {
				$status = 'Cancelled';
                $remarks = 'Your Service Booking been cancelled';
				$message = '';

				switch ($_GET['reason']) {
					case 'reason1':
					  $message = "I regret to inform you that we have encountered an unforeseen circumstance that requires us to cancel your booking. We apologize for any inconvenience this may cause.";
					  break;
					case 'reason2':
					  $message = "I regret to inform you that there has been a schedule conflict that prevents us from accommodating your booking request. We sincerely apologize for any inconvenience this may cause.";
					  break;
					case 'reason3':
					  $message = "We regret to inform you that an error has occurred while processing your booking. We sincerely apologize for any inconvenience this may have caused.";
					  break;
                    case 'reason4':
                        $message = "We regret to inform you that your booking is currently inactive and cannot be processed at this time. We apologize for any inconvenience this may have caused.";
                        break;
					default:
					  $message = $_GET['reason'];
					  break;
				  }
			}

			$schedule = new Schedules();
			$schedule->remarks = $status;
			$schedule->rms = $remarks;
			$schedule->message = $message;
			$schedule->update($_GET['id']);


			$customer = New customer;
  			$res = $customer->single_customer($_GET['customerid']); 

              $query = "SELECT * FROM `tblschedule` s ,`tblcustomer` c 
              WHERE   s.`CUSTOMERID`=c.`CUSTOMERID` and sched_id=".$_GET['id'];
              $mydb->setQuery($query);
              $cur = $mydb->loadSingleResult();
 

			$sql = "INSERT INTO `messageout` (`Id`, `MessageTo`, `MessageFrom`, `MessageText`) VALUES (Null, '".$res->PHONE."', 'Gencarz Unlimited', '".$remarks."')";
			$mydb->setQuery($sql);
			$mydb->executeQuery();
										//Customer Register
										$mail = new PHPMailer(true);
										$mail->isSMTP();
										$mail->Host = 'smtp.gmail.com';
										$mail->SMTPAuth = true;
										$mail->Username = 'gencarzauto@gmail.com';
										// $mail->Password = 'ifaxxwnzovfvnaoj';
										$mail->Password = 'jxvcrupbbowpessn';
										$mail->SMTPSecure = 'ssl';
										$mail->Port = 465;
										$mail->setFrom('gencarzauto@gmail.com');
										$mail->addAddress($res->EMAILADD);
										$mail->isHTML(true);
										$mail->Subject = "Gencarz Order Status";
										$mail->Body = "[Gencarz Unlimited] ".$remarks." ".$message." Booking Details ".$cur->time." - ".$cur->date." the Estimated Price is ".number_format($cur->price,2).", 
										Email: ".$res->EMAILADD." 
										Thankyou sir/ma'am   ".$res->FNAME." ".$res->LNAME." feel free to book a service again next time!";
										$mail->send();

			message("Order has been ".$schedule->remarks."!", "success");
			redirect("index.php");
		
	}
	 

?>