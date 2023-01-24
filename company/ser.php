
<!DOCTYPE html>

<head>
<section id="comp_header">
    <?php
    $page_name = 'ser';
    include 'menu.php';
    ?>
</section>
</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-5">
            <h3 class="title-wthree mb-lg-5 mb-4 text-center">Service Center</h3>
            <!--/row-->
            <div class="row shop-wthree-info text-center">
                
                <?php
                        
                $sel_gal=mysqli_query($dbcon,"select * from ser where cid='$usr' order by id desc");
                    while($r_gal=mysqli_fetch_row($sel_gal))
                    {
                ?>
                <div class="col-lg-4 shop-info-grid text-center mt-4">
                    <div class="">
                        <div class="">
                            <img style="width: 350px;height: 300px" src="../img3/<?php echo $r_gal[9] ?>" class="m-0 p-0" alt="">

                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="ser_dt.php?mid=<?php echo $r_gal[0] ?>"><?php echo substr($r_gal[1],0,20)?></a>
                            </h4>

                            <div class="item-info-product">
                                <div class="grid-price">
                                    <span class="money"><a href="tel:<?php echo $r_gal[3] ?>"> <span class="fa fa-phone"></span> <?php echo $r_gal[3] ?></a></span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
               
 <?php
                                                            }
                                                            ?>
            </div>
        </div>
    </section>

</body>

</html>
