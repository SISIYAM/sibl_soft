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

   

<!-----=======================Update Code start=======================----->

<?php 
include 'dbcon.php';

if(isset($_POST['update'])){
  
$idupdate = $_POST['id'];
$name = $_POST['name'];
$name_1 = str_replace("'","\'", $name);

$mobile = $_POST['mobile'];
$mobile_1 = str_replace("'","\'", $mobile);

$gender = $_POST['gender'];
$gender_1 = str_replace("'","\'", $gender);

$address = $_POST['address'];
$address_1 = str_replace("'","\'", $address);

$ac_num = $_POST['ac_num'];
$ac_num_1 = str_replace("'","\'", $ac_num);

$type = $_POST['type'];
$type_1 = str_replace("'","\'", $type);

$date = $_POST['date'];


$dps = $_POST['dps'];
$dps_1 = str_replace("'","\'", $dps);

$description = $_POST['description'];
$description_1 = str_replace("'","\'", $description);

$coustomer_id = $_POST['coustomer_id'];
$coustomer_id_1 = str_replace("'","\'", $coustomer_id);

$clint = $_POST['clint'];
$clint_1 = str_replace("'","\'", $clint);

$fixed = $_POST['fixed'];
$fixed_1 = str_replace("'","\'", $fixed);



 $q ="UPDATE accounts SET name = '{$name_1}',mobile = '{$mobile_1}', address = '{$address_1}',gender = '{$gender_1}',
 ac_num = '{$ac_num_1}',type = '{$type_1}',date = '{$date}',dps = '{$dps_1}', description = '{$description_1}',clint = '{$clint_1}',
  coustomer_id = '{$coustomer_id_1}', fixed = '{$fixed_1}' WHERE id = {$idupdate}";
   $querry = mysqli_query($con,$q);


  
   if($querry){
   $_SESSION['update'] = "$name's information has been update successfully."
?>
<script>
  location.replace("users.php");
</script> 
<?php 

      
  }else{
    ?>
    <script>
          alert("Failed ");
      </script>
      <script>
  location.replace("uses.php");
</script> 
<?php
  }


}


?>


<!--===================================Update Code End=====================================================------>



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
									<h2>Update A/C Information</h2>
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
												<input  type="text" name="name" value="<?php echo htmlentities($row['name']);?>"  required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Mobile<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" name="mobile" value="<?php echo htmlentities($row['mobile']);?>"  required="required" class="form-control ">
											</div>
										</div>

                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Gender<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<select name="gender"  class="form-control" required	>
											<option value="<?php echo htmlentities($row['gender']);?>">
										<?php
										                  if($row['gender']==1){
															echo 'Male';
														  } else{
															echo'Female';
														  }
										?>
										</option>
										
										<?php
                  if($row['gender']==1){
					echo '<option value="2">Female</option>';
				  }else{

echo'<option value="1">Male</option>';
				  

				}
				?>

											
											
											
											
										 </select>
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Address<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="address" value="<?php echo htmlentities($row['address']);?>" required="required" class="form-control ">
											</div>
										</div>
										
									
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Account Number<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" name="ac_num" value="<?php echo htmlentities($row['ac_num']);?>"  required="required" class="form-control ">
											</div>
										</div>

                                        <!----CateGory id--->
                                        <?php $cat_name = $row['type']; ?>
                                     <!-- End -->

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Account Type<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<select name="type"  class="form-control" required	>
											<option disabled="">Select Account Type</option>
                                            <option value="<?php echo  htmlentities($row['type']);?>">
																					
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
																					</option>
																						
																					<?php
														include 'dbcon.php' ;
														$cat=mysqli_query($con,"select * from category");
														while ($category=mysqli_fetch_array($cat)) 
														{    
														?>  
				<option value="<?php echo htmlentities($category['c_id']);?>"><?php echo htmlentities($category['c_name']);?></option>
												<?php } ?>				
										 </select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Coustomer Id<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="coustomer_id" value="<?php echo $row['coustomer_id'];?>"  class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b>Date</b><span class="required">*</span>
											</label>
										
											<div class="col-md-6 col-sm-6 ">
												<input  type="text" name="date" value='<?php echo $row['date'];?>'  required="required" class="form-control ">
											</div>
										</div>

										
                                      
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Dps Account Number
											</label>
											<div class="col-md-6 col-sm-6 ">
											<input type="number" name="dps" value="<?php echo htmlentities($row['dps']);?>"   class="form-control ">

											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Fixed Account Number
											</label>
											<div class="col-md-6 col-sm-6 ">
											<input  type="number" name="fixed" value="<?php echo htmlentities($row['fixed']);?>"   class="form-control ">

											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Important Account?<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<select name="clint"  class="form-control" required	>
											<option value="<?php echo htmlentities($row['clint']);?>">
										<?php
										                  if($row['clint']==1){
															echo 'Yes';
														  } else{
															echo'No';
														  }
										?>
										</option>
										
										<?php
                  if($row['clint']==1){
					echo '<option value="0">No</option>';
				  }else{

echo'<option value="1">Yes</option>';
				  

				}
				?>

											
											
											
											
										 </select>
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Description<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<input type="text" name="description" value="<?php echo htmlentities($row['description']);?>" class="form-control ">

											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
                                               <a href="users.php"><button class="btn btn-danger" type="button">Cancel</button></a>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit"name="update" class="btn btn-success">Update</button>
											</div>
										</div>

									</form>
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