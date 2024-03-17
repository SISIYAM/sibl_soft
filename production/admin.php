<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){


  header('location:admin_login.php');
  

}
$time= time();
include 'php/auto.php';
include 'credential.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

?>
<?php 
include 'dbcon.php' ;
include 'includes/head.php';
?>



<?php $nme = $_SESSION['username']; ?>
<!-- Published & Unpublished Code Start -->

<?php
   /* unpublished */
   if(isset($_POST['deactivated'])){
    $idstatus = $_POST['id'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $unpublished = "UPDATE admin SET status = '{$status}' WHERE id='{$idstatus}' ";
    $unpublished_query = mysqli_query($con, $unpublished );
    
    if($unpublished_query){

                
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
        <h3><b>$username ! Your Account has been Deactivated by <Span style='color:#D72408;'>$nme</Span>, Now you are not able to log in! If you think this is our mistake, then you can contact us. !</b></h3> 
       
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
          $mail->setFrom(EMAIL,'support@siblbonpara');     //Add a recipient
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
       location.replace("admin.php");
     </script>
     <?php 
    }else{
     ?>
     <script>
       alert("Failed");
     </script>
     <?php
    } 
  }

  /* published */
  if(isset($_POST['Activated'])){
    $idstatus = $_POST['id'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $unpublished = "UPDATE admin SET status = '{$status}' WHERE id='{$idstatus}' ";
    $unpublished_query = mysqli_query($con, $unpublished );
    
    if($unpublished_query){

                   
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
    <h3><b>$username, Your Account has been Approved by <Span style='color:#D72408;'>$nme</Span>, Now you can log in!</b></h3> 
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
      $mail->setFrom(EMAIL,'support@siblbonpara');     //Add a recipient
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
       location.replace("admin.php");
     </script>  
     <?php 
    }else{
     ?>
     <script>
       alert("Failed");
     </script>
     <?php
    } 
  }

   ?>

   <!-- Published & Unpublished Code End -->

   
<!-- promote & demote Code Start -->

<?php
   /* demote */
   if(isset($_POST['demote'])){
    $idmain = $_POST['id'];
    $main = $_POST['main'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $demote = "UPDATE admin SET main = '{$main}' WHERE id='{$idmain}' ";
    $demote_query = mysqli_query($con, $demote );
    
    if($demote_query){  

                   
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
    <h3><b>$username, Your are Demoted to Moderator by <Span style='color:#D72408;'>$nme</Span> !</b></h3> 
   
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
      $mail->setFrom(EMAIL,'support@siblbonpara');     //Add a recipient
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
       location.replace("admin.php");
     </script>
     <?php 
    }else{
     ?>
     <script>
       alert("Failed");
     </script>
     <?php
    } 
  }

  /* promote */
  if(isset($_POST['promote'])){
    $idmain = $_POST['id'];
    $main = $_POST['main'];
 $email = $_POST['email'];
    $username = $_POST['username'];
    
    $promote = "UPDATE admin SET main = '{$main}' WHERE id='{$idmain}' ";
    $promote_query = mysqli_query($con, $promote );
    
    if($promote_query){

                    
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
    <h3><b>Congratulations $username, Your are promoted to Main Admin by <Span style='color:#D72408;'>$nme</Span> !</b></h3> 
   
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

    ?>
     
      <script>
       location.replace("admin.php");
     </script>  
     <?php 
    }else{
     ?>
     <script>
       alert("Failed");
     </script>
     <?php
    } 
  }

   ?>

   <!-- Published & Unpublished Code End -->

  <body class="nav-md">
    
       <?php include "includes/nav.php" ?>



 
  <!--======================== Delete Modal===============================-->
  <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="delete/admin_delete.php" method="POST"> 
        <div class="modal-body">
          <input type="hidden" name="delete_id" class="delete_user_id">
          <b>Select "Confirm" below if you are ready to Delete this account.</b>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

        
          
            <button type="submit" name="delete_btn" class="btn btn-primary">Confirm</button>

          </form>


        </div>
      </div>
    </div>
  </div>
   <!--======================== End Delete Modal===============================-->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           

    <!---start---->

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                  <?php
if(isset($_SESSION['msg2'])){
  ?>
  <div class="alert alert-success">
 <h5> <b>  <?php
    echo $_SESSION['msg2']; 
    unset($_SESSION['msg2']);
    ?></b></h5>
  </div>
  <?php
}

          ?>
                    <h2>Admin Accounts List<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="add_admin.php" style="margin-right:30px;"> <input type="submit" value="Add New Admin" class="btn btn-success"></a>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                   
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                      
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>UserName</th>
                          <th>Email</th>
                         <th>Status</th>
                         <th>Post</th>
                         <?php  if($_SESSION['main']==1){
                        echo"<th>Action</th>";
                         }
                          
                          ?>
                        </tr>
                      </thead>

                      <tbody>

        <!---php Code start---->
<?php
date_default_timezone_set('Asia/dhaka');
 
function getDateTimeDiff($date){
    $now_timestamp = strtotime(date('Y-m-d H:i:s'));
    $diff_timestamp = $now_timestamp - strtotime($date);
    
    if($diff_timestamp < 60){
     return 'few seconds ago';
    }
    else if($diff_timestamp>=60 && $diff_timestamp<3600){
     return round($diff_timestamp/60).' mins ago';
    }
    else if($diff_timestamp>=3600 && $diff_timestamp<86400){
     return round($diff_timestamp/3600).' hours ago';
    }
    else if($diff_timestamp>=86400 && $diff_timestamp<(86400*30)){
     return round($diff_timestamp/(86400)).' days ago';
    }
    else if($diff_timestamp>=(86400*30) && $diff_timestamp<(86400*365)){
     return round($diff_timestamp/(86400*30)).' months ago';
    }
    else{
     return round($diff_timestamp/(86400*365)).' years ago';
    }
   }

?>


        <!----active---->
        <?php
$no = 1 ;
$selectquery = " select * from  admin";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
$style="color:#fff; font-size:10px; font-weight:bold; border-radius:10px; padding:1px 3px; background:#E7150F;"; 
$current_status="Ofline";

if($res['last_login']>$time){
  $style="color:#fff; font-size:10px; font-weight:bold; border-radius:10px; padding:1px 3px; background:#23BB48;";
  $current_status="Online";
}

   ?>


<?php $idst = $res['id'];?>  
<?php $emailst = $res['email'];?>  
<?php $userst = $res['username'];?>  
<?php $admin_id = $res['id']; ?> 

    <tr>
    <td><?php echo $no; ?></td>
    <td><div style="display:flex; justify-content:space-between;"><b style="margin-right:20px;"><?php echo $res['username'] ?></b> <p style="<?php echo $style ?>" >
    <?php echo $current_status ?></p></div> 
    <?php
   if($res['last_login']<$time){
   $last_logout=getDateTimeDiff($res['last_logout']);
   echo "<p style='float:right; font-size:12px; font-weight:bold; color:#0F5A95; margin:auto;'>$last_logout</p>";
   
   }
   ?>  
    
</td>
    <td><?php echo $res['email'] ?></td>
    <td>
    <?php
                  if($res['status']==1){
                    echo "
                    <button class='btn btn-success btn-sm' disabled>Activate</button>
                    ";
  
                  }else{
                   
                    echo "
                    <button class='btn btn-warning btn-sm' disabled>Pending</button>
              
                    ";       
                   
                  }
                  ?>

    </td>
    <td>
    <?php
                  if($_SESSION['main']==1){
                    if($res['main']==1){
                      echo "
                      <span style='display:flex; justify-content:space-between;'><button class='btn btn-light btn-sm'  >Main Admin</button>
                      <form  style='margin:auto; action='' method='post'>
                      <input type='hidden' name='id' value='$idst'> 
                      <input type='hidden' name='email' value='$emailst'>
                      <input type='hidden' name='username' value='$userst'>
                      <input type='hidden' name='main' value='0'>
                      <button name='demote' class='btn btn-secondary btn-sm'  data-toggle='tooltip' 
                      data-placement='top' title='Demote to Moderator'><i class='fa fa-angle-double-down'></i> Demote</button>
                      </form> </span>
                      
                      ";
    
                    }else{
                     
                      echo "
                      <span style='display:flex; justify-content:space-between;'><button class='btn btn-light btn-sm'  >Moderator</button>
                      <form  style='margin:auto; action='' method='post'>
                      <input type='hidden' name='id' value='$idst'> 
                      <input type='hidden' name='email' value='$emailst'>
                      <input type='hidden' name='username' value='$userst'>
                      <input type='hidden' name='main' value='1'>
                      <button name='promote' class='btn btn-info btn-sm'  data-toggle='tooltip' 
                      data-placement='top' 
                      title='Promote to Main Admin'><i class='fa fa-angle-double-up'></i> Promote</button></form></span>
                
                      ";       
                     
                    }
                  }else{
                    if($res['main']==1){
                      echo "
                     <button class='btn btn-light btn-sm'  >Main Admin</button>  ";
    
                    }else{
                     
                      echo "
                     <button class='btn btn-light btn-sm'  >Moderator</button>";       
                     
                    }
                  }
                  ?>
    </td>

<?php

if($res['status']==1){

  if($_SESSION['main']==1){
    echo  
    "<td><div style='display:flex;'>
   
    <form  style='margin:auto; action='' method='post'>
    <input type='hidden' name='id' value='$idst'> 
    <input type='hidden' name='email' value='$emailst'>
    <input type='hidden' name='username' value='$userst'>
    <input type='hidden' name='status' value='0'>
    <input type='submit' name='deactivated' class='btn btn-warning btn-sm' value='Make Deactivated'  data-toggle='tooltip' 
    data-placement='top' 
    title='Make Deactivated'>
    </form>
    <button style='margin:auto;' type='button' value='$admin_id' class='btn btn-danger btn-sm deletebtn'>Delete</button>
    </div></td>";
   }else{
    
   }

}else{
  if($_SESSION['main']==1){
    echo  
    "<td><div style='display:flex;'>
    
    <form style='margin:auto; action='' method='post'>
  <input type='hidden' name='id' value='$idst'>
  <input type='hidden' name='email' value='$emailst'>
  <input type='hidden' name='username' value='$userst'>
  <input type='hidden' name='status' value='1'>
  <input type='submit' name='Activated' class='btn btn-primary btn-sm' value='Confirm' 
   data-toggle='tooltip' data-placement='top' 
  title='Make Activated '>
  </form>
  <button style='margin:auto;' type='button' value='$admin_id' class='btn btn-danger btn-sm deletebtn'>Delete</button>
    </div></td>";
   }else{
    
   }
        
 
}
 
?>
    

  
    </tr>
   <?php

  $no++ ; 
}


?>


                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>

              <!----END---->

            
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
          <a href="#"><b>Developed By MD SAYMUM ISLAM SIYAM <br>
        Contact:si31siyam@gmail.com</b></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>


<!--------Delete PopUp------->

<script>
$(document).ready(function(){
  $('.deletebtn').click(function(e){
    e.preventDefault();

    var user_id = $(this).val();
   $('.delete_user_id').val(user_id);
   $('#DeleteModal').modal('show');
  });
});
</script>

<?php include 'includes/js.php'; ?>