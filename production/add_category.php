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
									<h2>Add Account Category</h2>
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

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name Of Acount Type<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="c_name" value=""  required="required" class="form-control ">
											</div>
										</div>

										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit"name="category" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

					
<?php include "includes/footer.php"?>

</body></html>
<?php include 'includes/js.php'; ?>