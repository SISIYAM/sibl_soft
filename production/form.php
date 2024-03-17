<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){


  header('location:admin_login.php');
  

}

  include 'php/auto.php';

include 'includes/head.php';
?>


<body class="nav-md">
<?php include "includes/nav.php" ?>
			<!-- /top navigation -->

   <!------Insert Code Start----->
    <?php include 'php/code.php' ?> 

<!-----Insert Code End----->


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
									<h2>Add Account Information</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" 
									id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

									<input type="hidden" name="author" value="<?php echo  $_SESSION['username']; ?>">
									
									<div style="margin:30px 170px;">
											<b style="color:#9D0707;">"&#9733;" চিহ্নিত ফিল্ডগুলো অবশ্যই পূরণ করতে হবে</b>
											
											
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name"><b style="color:#000000;">Full Name</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="name" value=""  required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b style="color:#000000;">Mobile</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" name="mobile" value=""  required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b style="color:#000000;">Address</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="address" value="" required="required" class="form-control ">
											</div>
										</div>
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"><b style="color:#000000;">Gender</b><span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<div id="gender" class="btn-group" data-toggle="buttons">
													<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">Male
														<input type="radio" class="flat" name="gender" id="genderM" value="1" checked="" required />
													</label> 
													<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">Female
														<input type="radio" class="flat" name="gender" id="genderF" value="2" />
													</label>
												</div>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b style="color:#000000;">Account Number</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" name="ac_num" value=""  required="required" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b style="color:#000000;">Coustomer Id </b>
											
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" name="coustomer_id" value=""   class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b style="color:#000000;">Account Type </b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<select name="type"  class="form-control" required	>
											<option value="">Select Account Type</option>
											<?php
            include 'dbcon.php' ;
            $ret=mysqli_query($con,"select * from category");
            while ($row=mysqli_fetch_array($ret)) 
            {
             
            
            ?>  
    <option value="<?php echo htmlentities($row['c_id']);?>"><?php echo htmlentities($row['c_name']);?></option>
    <?php } ?>
											
											
										 </select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"> <b style="color:#FF3A10;">Important Clint?</b><span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<div id="gender" class="btn-group" data-toggle="buttons">
													<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> No
														<input type="radio" class="flat" name="clint" id="genderM" value="0" checked="" required />
													</label> 
													<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> Yes
														<input type="radio" class="flat" name="clint" id="genderF" value="1" />
													</label>
												</div>
											</div>
										</div>
																			<?php
									// Set the new timezone
									date_default_timezone_set('Asia/Kolkata');
									$date = date('d/m/Y');
									
									?>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b style="color:#000000;">Account Opening Date</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="date" value="<?php echo $date ?>" required="required" class="form-control ">
											</div>
										</div>
									

										<div style="margin:30px 170px;">
											<b style="color:#9D0707;">যদি অন্যান্য একাউন্ট থাকে তাহলে নিচের ফিল্ডগুলো পূরণ করুন</b>
											
											
										</div>

										

								
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Dps Account Number
											</label>
											<div class="col-md-6 col-sm-6 ">
											<input type="number" name="dps" value=""   class="form-control ">

											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Fixed Account Number
											</label>
											<div class="col-md-6 col-sm-6 ">
											<input type="number" name="fixed" value=""   class="form-control ">

											</div>
										</div>

										


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Description
											</label>
											<div class="col-md-6 col-sm-6 ">
											<input type="text" name="description" value="" class="form-control ">

											</div>
										</div>
									
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="users.php"><button class="btn btn-danger" type="button">Cancel</button></a>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit"name="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
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
	<!-- bootstrap-progressbar -->
	<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="../vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="../vendors/moment/min/moment.min.js"></script>
	<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="../vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="../vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="../vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="../vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="../vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="../build/js/custom.min.js"></script>

			</div></div>

</body></html>
<?php include 'includes/js.php'; ?>