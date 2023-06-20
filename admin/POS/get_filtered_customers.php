<?php
require_once("../../include/initialize.php");

if (!isset($_SESSION['USERID'])) {
  // Redirect if user is not logged in
  redirect(web_root."admin/index.php");
}

// Check if the search term is provided
if (isset($_GET['search'])) {
  $searchTerm = $_GET['search'];

  // Prepare the SQL query
  $query = "SELECT `FNAME`, `LNAME`, `CUSTOMERID` FROM `tblcustomer` WHERE `FNAME` LIKE '%$searchTerm%' OR `LNAME` LIKE '%$searchTerm%'";
  $mydb->setQuery($query);
  $result = $mydb->loadResultList();

  // Set the response headers
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');

  // Convert the result to JSON format and send the response
  echo json_encode($result);
} else {
  // Handle error when search term is not provided
  header('HTTP/1.1 400 Bad Request');
  echo json_encode(array('error' => 'Search term not provided'));
  exit();
}
?>
