<?php
include '../connection.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body id="login">
    <form method="post">
  <div class="login-logo">
    
  </div>
  <h2 class="form-heading">login</h2>
  <div class="app-cam">
	 
              
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
header("location:index_admin.php");
}
else
{
echo mysql_error();

}
}
?>
		<input type="text" name="t1"class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
		<input type="password"name="t2" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
		<div class="submit"><input type="submit" name="b1"onclick="myFunction()" value="Login"></div>
		
	
  </div>
   <div class="copy_layout login">
      
   </div>
  </form>
</body>
</html>
