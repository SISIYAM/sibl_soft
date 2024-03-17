

<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){


  header('location:admin_login.php');
  

}
include 'php/auto.php';
?>
 
<?php
include 'dbcon.php';
$pid=intval($_GET['pid']); 

include 'includes/head.php';
?>


<body class="nav-md">
<?php include "includes/nav.php" ?>
			<!-- /top navigation -->

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
									<h2>Account Information</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />


                                                <?php 
            $ret=mysqli_query($con,"select * from accounts where id='$pid'");
            while($row=mysqli_fetch_array($ret))
            {

            ?>
									<form method="post" action="" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                     
                                    <input type="hidden" name="id" value="<?php echo htmlentities($row['id']);?>">


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Full Name<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="name" value="<?php echo htmlentities($row['name']);?>"  required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Mobile<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="number" name="mobile" value="<?php echo htmlentities($row['mobile']);?>"  required="required" class="form-control ">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Gender<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="gender" value="<?php
										                  if($row['gender']==1){
															echo 'Male';
														  } else{
															echo'Female';
														  }
										?>"  required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Address<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="address" value="<?php echo htmlentities($row['address']);?>" required="required" class="form-control ">
											</div>
										</div>
                                        <?php $cat_name = $row['type'];?>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Account Type<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="type" value="<?php

include 'dbcon.php' ;
$category_query = " select * from  category where c_id='$cat_name' ";
$category_run = mysqli_query($con,$category_query);
$nums = mysqli_num_rows($category_run);

while($catt= mysqli_fetch_array($category_run)){
?>

<?php echo $catt['c_name'] ?>

<?php

}


?>" required="required" class="form-control ">
											</div>
										</div>
									
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Account Number<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="number" name="ac_num" value="<?php echo htmlentities($row['ac_num']);?>"  required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Coustomer Id<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="number" name="coustomer_id" value="<?php echo $row['coustomer_id'];?>"  required="required" class="form-control ">
											</div>
										</div>

                                        <!----CateGory id--->
                                        <?php $cat_name = $row['type']; ?>
                                     <!-- End -->

							
									
									 <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">Date</b><span class="required">*</span>
											</label>
											<?php $oldDate = $row['date']; ?> 
                          <?php  
      
    $newDate = date("d/m/Y", strtotime($oldDate));  
   
?>  
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="date" value='<?php echo " ".$newDate. " "?>'  required="required" class="form-control ">
											</div>
										</div>
										

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Dps Account Number
											</label>
											<div class="col-md-6 col-sm-6 ">
											<input readonly type="number" name="dps" value="<?php echo htmlentities($row['dps']);?>"   class="form-control ">

											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Fixed Account Number
											</label>
											<div class="col-md-6 col-sm-6 ">
											<input readonly type="number" name="fixed" value="<?php echo htmlentities($row['fixed']);?>"   class="form-control ">

											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b style="color:#FF3A10;">Important Clint</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="clint" value="<?php
										                  if($row['clint']==1){
															echo 'YES';
														  } else{
															echo'NO';
														  }
										?>"  required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Description<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<input readonly type="text" name="description" value="<?php echo htmlentities($row['description']);?>" class="form-control ">

											</div>
										</div>

										

										<div class="ln_solid"></div>
										

									</form>
                                    <div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
											<a href="users.php"><button class="btn btn-success" type="button">Back</button></a>
											<button  type='button' id="deletebtnUsers" value='<?php echo $row['id']; ?>' class='btn btn-danger'>Delete</button>
                                            <a href="update.php?pid=<?php echo $row['id'] ?>"> <input type="submit" value="Edit" class="btn btn-primary">  </a> 
									
											</div>
										</div>
                                    <?php
} ?>


								</div>
							</div>
						</div>
					</div>

 
					<div style="padding:20px;">
          <div class="pull-right">
          <a href="#"><b>Developed By MD SAYMUM ISLAM SIYAM <br>
        Contact: si31siyam@gmail.com</b></a>
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- /footer content -->
      

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
			</div></div>

</body></html>

<?php include 'includes/js.php'; ?>