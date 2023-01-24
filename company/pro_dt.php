<!DOCTYPE html>

<head>

<section id="comp_header">
    <?php
    $page_name = 'pro';
    include 'menu.php';
    ?>
</section>

<?php
$usr = $_SESSION['uid'];
$mid = $_GET['mid'];
$sel = mysqli_query($dbcon, "select * from pro where id='$mid'");
$r = mysqli_fetch_row($sel);
?>

</head>

<body>

    <div class="container card p-4 border-shadow m-5 mx-auto">
        <span class="fs-1 text-uppercase text-center mb-4"><?php echo $r[2] ?></span>

        <div class="row justify-content-center align-items-center pb-5">
            <div class="col h-100">
                <img class="d-block p-0 mx-auto my-auto img-fluid" style="width: 500px; aspect-ratio:4/3;" src="../img2/<?php echo $r[10] ?>">
            </div>

            <div class="col ms-5">
                <p class="mt-4">
                <?php
                $cat = mysqli_query($dbcon, "select * from cate where id='$r[1]'");
                $cat1 = mysqli_fetch_row($cat);
                echo"$cat1[1]";
                ?>
                </p>
                <p class="fs-5 text-black"> Rs.<?php echo $r[8] ?></p>
                <div class="m-3">
                    <p style="">
                        <?php echo $r[4] ?>
                    </p>
                </div>
                <p class="text-primary">Warranty : <?php echo $r[5] ?> Year</p>
                
                <p class="text-black"><?php echo $r[6] ?> </p>
                <p class="text-black">Product ID : <?php echo $r[3] ?></p>
                
                <p>Stock Available : <?php echo $r[9] ?></p>
            </div>
        </div>
    </div>

</body>

</html>
