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



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           

    <!---start---->

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Account Types<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="add_category.php"><input type="submit" value="Add New Category" class="btn btn-primary" style="margin-right:20px;"></a>
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
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>

        <!---php Code start---->
        <?php
$no = 1 ;
$selectquery = " select * from  category";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>





    <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $res['c_name'] ?></td>
    <td><div style="display:flex;"> 
    <a href="category_update.php?cid=<?php echo $res['c_id'] ?>" data-toggle="tooltip" data-placement="top" 
                title="Edit"><input type="submit" value="Edit" class="btn btn-info btn-sm"> </a> 
                
               
                <a href="delete/categoy_delete.php?c_id=<?php echo $res['c_id'] ?>" data-toggle="tooltip" data-placement="top" 
                title="Delete">
                <input type="submit" value="Delete" class="btn btn-danger btn-sm"
                 onclick="return confirm('Are you sure want to delete <?php echo $res['c_name'] ?>!')">   </a>
                  
                  </div></td>
    

  
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
          <a href="#"><b>Developed By MD SAYMUM ISLAM SIYAM</b></a>
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