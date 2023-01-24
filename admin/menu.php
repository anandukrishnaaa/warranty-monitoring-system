<?php
include '../connection.php';
ob_start();
session_start();
$usr = $_SESSION['uid'];
?>
<?php
if ($usr = $_SESSION['uid']) {
    
} else {
    header("location:../index.php");
}
?>

 <title>admin</title>
     <link rel="shortcut icon" type="image/x-icon" href="../images/shopping-online.png"/>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
<!--<link rel="stylesheet" href="../temp/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../temp/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../temp/style.css">--> 
<link href="../temp/css/font-awesome.css" rel="stylesheet">   
    
    <link rel="stylesheet" href="../assets/css/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../assets/css/mystyle.css">
<!--    <link rel="stylesheet" href="../assets/css/font-awesome.css" >-->


<header class="p-4 border-bottom">
    
    <ul class="navbar-nav d-flex flex-row  align-items-center px-5">    
        <h2>Admin</h2>
        <li class="ms-auto nav-item me-1"><a href="reg2.php" class="nav-link p-2 text-dark" style="<?php echo $page_name == 'shop_reg' ? 'text-decoration:underline;text-underline-offset:3px;' : '' ?>">shop registration</a></li>
        <li class="nav-item me-1"><a href="reg1.php" class="nav-link p-2 text-dark" style="<?php echo $page_name == 'comp_reg' ? 'text-decoration:underline;text-underline-offset:3px;' : '' ?>">company registration</a></li>
        <li class="nav-item me-1"><a href="cate.php" class="nav-link p-2 text-dark" style="<?php echo $page_name == 'cat' ? 'text-decoration:underline;text-underline-offset:3px;' : '' ?>">category management</a></li>
        <li class="nav-item me-1"><a href="comp.php" class="nav-link p-2 text-dark" style="<?php echo $page_name == 'comp' ? 'text-decoration:underline;text-underline-offset:3px;' : '' ?>">companies listed</a></li>
        <li class="nav-item me-1"><a href="comp_enq.php" class="nav-link p-2 text-dark" style="<?php echo $page_name == 'comp_apprv' ? 'text-decoration:underline;text-underline-offset:3px;' : '' ?>">company management</a></li>
        <li class="nav-item me-1"><a href="shop.php" class="nav-link p-2 text-dark" style="<?php echo $page_name == 'shop' ? 'text-decoration:underline;text-underline-offset:3px;' : '' ?>">shops listed</a></li>
        <li class="nav-item me-1"><a href="shop_enq.php" class="nav-link p-2 text-dark" style="<?php echo $page_name == 'shop_apprv' ? 'text-decoration:underline;text-underline-offset:3px;' : '' ?>">shop management</a></li>
        <li class="nav-item me-1 pill ms-auto"><a href="../logout.php" class="nav-link p-2">Logout</a></li>
    </ul>
</header>

<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery.validate.js" type="text/javascript"></script>