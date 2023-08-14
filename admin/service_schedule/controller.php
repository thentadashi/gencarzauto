

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


			  $sched_id = $_GET['id'];  // Replace with the desired sched_id value
			  $query = "SELECT COUNT(*) AS service_count
						FROM tblschedorder
						WHERE sched_id = '$sched_id'";
			              $mydb->setQuery($query);
						  $cur2 = $mydb->loadSingleResult();
						  $rowcount = count($cur2);
			
			  if ($rowcount > 0) {

				$curDate = $cur->date;  // Replace with your actual date value
				$interval = new DateInterval('P30D');
				$dateTime = new DateTime($curDate);
				$dateTime->add($interval);

				$newDate = $dateTime->format('Y-m-d');


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
				$mail->Subject = "Gencarz booking Status";
				$mail->Body = '<html>
				<head>
					<style>
						/* Add your CSS styles here */
						body {
							font-family: Arial, sans-serif;
							background-color: #f4f4f4;
							padding: 20px;
						}
						.container {
							border: 1px solid #ccc;
							background-color: #ffffff;
							padding: 20px;
						}
						h2 {
							color: #333;
						}
						.logo {
							text-align: center;
						}
						.logo img {
							max-width: 150px;
							height: auto;
						}
					</style>
				</head>
				<body>
					<div class="container">
						<div class="logo">
							<img src="https://gencarzauto.online/images/home/NC%20LOGO.png" alt="Gencarz Unlimited Logo">
						</div>
						<h2>Gencarz Unlimited - Service Booking Status Update</h2>
						<p><strong>Booking Details:</strong><br>
						Email: ' . $res->EMAILADD . '<br>
						Thank you ' . $res->FNAME . ' ' . $res->LNAME . ' for choosing our services. We look forward to your next schedule!<br>
						Date and Time: ' . $newDate . '<br>
						</p>
					</div>
				</body>
				</html>';
				
				$mail->send();
			  }

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
										$mail->Subject = "Gencarz booking Status";
										$mail->Body = '<html>
										<head>
											<style>
												/* Add your CSS styles here */
												body {
													font-family: Arial, sans-serif;
													background-color: #f4f4f4;
													padding: 20px;
												}
												.container {
													border: 1px solid #ccc;
													background-color: #ffffff;
													padding: 20px;
												}
												h2 {
													color: #333;
												}
												.logo {
													text-align: center;
												}
												.logo img {
													max-width: 150px;
													height: auto;
												}
											</style>
										</head>
										<body>
											<div class="container">
												<div class="logo">
													<img src="https://gencarzauto.online/images/home/NC%20LOGO.png" alt="Gencarz Unlimited Logo">
												</div>
												<h2>Gencarz Unlimited - Service Booking Status Update</h2>
												<p>' . $remarks . ' ' . $message . '</p>
												<p><strong>Booking Details:</strong><br>
												Date and Time: ' . $cur->date . ' ' . $cur->time . '<br>
												Estimated Price: ₱' . number_format($cur->price, 2) . '<br>
												Email: ' . $res->EMAILADD . '<br>
												Thank you ' . $res->FNAME . ' ' . $res->LNAME . ' for choosing our services. We look forward to serving you again!</p>
											</div>
										</body>
										</html>';
										
										$mail->send();

			message("Order has been ".$schedule->remarks."!", "success");
			redirect("index.php");
		
	}
	 

?>