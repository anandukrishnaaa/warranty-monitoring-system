<!DOCTYPE html>

<head>
    
<section id="shop_header">
    <?php
    $page_name = 'pro';
    include 'menu.php';
    ?>
</section>

</head>

<body>

    <section class="banner-bottom py-5">
        <div class="container py-5">
        <h3 class="mb-lg-5 ms-5 mb-4">Product Stock</h3>
            <div class="row shop-wthree-info text-center">
                
                <?php
                        
                $sel_gal=mysqli_query($dbcon,"select * from pro  order by id desc");
                    while($r_gal=mysqli_fetch_row($sel_gal))
                    {
                ?>
                <div class="col-lg-3 shop-info-grid text-center mt-4">
                    <div class="card p-2">
                        <div class="">
                            <img style="width: 250px;height: 200px" src="../img2/<?php echo $r_gal[10] ?>" class="m-0 p-0" alt="">

                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="pro_dt.php?mid=<?php echo $r_gal[0] ?>"><?php echo substr($r_gal[2],0,20)?></a>
                            </h4>

                            <div class="item-item-info-product">
                                <div class="grid-price">
                                    <span class="money"> <?php echo $r_gal[8] ?> Rs/-</span>
                                </div>
                            </div>
                            <ul class="stars">
                              <?php
                                    $cat=mysqli_query($dbcon,"select * from cate where id='$r_gal[1]'");
                                    $cat1=mysqli_fetch_row($cat);
                                    
                                    echo"$cat1[1]";
                                    ?>
                               </ul>
                        </div>
                    </div>
                </div>
               
 <?php } ?>
            </div>
        </div>
    </section>

</body>

</html>
