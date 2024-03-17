<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){


  header('location:admin_login.php');
  

}
include 'php/auto.php';
include 'credential.php';
include 'includes/head.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

?>


<body class="nav-md">
  <?php include "includes/nav.php" ?>
  <!-- /top navigation -->

  <!------Insert Code Start----->



  <!-----=====Change Pass===============---->




  <?php
$username= $_SESSION['username'];
$reciver_email= $_SESSION['email'];
$admin_id= $_SESSION['id'];

if(isset($_POST['changePass_btn'])){
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $c_password = $_POST['c_password'];

    $new_pass = password_hash($new_password,  PASSWORD_BCRYPT);
    $c_pass = password_hash($c_password, PASSWORD_BCRYPT);

    $password_search = " select * from admin where id='$admin_id' and status=1 ";
    $query = mysqli_query($con,$password_search);

    $password_count = mysqli_num_rows($query);

    if($password_count){
        $password_pass = mysqli_fetch_assoc($query);

        $db_pass = $password_pass['password'];

        $pass_decode = password_verify($old_password, $db_pass);

        if($pass_decode){
         
            if($new_password === $c_password){



                $q ="UPDATE admin SET password = '{$new_pass}',cpassword = '{$c_pass}' WHERE id = {$admin_id}";
                  $querry = mysqli_query($con,$q);

                  if($querry){

                  
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
    $mail->Username   = EMAIL;                     //SMTP username
    $mail->Password   = PASS;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom(EMAIL,NAME);     //Add a recipient
    $mail->addAddress($reciver_email);               //Name is optional
    $mail->addReplyTo('no-replay@gmail.com', 'No-replay');

   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'SIBL BONPARA';
    $mail->Body    = $msg;

    $mail->send();


                    //Email

                 ?>
  <script>
  alert("Your Password has been changed successfully ");
  </script>
  <?php
                ?>
  <script>
  location.replace("change.php");
  </script>
  <?php
                  }else{
                    ?>
  <script>
  alert("Password changing Failed ");
  </script>
  <?php
                ?>
  <script>
  location.replace("change.php");
  </script>
  <?php
                  }
               

            }else{

            ?>
  <script>
  alert("Password and Confirm Password do not match, Please try again!");
  </script>
  <?php     
            ?>
  <script>
  location.replace("change.php");
  </script>
  <?php           
      
            }

         }else{
               ?>
  <script>
  alert("Old Password Is Incorrect, Please Try Again!");
  </script>
  <?php
               ?>
  <script>
  location.replace("change.php");
  </script>
  <?php
         }

     }else{
               ?>
  <script>
  alert("Invalid password ");
  </script>
  <?php?>
  <script>
  location.replace("change.php");
  </script>
  <?php
     }

}

?>




  <!-----Insert Code End----->



  <!--======================== Delete Modal===============================-->
  <div class="modal fade" id="changePassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to change your password?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST">
          <div class="modal-body">


            <div class="item form-group">
              <label class="col-form-label col-md-4 col-sm-3 label-align" for="name">Old Password<span
                  class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-6 ">
                <input type="text" name="old_password" value="" required="required" class="form-control ">
              </div>
            </div>

            <div class="item form-group">
              <label class="col-form-label col-md-4 col-sm-3 label-align" for="name">New Password<span
                  class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-6 ">
                <input type="text" name="new_password" value="" required="required" class="form-control ">
              </div>
            </div>

            <div class="item form-group">
              <label class="col-form-label col-md-4 col-sm-3 label-align" for="name">Confirm Password<span
                  class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-6 ">
                <input type="text" name="c_password" value="" required="required" class="form-control ">
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>



            <button type="submit" name="changePass_btn" class="btn btn-primary">Confirm</button>

        </form>


      </div>
    </div>
  </div>
  </div>
  <!--======================== End Delete Modal===============================-->

  <?php

