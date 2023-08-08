<?php


$query = "SELECT * FROM `tblaboutus` WHERE 1";
$mydb->setQuery($query);
$result = $mydb->loadResultList();

if ($result) {
  foreach ($result as $row) {
      // Access columns by their names
      $email = $row->email;
      $phone = $row->phone;
      $address = $row->address;
      $fb_name = $row->facebook_name;
      $fb_link = $row->facebook_link;
      $website = $row->website;

?>

<div id="contact-page" class="container">
        <div class="bg">
            <div class="row">           
                <div class="col-sm-12">                         
                    <h2 class="title text-center">About <strong>Us</strong></h2>                                                      
                            <div id="map"></div>
                    </div>
                </div>     
                

            </div>   
            <div class="container">
        <h2>Gencarz Unlimited - Your Trusted Auto Care Partner</h2>
        <p><i>Quality Services, Affordable Prices</i></p>
        <p>Is your vehicle in need of professional care? Look no further! At Gencarz Unlimited, we provide top-notch automotive services to keep your ride running smoothly.</p>
        <div class="row col-md-12">
            <div class="col-md-6">
                <h3>Our Services Include:</h3>
                <ul>
                    <li>• Routine Maintenance</li>
                    <li>• Oil Changes</li>
                    <li>• Brake Inspections</li>
                    <li>• Engine Diagnostics</li>
                    <li>• Tire Rotation and Balancing</li>
                    <li>• And More!</li>
                </ul>
            </div>
            <div class="col-md-6">
            <h3>Why Choose Us?</h3>
            <ul>
                <li>• Experienced Technicians</li>
                <li>• State-of-the-Art Equipment</li>
                <li>• Transparent Pricing</li>
                <li>• Fast and Efficient Service</li>
                <li>• Customer Satisfaction Guaranteed</li>
            </ul>
            </div>
        </div>
        <div class="contact">
            <h3>Contact us today or schedule an appointment!</h3>
            <p><strong> Book Appointment Today </strong> <i class="fa fa-arrow-right"> </i> <a href="<?php web_root?>index.php?q=services" class="btn btn-primary"><i class="fa fa-envelope"></i> Book now</a></p>
            <p><a href="mailto:<?php echo $email ?>"><i class="fa fa-envelope"></i>  Email: <?php echo $email ?></a></p>
            <p><a href="tel:<?php echo $phone ?>"><i class="fa fa-phone"></i>  Phone: <?php echo $phone ?></a></p>
            <p><a href="#"><i class="fa fa-map-marker"></i>  Address: <?php echo $address ?></a></p>
            <p>Visit our website at <a href="#"><?php echo $website ?></a> to learn more about our services and book an appointment online.</p>
        </div>


        <div class="social">
            <h3>Follow us on</h3> 
            <p><a href="<?php echo $fb_link ?>"><i class="fa fa-facebook"></i> <?php echo $fb_name ?></a></p> 
            <p>for updates, tips, and special offers!</p>
        </div>
        <div class="hashtags">
            <a>#AutoCare #CarMaintenance #QualityService #YourAutoShopName</a>
        </div>
    </div>   
        <hr style="margin-bottom: 30px;"></hr>
        </div>  
    </div><!--/#contact-page-->

    <?php
    
    
    
  }
}
    
    ?>