<?php
require_once("include/initialize.php");

// Assuming you have already established a database connection

// Retrieve the selected car type and service ID from the AJAX request
$selectedCarType = $_POST['carType'];
$selectedServiceId = $_POST['serviceId'];

// Prepare the SQL query with a parameter placeholder
$query = "SELECT {$selectedCarType} AS price FROM `services` WHERE `serv_id` ='$selectedServiceId'";
$mydb->setQuery($query);
$result = $mydb->loadResultList();

// Set the response headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Check if the query was successful
if ($result) {
  // Fetch the price from the result
  $row = $result[0]; // Assuming there will be only one row returned
  $price = $row->price; // Use the arrow operator to access the property

  // Return the retrieved price as a response
  echo json_encode($price);
} else {
  // Return an error message if the query fails
  echo json_encode("Failed to retrieve price from the database.");
}
?>
