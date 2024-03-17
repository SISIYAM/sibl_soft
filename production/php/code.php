

<!----uoload--->

<?php
include 'dbcon.php';

if(isset($_POST['submit'])){
 
   
  
  $name = $_POST['name'];
  $name_1 = str_replace("'","\'", $name);
  
  $mobile = $_POST['mobile'];
  $mobile_1 = str_replace("'","\'", $mobile);

  $address = $_POST['address'];
  $address_1 = str_replace("'","\'", $address);
  
  $gender = $_POST['gender'];

  $ac_num = $_POST['ac_num'];
  $ac_num_1 = str_replace("'","\'", $ac_num);

  $type = $_POST['type'];
  $type_1 = str_replace("'","\'", $type);

  $date = $_POST['date'];

  $dps = $_POST['dps'];
  $dps_1 = str_replace("'","\'", $dps);

  $description = $_POST['description'];
  $description_1 = str_replace("'","\'", $description);
  
  $author = $_POST['author'];
  $author_1 = str_replace("'","\'", $author);

  $clint = $_POST['clint'];
  $clint_1 = str_replace("'","\'", $clint);
  
  $coustomer_id = $_POST['coustomer_id'];
  $coustomer_id_1 = str_replace("'","\'", $coustomer_id);

  $fixed = $_POST['fixed'];
  $fixed_1 = str_replace("'","\'", $fixed);


 

$sql = "INSERT INTO `accounts`(`name`, `mobile`, `address`, `gender`, `ac_num`, `type`, `date`, `dps`, `description`,`author`,`clint`,
`coustomer_id`,`fixed`)
 VALUES ('$name_1','$mobile_1','$address_1','$gender','$ac_num_1','$type_1','$date','$dps_1','$description_1','$author_1','$clint_1',
 '$coustomer_id_1','$fixed_1')";
  $query = mysqli_query($con,$sql);

  if($query){

    $_SESSION['msg'] = "$name has been added successfully.";
    ?>
    <script>
    location.replace("users.php");
    </script> 
    <?php 
      
  }else{
    ?>
    <script>
          alert("Failed ");
      </script>
      <script>
  location.replace("form.php");
</script> 
<?php
  }


}
?>



<!-------Category---->
<?php
include 'dbcon.php';
if(isset($_POST['category'])){



$c_name = $_POST['c_name'];

   $q ="INSERT INTO `category`(`c_name`) VALUES ('$c_name')";
   $querry = mysqli_query($con,$q);

    
  if($querry){
    ?>
    <script>
        alert("Submit Successfully");
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
  location.replace("add_category.php");
</script> 
<?php
  }


}


?>



<!-------Sub Category---->
<?php
include 'dbcon.php';
if(isset($_POST['sub'])){



$s_name = $_POST['s_name'];

   $q ="INSERT INTO `sub_category`(`s_name`) VALUES ('$s_name')";
   $querry = mysqli_query($con,$q);

    
  if($querry){
    ?>
    <script>
        alert("Submit Successfully");
    </script>
   <?php
?>
<script>
  location.replace("sub_category_list.php");
</script> 
<?php 

      
  }else{
    ?>
    <script>
          alert("Failed ");
      </script>
      <script>
  location.replace("add_subtype.php");
</script> 
<?php
  }


}


?>



<!-------=============Calculation========---------->

<?php
if(isset($_POST['calculate'])){

  $money = $_POST['money'];
  $stamp = $_POST['stamp'];
  $deposit = $_POST['deposit'];
  $withdraw = $_POST['withdraw'];
  $date = $_POST['date'];
  $remitance = $_POST['remitance'];
  $bill = $_POST['bill'];
  $extra = $_POST['extra'];
  $ac_dew = $_POST['ac_dew'];
  $commission = $_POST['commission'];
  $borrow = $_POST['borrow'];
  $bank_deposit = $_POST['bank_deposit'];
  $author = $_POST['author'];



   $q ="INSERT INTO `calculator`( `money`, `stamp`, `deposit`, `withdraw`, `date`, `remitance`, `bill`, `extra`,
    `ac_dew`, `commission`, `borrow`, `bank_deposit`, `user`)
    VALUES ('$money','$stamp','$deposit','$withdraw','$date','$remitance','$bill','$extra','$ac_dew','$commission','$borrow',
    '$bank_deposit','$author')";
   $querry = mysqli_query($con,$q);

    
  if($querry){
   $_SESSION['cal'] ="$author - Cash Information has been added successfully, Please check below!"
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
  location.replace("calculate.php");
</script> 
<?php
  }


}


?>

