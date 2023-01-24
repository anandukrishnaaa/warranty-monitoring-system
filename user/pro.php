<!DOCTYPE html>

<head>
    
<section id="user_header">
<?php
$page_name = 'pro';
include 'menu.php';
?>
</section> 


<?php
if (isset($_GET['mid'])) {
    $mid = $_GET['mid'];
    $log1 = mysqli_query($dbcon, "select * from cart where pid='$mid' and uid='$usr'");
    if (mysqli_num_rows($log1) > 0) {

        $r1 = mysqli_fetch_row($log1);
        $tot = $r1[2] + 1;

        $upd2 = mysqli_query($dbcon, "update cart set qnt='$tot' where pid='$mid' and uid='$usr'");

        if ($upd2 > 0) {
            header("location:cart.php");
        }
    } else {

        $ins = mysqli_query($dbcon, "insert into cart(pid,qnt,uid,st) values('$mid','1','$usr','0')");

        if ($ins > 0) {
            header("location:cart.php");
        }
    }
}
?>

</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-5">
            <h3 class="mb-lg-5 ms-5 mb-4">All Products</h3>
            <div class="row shop-wthree-info text-center">

            <?php
            $sel_gal = mysqli_query($dbcon, "select * from pro  order by id desc");
            while ($r_gal = mysqli_fetch_row($sel_gal)) {
                ?>
                    <div class="col-lg-3 shop-info-grid text-center mt-4">
                        <div class="card p-2">
                            <div class="">
                                <a href="pro_dt.php?mid=<?php echo $r_gal[0] ?>">
                                    <img style="width: 200px; aspect-ratio:1/1;" src="../img2/<?php echo $r_gal[10] ?>" class="m-0 p-0" alt="">
                                </a>
                            </div>
                            <div class="item-info-product">
                                <h4>
                                    <a href="pro_dt.php?mid=<?php echo $r_gal[0] ?>"><?php echo substr($r_gal[2], 0, 20) ?></a>
                                </h4>

                                <div class="item-item-info-product">
                                    <div class="grid-price">
                                        <span class="money"> <?php echo $r_gal[8] ?> Rs/-</span>
                                    </div>
                                </div>
                                <ul class="stars">
                                <?php
                                $cat = mysqli_query($dbcon, "select * from cate where id='$r_gal[1]'");
                                $cat1 = mysqli_fetch_row($cat);
                                echo"$cat1[1]";
                                ?>
                                </ul>
                                <a href="pro.php?mid=<?php echo $r_gal[0] ?>"><button class="btn submit mt-4">Add to cart <span class="fa fa-shopping-cart"></span></button></a>
                            </div>
                        </div>
                    </div>
               <?php } ?>
            </div>
        </div>
    </section>

</body>

</html>
