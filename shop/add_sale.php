<!DOCTYPE html>

<head>

<section id="shop_header">
<?php
$page_name = 'home';
include 'menu.php';
?>
</section>


<?php
$usr = $_SESSION['uid'];
$sid = $usr;
?>
<?php
if ($usr = $_SESSION['uid']) {
    
} else {
    header("location:../index.php");
}
?>

<?php
if (isset($_POST['b1'])) {
    $t1 = $_POST['t1'];
    $mid = $_GET['mid'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];
    $t4 = $_POST['t4'];
    $date = date('Y-m-d');
    $sel = mysqli_query($dbcon, "select * from pro where id='$mid'");
    $r = mysqli_fetch_row($sel);

    $sel1 = mysqli_query($dbcon, "select * from pro3 where pid='$mid' and sid='$sid'");
    $r1 = mysqli_fetch_row($sel1);

    if ($r1[3] < $t4) {
        echo '<script>alert("Insufficient Stock Available....Please Try Again")</script>';
    } else {


        $tot1 = $r1[3] - $t4;
        $tot2 = $r[8] * $t4;
        $upd1 = mysqli_query($dbcon, "update pro3 set qnty='$tot1' where sid='$sid' and pid='$mid'");

        if ($upd1 > 0) {

            $upd2 = mysqli_query($dbcon, "update pro1 set st='2',uid='$t3',dt='$date' where sid='$sid' and st='1' and pid='$mid' limit $t4");

            if ($upd2 > 0) {

                $ins = mysqli_query($dbcon, "insert into sale values('','$t1','$t2','$t3','$mid','$r[8]','$t4','$tot2','$date','$sid','0')");

                if ($ins > 0) {
                    header("location:home.php");
                }
            }
        }
    }
}
?>
<?php
if (isset($_GET['del'])) 
{
    $del1 = mysqli_query($dbcon, "delete from cate where id='" . $_GET['del'] . "'");
    if ($del1 > 0) {
        header("location:cate.php");
    }
}
?>

<script type="text/javascript">
    function nme(b2)
    {
        var k5 = b2.length;
        var ch2 = /([a-z])$/;
        if (ch2.test(b2) == false)
        {
            document.getElementById("np3").innerHTML = "<font color='red'>*Only Alphabets*</font>";
            $("#btn").hide();
            return false;
        } else
        {
            document.getElementById("np3").innerHTML = "";
            $("#btn").show();
        }
    }


    function chkc(b2)
    {
        var k5 = b2.length;
        var ch2 = /([0-9])$/;
        if (ch2.test(b2) == false)
        {
            document.getElementById("o3").innerHTML = "<font color='red'>*Only Numbers*</font>";
            $("#btn").hide();
            return false;
        } else if (k5 != 10)
        {
            document.getElementById("o3").innerHTML = "<font color='red'>*Please Check Your Mobile Number*</font>";
            $("#btn").hide();
            return false;
        } else
        {
            document.getElementById("o3").innerHTML = "";
            $("#btn").show();
        }
    }

    function chkp(c)
    {
        var s = document.getElementById("p10").value;

        if (s == c)
        {
            document.getElementById("p").innerHTML = "<font color='Green'>*Password is Correct*</font>";
            $("#btn").show();
            return false;
        } else
        {
            document.getElementById("p").innerHTML = "<font color='red'>*Verfy Password*</font>";
            $("#btn").hide();
        }
    }
    function vem(a)
    {
        //var a = document.myform.email.value;  
        var atposition = a.indexOf("@");
        var dotposition = a.lastIndexOf(".");
        if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= a.length)
        {
            document.getElementById("em").innerHTML = "<font color='red'>*Please Check Your Email Address*</font>";
            $("#btn").hide();
        } else
        {
            document.getElementById("em").innerHTML = "";
            $("#btn").show();
        }
    }
</script>

</head>

<body>

    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <h3 class="mb-lg-5 ms-5 mb-4">Add Details</h3>

            <div class="row contact_information">
                <div class="col-md">
                    <div class="contact_right p-lg-5 p-4">
                        <form method="post"enctype="multipart/form-data">
                            <div class="field-group">

                                <div class="">
                                    <input class="form-control mt-4" name="t1" id="text1" type="text" value="" placeholder="Name" required="">
                                </div>
                            </div>

                            <div class="field-group">

                                <div class="">
                                    <input class="form-control mt-4" name="t2" id="text3" type="text" value="" placeholder="Contact" required=""onkeyup="chkc(this.value)" /><span id="o3"></span>
                                </div>
                            </div>
                            <div class="field-group">

                                <div class="">
                                    <input class="form-control mt-4" name="t3" id="text1" type="email" value="" placeholder="Email" required=""onkeyup="vem(this.value)" /><span id="em"></span>
                                </div>
                            </div>
                            <div class="field-group">

                                <div class="">
                                    <input class="form-control mt-4" name="t4" id="text1" type="number" value="" placeholder="Quantity" required="">
                                </div>
                            </div>
                            <div class="field-group">
                                <button type="submit"name="b1" class="btn btn-danger form-control mt-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
