<!DOCTYPE html>

<head>
    
<section id="user_header">
<?php
$page_name = 'pur';
include 'menu.php';
?>
</section> 

<?php
if (isset($_GET['upd'])) 
{
    $upd = $_GET['upd'];
    $sel = mysqli_query($dbcon, "select * from book where id='$upd'");
    $r = mysqli_fetch_row($sel2);

    $sel1 = mysqli_query($dbcon, "select * from comp where em='$usr'");
    $r1 = mysqli_fetch_row($sel1);

    $sel2 = mysqli_query($dbcon, "select * from shop where em='$r[3]'");
    $r2 = mysqli_fetch_row($sel2);

    $ac1 = mysqli_query($dbcon, "select * from account_bank where account_no='$r1[5]'");
    $acc1 = mysqli_fetch_row($ac1);

    $ac2 = mysqli_query($dbcon, "select * from account_bank where account_no='$r2[10]'");
    $acc2 = mysqli_fetch_row($ac2);

    $tot1 = $acc1[9] + $r[6];
    $tot2 = $acc2[9] - $r[6];
    $upd1 = mysqli_query($dbcon, "update account_bank set amount='$tot1' where account_no='$r1[5]'");

    if ($upd1 > 0) {
        $upd2 = mysqli_query($dbcon, "update account_bank set amount='$tot2' where account_no='$r2[10]'");
        if ($upd2 > 0) {
            $upd3 = mysqli_query($dbcon, "update book set st='1' where id='$upd'");
            if ($upd3 > 0) {
                header("location:book.php");
            }
        }
    }
}
?>

<?php
if (isset($_GET['del'])) 
{
    $del = $_GET['del'];
    $del1 = mysqli_query($dbcon, "update book set st='2' where id='$del'");
    if ($del1 > 0) 
    {
        header("location:book.php");
    }
}
?>

<?php
$sid=$usr;
if(isset($_POST['chk']))
{

$t1=$_POST['t1'];    
$log=mysqli_query($dbcon,"select * from pro1 where pro_id='$t1'");
if(mysqli_num_rows($log)>0)
{
$r=mysqli_fetch_row($log);
$_SESSION['wid']=$t1;
header("location:pro_dt1.php?mid=$r[1]");    
}
else
{
    echo '<script>alert("Incorrect Serial Number")</script>'; 
}
}
?>

</head>

<body>

    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <h3 class="mb-lg-5 ms-5 mb-4">My Purchases</h3>
            <div class="row contact_information">
                <div class="col-md-12 ">
                    <?php
                    $sel_p = mysqli_query($dbcon, "select * from pro1 where uid='$usr' order by dt desc");
                    if (mysqli_num_rows($sel_p) > 0) {
                        ?>
                        <table class="table table-bordered">
                            <tr class="bg-secondary text-white">
                                <td>Product Name</td>
                                <td style="width:150px">Product Image</td>
                                <td style="width:100px;">Price</td>
                                <td style="width:100px;">Product id</td>
                                <td>Warranty </td>
                                <td>Warranty ID</td>
                                <td style="width:150px;">Date of Purchase</td>
                                <td style="width:120px;">Expire Date</td>
                                <td>Warranty</td>
                            </tr>
                            <?php
                            $i = 0;
                            while ($r_p = mysqli_fetch_row($sel_p)) 
                            {
                                $sel1 = mysqli_query($dbcon, "select * from pro where id='$r_p[1]'");
                                $r1 = mysqli_fetch_row($sel1);
                                $i++;
                                $war1 = $r1[5];
                                $ch = mysqli_query($dbcon, "select * from ext where pid='$r_p[0]'");
                                
                                if(mysqli_num_rows($ch) > 0) 
                                {
                                    $ch1 = mysqli_fetch_row($ch);
                                    $war2 = $ch1[1];
                                } 
                                else 
                                {
                                    $war2 = "0";
                                }
                                $war3 = $war1 + $war2;
                                $bt = $r_p[7];
                                $wr = $war3;
                                $chk2 = date($bt, strtotime('+2 years'));

                                $bt = strtotime($bt);
                                $new = strtotime("+ $wr year", $bt);

                                $fin = date('Y-m-d', $new);
                                ?>
                                    <tr>
                                    <td><?php echo $r1[2] ?></td>
                                    <td><img style="width: 120px;height: 80px" src="../img2/<?php echo $r1[10] ?>" class="img-fluid" alt=""></td>
                                    <td><?php echo $r1[8] ?> Rs/-</td>
                                    <td><?php echo $r1[3] ?></td>
                                    <td><?php
                               
                                    $war3 = $war1 + $war2;
                                
                                    echo $war3;
                                    ?>
                                        Years</td>
                                    <td>
                                        <form method="post">
                                            <input name="t1" id="text1" readonly="true" class="form-control" type="text" value="<?php echo $r_p[2]; ?>">
                                            <button type="submit" name="chk" class="btn btn-primary mt-2">Check Warranty</button>
                                        </form>
                                    </td>
                                    <td><?php echo $r_p[7] ?> </td>
                                    <td><?php echo $fin ?> </td>
                                    <td>
                                        <?php
                                        $ch = mysqli_query($dbcon, "select * from ext where pid='$r_p[0]'");
                                        if (mysqli_num_rows($ch) > 0) 
                                        { ?>
                                            <span class="btn btn-warning">Already Extended</span>

            <?php } else { ?>
                                            <a href="ext.php?mid=<?php echo $r_p[0] ?>"><span class="btn btn-success">Extend Now</span></a>
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
