
<?php
include '../connection.php';
ob_start();
session_start();
$usr=$_SESSION['uid'];

?>
<?php

if($usr=$_SESSION['uid'])
{
    
}
 else
     {
    header("location:../index.php");    
}
?>




<?php
if(isset($_GET['upd']))
{
    
    $upd=$_GET['upd'];
    $sel=mysqli_query($dbcon,"select * from book where id='$upd'");
    $r=mysqli_fetch_row($sel2);
    
     $sel1=mysqli_query($dbcon,"select * from comp where em='$usr'");
    $r1=mysqli_fetch_row($sel1);
    
     $sel2=mysqli_query($dbcon,"select * from shop where em='$r[3]'");
    $r2=mysqli_fetch_row($sel2);
    
    $ac1=mysqli_query($dbcon,"select * from account_bank where account_no='$r1[5]'");
    $acc1=mysqli_fetch_row($ac1);
    
    $ac2=mysqli_query($dbcon,"select * from account_bank where account_no='$r2[10]'");
    $acc2=mysqli_fetch_row($ac2);
    
    $tot1=$acc1[9]+$r[6];
     $tot2=$acc2[9]-$r[6];
    $upd1=mysqli_query($dbcon,"update account_bank set amount='$tot1' where account_no='$r1[5]'");
    
   
    if($upd1>0)
    {
      
    $upd2=mysqli_query($dbcon,"update account_bank set amount='$tot2' where account_no='$r2[10]'");
    
   
    if($upd2>0)
    {
   $upd3=mysqli_query($dbcon,"update book set st='1' where id='$upd'");
    
   
    if($upd3>0)
    {
   
       header("location:book.php");
}
}                         
                            
    }
}

?>
          <?php
                            if(isset($_GET['del']))
{
                                $del=$_GET['del'];
                                
    $del1=mysqli_query($dbcon,"update book set st='2'where id='$del'");
    
   
    if($del1>0)
    {
       header("location:book.php");
}
}
  


?>
<!--
Author:W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>WARRANTY | Contact :: Trinity Technologies</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Baggage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="../temp/bootstrap-5.1.3-dist/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="../temp/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="../temp/style.css">
    <link href="../temp/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <!-- //Fonts -->

</head>

<body>
    <?php
       
       include 'menu.php';
       ?>

    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <h3 class="title-wthree mb-lg-5 mb-4 text-center">Online Purchase </h3>
            <div class="row contact_information">
                
                <div class="col-md-12 contact_left p-4">
                  <?php
                
            $sel_p=mysqli_query($dbcon,"select * from sale1 where uid='$usr' order by id desc");
            if(mysqli_num_rows($sel_p)>0)
            {
                
                ?>
			<table class="table table-bordered">
            <tr>
                <td>Product Name</td>
                <td>Product</td>
                <td>Price</td>
                 <td>Qnty</td>
                <td>Total</td>
                <td>Name</td>
               <td>Contact</td>
               
               <td>Email</td>
               <td>Address</td>
               <td>Date</td>
                
                
            </tr>
            <?php
            $i=0;
            while($r_p=mysqli_fetch_row($sel_p))
            {
                $sel1=mysqli_query($dbcon,"select * from pro where id='$r_p[4]'");
    $r1=mysqli_fetch_row($sel1);
     $sel2=mysqli_query($dbcon,"select * from comp where em='$r_p[9]'");
    $r2=mysqli_fetch_row($sel2);
                $i++;
                ?>
            <tr>
                <td><?php echo $r1[2] ?></td>
                <td><img style="width: 120px;height: 120px" src="../img2/<?php echo $r1[10] ?>" class="img-fluid" alt=""></td>
                <td><?php echo $r_p[5] ?> Rs/-</td>
                <td><?php echo $r_p[6] ?> </td>
                <td><?php echo $r_p[7] ?> Rs/-</td>
                <td><?php echo $r_p[1] ?> </td>
                <td><?php echo $r_p[2] ?> </td>
                <td><?php echo $r_p[3] ?> </td>
                <td><?php echo $r_p[11] ?> </td>
                <td><?php echo $r_p[8] ?> </td>
                
            </tr>
            <?php
            }
            ?>
        </table>
                        <?php
            }
            ?>
                
                
                </div>

               
            </div>
        </div>
    </section>
</body>

</html>
