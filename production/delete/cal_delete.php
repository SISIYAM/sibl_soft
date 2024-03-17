
<?php
include '../dbcon.php';

if(isset($_POST['delete_btn'])){
  
$id = $_POST['delete_id'];

$deletequery = "DELETE FROM  calculator  WHERE  id=$id";

$query = mysqli_query($con,$deletequery);

?>
                   <script>
                       alert("This Calculation has been deleted");
                   </script>
                  <?php

?>
<script>
  location.replace("../calculator.php");
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