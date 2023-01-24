<!DOCTYPE html>
<html>

    <head>
        <title>login</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/shopping-online.png"/>

    <link rel="stylesheet" href="temp/bootstrap-5.1.3-dist/css/bootstrap.css">

</head>
<body>
    <?php
        $page_name = 'login';
        include './navbar.php';
    ?>

<?php
if (isset($_POST['b1'])) 
{
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];

    $log = mysqli_query($dbcon, "select * from user_log where uid='$t1' and pwd='$t2'and st='1'");
    if (mysqli_num_rows($log) > 0) {
        $r = mysqli_fetch_row($log);
        if ($r[3] == "admin") {
            $_SESSION['uid'] = $t1;
            header("location:./admin/home.php");
        }
        if ($r[3] == "comp") {
            $_SESSION['uid'] = $t1;
            header("location:./company/home.php");
        }
        if ($r[3] == "shop") {
            $_SESSION['uid'] = $t1;
            header("location:./shop/home.php");
        }

        if ($r[3] == "user") {
            $_SESSION['uid'] = $t1;
            header("location:./user/home.php");
        }
        if ($r[3] == "ser") {
            $_SESSION['uid'] = $t1;
            header("location:./service/home.php");
        }
        if ($r[3] == "staff") {
            $_SESSION['uid'] = $t1;
            header("location:./staff/msg.php");
        }
    } else {
        echo '<script>alert("Incorrect Username/Password")</script>';
    }
}
?>
    <div class="container bg-white p-0 mt-top">
        <div class="row justify-content-center align-items-center">
            <div class="col-4 p-5 text-center">
                <h1>Login</h1>
            </div>
            <div class="col p-5">
                <form  method="post">
                    <div class="my-5">
                        <input name="t1" class="form-control" id="text1" type="text" value="" placeholder="User Name" required="">
                    </div>
                    <div class="my-5">
                        <input name="t2" class="form-control" id="myInput" type="Password" placeholder="Password">
                    </div>
                    <div class="mt-5">
                        <button type="submit"name="b1" class="btn form-control btn-outline-success">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
