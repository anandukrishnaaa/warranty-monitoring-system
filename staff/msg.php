<!DOCTYPE html>

<head>

<section id="staff_header">
<?php
$page_name = 'msg';
include 'menu.php';
?>
</section> 

<?php
$sel = mysqli_query($dbcon, "select * from staff_data where em='$usr'");
$r = mysqli_fetch_row($sel);
?>


<?php
if (isset($_GET['del'])) 
{
    $del = $_GET['del'];

    $del1 = mysqli_query($dbcon, "update msg set ser='1'where id='$del'");

    if ($del1 > 0) {
        header("location:msg.php");
    }
}
?>

</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <h3 class="mb-lg-5 ms-5 mb-4">Repair Status</h3>

            <div class="row contact_information">

                <div class="col-md-12 contact_left p-4">
<?php
$sel_p = mysqli_query($dbcon, "select * from msg where se_id='$r[5]' and typ1='Repair' order by id desc");
if (mysqli_num_rows($sel_p) > 0) {
    ?>
                        <table class="table table-bordered">
                            <tr class="bg-secondary text-white">
                                <td></td>
                                <td>Product Name</td>
                                <td>Product</td>
                                <td>Company</td>
                                <td>Action</td>
                                <td>Name</td>
                                <td>Contact</td>
                                <td>Address</td>
                                <td>Description</td>
                                <td>Repair</td>
                            </tr>
    <?php
    $i = 0;
    while ($r_p = mysqli_fetch_row($sel_p)) {
        $sel1 = mysqli_query($dbcon, "select * from pro where id='$r_p[6]'");
        $r1 = mysqli_fetch_row($sel1);
        $sel2 = mysqli_query($dbcon, "select * from comp where em='$r_p[7]'");
        $r2 = mysqli_fetch_row($sel2);
        $i++;
        ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $r1[2] ?></td>
                                    <td><img style="width: 120px;height: 120px" src="../img2/<?php echo $r1[10] ?>" class="img-fluid" alt=""></td>
                                    <td><?php echo $r2[1] ?></td>
                                    <td><?php echo $r_p[12] ?> </td>
                                    <td><?php echo $r_p[1] ?> </td>
                                    <td><?php echo $r_p[2] ?></td>
                                    <td><?php echo $r_p[3] ?> </td>
                                    <td><?php echo $r_p[4] ?> </td>
                                    <td>
                                <?php
                                if ($r_p[14] == "0") { ?>
        <a href="msg.php?del=<?php echo $r_p[0] ?>"><span style="color: green" class="fa fa-check"></span></a></td>
        <?php
        } else { ?>
        <b>Repaired</b>
        <?php } ?>
                                </td>
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
