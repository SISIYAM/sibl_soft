<?php 

session_start();
include '../dbcon.php';
?>

<?php
$admin_id= $_SESSION['id'];

date_default_timezone_set('Asia/dhaka');
$last_logout = date('Y-m-d H:i:s');

$q ="UPDATE admin SET last_logout = '{$last_logout}' WHERE id = {$admin_id}";
$querry = mysqli_query($con,$q);

if($querry){
   

   
  session_destroy();
  
  ?>
  <script>
            location.replace("../admin_login.php");
          </script> 
          <?php 
  
  
          
  
    }

?>