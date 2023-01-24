<!DOCTYPE html>

<head>

<section id="user_header">
<?php
$page_name = 'cart';
include 'menu.php';
?>
</section> 

<?php
$sid = $usr;
?>

<?php
if (isset($_POST['b1'])) 
{
    $t1 = $_POST['t1'];
    $log = mysqli_query($dbcon, "select * from pro1 where pro_id='$t1'");
    if (mysqli_num_rows($log) > 0) 
    {
        $r = mysqli_fetch_row($log);
        $_SESSION['wid'] = $t1;
        header("location:pro_dt1.php?mid=$r[1]");
    } else {
        echo '<script>alert("Incorrect Serial Number")</script>';
    }
}
?>

<?php
if (isset($_GET['del'])) 
{
    $del1 = mysqli_query($dbcon, "delete from cart where id='" . $_GET['del'] . "'");
    //echo mysql_error();
    if ($del1 > 0) {
        header("location:cart.php");
    }
}
?>

</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <h3 class="mb-lg-5 ms-5 mb-4">Cart</h3>
            <div class="row contact_information">
                <div class="col-md-12">
                    <style>
                        * {
                            padding: 0;
                            margin: 0;
                            box-sizing: border-box
                        }

                        .wrapper {
                            max-width: 900px;
                            margin: 20px auto;
                            padding: 20px
                        }

                        .h3 {
                            margin-bottom: 0
                        }

                        div.text-uppercase {
                            font-size: 0.8rem;
                            font-weight: 600;
                            letter-spacing: 0.1rem
                        }

                        .btn#sub {
                            font-size: 0.8rem;
                            font-weight: 700;
                            border: 1px solid #ddd
                        }

                        .btn#sub:hover {
                            background-color: #333;
                            color: #FFF;
                            border: 1ps solid #333
                        }

                        .fa-cog {
                            color: #a8a8a8;
                            font-size: 0.8rem
                        }

                        .ml-auto.btn:hover span {
                            color: #333
                        }

                        div.btn {
                            padding: 8px 20px
                        }

                        .notification {
                            background-color: #54e346;
                            padding: 0px 10px
                        }

                        .notification button.btn {
                            background-color: inherit;
                            box-shadow: none
                        }

                        .close {
                            font-size: 1rem;
                            font-weight: normal;
                            opacity: 1
                        }

                        .close:hover {
                            color: #EEE
                        }

                        .alert-dismissible .close {
                            position: unset
                        }

                        button:focus {
                            outline: none
                        }

                        .h4 {
                            margin: 0
                        }

                        .editors img {
                            object-fit: cover;
                            width: 40px;
                            height: 40px;
                            border-radius: 50%;
                            border: 5px solid #FFF
                        }

                        #img1,
                        #img2,
                        #img3 {
                            position: absolute
                        }

                        #img1 {
                            top: -15px;
                            left: -50px
                        }

                        #img2 {
                            top: -15px;
                            left: -70px
                        }

                        #img3 {
                            top: -15px;
                            left: -90px
                        }

                        div.text-muted {
                            font-size: 0.9rem
                        }

                        .table {
                            overflow: hidden
                        }

                        .table thead tr th {
                            letter-spacing: 0.08rem;
                            font-weight: normal
                        }

                        .table tr td,
                        .table tr th {
                            border: none;
                            text-align: center
                        }

                        .table.activitites thead {
                            border-bottom: 1px solid #54e346;
                            font-size: 0.8rem;
                            font-weight: 700
                        }

                        .table thead {
                            font-size: 0.8rem;
                            font-weight: 700
                        }

                        .table.activitites {
                            position: relative
                        }

                        .table.activitites thead::after {
                            position: absolute;
                            content: "";
                            background: #FFF;
                            padding: 0px 8px;
                            top: 38px;
                            letter-spacing: 0.08rem;
                            font-size: 0.6rem;
                            color: #54e346;
                            font-weight: 600
                        }

                        .table tbody td.item {
                            font-family: 'Dancing Script', cursive;
                            font-size: 1.2rem;
                            font-weight: 900;
                            text-align: left
                        }

                        del {
                            font-size: 0.85rem
                        }

                        .red {
                            color: #ff0000
                        }

                        div.new {
                            font-size: 0.7rem;
                            font-family: Arial, Helvetica, sans-serif;
                            font-weight: normal;
                            letter-spacing: 0.08rem;
                            background-color: #c7fdc3;
                            color: #0e7504;
                            display: inline-block
                        }

                        .table tbody td.item img {
                            width: 30px;
                            height: 30px;
                            object-fit: contain
                        }

                        .table thead th.header {
                            text-align: left
                        }

                        .table tbody tr {
                            padding-top: 10px;
                            padding: 10px 20px;
                            border-bottom: 1px solid #ccc;
                            transition: all .4s ease-in-out
                        }

                        .table tbody tr:last-child {
                            border: none
                        }

                        td .close,
                        td .btn {
                            opacity: 0;
                            background: #fff;
                            font-weight: 600;
                            font-size: 0.9rem
                        }

                        .table tbody tr:hover {
                            transform: scale(1.004);
                            box-shadow: 2px 2px 10px #a5a5a5;
                            cursor: pointer;
                            overflow: hidden;
                            scroll-behavior: unset
                        }

                    </style>
                    <div class="wrapper">
                        <div id="table" class="bg-white rounded">
                            <div class="table-responsive">
<?php
$sel_p = mysqli_query($dbcon, "select * from cart where uid='$usr'");
if (mysqli_num_rows($sel_p) > 0) {
    ?>
                                    <table class="table activitites">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-uppercase header">Item</th>
                                                <th scope="col" class="text-uppercase">Quantity</th>
                                                <th scope="col" class="text-uppercase">price each</th>
                                                <th scope="col" class="text-uppercase">total</th>
                                                <th scope="col" class="text-uppercase">More</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                    <?php
                                    $i = 0;
                                    while ($r_p = mysqli_fetch_row($sel_p)) {
                                        $sel1 = mysqli_query($dbcon, "select * from pro where id='$r_p[1]'");
                                        $r1 = mysqli_fetch_row($sel1);
                                        $i++;
                                        ?>
                                                <tr>
                                                    <td class="item">
                                                        <div class="d-flex"> <img style="width: 70px;height: 40px" src="../img2/<?php echo $r1[10] ?>" alt="">
                                                            <div class=""> <?php echo $r1[2] ?><div class=""></div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <div class="text-muted">

        <?php
        $cat = mysqli_query($dbcon, "select * from cate where id='$r1[1]'");
        $cat1 = mysqli_fetch_row($cat);
        echo"$cat1[1]";
        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </td>
                                                    <td><?php echo $r_p[2] ?></td>
                                                    <td class="d-flex flex-column"><?php echo $r1[8] ?> Rs/-</td>
                                                    <td class="font-weight-bold"><?php
                                        $tot = $r1[8] * $r_p[2];
                                        echo"$tot";
                                        ?>
                                                        Rs/-</td>
                                                    <td><a href="cart.php?del=<?php echo $r_p[0] ?>"><span style="color: red" class="fa fa-trash"></span></a></td>

                                                </tr>
                                                    <?php } ?>
                                        </tbody>
                                    </table>
                                    <a href="add_sale1.php"><span style="float: right" class="btn btn-success">Place Order</span></a>
    <?php
} else { echo "No items added to cart."; }
?>
                            </div>
                            <hr class="items">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
