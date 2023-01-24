
<!DOCTYPE html>

<head>
    
<section id="user_header">
<?php
$page_name = 'home';
include 'menu.php';
?>
</section> 

<?php
$sel=mysqli_query($dbcon,"select * from user_data where em='$usr'");
    $r=mysqli_fetch_row($sel);
?>


</head>

<body>
       <div class="banner-wthree-info container mt-3">
            <div class="row">
                <div class="col-lg-5 banner-left-info">
                    <h3>Welcome <?php echo $r[1] ?></h3>
                </div>

                <div class="col-lg-7 banner-img">
                    <img src="../gif/user.gif" alt="part image" class="img-fluid">
                </div>
            </div>
        </div>
</body>

</html>
