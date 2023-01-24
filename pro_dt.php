<?php
include 'connection.php';
ob_start();
session_start();

$mid=$_GET['mid'];
$sel=mysqli_query($dbcon,"select * from pro where id='$mid'");
    $r=mysqli_fetch_row($sel);
?>


<?php
                 
                    if(isset($_POST['b1']))
 {
    
    $t1=$_POST['t1'];
    
    
    if($r[9]<$t1)
    {
      echo '<script>alert("Insufficient Stock Available....Please Try Again")</script>';   
    }
 else {
        
    
    $tot=$r[7]*$t1;
         
    $ins=mysqli_query($dbcon,"insert into book values('','$mid','$r[11]','$usr','$t1','$r[7]','$tot','')");
     $bid = mysqli_insert_id($dbcon);
    if($ins>0)
    {
      
                header("location:pro_dt.php?mid=$mid&bid=$bid");
            }
    }
        
 }
 
        ?>

<?php
                 
                    if(isset($_POST['b2']))
 {
    
    $t1=$_POST['t1'];
    
    $date=date('Y-m-d');
   
    $ins=mysqli_query($dbcon,"insert into comt values('','$t1','$date','$usr','$mid','0')");
     
    if($ins>0)
    {
      
                header("location:pro_dt.php?mid=$mid");
            }
    }
        
 
 
        ?>
<?php
if(isset($_GET['upd']))
{
    $mid=$_GET['mid'];  
    $upd=$_GET['upd'];
    $upd1=mysqli_query($dbcon,"update book set st='0' where id='$upd'");
    
   
    if($upd1>0)
    {
        $upd2=mysqli_query($dbcon,"update user_log set st='1'where uid='$uid'");
    
   
    
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
    <title>WARRANTY | Single :: Trinity Technologies</title>
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
    <link rel="stylesheet" href="temp/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="temp/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="temp/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <!-- //Fonts -->

</head>

<body>
    <div class="main-sec inner-page">
        <!-- //header -->
        <?php
       
       include 'menu.php';
       ?>
        <!-- //header -->
    </div>
    <!-- //banner-->
    <!--/banner-bottom -->
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <!-- product right -->
            <div class="left-ads-display wthree">
                <div class="row">
                    <div class="desc1-left col-md-6">
                        <img style="width: 100%;height: 400px" src="img2/<?php echo $r[10] ?>" class="img-fluid" alt="">
                    </div>
                    <div class="desc1-right col-md-6 pl-lg-3">
                        <h3><?php echo $r[2] ?></h3>
                        <h6>
                            <?php
                                    $cat=mysqli_query($dbcon,"select * from cate where id='$r[1]'");
    $cat1=mysqli_fetch_row($cat);
                                    
                                    echo"$cat1[1]";
                                    ?>
                        </h6>
                        <br/>
                        <h5><?php echo $r[8] ?> Rs/-  </h5>
                        <div class="available mt-3">
                            
                            
                                
                                <?php
                                if(isset($_GET['bid']))
                                {
                                    $bid=$_GET['bid'];
                                  $pr=mysqli_query($dbcon,"select * from book where id='$bid'");
                                  $pr1=mysqli_fetch_row($pr);  
                                ?>
                                
                                <h5 style="color: green">Order Approval </h5>
                                
                                <h4>Stock Booked : <?php echo $pr1[4] ?></h4>
                                <h4>Price : <?php echo $pr1[5] ?> Rs/-</h4>
                                <h4>Total Amount : <?php echo $pr1[6] ?> Rs/-</h4>
                                <span >
                                     <div class="btn btn-success"><a href="pro_dt.php?upd=<?php echo $pr1[0] ?>&mid=<?php echo $mid ?>"><b style="color: white">Approve</b></a></div>&nbsp;&nbsp;<div class="btn btn-danger"><a href="pro_dt.php?mid=<?php echo $mid ?>"><b style="color: white">Reject</b></a></div>
		
                                </span>
                                
                                
                                
                                
                                <?php
                                }
 else {
                                ?>
                            
                                
                                <?php
 }
 ?>
                                
                                <div class="social-ficons mt-4">
                                    
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>


                </div>
                <h3 class="shop-sing">Specification & Details </h3>
                <div class="row sub-para-w3pvt my-5">

                    
                    <p style="font-size: x-large">
                        <?php echo $r[4] ?>
                    </p>
                    </div>

                
                <br/>
                <div class="contact_right p-lg-5 p-4">
                        <?php
                
            $sel_p=mysqli_query($dbcon,"select * from comt where pid='$mid' order by id desc");
            while($r_p=mysqli_fetch_row($sel_p))
            {
                $pr=mysqli_query($dbcon,"select * from user_data where em='$r_p[3]'");
    $pr1=mysqli_fetch_row($pr);
                ?>
 
 <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                  <img class="img-responsive" style="width: 100px;height: 100px" src="gif/149071.png" />
              
              </figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> <?php echo $pr1[1] ?></div>
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> <?php echo $r_p[2] ?></time>
                  </header>
                  <div class="comment-post">
                    <p>
                      <?php echo $r_p[1] ?>
                    </p>
                  </div>
                  
                </div>
              </div>
            </div>
          </article>
          
          <hr>
       <?php
       
       
            }
            ?>
                    </div>

               

            </div>
        </div>
    </section>
    
     
    <!-- /banner-bottom -->
    <!--/newsletter -->
    
    <!--//newsletter -->
    <!--/shipping-->
    
    <!--//shipping-->
    <!-- footer -->
    
    <!-- //footer -->
    <!-- copyright -->
    <div class="cpy-right text-center py-3">
        <p>© 2021 Warranty. All rights reserved | Design by
            <a href="temp/http://w3layouts.com"> W3layouts.</a>
        </p>
    </div>
    <!-- //copyright -->

</body>

</html>
