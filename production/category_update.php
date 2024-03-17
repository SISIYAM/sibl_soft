
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
$pid=intval($_GET['cid']); 

include 'includes/head.php';
?>


<body class="nav-md">
<?php include "includes/nav.php" ?>
			<!-- /top navigation -->

   

<!-----=======================Update Code start=======================----->

<?php 
include 'dbcon.php';

if(isset($_POST['update'])){
  
$idupdate = $_POST['c_id'];
$c_name = $_POST['c_name'];
$c_name_1 = str_replace("'","\'", $c_name);




 $q ="UPDATE category SET c_name = '{$c_name_1}'  WHERE c_id = {$idupdate}";
   $querry = mysqli_query($con,$q);


  
   if($querry){
    ?>
    <script>
        alert("Update Successfully");
    </script>
   <?php
?>
<script>
  location.replace("category_list.php");
</script> 
<?php 

      
  }else{
    ?>
    <script>
          alert("Failed ");
      </script>
      <script>
  location.replace("category_list.php");
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
            $ret=mysqli_query($con,"select * from category where c_id='$pid'");
            while($row=mysqli_fetch_array($ret))
            {

            ?>


									<form method="post" action="" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                     
                                    <input type="hidden" name="c_id" value="<?php echo htmlentities($row['c_id']);?>">


										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Full Name<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input  type="text" name="c_name" value="<?php echo htmlentities($row['c_name']);?>"  required="required" class="form-control ">
											</div>
										</div>

										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
                                               <a href="category_list.php"><button class="btn btn-danger" type="button">Cancel</button></a>
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

					
<?php include "includes/footer.php"?>

</body></html>

<?php include 'includes/js.php'; ?>