<?php
include '../dbcon.php';

if(isset($_POST['delete_btn'])){
  
$id = $_POST['delete_id'];

$deletequery = "DELETE FROM  accounts  WHERE  id=$id";

$query = mysqli_query($con,$deletequery);

?>
                   <script>
                       alert("This account has been deleted");
                   </script>
                  <?php

?>
<script>
  location.replace("../users.php");
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