<?php
include '../dbcon.php';

if(isset($_POST['delete_btn'])){
  
$id = $_POST['delete_id'];

$deletequery = "DELETE FROM  admin  WHERE  id=$id";

$query = mysqli_query($con,$deletequery);

?>
                   <script>
                       alert("This account has been deleted");
                   </script>
                  <?php

?>
<script>
  location.replace("../admin.php");
</script> 
<?php
}else{

  ?>
  <script>
    alert("Failed");
  </script>
  <?php
}




?>