<?php
require_once("include/initialize.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function cleanNumber($number) {
    $number = str_replace(' ', '', $number);
    $number = str_replace('.', '', $number);
    $number = preg_replace('/[^A-Za-z0-9\-]/', '', $number);
    
    if (strlen($number) > 2 && substr($number, -2) === '00') {
        $number = substr($number, 0, -2);
    }
    
    return $number;
}

function getExistingSchedule($date, $time, $mechanic) {
  global $mydb;
  $mydb->setQuery("SELECT * FROM tblschedule WHERE date = '{$date}' AND time = '{$time}' AND mech_name = '{$mechanic}'");
  $cur = $mydb->loadSingleResult();
  return $cur;
}


// Retrieve the booking data from the POST request
$bookings = json_decode($_POST['bookings'], true);
$customerId = $_POST['customerId'];
$userId = $_POST['USERID'];
$total = 0;

$autonumber = new Autonumber();
$res = $autonumber->set_autonumber('sched_id');

$processedBookings = array();

$SO = new SOrder();
foreach ($bookings as $booking) {
    $serviceId = $booking['serv_id'];
    $serviceName = $booking['serv_name'];
    $carType = $booking['carType'];
    $date = $booking['date'];
    $time = $booking['time'];
    $mechanic = $booking['mechanic'];
    $price = cleanNumber($booking['price']);

    $SO->serv_id = $serviceId;
    $SO->price = $price;
    $SO->sched_id = $res->AUTO;
    $SO->ctype = $carType;
    $SO->create();

    $processedBookings[] = array(
        'serviceId' => $serviceId,
        'serviceName' => $serviceName,
        'carType' => $carType,
        'date' => $date,
        'time' => $time,
        'mechanic' => $mechanic,
        'price' => $price
    );

    // Calculate the total price
    $total += $price;
}

$Schedule = new Schedules();
$Schedule->sched_id = $res->AUTO;
$Schedule->USERID = $userId;
$Schedule->CUSTOMERID = $customerId;
$Schedule->date = $date;
$Schedule->time = $time;
$Schedule->mech_name = $mechanic;
$Schedule->price = $total;


$existingSchedule = getExistingSchedule($date, $time, $mechanic);
if ($existingSchedule) {
    // Same data already exists, send an error message
    $response = array(
        'success' => false,
        'message' => 'Schedule already exists. Please choose a different date, time, or mechanic.'
    );
} else {
    $Schedule->remarks = "Pending";
    $Schedule->status = "Active";
    $Schedule->create();

    $autonumber->auto_update('sched_id');

    // Example: Simulate a successful booking process
    $response = array(
        'success' => true,
        'message' => 'Booking processed successfully!',
        'processedBookings' => $processedBookings
    );

    $query = "SELECT * FROM `tblcustomer` 
    WHERE  CUSTOMERID = '$customerId'";
    $mydb->setQuery($query);
    $cur = $mydb->loadSingleResult();
    
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
    $mail->addAddress($cur->EMAILADD);
    $mail->isHTML(true);
    $mail->Subject = "Booking Service";
    $mail->Body = "We are pleased to inform you that your car service booking has been Created. Wait for the confirmation of our Mechanic.
    We appreciate your trust in our 
    services and look forward to providing you with exceptional car care. Date: ".$date." Time: ".$time." Thank you sir/ma'am  ".$cur->FNAME." ".$cur->LNAME."";
    $mail->send();
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);


?>


