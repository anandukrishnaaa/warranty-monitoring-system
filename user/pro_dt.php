<!DOCTYPE html>

<head>

<style>

    .border-shadow {
        box-shadow: 1px 1px 3px #e5e5e5;
    }
</style>

<section id="user_header">
<?php
$page_name = 'pro';
include 'menu.php';
?>
</section> 

<?php
$mid = $_GET['mid'];
$sel = mysqli_query($dbcon, "select * from pro where id='$mid'");
$r = mysqli_fetch_row($sel);
?>

<?php
if (isset($_POST['b1'])) 
{
    $t1 = $_POST['t1'];

    if ($r[9] < $t1) 
    {
        echo '<script>alert("Insufficient Stock Available....Please Try Again")</script>';
    } 
    else 
    {
        $tot = $r[7] * $t1;
        $ins = mysqli_query($dbcon,"insert into book values('','$mid','$r[11]','$usr','$t1','$r[7]','$tot','')");
        $bid = mysqli_insert_id($dbcon);
        if ($ins > 0) {

            header("location:pro_dt.php?mid=$mid&bid=$bid");
        }
    }
}
?>

<?php
if (isset($_POST['b2'])) 
{
    $t1 = $_POST['t1'];
    $date = date('Y-m-d');
    $ins = mysqli_query($dbcon, "insert into comt values('','$t1','$date','$usr','$mid','0')");
    if ($ins > 0) 
    {
        header("location:pro_dt.php?mid=$mid");
    }
}
?>

<?php
if (isset($_GET['upd'])) 
{
    $mid = $_GET['mid'];
    $upd = $_GET['upd'];
    $upd1 = mysqli_query($dbcon, "update book set st='0' where id='$upd'");

    if ($upd1 > 0) {
        $upd2 = mysqli_query($dbcon, "update user_log set st='1'where uid='$uid'");
        header("location:book.php");
    }
}
?>

    </head>

    <body>
        <div class="container card p-4 border-shadow m-5 mx-auto">
        <span class="fs-1 text-uppercase text-center mb-4"><?php echo $r[2] ?></span>

            <div class="row justify-content-center align-items-center">
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
                    <p class="text-primary mb-2">Date of Manufacture : <?php echo $r[12] ?></p>
                    
                    <p class="text-black"><?php echo $r[6] ?> </p>
                    <p class="text-black">Product ID : <?php echo $r[3] ?></p>
                    <?php
                    if (isset($_GET['bid'])) {
                        $bid = $_GET['bid'];
                        $pr = mysqli_query($dbcon, "select * from book where id='$bid'");
                        $pr1 = mysqli_fetch_row($pr);
                        ?>
                        <p style="color: green">Order Approval </p>
                        <p>Stock Booked : <?php echo $pr1[4] ?></p>
                        <p>Price : <?php echo $pr1[5] ?> Rs/-</p>
                        <p>Total Amount : <?php echo $pr1[6] ?> Rs/-</p>
                        <span >
                            <div class="btn btn-success"><a href="pro_dt.php?upd=<?php echo $pr1[0] ?>&mid=<?php echo $mid ?>"><b style="color: white">Approve</b></a></div>&nbsp;&nbsp;<div class="btn btn-danger"><a href="pro_dt.php?mid=<?php echo $mid ?>"><b style="color: white">Reject</b></a></div>
                        </span>
                        <?php } else { ?>
                    <?php } ?>
                    <p class="text-black">Stock Available : <?php echo $r[9] ?></p>
                    <a href="add_sale.php?mid=<?php echo $r[0] ?>"><button class="btn form-control btn-outline-dark my-2">Buy Now</button></a>
                </div>
            </div>
        </div>
            
        <div class="container mt-5">
            <div class="contact_right p-lg-5 p-4">
                <form method="post"enctype="multipart/form-data">
                    <div class="field-group">
                        <div class="content-input-field">
                            <textarea name="t1" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="content-input-field">
                        <button type="submit"name="b2" class="btn">Post Review</button>
                    </div>
                </form>
            </div>
            <br/>
            <div class="contact_right p-lg-5 p-4">
                <?php
                    $sel_p = mysqli_query($dbcon, "select * from comt where pid='$mid' order by id desc");
                    while ($r_p = mysqli_fetch_row($sel_p)) {
                    $pr = mysqli_query($dbcon, "select * from user_data where em='$r_p[3]'");
                    $pr1 = mysqli_fetch_row($pr);
                    ?>
                    <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                                <img class="img-responsive" style="width: 100px;height: 100px" src="../gif/149071.png" />
                            </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <header class="text-left">
                                        <div class="comment-user"><i class="fa fa-user"></i> <?php echo $pr1[1] ?></div>
                                        <time class="comment-date text-secondary" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> <?php echo $r_p[2] ?></time>
                                    </header>
                                    <div class="comment-post">
                                        <p class="text-black">
                                    <?php echo $r_p[1] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <hr>
                    <?php } ?>
            </div>
        </div>
    </body>

</html>
