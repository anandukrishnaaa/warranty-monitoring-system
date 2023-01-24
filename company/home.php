<!DOCTYPE html>

<head>

<section id="comp_header">
    <?php
    $page_name = 'home';
    include 'menu.php';
    ?>
</section>

<?php
$usr = $_SESSION['uid'];
$sel = mysqli_query($dbcon, "select * from comp where em='$usr'");
$r = mysqli_fetch_row($sel);
?>


</head>

<body>
    <div class="banner-wthree-info container mt-4">
        <div class="row">
            <div class="col-lg-5 banner-left-info">
                <h3>Welcome <?php echo $r[1] ?></h3>
            </div>
            <div class="col-lg-7 banner-img">
                <img src="../gif/comp.gif" alt="part image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

</body>

</html>
