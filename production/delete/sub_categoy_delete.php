<?php
include '../dbcon.php';

$id = $_GET['s_id'];

$deletequery = "DELETE FROM  sub_category  WHERE  s_id=$id";

$query = mysqli_query($con,$deletequery);

?>
                   <script>
                       alert("This category has been deleted");
                   </script>
                  <?php

?>
        <script>
          location.replace("../sub_category_list.php");
        </script> 
        <?php 


?>