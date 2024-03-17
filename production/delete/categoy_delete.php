<?php
include '../dbcon.php';

$id = $_GET['c_id'];

$deletequery = "DELETE FROM  category  WHERE  c_id=$id";

$query = mysqli_query($con,$deletequery);

?>
                   <script>
                       alert("This category has been deleted");
                   </script>
                  <?php

?>
        <script>
          location.replace("../category_list.php");
        </script> 
        <?php 


?>