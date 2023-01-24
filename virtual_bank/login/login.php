<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<?php

include '../../conection.php';
ob_start();
?>
<html>
<head>
<title>Bank Login</title>
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Classy Login form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <form method="post">
<!--header start here-->
<div class="header">
		<div class="header-main">
		       <h1>Bank Login </h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					
					<div class="header-left-bottom agileinfo">
						
					 
                                             <?php

session_start();
if(isset($_POST['b1']))
{
    $t1=$_POST['t1'];
    $t2=$_POST['t2'];
$log=mysqli_query($dbcon,"select * from admin_login where username='$_POST[t1]' and password='$_POST[t2]'");
if(mysqli_num_rows($log)>0)
{
$_SESSION['username']=$t1;
header("location:../home.php");
}
else
{
echo mysql_error();

}
}
?>
						<input type="text" name="t1" value="User name" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User name';}"/>
					<input type="password" name="t2" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>
						<div class="remember">
			             
						<div class="clear"> </div>
					  </div>
					   
						<input type="submit" name="b1"value="Login">
					
					
				</div>
				</div>
			  
			</div>
		</div>
</div>
<!--header end here-->

<!--footer end here-->
    </form>
</body>
</html>