<?php
include 'dbcon.php';

date_default_timezone_set('Asia/dhaka');
 
function getDateTimeDiff($date){
    $now_timestamp = strtotime(date('Y-m-d H:i:s'));
    $diff_timestamp = $now_timestamp - strtotime($date);
    
    if($diff_timestamp < 60){
     return 'few seconds ago';
    }
    else if($diff_timestamp>=60 && $diff_timestamp<3600){
     return round($diff_timestamp/60).' mins ago';
    }
    else if($diff_timestamp>=3600 && $diff_timestamp<86400){
     return round($diff_timestamp/3600).' hours ago';
    }
    else if($diff_timestamp>=86400 && $diff_timestamp<(86400*30)){
     return round($diff_timestamp/(86400)).' days ago';
    }
    else if($diff_timestamp>=(86400*30) && $diff_timestamp<(86400*365)){
     return round($diff_timestamp/(86400*30)).' months ago';
    }
    else{
     return round($diff_timestamp/(86400*365)).' years ago';
    }
   }



$selectquery = " select * from  admin";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){

    ?>
<?php $last_logout=getDateTimeDiff($res['last_logout'])?>
<?php
echo "$last_logout <br>"
?>

    <?php
}


   
  
  
  
   
   

?>