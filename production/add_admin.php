<?php 
include "dbcon.php";
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){


  header('location:admin_login.php');
  

}
include 'credential.php';
include 'php/auto.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<?php include 'includes/head.php'; ?>

  <body class="login">


  <?php $nme = $_SESSION['username']; ?>
  <?php

include 'dbcon.php';

if(isset($_POST['submit'])){
$username = mysqli_real_escape_string($con, $_POST['username']) ;
$email = mysqli_real_escape_string($con, $_POST['email']) ;
$password = mysqli_real_escape_string($con, $_POST['password']) ;
$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']) ;
$main = $_POST['main'];
$pass = password_hash($password,  PASSWORD_BCRYPT);
$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

$user_count = "select * from admin where username= '$username' ";
$queryy = mysqli_query($con,$user_count);
$usercount = mysqli_num_rows($queryy);

if($usercount > 0){
$_SESSION['msg'] = "This Username Already Exists, Please Use Another Username";
}else{
  $emailquery = " select * from admin where email= '$email'";
$query = mysqli_query($con,$emailquery);

$emailcount = mysqli_num_rows($query);

if($emailcount>0){
$_SESSION['msg'] = "This Email Already Exists, Please Use Another Email";
}else{
if($password === $cpassword){

  $insertquery = "INSERT INTO `admin` ( `username`, `email`, `password`, `cpassword`, `status`, `main`)
  VALUES ( '$username', '$email', '$pass', '$cpass', '0', '$main')";

    $iquery = mysqli_query($con, $insertquery);

if($iquery){
              
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
  <p><b>$username,  Your Account has been Created Successfully by <Span style='color:#D72408;'>$nme</Span>, Please wait for approval from admin before log in!</b></p> 
 
  <div class='content' style='display:inline-grid; justify-content: space-between;'>
    <h4> Your new login information below-</h4>
    <b>Username=<span style='color:#0856E0;'> $username</span></b>
    <b>Email= <span style='color:#0B8E4D;'>$email</span></b>
    <b>Password= <span style='color:#E00808;'> $password </span></b>
   
  </div> <br><br>
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


       $_SESSION['msg2']= "$username's account was created successfully. Please wait for approval from the admin before log in!";

?>
<script>
    location.replace("admin.php");
</script>
<?php



}else{

    ?>
           <script>
                 alert("Registration failed ");
             </script>
      <?php
}

}else{

$_SESSION['msg'] = "Password and confirm password do not match";

     }
  }
}



}


?>


<div  style="text-align: center; margin-top:50px; margin-bottom:-60px; color:#000000;">
                     <h2>Social Islami Bank Limited.</h2>
                      <h4><b> Bonpara Outlet </b></h4>
                      <p style="font-weight:500;">Bonpara Pouro Market 2nd floor, Bonpara ,Natore<br>Phone: 01770078171</p>   
                     </div>

    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <?php
if(isset($_SESSION['msg'])){
  ?>
  <div class="alert alert-danger">
    <?php
    echo $_SESSION['msg']; 
    unset($_SESSION['msg']);
    ?>
  </div>
  <?php
}

          ?>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
              <h1>Registration Form</h1>
            <?php 
            if($_SESSION['main']==1){
              echo'  <div>
              <input type="text" name="username" class="form-control" placeholder="Username" required="" /> 
            </div>
            <div>
              <input type="email" name="email" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
            <select name="main" class="form-control" required>
            <option>Select Type</option>
           <option value="1" >Main Admin</option>
           <option value="0" >Moderator</option>
            </select>
          </div> <br>
            <div>
              <input type="password" name="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required="" />
            </div>
            <div>
             <input type="submit" name="submit" class="btn btn-info" value="Registar">
            </div>';
            }else{  
              echo'  <div>
              <input type="text" name="username" class="form-control" placeholder="Username" required="" /> 
            </div>
            <div>
              <input type="email" name="email" class="form-control" placeholder="Email" required="" />
            </div>
            <input type="hidden" name="main" value="0">
            <div>
              <input type="password" name="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required="" />
            </div>
            <div>
             <input type="submit" name="submit" class="btn btn-info" value="Registar">
            </div>';
            }
            
            ?>
  <a href="admin.php" class="btn btn-primary" style="text-decoration:none;">Cancel</a>
              <div class="clearfix"></div>
            </form>
            
          </section>
        
        </div>
      </div>
    </div>
  </body>
</html>
<?php include 'includes/js.php'; ?>