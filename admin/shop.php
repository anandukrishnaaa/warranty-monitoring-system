<!DOCTYPE html>

<head>

<section id="admin_header">
    <?php
    $page_name = 'shop';
    include 'menu.php';
    ?>
</section>

</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-5">
            <h3 class="mb-lg-5 ms-5 mb-4">Shops</h3>
            <div class="row shop-wthree-info text-center">
                <?php
                $sel_gal = mysqli_query($dbcon, "select * from shop where st='1' order by id desc");
                while ($r_gal = mysqli_fetch_row($sel_gal)) {
                    ?>
                    <div class="col-lg-4 shop-info-grid text-center mt-4">
                        <div class="">
                            <div class="">
                                <img style="width: 80%;height: 300px" src="../img4/<?php echo $r_gal[9] ?>"alt="" class="p-0 m-0" >
                            </div>
                            <div class="item-info-product">
                                <h4>
                                    <a href="shop_dt.php?mid=<?php echo $r_gal[0] ?>"><?php echo substr($r_gal[1], 0, 20) ?></a>
                                </h4>
                                <div class="item-info-product">
                                    <div class="grid-price">
                                        <span class="money"><a href="tel:<?php echo $r_gal[3] ?>"> <span class="fa fa-phone"></span> <?php echo $r_gal[3] ?></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <?php } ?>
            </div>
        </div>
    </section>
</body>

</html>
