<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){


  header('location:admin_login.php');
  

}
include 'php/auto.php';

?>
<?php 
include 'dbcon.php' ;

include 'includes/head.php';
?>


  <body class="nav-md">
    
       <?php include "includes/nav.php" ?>


<!-- Published & Unpublished Code Start -->

<?php
   /* unpublished */
   if(isset($_POST['deactivated'])){
    $idstatus = $_POST['id'];
    $status = $_POST['status'];

    $unpublished = "UPDATE accounts SET status = '{$status}' WHERE id='{$idstatus}' ";
    $unpublished_query = mysqli_query($con, $unpublished );
    
    if($unpublished_query){
     ?>
   
     <script>
       location.replace("users.php");
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

    $unpublished = "UPDATE accounts SET status = '{$status}' WHERE id='{$idstatus}' ";
    $unpublished_query = mysqli_query($con, $unpublished );
    
    if($unpublished_query){
     ?>
     
      <script>
       location.replace("users.php");
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



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           

    <!---start---->

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    
<?php
if(isset($_SESSION['cal'])){
  ?>
  <div class="alert alert-success">
    <h5><b><?php
    echo $_SESSION['cal']; 
    unset($_SESSION['cal']);
    ?></b></h5>
  </div>
  <?php
}

          ?>
                    <h2>Daily Calculation List<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="php/print.php" target="_blank" style="padding-right:30px;">
										 <button class = "btn btn-info"><i class="fa fa-print" aria-hidden="true"></i>
										  Print Report</button></a>
                      <a href="calculate.php" style="margin-right:30px;"> <input type="submit" value="Add New Calculation" class="btn btn-success"></a>
                      
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
                             <th>Date</th>
                          <th>নগদ প্রদান</th>
                          <th>মোট জমা</th> 
                          <th>A/C Dew</th>
                          <th>কমিশন</th>
                          <th>বিদ্যুৎ বিল</th>
                         
                          <th>উত্তোলন</th>
                          <th>রেমিটেন্স</th>
                          <th>খরচ</th>
                          <th>রাজস্ব</th>
                         
                         
                          
                         <th>অবশিষ্ট</th>
                         <th>User</th> 
                         
                          <th>Action</th>
                          
                          
                        </tr>
                      </thead>

                      <tbody>

        <!---php Code start---->
        <?php
$no = 1 ;
$selectquery = " select * from  calculator order by id desc";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>

<!----Exra---->

<?php $idst = $res['id'];?>


<?php $sum = $res['money']+$res['deposit']+$res['ac_dew']+$res['commission']+$res['bill'];?>

<?php  $total = $res['withdraw']+$res['remitance']+$res['extra']+$res['stamp']; ?>

<?php $hand_cash = $sum - $total ?>

<?php $available = $hand_cash - $res['borrow']-$res['bill']; ?>





<!----End---->

<?php $oldDate = $res['date']; ?> 
                          <?php  
      
    $newDate = date("d-m-Y", strtotime($oldDate));  
   
?>  

    <tr>
   
    <td><?php echo $no; ?></td>
     <td><b><?php echo " ".$newDate. " "?></b></td>
   <td><?php echo $res['money'] ?> BDT</td>
   <td><?php echo $res['deposit'] ?> BDT</td>
   <td><?php echo $res['ac_dew'] ?> BDT</td>
   <td><?php echo $res['commission'] ?> BDT</td>
   <td><?php echo $res['bill'] ?> BDT</td>
  
   <td><?php echo $res['withdraw'] ?> BDT</td>
   <td><?php echo $res['remitance'] ?> BDT</td>
   <td><?php echo $res['extra'] ?> BDT</td>
   <td><?php echo $res['stamp'] ?> BDT</td>

 
   

   <td><b style="font-size:20px; color:#DA2121;"><?php echo $available ?>                </b> <b style="font-size:20px; color:#000000;">BDT</b></td>
   <td><?php echo $res['user'] ?></td>   
  
   <td>
           
    <a href="calculator_profile.php?pid=<?php echo $res['id'] ?>" ><input type="submit" value="Open" class="btn btn-primary btn-sm"> </a>        
                  </td>              
  
    

  
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


<?php include 'includes/js.php'; ?>