<?php
require_once ("include/initialize.php");
// if(isset($_SESSION['IDNO'])){
// 	redirect(web_root.'index.php');

// }

$content='home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';




switch ($view) {
 

	case 'product' :
        $title="Products";	
		$content='menu.php';		
		break;
 	case 'cart' :
        $title="Cart List";	
		$content='cart.php';		
		break;
 	case 'profile' :
        $title="Profile";	
		$content='customer/profile.php';		
		break;
		case 'controller':
			// Handle the customer controller here
			require_once('customer/controller.php');
			break;

	case 'trackorder' :
        $title="Track Order";	
		$content='customer/trackorder.php';		
		break;

	case 'orderdetails' :
         If(!isset($_SESSION['orderdetails'])){
         $_SESSION['orderdetails'] = "Order Details";
		} 
		$content='customer/orderdetails.php';	




	if( isset($_SESSION['orderdetails'])){
      if (@count($_SESSION['orderdetails'])>0){
        	$title = 'Cart List' . '| <a href="">Order Details</a>';
		      }
		    } 
		break;

	case 'verify' :

		$content='user.otp.php';
		break;



	case 'rate'  :
		$proid = $_GET['proid'];
		$rated = $_Get['rating-star'];
		$id =$_SESSION['CUSID'];


            $query = "SELECT * FROM `tblproduct` 
            WHERE `PROID` = $proid ";
           	$check = $mydb->setQuery($query);
            $fetch = mysqli_fetch_assoc($check);
            $ratings = $fetch['ratings']; 
            $total = $rated + $ratings;
            $query = "UPDATE `tblproduct` SET `ratings` = '$total' WHERE `PROID` = '$proid'";
            $mydb->setQuery($query);	
            $mydb->executeQuery();					

            	
       			

        break;




	case 'billing' : 	
	 If(!isset($_SESSION['billingdetails'])){
         $_SESSION['billingdetails'] = "Order Details";
		} 
		$content='customer/customerbilling.php';	
		if( isset($_SESSION['billingdetails'])){
      if (@count($_SESSION['billingdetails'])>0){
        	$title = 'Cart List' . '| <a href="">Billing Details</a>';
		      }
		    } 	
		break;

	case 'contact' :
        $title="Contact Us";	
		$content='contact.php';		
		break;
 	case 'single-item' :
        $title="Product";	
		$content='single-item.php';		
		break;
	case 'details' :
	    $title="details";	
		$content ='details.php';	
		break;
	case 'services' :
			$title="services";	
			$content ='services.php';	
		break;
	case 'aboutUs' :
			$title="About Us";	
			$content ='aboutUs.php';	
		break;
	case 'recoverpassword' :
        $title="Recover Password";	
		$content='passwordrecover.php';		
		break;
	case 'recoverpassword2' :
        $title="Recover Password2";	
		$content='passwordrecover.php?code';
		break;
	default :
	    $title="Home";	
		$content ='home.php';		

}

       
    
 
require_once("theme/templates.php");
 

?>

