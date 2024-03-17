<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){


  header('location:../admin_login.php');
  

}
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
  

    <style>
        table th,td{
            font-size:11px;
            font-weight:400;
            padding:5px;
        }
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

@page {
    size: A4;
  margin: 4mm;
}

@media screen {
  div.footer {
    display: none;
  }
}
@media print {
  /* div.footer { 
    position: fixed;
    bottom: 0;
    
  } */
  .footer {
    position: fixed;
    bottom: 1px;
    left: 10px;
  } 
  thead {display: table-header-group;}
tfoot {display: table-footer-group;}
}

</style>

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
                      <p style="font-weight:500;">Bonpara Pouro Market 2nd floor, Bonpara ,Natore<br>Phone: 01770078171</p>   
                      <h3><b style="border-bottom:3px solid black;">Outlet Cash Report</b></h3>
                     </div>
              
                     <div class="" style="float:right; font-size:10px;">
                          <b>Print Date: <?php
// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('d/m/Y');
echo $date;
?></b> <br>
<b>Print Time: <?php date_default_timezone_set('Asia/dhaka');
$time = date('h:i A');
echo $time;
?></b>
                        
                         
                        </div>
                        <div class="" style="float:left; font-size:10px;">
                         
                        <b style="font-size:15px;">Printed by: <?php echo  $_SESSION['username']; ?> </b>
                         
                        </div> <br> <br>


                        <div class="table-responsive">

<table style="width:100%">
<thead>
              <tr>
              <th>Date</th>               
                          <th>নগদ প্রদান</th>
                          <th>জমা</th> 
                          <th>A/C Dew</th>
                          <th>কমিশন</th>
                          <th>বিদ্যুৎ বিল</th>
                        
                          <th>উত্তোলন</th>
                          <th>রেমিটেন্স</th>
                          <th>খরচ</th>
                          <th>রাজস্ব</th>
                          
                          <th>হাতে নগদ</th>
                          <th>ধার</th>
                          <th>ব্যাংকে জমা</th> 
                         <th>অবশিষ্ট</th>
                  
                  
              </tr>
          </thead>

<tbody>


      
                      <?php 
                      include '../dbcon.php';
                      

            $ret=mysqli_query($con,"select * from calculator order by id desc");
            while($row=mysqli_fetch_array($ret))
            {

            ?>


                                                                       
<!----Calculation------------>

<?php $sum = $row['money']+$row['deposit']+$row['ac_dew']+$row['commission']+$row['bill'];?>

<?php  $total = $row['withdraw']+$row['remitance']+$row['extra']+$row['stamp']; ?>

<?php $hand_cash = $sum - $total ?>

<?php $available = $hand_cash - $row['borrow']-$row['bill']; ?>

<?php $oldDate = $row['date']; ?> 
                          <?php  
      
    $newDate = date("d/m/Y", strtotime($oldDate));  
   
?>  


                 <tr>
                <td><?php echo " ".$newDate. " "?></td>
                <td><?php echo $row['money'];?> </td>
                <td><?php echo $row['deposit'];?> </td>
                <td><?php echo $row['ac_dew'];?> </td>
                <td><?php echo $row['commission'];?> </td>
                <td><?php echo $row['bill'];?> </td>
                
                <td><?php echo $row['withdraw'];?> </td>
                <td><?php echo $row['remitance'];?> </td>
                <td><?php echo $row['extra'];?> </td>
                <td><?php echo $row['stamp'];?> </td>
              
                <td><?php echo $hand_cash ?> </td>
                <td><?php echo $row['borrow']; ?></td>
                <td><?php echo $row['bank_deposit'];?> </td>
                <td><?php echo $available ?> 	&#2547; </td>
              
                

                 </tr>       
                             
                         

                <?php
            }
            ?>
                     </tbody> <!-- /.row -->
                      </table>
                  <br><br>    <div class="footer">This is a computer generated document. No signature is required. 
Developed by : MD Saymum Islam Siyam
</div><!-- this row will not appear when printing -->
                      </div> 
                    
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <!-- /page content -->

       
        <!-- /footer content -->
      </div>
    </div>
    
   
  </body>
</html>

<script>
 window.print()
 </script>
  