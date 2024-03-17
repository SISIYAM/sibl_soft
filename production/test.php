<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['submit'])){
  $msg="<html>

  <head>

    <!-- Bootstrap -->
    <link href='../vendors/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Font Awesome -->
    <link href='../vendors/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
    <!-- NProgress -->
    <link href='../vendors/nprogress/nprogress.css' rel='stylesheet'>
    
 <style>
  .content b{
    margin:10px 0;
  }
  .wrapper .alert-success{
    font-size: 20px;;
  }

 
  .img{
    border-bottom: 4px solid black;
    padding: 10px;
  }
 </style>
  </head>

  <body class='nav-md'>
     
<div class='container'>
  <div class='img'>
    <h2>SIBL BONPARA OUTLET</h2>
  </div><br>
  <div class='wrapper'>
    <p><b>$username, Your Password has been changed successfully. Now you can log in with your new password.</b></p> 
   
    <div class='content' style='display:inline-grid; justify-content: space-between;'>
      <h4> Your new login information below-</h4>
      <b>Username=<span style='color:#0856E0;'> $username</span></b>
      <b>Email= <span style='color:#0B8E4D;'>$reciver_email</span></b>
      <b>Password= <span style='color:#E00808;'> $new_password </span></b>
    </div> <br><br>
    <div class='creadit'>
      <b>Best regards</b>
      <p>Social Islami Bank Limited. Bonpara Outlet</p>
    </div>
  </div>
</div>

  </body>
</html> ";

//Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'codingmania009@gmail.com';                     //SMTP username
    $mail->Password   = 'fotteaoscuvsbmln';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('codingmania009@gmail.com');     //Add a recipient
    $mail->addAddress('si31siyam@gmail.com');               //Name is optional
    $mail->addReplyTo('no-replay@gmail.com', 'No-replay');

   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $msg;

    $mail->send();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br><br><br><br>

<form action="" method="post">
<input type="submit" name="submit" value="send" class="btn btn-info">
</form>



</body>
</html>