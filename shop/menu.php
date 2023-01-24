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

    <title>shop</title>
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
<!--<link rel="stylesheet" href="../assets/css/font-awesome.css" >-->


<header class="p-4 border-bottom">
    <ul class="navbar-nav d-flex flex-row align-items-center px-5">
        <h2 class="me-1 p-2">WMS</h2>
        <li class="ms-auto nav-item me-1"><a href="home.php" class="nav-link p-3 text-dark" style="<?php echo $page_name == 'home' ? 'text-decoration:underline;text-underline-offset:3px;' : '' ?>">Add Sales</a></li>
        <li class="nav-item me-1"><a href="pro.php" class="nav-link p-3 text-dark" style="<?php echo $page_name == 'pro' ? 'text-decoration:underline;text-underline-offset:3px;' : '' ?>">buy stock</a></li>
        <li class="nav-item me-1"><a href="book.php" class="nav-link p-3 text-dark" style="<?php echo $page_name == 'stock' ? 'text-decoration:underline;text-underline-offset:3px;' : '' ?>">stock request</a></li>
        <li class="nav-item me-1"><a href="sales.php" class="nav-link p-3 text-dark" style="<?php echo $page_name == 'sale' ? 'text-decoration:underline;text-underline-offset:3px;' : '' ?>">purchases</a></li>
        <li class="nav-item me-1 pill ms-auto"><a href="../logout.php" class="nav-link p-3">Logout</a></li>
    </ul>
</header>