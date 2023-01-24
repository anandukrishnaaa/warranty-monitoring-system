<!DOCTYPE html>

<head>

<section id="admin_header">
<?php
$page_name = 'comp_apprv';
include 'menu.php';
?>
</section>


<?php
if (isset($_GET['upd'])) 
{
    $upd = $_GET['upd'];
    $upd1 = mysqli_query($dbcon, "update comp set st='1'where em='$upd'");

    if ($upd1 > 0) 
    {
        $upd2 = mysqli_query($dbcon, "update user_log set st='1'where uid='$upd'");

        if ($upd2 > 0) 
        {
            header("location:comp_enq.php");
        }
    }
}
?>
<?php
if (isset($_GET['del'])) 
{
    $del = $_GET['del'];
    $del1 = mysqli_query($dbcon, "update comp set st='2'where em='$del'");

    if ($del1 > 0) 
    {
        $del2 = mysqli_query($dbcon, "update user_log set st='2'where uid='$del'");

        if ($del2 > 0) 
        {
            header("location:comp_enq.php");
        }
    }
}
?>

</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <h3 class="mb-lg-5 ms-5 mb-4">Companies Awaiting Approval</h3>
            <div class="row contact_information">
                <div class="col-md-12 contact_left p-4">
<?php
$sel_p = mysqli_query($dbcon, "select * from comp order by id desc");
if (mysqli_num_rows($sel_p) > 0) { ?>
                        <table class="table table-bordered">
                            <tr class="bg-secondary text-white">
                                <td>Name</td>
                                <td>Contact</td>
                                <td>Email</td>
                                <td>Status</td>
                                <td>Change Status</td>
                            </tr>
    <?php
    $i = 0;
    while ($r_p = mysqli_fetch_row($sel_p)) { ?>
                                <tr>
                                    <td><?php echo $r_p[1] ?></td>
                                    <td><?php echo $r_p[2] ?></td>
                                    <td><?php echo $r_p[3] ?></td>
                                    <td><?php 
                                    if($r_p[7]==0 ||$r_p[7]==2 ) 
                                    {
                                        echo "Inactive";
                                    } 
                                    else 
                                    {
                                        echo "Active";
                                    } 
                                    ?> 
                                    </td>
                                    <td>
                                    <a href="comp_enq.php?upd=<?php echo $r_p[3] ?>"><span style="color: green" class="fa fa-check"></span></a> &nbsp;&nbsp;
                                    <a href="comp_enq.php?del=<?php echo $r_p[3] ?>"><span style="color: red" class="fa fa-close"></span></a></td>
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
