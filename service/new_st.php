<!DOCTYPE html>

<head>
    
<section id="serv_header">
     <?php
     $page_name = 'stock';
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

    if ($upd1 > 0) 
    {
        $upd2 = mysqli_query($dbcon, "update account_bank set amount='$tot2' where account_no='$r2[10]'");

        if ($upd2 > 0) 
        {
            $upd3 = mysqli_query($dbcon, "update book set st='1' where id='$upd'");

            if ($upd3 > 0) 
            {

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
    $del1 = mysqli_query($dbcon, "update book set st='2'where id='$del'");

    if ($del1 > 0) 
    {
        header("location:book.php");
    }
}
?>


</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <div class="row contact_information">
                <div class="col-md-12 contact_left p-4">
                <?php
                $sel_p = mysqli_query($dbcon, "select * from new_st where sid='$usr' order by id desc");
                if (mysqli_num_rows($sel_p) > 0) 
                { ?>
                        <table class="table table-bordered">
                            <tr class="bg-secondary text-white">
                                <td>Product Name</td>
                                <td>Product</td>
                                <td>Name</td>
                                <td>Contact</td>
                                <td>Email</td>
                            </tr>
    <?php
    $i = 0;
    while ($r_p = mysqli_fetch_row($sel_p)) 
    {
        $sel1 = mysqli_query($dbcon, "select * from pro where id='$r_p[4]'");
        $r1 = mysqli_fetch_row($sel1);

        ?>
                                <tr>
                                    <td><?php echo $r1[2] ?></td>
                                    <td><img style="width: 120px;height: 120px" src="../img2/<?php echo $r1[10] ?>" class="img-fluid" alt=""></td>
                                    <td><?php echo $r_p[1] ?> </td>
                                    <td><?php echo $r_p[2] ?></td>
                                    <td><?php echo $r_p[3] ?> </td>
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
