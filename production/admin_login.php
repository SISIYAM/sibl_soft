<?php
// Set session parameters before starting the session
ini_set('session.gc_maxlifetime', 7200);  // Set session lifetime to 2 hours (7200 seconds)


session_start();

include 'includes/head.php';
include 'credential.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;  
?>

<?php $ip= UserInfo::get_ip();?>
<?php $get_device= UserInfo::get_device();?>
<?php $get_os= UserInfo::get_os();?>
<?php $get_browser= UserInfo::get_browser();?>


<?php
// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$userdate = date('d/m/Y');

?>
<?php date_default_timezone_set('Asia/dhaka');
$usertime = date('h:i A');

?>

  <body class="login">

  <?php
 include 'dbcon.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username_search = " select * from admin where username='$username' and status=1 ";
    $query = mysqli_query($con,$username_search);

    $username_count = mysqli_num_rows($query);

    if($username_count){
         $username_pass = mysqli_fetch_assoc($query);

        $db_pass = $username_pass['password'];

        $_SESSION['username'] = $username_pass['username'];
        $_SESSION['email'] = $username_pass['email'];
        $_SESSION['main'] = $username_pass['main'];
        $_SESSION['id'] = $username_pass['id'];
        
        $_SESSION['current_time'] = time();


        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){
          date_default_timezone_set('Asia/dhaka');
          $last_logout = date('Y-m-d H:i:s');
          $time=time()+10;
          $res=mysqli_query($con,"update admin set last_login='$time', last_logout='$last_logout' where status=1 and id=".$_SESSION['id']);    


          $usersent=$_SESSION['username'];
          $useremail=$_SESSION['email'];

          $msg="<html>

          <head>
          
            <!-- Bootstrap -->
            <link href='../vendors/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
            <!-- Font Awesome -->
            <link href='../vendors/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
            <!-- NProgress -->
            <link href='../vendors/nprogress/nprogress.css' rel='stylesheet'>
            
          <style>
          .content b{
            margin:10px 0;
          }
          .wrapper .alert-success{
            font-size: 20px;;
          }
          
          
          .img{
            border-bottom: 4px solid black;
            padding: 10px;
          }

       
          </style>
          </head>
          
          <body class='nav-md'>
             
          <div class='container'>
          <div class='img'>
            <h2>SIBL BONPARA OUTLET</h2>
          </div><br>
          <div class='wrapper'>
          <b>Dear $usersent</b> 
          <h4>We are sending you this email further to your successful login to SIBLBONPARA Admin area.</h4>

        <p style='font-weight:400;'>
        Email: $useremail <br>
        IP Address: $ip <br>
        Device Name: $get_device <br>
          Os: $get_os <br>
          Browser: $get_browser <br>
          Login Time:$userdate, $usertime</p>
<h4>You can check your IP address on the site <a href='https://whoer.net/'>whoer.net</a> </h4>

<h3>This email is intended to inform you about the security of your account.</h3>
            <div class='creadit'>
              <b>Best regards</b>
              <p>Social Islami Bank Limited. Bonpara Outlet</p>
            </div>
          </div>
          </div>
          
          </body>
          </html>";
          
          //Load Composer's autoloader
          require 'phpmailer/vendor/autoload.php';
          
          //Create an instance; passing `true` enables exceptions
          $mail = new PHPMailer(true);
          
          
              //Server settings
                                  
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = EMAIL;                     //SMTP username
              $mail->Password   = PASS;                               //SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
              $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
          
              //Recipients
              $mail->setFrom(EMAIL,'support@siblbonpara');     //Add a recipient
              $mail->addAddress($_SESSION['email'] );               //Name is optional
              $mail->addReplyTo('no-replay@gmail.com', 'No-replay');
          
             
          
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = 'Successful authorization-SIBL BONPARA';
              $mail->Body    = $msg;
          
              $mail->send();
          
          
                              //Email


        ?>
        <script>
          location.replace("index.php");
        </script>
        <?php

         }else{
          $_SESSION['msg'] = "Incorrect Password";
         }

     }else{
      $_SESSION['msg'] = "Invalid Username";
     }

}

?>
  

<div  style="text-align: center; margin-top:50px; margin-bottom:-60px; color:#000000;">
                     <h2>Social Islami Bank Limited.</h2>
                      <h4><b> Bonpara Outlet </b></h4>
                      <p style="font-weight:500;">Bonpara Pouro Market 2nd floor, Bonpara ,Natore<br>Phone: 01770078171</p>   
                     </div>

    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div  style="border-top:2px solid black;"class="login_wrapper">
        
        <div class="animate form login_form">
          <section class="login_content">

          <?php
