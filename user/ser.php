
<!DOCTYPE html>

<section id="user_header">
    <?php
    $page_name = 'pur';
    include 'menu.php';
    ?>
</section> 

</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-5">
            <h3 class="mb-lg-5 ms-5 mb-4">Service Center</h3>
            <div class="row shop-wthree-info text-center">

                <?php
                $sel1 = mysqli_query($dbcon, "SELECT * FROM ser");
                if (mysqli_num_rows($sel1) > 0) {
                    while ($r1 = mysqli_fetch_row($sel1)) {
                        $sel_gal = mysqli_query($dbcon, "select * from ser where id='$r1[0]'");
                        $r_gal = mysqli_fetch_row($sel_gal);
                        ?>
                        <div class="col-lg-4 shop-info-grid text-center mt-4">
                            <div class="product-shoe-info shoe">
                                <div class="men-thumb-item">
                                    <img style="width: 100%;height: 300px" src="../img3/<?php echo $r_gal[9] ?>" class="img-fluid" alt="">

                                </div>
                                <div class="item-info-product">
                                    <h4>
                                        <a href="ser_dt.php?mid=<?php echo $r_gal[0] ?>"><?php echo substr($r_gal[1], 0, 20) ?></a>
                                    </h4>

                                    <div class="product_price">
                                        <div class="grid-price">
                                            <span class="money"><a href="tel:<?php echo $r_gal[3] ?>"> <span class="fa fa-phone"></span> <?php echo $r_gal[3] ?></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    echo"No Service Center Available at the moment.";
                }
                ?>
            </div>
        </div>
    </section>

</body>

</html>
