

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


<style>

.cash input[type=text]{
	color:#0A35A0;
	font-weight:bold;
	font-size:16px;
}
.hand_cash input[type=text]{
	color:#0D8909;
	font-weight:bold;
	font-size:16px;
}
.available input[type=text]{
	color: #DA2121;
	font-size:22px;
	font-weight:bolder;
}

</style>

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
									<h2>Calculation Information</h2>
									<ul class="nav navbar-right panel_toolbox">

									<?php

$selectquery = " select * from  calculator where id='$pid'";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?> 
										<a href="print.php?pid=<?php echo $res['id'] ?>" target="_blank" style="padding-right:30px;">
										 <button class = "btn btn-info"><i class="fa fa-print" aria-hidden="true"></i>
										  Print Report</button></a>

										  <?php } ?>
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

                                                                       
<!----Calculation------------>

<?php $sum = $row['money']+$row['deposit']+$row['ac_dew']+$row['commission']+$row['bill'];?>

<?php  $total = $row['withdraw']+$row['remitance']+$row['extra']+$row['stamp']; ?>

<?php $hand_cash = $sum - $total ?>

<?php $available = $hand_cash - $row['borrow']-$row['bill']; ?>

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
												<input readonly type="text" name="money" value="<?php echo htmlentities($row['money']);?> BDT"  required="required" class="form-control ">
											</div>
										</div>

                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">মোট জমা</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="deposit" value="<?php echo htmlentities($row['deposit']);?> BDT"  required="required" class="form-control ">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">A/C Dew</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="ac_dew" value="<?php echo htmlentities($row['ac_dew']);?> BDT"  required="required" class="form-control ">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">কমিশন</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="commission" value="<?php echo htmlentities($row['commission']);?> BDT"  required="required" class="form-control ">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">বিদ্যুৎ বিল</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="bill" value="<?php echo htmlentities($row['bill']);?> BDT"  required="required" class="form-control ">
											</div>
										</div>


										<div class="cash">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">মোট টাকা</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="" value="<?php echo $sum?> BDT"  required="required" class="form-control ">
											</div>
										</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">মোট উত্তোলন</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="withdraw" value="<?php echo htmlentities($row['withdraw']);?> BDT"  required="required" class="form-control ">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">রেমিটেন্স</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="remitance" value="<?php echo htmlentities($row['remitance']);?> BDT"  required="required" class="form-control ">
											</div>
										</div>


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">খরচ</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="extra" value="<?php echo htmlentities($row['extra']);?> BDT"  required="required" class="form-control ">
											</div>
										</div>



										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">রাজস্ব</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="stamp" value="<?php echo htmlentities($row['stamp']);?> BDT"  required="required" class="form-control ">
											</div>
										</div>




									<div class="cash">
									<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">মোট টাকা</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="" value="<?php echo  $total?> BDT"  required="required" class="form-control ">
											</div>
										</div>
									</div>



										<div class="hand_cash">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">হাতে নগদ</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="hand_cash" value="<?php echo $hand_cash ?> BDT"  required="required" class="form-control ">
											</div>
										</div>
										</div>



										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">ধার দেওয়া হয়েছে</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="bank_deposit" value="<?php echo htmlentities($row['borrow']);?> BDT"  required="required" class="form-control ">
											</div>
										</div>


                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">ব্যাংকে জমা</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="bank_deposit" value="<?php echo htmlentities($row['bank_deposit']);?> BDT"  required="required" class="form-control ">
											</div>
										</div>


										<div class="available">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                                <b style="color:#000000;">অবশিষ্ট</b><span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input readonly type="text" name="total" value="<?php echo $available ?> BDT"  required="required" class="form-control ">
											</div>
										</div>
										</div> 
										
										
										<div class="item form-group">
										<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
										<b style="font-size:15px; color:#000000;">In Words:</b>
											</label>
											
											<b style="font-size:15px; padding-top:8px; color:#9D0707;"><?php
										include 'php/num.php'; 
										echo convertNumber( $available); 
										
									?> </b>
											
										</div>
										
							 

										<div class="ln_solid"></div>
										

									</form>
                                    <div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
											<a href="calculator.php"><button class="btn btn-success" type="button">Back</button></a>
											<button  type='button' id="deletebtnCal" value='<?php echo $row['id']; ?>' class='btn btn-danger'>Delete</button>

                                            <a href="calculation_update.php?pid=<?php echo $row['id'] ?>"> <input type="submit" value="Edit" class="btn btn-primary">  </a> 
									
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