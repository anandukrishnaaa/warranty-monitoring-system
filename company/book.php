<!DOCTYPE html>

    <head>
        
        <section id="comp_header">
    <?php
    $page_name = 'book';
    include 'menu.php';
    ?>
</section>

    <?php
if (isset($_GET['upd'])) {

    $upd = $_GET['upd'];
    $sel = mysqli_query($dbcon, "select * from book where id='$upd'");
    $r = mysqli_fetch_row($sel);

    $sel1 = mysqli_query($dbcon, "select * from comp where em='$usr'");
    $r1 = mysqli_fetch_row($sel1);

    $sel2 = mysqli_query($dbcon, "select * from shop where em='$r[3]'");
    $r2 = mysqli_fetch_row($sel2);

    $sel3 = mysqli_query($dbcon, "select * from pro where id='$r[1]'");
    $r3 = mysqli_fetch_row($sel3);

    $ac1 = mysqli_query($dbcon, "select * from account_bank where account_no='$r1[5]'");
    $acc1 = mysqli_fetch_row($ac1);

    $ac2 = mysqli_query($dbcon, "select * from account_bank where account_no='$r2[10]'");
    $acc2 = mysqli_fetch_row($ac2);

    $tot1 = $acc1[9] + $r[6];
    $tot2 = $acc2[9] - $r[6];
    $tot3 = $r3[9] - $r[4];
    $upd1 = mysqli_query($dbcon, "update account_bank set amount='$tot1' where account_no='$r1[5]'");

    if ($upd1 > 0) {

        $upd2 = mysqli_query($dbcon, "update account_bank set amount='$tot2' where account_no='$r2[10]'");

        if ($upd2 > 0) {

            $upd3 = mysqli_query($dbcon, "update book set st='1' where id='$upd'");

            if ($upd3 > 0) {

                $upd4 = mysqli_query($dbcon, "update pro1 set st='1', sid='$r[3]' where pid='$r[1]' and st='0' order by id desc limit $r[4]");

                if ($upd4 > 0) {


                    $upd5 = mysqli_query($dbcon, "update pro set qnty='$tot3' where id='$r[1]'");

                    if ($upd5 > 0) {

                        $log = mysqli_query($dbcon, "select * from pro3 where sid='$r[3]' and pid='$r[1]'");
                        if (mysqli_num_rows($log) > 0) {
                            $log1 = mysqli_fetch_row($log);

                            $tot4 = $log1[3] + $r[4];

                            $upd6 = mysqli_query($dbcon, "update pro3 set qnty='$tot4' where sid='$r[3]' and pid='$r[1]'");

                            if ($upd6 > 0) {
                                header("location:book.php");
                            }
                        } else {

                            $ins = mysqli_query($dbcon, "insert into pro3 values('','$r[3]','$r[1]','$r[4]','0')");

                            if ($ins > 0) {

                                header("location:book.php");
                            }
                        }
                    }
                }
            }
        }
    }
}
?>
<?php
if (isset($_GET['del'])) {
    $del = $_GET['del'];

    $del1 = mysqli_query($dbcon, "update book set st='2'where id='$del'");

    if ($del1 > 0) {
        header("location:book.php");
    }
}
?>
    
    </head>

    <body>

        <section class="banner-bottom py-5">
            <div class="container py-md-5">
                <h3 class="mb-lg-5 ms-5 mb-4">Stock Request</h3>
                <div class="row contact_information">
                    <div class="col-md-12 contact_left p-4">
<?php
$sel_p = mysqli_query($dbcon, "select * from book where cid='$usr' and st='0' order by id desc");
if (mysqli_num_rows($sel_p) > 0) {
    ?>
                            <table class="table table-bordered">
                                <tr class="bg-secondary text-white">
                                    <td>Name</td>
                                    <td>Product</td>
                                    <td>Shop</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Total</td>
                                    <td>Respond</td>
                                </tr>
    <?php
    $i = 0;
    while ($r_p = mysqli_fetch_row($sel_p)) {
        $sel1 = mysqli_query($dbcon, "select * from pro where id='$r_p[1]'");
        $r1 = mysqli_fetch_row($sel1);
        $sel2 = mysqli_query($dbcon, "select * from shop where em='$r_p[3]'");
        $r2 = mysqli_fetch_row($sel2);
        $i++;
        ?>
                                    <tr>
                                        <td><?php echo $r1[2] ?></td>
                                        <td><img style="width: 120px;height: 120px" src="../img2/<?php echo $r1[10] ?>" class="img-fluid" alt=""></td>
                                        <td><?php echo $r2[1] ?></td>
                                        <td><?php echo $r_p[5] ?> Rs/-</td>
                                        <td><?php echo $r_p[4] ?></td>

                                        <td><?php echo $r_p[6] ?> Rs/-</td>
                                        <td>
                                            <a href="book.php?upd=<?php echo $r_p[0] ?>"><span style="color: green" class="fa fa-check"></span></a> &nbsp;&nbsp;
                                            <a href="book.php?del=<?php echo $r_p[0] ?>"><span style="color: red" class="fa fa-close"></span></a></td>
                                    </tr>
        <?php } ?>
                            </table>
    <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </body>

</html>
