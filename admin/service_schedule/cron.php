<?php
require_once("../../include/initialize.php");

// Include your database connection code here
$conn = mysqli_connect("localhost", "genc3181_root", "rootroot", "genc3181_a");

// Update and email sending logic
if ($conn) {
    // Get the current date and time
    $currentDateTime = new DateTime();
    $currentDateTime->modify('-30 minutes');
    $currentDate = $currentDateTime->format('Y-m-d H:i:s');

    // Update records that are more than 30 minutes late
    $updateQuery = "UPDATE tblschedule 
    SET remarks = 'Inactive' 
    WHERE (remarks = 'Pending' OR remarks = 'Confirmed') AND CONCAT(date, ' ', SUBSTRING_INDEX(time, ' - ', 1)) <= '$currentDate'
    ";
    mysqli_query($conn, $updateQuery);
        // Fetch data for email
        $getEmailQuery = "
        SELECT c.EMAILADD 
        FROM tblschedule AS s
        INNER JOIN tblcustomer AS c ON s.CUSTOMERID = c.CUSTOMERID
        WHERE (s.remarks = 'Inactive') AND CONCAT(s.date, ' ', SUBSTRING_INDEX(s.time, ' - ', 1)) <= '$currentDate'";
    
        $result = mysqli_query($conn, $getEmailQuery);

        if (!$result) {
            die('Query Error: ' . mysqli_error($conn));
        }
        
        while ($res = mysqli_fetch_assoc($result)) {
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
            $mail->addAddress($res['EMAILADD']);
            $mail->isHTML(true);
            $mail->Subject = "Gencarz booking Status";
            $mail->Body = '<html>
            <head>
                <style>
                    /* Add your CSS styles here */
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        padding: 20px;
                    }
                    .container {
                        border: 1px solid #ccc;
                        background-color: #ffffff;
                        padding: 20px;
                    }
                    h2 {
                        color: #333;
                    }
                    .logo {
                        text-align: center;
                    }
                    .logo img {
                        max-width: 150px;
                        height: auto;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="logo">
                        <img src="https://gencarzauto.online/images/home/NC%20LOGO.png" alt="Gencarz Unlimited Logo">
                    </div>
                    <h2>Gencarz Unlimited - Service Booking Status Update</h2>
                    <p><strong>Booking Details:</strong><br>
                        We are sorry to inform you but it seems like you are late more than 30mins late your booking schedule now set to inactive.
                </div>
            </body>
            </html>';
            
            try {
                $mail->send();
                echo "Email sent successfully to: " . $res['EMAILADD'] . "<br>";
            } catch (Exception $e) {
                echo "Email could not be sent. Mailer Error: " . $mail->ErrorInfo . "<br>";
            }

        }
        
        echo "Update process executed successfully and emails sent.";
    }

    mysqli_close($conn);
    
?>
