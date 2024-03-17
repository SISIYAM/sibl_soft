<?php

include "dbcon.php";
session_start();
session_regenerate_id();

 if(!isset($_SESSION['username'])){

 
   header('location:admin_login.php');
  
 }
 $current_time= time();
 include 'php/auto.php';

include 'includes/head.php';
?>




<body class="nav-md">
  <?php include "includes/nav.php"?>
  <!-- /top navigation -->

  <!-- page content -->
  <div class="right_col" role="main">
    <!-- top tiles -->
    <div class="" style="float:right; margin-right:50px; color:#070707;">
      <h2 style="font-weight:bolder;">Date: <?php
// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('d/m/Y');
echo $date;
?></h2>
      <h2 style="font-weight:bolder;">Time: <?php date_default_timezone_set('Asia/dhaka');
$time = date('h:i A');
echo $time;
echo "<br>";
echo strtotime($date." ".$time);
echo "<br>";
echo strtotime("8 March 2024 5:59PM UTC");
?></h2>
      <br>
      <br>


    </div> <br>

    <div class="row" style="display: inline-block;">
      <div style="padding:30px; margin:30px;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="calculator.php"
                  style="color:#25A125;">Cash Available</a></div>
              <div class="h2 mb-0 font-weight-bold text-gray-800">
                <a href="calculator.php"><?php
                
                $query = "SELECT * FROM  `calculator` ORDER BY id desc LIMIT 1";  
                $query_run = mysqli_query($con, $query);
                $nums = mysqli_num_rows($query_run);
                while($cash= mysqli_fetch_array($query_run)){
                  ?>

                  <!----Calculation------------>

                  <?php $sum = $cash['money']+$cash['deposit']+$cash['ac_dew']+$cash['commission']+$cash['bill'];?>

                  <?php  $total = $cash['withdraw']+$cash['remitance']+$cash['extra']+$cash['stamp']; ?>

                  <?php $hand_cash = $sum - $total ?>

                  <?php $available = $hand_cash - $cash['borrow']-$cash['bill']; ?>

                  <header style="color:#000000;"> <?php echo $available ?> <b>BDT</b></header>
                  <?php
                }
                ?>
                </a>
              </div>
            </div>
            <div class="col-auto">
              <b style="font-size:30px; margin-left:25px; color:#000000;"><i class="fa fa-money"
                  aria-hidden="true"></i></b>
            </div>
          </div>
        </div>
      </div>
    </div>

    <br>

    <div class="row" style="display: inline-block;">
      <div style="padding:30px; margin:30px;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="users.php"
                  style="color:#000000;">Total Accounts</a></div>
              <div class="h2 mb-0 font-weight-bold text-gray-800">
                <a href="users.php"> <?php
                
                $query = "SELECT id FROM  `accounts` ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?></a>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-----Important accounts-===========-->

    <div class="row" style="display: inline-block;">
      <div style="padding:30px; margin:30px;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="sms.php"
                  style="color:#FF1010;">Important Accounts For Send SMS*</a></div>
              <div class="h2 mb-0 font-weight-bold text-gray-800">
                <a href="sms.php"> <?php
            
                
            $query = "SELECT id FROM  `accounts` where clint='1' ORDER BY id";  
            $query_run = mysqli_query($con, $query);
            $row = mysqli_num_rows($query_run);
            echo ''.$row.'';
        ?></a>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!----========END============-->

    <div class="row" style="display: inline-block;">
      <div style="padding:30px; margin:30px;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="admin.php"
                  style="color:#25A125;">Total Admins</a></div>
              <div class="h2 mb-0 ml-2 font-weight-bold text-gray-800">
                <a href="admin.php"><?php
                
                $query = "SELECT id FROM  `admin` ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?> </a> <b
                  style="color:#fff; font-size:10px; font-weight:bold; border-radius:3px; padding:4px; background:#23BB48;">Online: <?php
                
            $query = "SELECT id FROM  `admin` where last_login > $current_time ORDER BY id";  
            $query_run = mysqli_query($con, $query);
            $row = mysqli_num_rows($query_run);
            echo ''.$row.'';
        ?></b>
              </div>

            </div>
            <div class="col-auto">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>



    <br>


    <!------DPS-==========--->
    <div class="row" style="display: inline-block;">
      <div style="padding:30px; margin:30px;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="dps.php"
                  style="color:#B45607;">Total Dps Accounts</a></div>
              <div class="h2 mb-0 font-weight-bold text-gray-800">
                <a href="dps.php"> <?php
                
                $query = "SELECT id FROM  `accounts` WHERE dps > 1 ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?></a>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row" style="display: inline-block;">
      <div style="padding:30px; margin:30px;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="fixed.php"
                  style="color:#024DB3;">Total Fixed Accounts</a></div>
              <div class="h2 mb-0 font-weight-bold text-gray-800">
                <a href="fixed.php">
                  <?php
                
                $query = "SELECT id FROM  `accounts` WHERE fixed > 1  ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?>
                </a>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!------DPS-==========--->


    <?php
$show_query = "select * from category";
$show_query_run = mysqli_query($con,$show_query);
$nums = mysqli_num_rows($show_query_run);

while($result= mysqli_fetch_array($show_query_run)){
?>
    <?php $uid= $result['c_id'];?>
    <div class="row" style="display: inline-block;">
      <div style="padding:30px; margin:30px;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">

                <a href="category.php?cid=<?php echo htmlentities($result['c_id']);?>">

                  <?php echo $result['c_name'];?> </a>
              </div>
              <div class="h2 mb-0 font-weight-bold text-gray-800">
                <a href="category.php?cid=<?php echo htmlentities($result['c_id']);?>"> <?php
                
                            $query = "SELECT id FROM  `accounts` WHERE type='$uid' ORDER BY id";  
                            $query_run = mysqli_query($con, $query);
                            $row = mysqli_num_rows($query_run);
                            echo ''.$row.'';
                        ?> </a>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa-briefcase" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
}
?>








  </div>
  <br />






  <!-- /page content -->

  <!-- footer content -->
  <?php include "includes/footer.php" ?>

</body>

</html>


<?php include 'includes/js.php'; ?>