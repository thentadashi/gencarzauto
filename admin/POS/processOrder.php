<?php

require_once("../../include/initialize.php");

$data = $_POST['data'];
$data = json_decode($data, true);

$autonumber = new Autonumber();
$res = $autonumber->set_autonumber('ordernumber');

$customerName = $data['customerName'];
$products = $data['products'];

// Insert order details
$order = new Order();
foreach ($products as $product) {
    $order->PROID = $product['id'];                   // Replace 'id' with the actual property name in the 'products' array
    $order->ORDEREDQTY = $product['quantity'];         // Replace 'quantity' with the actual property name in the 'products' array
    $order->ORDEREDPRICE = $product['rate'];              // Replace 'rate' with the actual property name in the 'products' array
    $order->ORDEREDNUM = $res;                              // Use the generated order number
    $order->create();

    // Deduct the ordered quantity from the product quantity
    $productObj = new Product();
    $productObj->qtydeduct($product['id'], $product['quantity']);  // Replace 'id' and 'quantity' with the actual property names in the 'products' array
}

// Insert order summary
$summary = new Summary();
$summary->ORDEREDDATE = date('Y-m-d');  // Replace with the actual order date
$summary->CUSTOMERID = $customer->CUSTID;  // Use the inserted customer ID
$summary->ORDEREDNUM = $res;  // Use the generated order number
$summary->DELFEE = " ";  // Set the delivery fee
$summary->PAYMENTMETHOD = $product['paymentMethod'];  // Replace 'paymentMethod' with the actual property name in the 'products' array
$summary->PAYMENT = $product['paidAmount'];  // Replace 'paidAmount' with the actual property name in the 'products' array
$summary->ORDEREDSTATS = " ";  // Set the order status
$summary->CLAIMEDDATE = " ";  // Set the claimed date
$summary->ORDEREDREMARKS = " ";  // Set the order remarks
$summary->HVIEW = 0;  // Set the HVIEW value
$summary->create();

$autonumber = New Autonumber();
$autonumber->auto_update('ordernumber');

// Clear session variables
unset($_SESSION['gcCart']);
unset($_SESSION['orderdetails']);

echo "<script>alert('Order created successfully!');</script>";
redirect(web_root."index.php?q=profile");

?>
git config --global user.email "thentadashi@gmail.com"
  git config --global user.name "Toshtosh<3"