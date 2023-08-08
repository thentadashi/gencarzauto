

<?php


require_once("../../include/initialize.php");

$data = $_POST['data'];
$data = json_decode($data, true);

$autonumber = new Autonumber();
$res = $autonumber->set_autonumber('ordernumber');

$customerName = $data['customerName'];
$customerID = $data['customerID'];
$products = $data['products'];

// Insert order details
$order = new Order();
foreach ($products as $product) {
    $productId = (int) $product['proid'];  // Clean and convert to integer
    $quantity = cleanNumber($product['quantity']);  // Clean and convert to integer
    $rate = cleanNumber($product['rate']);

    $order->PROID = $productId;                   // Replace 'id' with the actual property name in the 'products' array
    $order->ORDEREDQTY = $quantity;       // Replace 'quantity' with the actual property name in the 'products' array
    $order->ORDEREDPRICE = $rate;              // Replace 'rate' with the actual property name in the 'products' array
    $order->ORDEREDNUM = $res->AUTO;                              // Use the generated order number
    $order->create();

    // Deduct the ordered quantity from the product quantity
    $productObj = new Product();
    $productObj->qtydeduct($product['proid'], $product['quantity']);  // Replace 'id' and 'quantity' with the actual property names in the 'products' array
}

        // Insert order summary
        $summary = new Summary();
        $summary->ORDEREDDATE = date('Y-m-d H:i:s');  // Replace with the actual order date
        $summary->CUSTOMERID = (int) $customerID;  // Use the inserted customer ID
        $summary->ORDEREDNUM = $res->AUTO;  // Use the generated order number
        $summary->DELFEE = 0;  // Set the delivery fee
        $summary->PAYMENTMETHOD = $product['paymentMethod'];  // Replace 'paymentMethod' with the actual property name in the 'products' array
        $summary->PAYMENT = cleanNumber($product['gtotal2']);  // Replace 'paidAmount' with the actual property name in the 'products' array
        $summary->ORDEREDSTATS = "PAID";  // Set the order status
        $summary->CLAIMEDDATE = "";  // Set the claimed date
        $summary->ORDEREDREMARKS = "PAID";  // Set the order remarks
        $summary->HVIEW = 0;  // Set the HVIEW value
        $summary->create();

$autonumber = New Autonumber();
$autonumber->auto_update('ordernumber');

function cleanNumber($number) {
    $number = str_replace(' ', '', $number);
    $number = str_replace('.', '', $number);
    $number = preg_replace('/[^A-Za-z0-9\-]/', '', $number);
    
    if (strlen($number) > 2 && substr($number, -2) === '00') {
        $number = substr($number, 0, -2);
    }
    
    return $number;
}

?>