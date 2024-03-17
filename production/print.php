<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){


  header('location:admin_login.php');
  

}
include 'php/auto.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/sibl-agent-banking.jpg" type="image/gif/png">
    <title>Social Islami Bank Limited.</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  



  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
   

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
              
                  <div class="x_content">

                    <section class="content invoice">
                             <!-- title row -->
                     <div  style="text-align: center;">
                     <h2>Social Islami Bank Limited.</h2>
                      <h4><b> Bonpara Outlet </b></h4>
                      <p style="font-weight:500;">Bonpara Pouro Market 2nd floor, Bonpara ,Natore <br>Phone: 01770078171</p>
                      <h3><b style="border-bottom:3px solid black;">Outlet Cash Report</b></h3>
                     </div>
                      <br><br>
                      <div class="" style="float:right;">
                          <b>Print Date: <?php
// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('d/m/Y');
echo $date;
?></b> <br>
<b>Print Time: <?php date_default_timezone_set('Asia/dhaka');
$time = date('h:i A');
echo $time;
?> <br>
 <b style="font-size:18px;">Printed by: <?php echo  $_SESSION['username']; ?> </b></b>
                          <br>
                          <br>
                         
                         
                        
                          
                        
                         
                        </div>
                      
                      <?php 
                      include 'dbcon.php';
                      $pid=intval($_GET['pid']); 

            $ret=mysqli_query($con,"select * from calculator where id='$pid'");
            while($row=mysqli_fetch_array($ret))
            {

            ?>
                        <div class="col">
                          <p class="lead" style="font-weight:500;">Cash Report Date:
                          <?php $oldDate = $row['date']; ?> 
                          <?php  
      
    $newDate = date("d/m/Y", strtotime($oldDate));  
    echo " ".$newDate. " ";  
?>  

                         </p>

                         <!----Calculation------------>

<?php $sum = $row['money']+$row['deposit']+$row['ac_dew']+$row['commission']+$row['bill'];?>

<?php  $total = $row['withdraw']+$row['remitance']+$row['extra']+$row['stamp']; ?>

<?php $hand_cash = $sum - $total ?>

<?php $available = $hand_cash - $row['borrow']-$row['bill']; ?>

                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">নগদ প্রদান:</th>
                                  <td><?php echo $row['money'];?> BDT</td>
                                </tr>
                                <tr>
                                  <th>মোট জমা:</th>
                                  <td><?php echo $row['deposit'];?> BDT</td>
                                </tr>
                                <tr>
                                  <th>A/C Dew:</th>
                                  <td><?php echo $row['ac_dew'];?> BDT</td>
                                </tr>
                                <tr>
                                  <th>কমিশন:</th>
                                  <td><?php echo $row['commission'];?> BDT</td>
                                </tr>
                                <tr>
                                  <th>বিদ্যুৎ বিল:</th>
                                  <td><?php echo $row['bill'];?> BDT</td>
                                </tr>

                                <tr>
                                  <th>মোট উত্তোলন:</th>
                                  <td><?php echo $row['withdraw'];?> BDT</td>
                                </tr>
                                <tr>
                                  <th>রেমিটেন্স:</th>
                                  <td><?php echo $row['remitance'];?> BDT</td>
                                </tr>
                                <tr>
                                  <th>খরচ:</th>
                                  <td><?php echo $row['extra'];?> BDT</td>
                                </tr>
                                <tr>
                                  <th>রাজস্ব:</th>
                                  <td><?php echo $row['stamp'];?> BDT</td>
                                </tr>
                                <tr>
                                  <th>হাতে নগদ:</th>
                                  <td><b><?php echo $hand_cash ?> BDT</b></td>
                                </tr>.
                                <tr>
                                  <th>ধার দেওয়া হয়েছে:</th>
                                  <td><?php echo $row['borrow'];?> BDT</td>
                                </tr>
                                <tr>
                                  <th>ব্যাংকে জমা:</th>
                                  <td><?php echo $row['bank_deposit'];?> BDT</td>
                                </tr>

                                <tr>
                                  <th>অবশিষ্ট টাকা:</th>
                                  <td>    
                                  <b style="font-size:20px; color:#9D0707;"><?php
										echo $available;
										
									?> BDT </b>

                                  </td>
                                </tr>
                                <tr>
                                    <th>In Words</th>
                                    <td><?php include 'php/num.php'; 
										echo convertNumber( $available);  ?></td>
                                </tr>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      

                <?php
            }
            ?>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                  
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <br><br><br><br><br><br><br><br><br><br><br>
        <div style="float:right; margin:50px;">
          <p style="border-top:2px solid black;">Signature of Manager</p>
        </div>
        <!-- /page content -->

       
        <!-- /footer content -->
      </div>
    </div>

<div style="position:absolute; bottom:0; left:20px;">This is a computer generated document.
Developed by : MD Saymum Islam Siyam
</div>

   
  </body>
</html>

<script>
 window.print()
 </script>
  