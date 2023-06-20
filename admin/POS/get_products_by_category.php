<?php
require_once("../../include/initialize.php");

// Retrieve the category ID from the query parameter
$categoryId = $_GET['category'];

if($categoryId =="All"){
    $query = "SELECT * FROM `tblproduct` p WHERE 1";
    $mydb->setQuery($query);
    $cur = $mydb->loadResultList();

}else{
    $query = "SELECT * FROM `tblproduct` p WHERE p.`CATEGID` = '".$categoryId."'";
    $mydb->setQuery($query);
    $cur = $mydb->loadResultList();
};


// Create an array to hold the product data
$products = array();
foreach ($cur as $result) {
    $product = array(
        'PROID' => $result->PROID,
        'title' => $result->OWNERNAME,
        'price' => $result->PROPRICE,
        'PROQTY' => $result->PROQTY,
        'image' => $result->IMAGES,
    );
    $products[] = $product;
}

// Prepare the HTML response
$html = '<div class="row">';
foreach ($products as $product) {
    $html .= '
    <div class="card product-card col-lg-4" style="margin-left:15px;margin-top:10px;width:210px;" data-product="'.$product['title'].'" data-price="'.$product['price'].'" data-id="'.$product['PROID'].'" data-qty="'.$product['PROQTY'].'">
      <div class="card-body">
        <p class="card-title" style="font-size:1rem;margin-bottom:15px;">'.$product['title'].'</p>
        <img src="../products/'.$product['image'].'" class="form-control" style="margin-bottom:15px;"/>
        <span class="btn-sm btn-warning text-dark form-control"><strong>₱ '.number_format($product['price'], 2).'</strong></span>
      </div>
    </div>';
}
$html .= '</div>'; //
// Prepare the JSON response
$response = array(
    'html' => $html,
);

// Output the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
