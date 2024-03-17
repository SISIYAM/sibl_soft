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

$money = $_POST['money'];
$stamp = $_POST['stamp'];
$deposit = $_POST['deposit'];
$withdraw = $_POST['withdraw'];
$remitance = $_POST['remitance'];
$bill = $_POST['bill'];
$extra = $_POST['extra'];
$ac_dew = $_POST['ac_dew'];
$commission = $_POST['commission'];
$borrow = $_POST['borrow'];
$bank_deposit = $_POST['bank_deposit'];





 $q ="UPDATE calculator SET money = '{$money}',stamp = '{$stamp}', deposit = '{$deposit}',withdraw = '{$withdraw}'
 ,remitance = '{$remitance}',bill = '{$bill}',extra = '{$extra}',ac_dew = '{$ac_dew}',commission = '{$commission}'
 ,borrow = '{$borrow}',bank_deposit = '{$bank_deposit}'  WHERE id = {$idupdate}";
   $querry = mysqli_query($con,$q);


  
   if($querry){
	$_SESSION['cal'] ="Cash Information has been updated successfully, Please check below!"
?>
<script>
  location.replace("calculator.php");
</script> 
<?php 

      
  }else{
    ?>
    <script>
          alert("Failed ");
      </script>
      <script>
  location.replace("calculator.php");
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
            $ret=mysqli_query($con,"select * from calculator where id='$pid'");
            while($row=mysqli_fetch_array($ret))
            {

            ?>


									<form method="post" action="" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                     
                                    <input type="hidden" name="id" value="<?php echo htmlentities($row['id']);?>">

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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">নগদ প্রদান</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="money" value="<?php echo htmlentities($row['money']);?>"  required="required" class="form-control ">
											</div>
										</div>

                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">মোট জমা</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="deposit" value="<?php echo htmlentities($row['deposit']);?>"  required="required" class="form-control ">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">A/C Dew</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="ac_dew" value="<?php echo htmlentities($row['ac_dew']);?>"  required="required" class="form-control ">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">কমিশন</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="text" name="commission" value="<?php echo htmlentities($row['commission']);?>"  required="required" class="form-control ">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">বিদ্যুৎ বিল</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="bill" value="<?php echo htmlentities($row['bill']);?>"  required="required" class="form-control ">
											</div>
										</div>




										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">উত্তোলন</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="withdraw" value="<?php echo htmlentities($row['withdraw']);?>"  required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">রেমিটেন্স</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="remitance" value="<?php echo htmlentities($row['remitance']);?>"  required="required" class="form-control ">
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">খরচ</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="extra" value="<?php echo htmlentities($row['extra']);?>"  required="required" class="form-control ">
											</div>
										</div>



										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">রাজস্ব</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="stamp" value="<?php echo htmlentities($row['stamp']);?>"  required="required" class="form-control ">
											</div>
										</div>




								



										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">ধার দেওয়া হয়েছে</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="borrow" value="<?php echo htmlentities($row['borrow']);?>"  required="required" class="form-control ">
											</div>
										</div>






                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">ব্যাংকে জমা</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="number" name="bank_deposit" value="<?php echo htmlentities($row['bank_deposit']);?>"  required="required" class="form-control ">
											</div>
										</div>

 
                                     

										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
                                               <a href="calculator.php"><button class="btn btn-danger" type="button">Cancel</button></a>
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