<?php require_once ("include/initialize.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gencarz | E-Shop</title>
    <link href="css/bootstrap.minv4.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
  <link href="css/mainv9.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
    <link href="css/starcsss.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/home/2.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head><!--/head-->


<link href="<?php echo web_root ?>css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="<?php echo web_root ?>/js/bootstrap.min.js"></script>
<script src="<?php echo web_root ?>jquery/jquery.min.js"></script> 

 </style>
 <?php 
	if (isset($_POST['recover-submit'])) {
		# code...
		$_SESSION['phonenumber'] = $_POST['phonenumber'];
		$customer = New Customer();
    @$res = $customer->find_phone($_SESSION['phonenumber']);

      	if ($res) {
      		# code...
      		$code = mt_rand(1000,10000);

          $_SESSION['recovery_code'] = $code;

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
										$mail->Subject = "Password Recovery Code";
										$mail->Body = "[Gencarz Unlimited]
										Your Password Recovery Code is, ".$_SESSION['recovery_code']."
										Your Account:
										Email: ".$res->EMAILADD."";
										$mail->send();


	        $sql = "INSERT INTO `messageout` (`Id`, `MessageTo`, `MessageFrom`, `MessageText`) VALUES (Null, '".$_SESSION['phonenumber']."','Gencarz Unlimited','".'Your code is ' .$_SESSION['recovery_code']."')";
	        $mydb->setQuery($sql);
	        $mydb->executeQuery();

			redirect('passwordrecover.php?code');
      	}else{
      		//redirect('passwordrecover.php?code='.$code);
      		$phonemessage = '<p>Your phone number is incorrect.</p>';
      	}
 
	}
	if (isset($_POST['validatecode-submit'])) {
		# code... 
		if ($_SESSION['recovery_code']==$_POST['resetcode']) {
			# code...
	   		redirect('passwordrecover.php?resetpassword');
		}else{
			$codemessage = '<p>Your code is incorrect.</p>';
		}
	}
	if (isset($_POST['savepass-submit'])) {
		# code...
  
		$customer = New Customer();
      	$res = $customer->find_phone($_SESSION['phonenumber']);
      	if ($res) {
      		# code...

			$customer = New Customer();   
			$customer->CUSPASS			= sha1($_POST['newpassword']);	
			$customer->update($res->CUSTOMERID);

      	}

		unset($_SESSION['phonenumber']);
    unset($_SESSION['recovery_code']);

	 redirect('passwordrecover.php?success');
	}

?>
 <div class="form-gap"></div>
 <?php if (isset($_GET['code'])) { 
  $phoneNumber = $_SESSION['phonenumber'];

  // Query the database to retrieve the name based on the phone number
  $query = "SELECT * FROM `tblcustomer` WHERE `PHONE` = '" . $phoneNumber . "'";
  $mydb->setQuery($query);
  $customer = $mydb->loadSingleResult();
  ?>


<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <p>We have sent the code in this email</p>
                  <h4 class="text-center"><?php echo $customer->EMAILADD?></h4>
                  <?php echo isset($codemessage) ? $codemessage : "";?>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-code color-blue"></i></span>
                          <input id="resetcode" name="resetcode" placeholder="Input your Code Number here" class="form-control"  type="number" required="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="validatecode-submit" class="btn btn-lg btn-primary btn-block" value="Submit" type="submit">
                        <a href="index.php">Back to site</a>
                      </div> 
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<?php  }elseif(isset($_GET['resetpassword'])){ ?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Success</h2>
                  <p>Change your password.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user color-blue"></i></span>
                          <input id="newpassword" name="newpassword" placeholder="New Password" class="form-control"  type="password" required="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="savepass-submit" class="btn btn-lg btn-primary btn-block" value="Save" type="submit">
                        <a href="index.php">Back to site</a>
                      </div> 
                      <input type="hidden" class="hide" name="token" id="token" value="<?php echo $_SESSION['phonenumber']; ?>"> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<?php  }elseif(isset($_GET['success'])){ ?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-4">
          	<h2 style="color: blue">Password has been change</h2>
          	 <a href="index.php">Back to login</a>
          </div>
	</div>
<?php  }else{ ?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                   <?php echo isset($phonemessage) ? $phonemessage : "";?>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-phone color-blue"></i></span>
                          <input id="phonenumber" name="phonenumber" placeholder="Enter your Phone Number" class="form-control"  type="number" required="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Send" type="submit">
                        <a href="index.php">Back to site</a>
                      </div> 
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<?php } ?>


