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
									<h2>Daily Calculation</h2>
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
									
									<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b style="color:#000000;">Date (mm/dd/yyyy)</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" name="date" id= "date_picker" required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">নগদ প্রদান</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="money" value=""  required="required" class="form-control ">
											</div>
										</div>

                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">মোট জমা</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="deposit" value=""  required="required" class="form-control ">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">A/C Dew</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="ac_dew" value=""  required="required" class="form-control ">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">কমিশন</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="commission" value=""  required="required" class="form-control ">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">বিদ্যুৎ বিল</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="bill" value=""  required="required" class="form-control ">
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">মোট উত্তোলন</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="withdraw" value=""  required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">রেমিটেন্স</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="remitance" value=""  required="required" class="form-control ">
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">খরচ</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="extra" value=""  required="required" class="form-control ">
											</div>
										</div>



										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">রাজস্ব</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="stamp" value=""  required="required" class="form-control ">
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">ধার দেওয়া হয়েছে</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="borrow" value=""  required="required" class="form-control ">
											</div>
										</div>

                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">ব্যাংকে জমা</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="bank_deposit" value=""  required="required" class="form-control ">
											</div>
										</div>

										
										
										
									
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="calculator.php"><button class="btn btn-danger" type="button">Cancel</button></a>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit"name="calculate" class="btn btn-success">Calculate</button>
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
<script>
var date = new Date();
      var year = date.getFullYear();
      var month = String(date.getMonth()+1).padStart(2,'0');
      var todayDate = String(date.getDate()).padStart(2,'0');
      var datePattern = year + '-' + month + '-' + todayDate;
	  
      document.getElementById("date_picker").value = datePattern;
document.write(datePattern);
</script>

<?php include 'includes/js.php'; ?>