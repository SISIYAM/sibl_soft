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
if(isset($_SESSION['msg'])){
  ?>
  <div class="alert alert-success">
    <h5><b><?php
    echo $_SESSION['msg']; 
    unset($_SESSION['msg']);
    ?></b></h5>
  </div>
  <?php
}

          ?>


<?php
if(isset($_SESSION['update'])){
  ?>
  <div class="alert alert-success">
    <h5><b><?php
    echo $_SESSION['update']; 
    unset($_SESSION['update']);
    ?></b></h5>
  </div>
  <?php
}

          ?>

          


                    <h2>Account Holders List<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="http://login.bulksmsbd.com/default.php" target="_blank"><input type="submit" class="btn btn-primary" value="Send SMS"></a>
  
                      <a href="form.php" style="margin-right:30px;"> <input type="submit" value="Add New Account" class="btn btn-success"></a>
                      
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
                          <th>Name</th>
                          <th>A/C</th>
                          <th>A/C Type</th> 
                          <th>Status</th>
                          <th>Mobile</th>
                          <th>Address</th>
                          <th>Gender</th>
                          <th>Author</th>
                         
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>

        <!---php Code start---->
        <?php
$no = 1 ;
$selectquery = " select * from  accounts";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>

<!----Exra---->

<?php $idst = $res['id'];?>
<?php $cat_name = $res['type'];?>

<!----End---->
<?php $name= $res['name']; ?>


    <tr>
    <td><?php echo $no; ?></td>
    <td>
      <?php 
      if($res['clint']==1){
        echo"<span style='color:#DF2536;'>$name</span>";
      }else{
        echo"$name";
      }
      ?>
    </td>
    <td><?php echo $res['ac_num'] ?></td>
    <td>

<!-- Show Category name -->

<?php

include 'dbcon.php' ;
$category_query = " select * from  category where c_id='$cat_name' ";
$category_run = mysqli_query($con,$category_query);
$nums = mysqli_num_rows($category_run);

while($catt= mysqli_fetch_array($category_run)){
?>

<?php echo $catt['c_name'] ?>

<?php

}


?>
</td>
    <td><?php
                  if($res['status']==1){
                    echo "<form action='' method='post'>
                    <input type='hidden' name='id' value='$idst'> 
                    <input type='hidden' name='status' value='0'>
                    <input type='submit' name='deactivated' class='btn btn-success btn-sm' value='Activated'  data-toggle='tooltip' 
                    data-placement='top' 
                    title='Make Deactivated'>
                    </form>";
                  }else{
                    echo "
                    <form action='' method='post'>
                    <input type='hidden' name='id' value='$idst'>
                    <input type='hidden' name='status' value='1'>
                    <input type='submit' name='Activated' class='btn btn-danger btn-sm' value='Deactivated'  d
                    ata-toggle='tooltip' data-placement='top' 
                    title='Make Activated '>
                    </form>";
                  }
                  ?>
                </td>
    <td><?php echo $res['mobile'] ?></td>
    <td><?php echo $res['address'] ?></td>
    <td>	<?php
										                  if($res['gender']==1){
															echo 'Male';
														  } else{
															echo'Female';
														  }
										?></td>
                    <td><?php echo $res['author']; ?></td>
                  
    <td>
    <a href="profile.php?pid=<?php echo $res['id'] ?>" ><input type="submit" value="Open" class="btn btn-primary btn-sm"> </a> 
                
               
                
                  
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