if(isset($_POST['edit_Btn'])){
  
  $username = $_POST['username'];
  $email = $_POST['email'];
  
  
  
   $q ="UPDATE admin SET username = '{$username}',email = '{$email}' WHERE id = {$admin_id}";
     $querry = mysqli_query($con,$q);
  
  
    
     if($querry){

                    
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
    <p><b>$username,  Your Account Information has been changed successfully.</b></p> 
   
    <div class='content' style='display:inline-grid; justify-content: space-between;'>
      <h4> Your new login information below-</h4>
      <b>Username=<span style='color:#0856E0;'> $username</span></b>
      <b>Email= <span style='color:#0B8E4D;'>$reciver_email</span></b>
     
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

      ?>
  <script>
  alert("Update Successfully");
  </script>
  <?php
  ?>
  <script>
  location.replace("change.php");
  </script>
  <?php 
  
        
    }else{
      ?>
  <script>
  alert("Failed ");
  </script>
  <script>
  location.replace("change.php");
  </script>
  <?php
    }
  
  
  }
  
?>

  <!--======================== PassChange Modal===============================-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to change your information?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST">
          <div class="modal-body">

            <?php


$query = " select * from  admin where id='$admin_id' ";
$query_run = mysqli_query($con,$query);
$nums = mysqli_num_rows($query_run);

while($result= mysqli_fetch_array($query_run)){
?>

            <div class="item form-group">
              <label class="col-form-label col-md-4 col-sm-3 label-align" for="name">Username<span
                  class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-6 ">
                <input type="text" name="username" value="<?php echo $result['username']; ?>" required="required"
                  class="form-control ">
              </div>
            </div>

            <div class="item form-group">
              <label class="col-form-label col-md-4 col-sm-3 label-align" for="name">Email<span
                  class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-6 ">
                <input type="text" name="email" value="<?php echo $result['email']; ?>" required="required"
                  class="form-control ">
              </div>
            </div>

            <?php

}


?>





          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>



            <button type="submit" name="edit_Btn" class="btn btn-primary">Confirm</button>

        </form>


      </div>
    </div>
  </div>
  </div>
  <!--======================== End Delete Modal===============================-->



  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">



      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">

              <h2>You Profile Informaion</h2>
              <ul class="nav navbar-right panel_toolbox">
                <button style="margin-right:30px;" class="btn btn-info" id="changeBtn"><i class="fa fa-key"
                    aria-hidden="true"></i>
                  Change Password</button>
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />


              <?php 
            $ret=mysqli_query($con,"select * from admin where id='$admin_id'");
            while($row=mysqli_fetch_array($ret))
            {

            ?>



              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">User Name<span
                    class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input readonly type="text" name="name" value="<?php echo $row['username']; ?>" required="required"
                    class="form-control ">
                </div>
              </div>

              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Email<span
                    class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input readonly type="text" value="<?php echo $row['email']; ?>" required="required"
                    class="form-control ">
                </div>
              </div>

              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Your Post<span
                    class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input readonly type="text" value="<?php  
                        if($row['main']==1){
                          echo"Main Admin";
                        }else{
                          echo"Moderator";
                        }
                        
                        ?>" required="required" class="form-control ">
                </div>
              </div>

              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Account Status<span
                    class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input readonly type="submit" class="btn btn-success btn-sm" value="<?php  
                        if($row['status']==1){
                          echo"Active";
                        }else{
                          echo"Pending";
                        }
                        
                        ?>" required="required" class="form-control ">
                </div>
              </div>

              <div class="ln_solid"></div>

              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <button class="btn btn-danger" type="button">Cancel</button>

                  <button type="submit" id="editBtn" class="btn btn-primary">Change</button>
                </div>
              </div>
              <?php

}?>

            </div>
          </div>
        </div>
      </div>


      <?php include "includes/footer.php"?>

</body>

</html>



<!-------- PopUp------->

<script>
$(document).ready(function() {
  $('#changeBtn').click(function(e) {
    e.preventDefault();
    $('#changePassModal').modal('show');
  });
});
</script>

<script>
$(document).ready(function() {
  $('#editBtn').click(function(e) {
    e.preventDefault();
    $('#editModal').modal('show');
  });
});
</script>

<?php include 'includes/js.php'; ?>