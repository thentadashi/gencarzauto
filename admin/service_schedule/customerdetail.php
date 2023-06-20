<?php  
 
     if (!isset($_SESSION['USERID'])){
      redirect("index.php");
     }
 
  ?>
    

 <?php
  $customer = New customer;
  $res = $customer->single_customer($_GET['customerid']); 
  ?>  


<style type="text/css">
  .profile-container {
    max-width: 760px;
    margin: 0 auto;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .profile-picture {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin: 0 auto;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .profile-picture img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .profile-heading {
    text-align: center;
    margin-top: 20px;
    margin-bottom: 10px;
  }

  .profile-row {
    display: flex;
    margin-bottom: 15px;
  }

  .profile-label {
    flex: 1;
    font-size: 16px;
    font-weight: bold;
  }

  .profile-data {
    flex: 1;
    font-size: 14px;
  }
</style>

<div class="profile-container">
  <div class="profile-picture">
    <img src="<?php echo web_root . 'customer/' . $res->CUSPHOTO; ?>" alt="Customer Photo">
  </div>

  <div class="profile-heading">
    <h3>Customer Information</h3>
  </div>

  <div class="profile-row">
    <div class="profile-label">First Name:</div>
    <div class="profile-data"><?php echo $res->FNAME; ?></div>

    <div class="profile-label">Last Name:</div>
    <div class="profile-data"><?php echo $res->LNAME; ?></div>
  </div>

  <div class="profile-row">
    <div class="profile-label">Gender:</div>
    <div class="profile-data"><?php echo $res->GENDER; ?></div>

    <div class="profile-label">Phone:</div>
    <div class="profile-data"><?php echo $res->PHONE; ?></div>
  </div>

  <div class="profile-row">
    <div class="profile-label">Email Address:</div>
    <div class="profile-data"><?php echo $res->EMAILADD; ?></div>

    <div class="profile-label">Status:</div>
    <div class="profile-data"><?php echo $res->status; ?></div>
  </div>

  <div class="profile-row">
    <div class="profile-label">Address:</div>
    <div class="profile-data" colspan="2">
      <?php echo $res->CUSHOMENUM; ?>
      <?php echo $res->STREETADD; ?>
      <?php echo $res->BRGYADD; ?>
      <?php echo $res->CITYADD; ?>
    </div>
    <div class="profile-data" colspan="2">

    </div>
    <div class="profile-data" colspan="2">

    </div>
  </div>
</div>