if(isset($_SESSION['msg'])){
  ?>
  <div class="alert alert-danger">
   <h4> <?php
    echo $_SESSION['msg']; 
    unset($_SESSION['msg']);
    ?></h4>
  </div>
  <?php
}

          ?>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
            
              <h1>Login Form</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" /> 
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div class="link forget-pass text-left" style="margin:20px 0;"><a style="font-weight:bold; font-size:15px; color:#455B92;" href="forgot-password.php">Forgot password?</a></div>
              <div style="margin-left:-11%; width:100%;">
               <input type="submit" name="submit" class="btn btn-info btn-block" value="Log In">
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
   


</div>
  </body>
</html>
<?php
class UserInfo{



	private static function get_user_agent() {
		return  $_SERVER['HTTP_USER_AGENT'];
	}

	public static function get_ip() {
		$mainIp = '';
		if (getenv('HTTP_CLIENT_IP'))
			$mainIp = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$mainIp = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$mainIp = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$mainIp = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$mainIp = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$mainIp = getenv('REMOTE_ADDR');
		else
			$mainIp = 'UNKNOWN';
		return $mainIp;
	}

	public static function get_os() {

		$user_agent = self::get_user_agent();
		$os_platform    =   "Unknown OS Platform";
		$os_array       =   array(
			'/windows nt 10/i'     	=>  'Windows 10',
			'/windows nt 6.3/i'     =>  'Windows 8.1',
			'/windows nt 6.2/i'     =>  'Windows 8',
			'/windows nt 6.1/i'     =>  'Windows 7',
			'/windows nt 6.0/i'     =>  'Windows Vista',
			'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
			'/windows nt 5.1/i'     =>  'Windows XP',
			'/windows xp/i'         =>  'Windows XP',
			'/windows nt 5.0/i'     =>  'Windows 2000',
			'/windows me/i'         =>  'Windows ME',
			'/win98/i'              =>  'Windows 98',
			'/win95/i'              =>  'Windows 95',
			'/win16/i'              =>  'Windows 3.11',
			'/macintosh|mac os x/i' =>  'Mac OS X',
			'/mac_powerpc/i'        =>  'Mac OS 9',
			'/linux/i'              =>  'Linux',
			'/ubuntu/i'             =>  'Ubuntu',
			'/iphone/i'             =>  'iPhone',
			'/ipod/i'               =>  'iPod',
			'/ipad/i'               =>  'iPad',
			'/android/i'            =>  'Android',
			'/blackberry/i'         =>  'BlackBerry',
			'/webos/i'              =>  'Mobile'
		);

		foreach ($os_array as $regex => $value) {
			if (preg_match($regex, $user_agent)) {
				$os_platform    =   $value;
			}
		}   
		return $os_platform;
	}

	public static function  get_browser() {

		$user_agent= self::get_user_agent();

		$browser        =   "Unknown Browser";

		$browser_array  =   array(
			'/msie/i'       =>  'Internet Explorer',
			'/Trident/i'    =>  'Internet Explorer',
			'/firefox/i'    =>  'Firefox',
			'/safari/i'     =>  'Safari',
			'/chrome/i'     =>  'Chrome',
			'/edge/i'       =>  'Edge',
			'/opera/i'      =>  'Opera',
			'/netscape/i'   =>  'Netscape',
			'/maxthon/i'    =>  'Maxthon',
			'/konqueror/i'  =>  'Konqueror',
			'/ubrowser/i'   =>  'UC Browser',
			'/mobile/i'     =>  'Handheld Browser'
		);

		foreach ($browser_array as $regex => $value) {

			if (preg_match($regex, $user_agent)) {
				$browser    =   $value;
			}

		}

		return $browser;

	}

	public static function  get_device(){

		$tablet_browser = 0;
		$mobile_browser = 0;

		if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			$tablet_browser++;
		}

		if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			$mobile_browser++;
		}

		if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
			$mobile_browser++;
		}

		$mobile_ua = strtolower(substr(self::get_user_agent(), 0, 4));
		$mobile_agents = array(
			'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
			'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
			'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
			'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
			'newt','noki','palm','pana','pant','phil','play','port','prox',
			'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
			'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
			'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
			'wapr','webc','winw','winw','xda ','xda-');

		if (in_array($mobile_ua,$mobile_agents)) {
			$mobile_browser++;
		}

		if (strpos(strtolower(self::get_user_agent()),'opera mini') > 0) {
			$mobile_browser++;
	            //Check for tablets on opera mini alternative headers
			$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
			if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
				$tablet_browser++;
			}
		}

		if ($tablet_browser > 0) {
	           // do something for tablet devices
			return 'Tablet';
		}
		else if ($mobile_browser > 0) {
	           // do something for mobile devices
			return 'Mobile';
		}
		else {
	           // do something for everything else
			return 'Computer';
		}   
	}

}
?>