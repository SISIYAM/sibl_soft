<?php 
session_start();
require "dbcon.php";
include 'credential.php';
$email = "";
$name = "";
$errors = array();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM admin WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE admin SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
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
                  <div class='content' style='display:inline-grid; justify-content: space-between;'>
                    <h4>Your password reset code is <span style='color:#E00808; font-size:20px;'>  $code </span></h4>
                   
                  </div> <br>
                  <div class='creadit'>
                    <b>Best regards</b>
                    <p>Social Islami Bank Limited. Bonpara Outlet</p>
                  </div>
                </div>
                </div>
                
                </body>
                </html>";
                
                //Load Composer's autoloader
                require 'phpmailer/vendor/autoload.php';
                
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
                
                
                    //Server settings
                                        
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = EMAIL;                     //SMTP username
                    $mail->Password   = PASS;                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom(EMAIL,NAME);     //Add a recipient
                    $mail->addAddress($email);               //Name is optional
                    $mail->addReplyTo('no-replay@gmail.com', 'No-replay');
                
                   
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'SIBL BONPARA';
                    $mail->Body    = $msg;
                
                    
                
                
                                    //Email
                if($mail->send()){
                    $info = "We've sent a passwrod reset otp to your email - $email, If you do not find the mail in your inbox, please check the spam folder.";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM admin WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $status = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);

            $concpass = password_hash($cpassword, PASSWORD_BCRYPT);
            $update_pass = "UPDATE admin SET code = $code, password = '$encpass',cpassword = '$concpass',status = '$status' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
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
                  <p><b>Your password has been recovered successfully. Please wait for approval from the admin. 
                  After approval, you can log in.
                   
                  </b></p>
                  <b></b>
                 
                  <div class='content' style='display:inline-grid; justify-content: space-between;'>
                    <h3>Your Account's New Password is- <span style='color:#E00808;'> $password </span></h3>
                   
                  </div> <br>
                  <div class='creadit'>
                    <b>Best regards</b>
                    <p>Social Islami Bank Limited. Bonpara Outlet</p>
                  </div>
                </div>
                </div>
                
                </body>
                </html>";
                
                //Load Composer's autoloader
                require 'phpmailer/vendor/autoload.php';
               
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
                
                
                    //Server settings
                                        
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = EMAIL;                     //SMTP username
                    $mail->Password   = PASS;                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom(EMAIL,NAME);     //Add a recipient
                    $mail->addAddress($email);               //Name is optional
                    $mail->addReplyTo('no-replay@gmail.com', 'No-replay');
                
                   
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'SIBL BONPARA';
                    $mail->Body    = $msg;
                
                    $mail->send();
                
                
                                    //Email

                $info = "Your password changed. Please wait for approval from admin. After approval you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: admin_login.php');
    }
?>