<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
          
              <a href="index.php" class="site_title"><span>SIBL BONPARA</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/sibl-agent-banking.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>

                <?php
 include 'dbcon.php';

$admin_id= $_SESSION['id'];

$query = " select * from  admin where id='$admin_id' ";
$query_run = mysqli_query($con,$query);
$nums = mysqli_num_rows($query_run);

while($result= mysqli_fetch_array($query_run)){
?> 
<?php echo $result['username']; ?>

<?php
}
?>
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                  </li>
                  <li><a href="form.php"><i class="fa fa-edit"></i> Add Accounts</a>
                  </li>

                  <li><a><i class="fa fa-info-circle"></i> Accounts information <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="users.php">All Accounts</a></li>
                      <li><a href="dps.php">DPS হিসাব</a></li>
                      <li><a href="fixed.php">MTDR হিসাব</a></li>
                      


                      <?php
            include 'dbcon.php' ;
            $ret=mysqli_query($con,"select * from category");
            while ($row=mysqli_fetch_array($ret)) 
            {   
            ?>
              <li><a href="category.php?cid=<?php echo htmlentities($row['c_id']);?>"><?php echo htmlentities($row['c_name']);?></a></li>
              <?php } ?> 
            
                
                </ul>

                 
                  <li><a href="calculator.php"><i class="fa fa-calculator"></i>Daily Cash Calculator</a>
                  <li><a href="category_list.php"><i class="fa fa-th-list"></i>Account Categories</a>
                  </li>

                  
                  <li><a href="http://login.bulksmsbd.com/default.php" target="_blank"><i class="fa fa-envelope"></i>Send SMS</a>
             
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a href="change.php" data-toggle="tooltip" data-placement="top" title="Profile">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" id="logoutBtn2"  href="#">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/user.png" alt=""><b>
                <?php
 include 'dbcon.php';

$admin_id= $_SESSION['id'];

$queryy = " select * from  admin where id='$admin_id' ";
$queryy_run = mysqli_query($con,$queryy);
$nums = mysqli_num_rows($queryy_run);

while($result= mysqli_fetch_array($queryy_run)){
?> 
<?php echo $result['username']; ?>

<?php
}
?></b>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="change.php"> Profile
                      <span class="badge pull-right"><i class="fa fa-user"></i></span></a>
                      <a class="dropdown-item"  href="change.php">Change Password
                    <span class="badge pull-right"><i class="fa fa-key"></i></span>
                    </a>
                      <a class="dropdown-item" id="logoutBtn"  href="#"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                 
                </ul>
              </nav>
            </div>
          </div>












            
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="php/logout.php" method="POST"> 
          
            <button type="submit"  class="btn btn-primary">Logout</button>

          </form>


        </div>
      </div>
    </div>
  </div>

