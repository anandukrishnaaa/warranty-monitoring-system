<!DOCTYPE html>

<head>
        
<section id="user_header">
<?php
$page_name = 'pro';
include 'menu.php';
?>
</section> 
        

<?php
if (isset($_POST['b1'])) 
{
    $t1 = $_POST['t1'];
    $mid = $_GET['mid'];
    $t2 = $_POST['t2'];
    $t4 = $_POST['t4'];
    $ta = $_POST['ta'];
    $date = date('Y-m-d');
    $sel = mysqli_query($dbcon, "select * from pro where id='$mid'");
    $r = mysqli_fetch_row($sel);
    $sid = $r[11];

    if ($r[9] < $t4) {
        echo '<script>alert("Insufficient Stock Available....Please Try Again")</script>';
    } else {


        $tot1 = $r[9] - $t4;
        $tot2 = $r[8] * $t4;
        $upd1 = mysqli_query($dbcon, "update pro set qnty='$tot1' where sid='$sid' and id='$mid'");

        if ($upd1 > 0) {

            $upd2 = mysqli_query($dbcon, "update pro1 set st='2',uid='$usr',dt='$date' where cid='$sid' and st='0' and pid='$mid' limit $t4");

            if ($upd2 > 0) {

                $ins = mysqli_query($dbcon, "insert into sale1 values('','$t1','$t2','$usr','$mid','$r[8]','$t4','$tot2','$date','$sid','0','$ta','$usr')");

                $pid = mysqli_insert_id($dbcon);
                if ($ins > 0) {
                    header("location:print.php?mid=$pid");
                }
            }
        }
    }
}
?>
<?php
if (isset($_GET['del'])) {
    $del1 = mysqli_query($dbcon, "delete from cate where id='" . $_GET['del'] . "'");
    //echo mysql_error();
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

                <div class="row contact_information">
                    <div class="">
                        <div class="contact_right p-5" style="background-color:#f2f2f2;">
                            <form method="post"enctype="multipart/form-data">

                            <div class="row justify-content-around align-items-center">
                                <div class="col-5">
                                    <h4>Billing Address</h4>

                                    <div class="field-group">
                                            <input name="t1" class="form-control mt-4" id="text1" type="text" value="" placeholder="Name" required="">
                                    </div>

                                    <div class="field-group">
                                            <input name="t2" class="form-control mt-4" id="text3" type="text" value="" placeholder="Contact" required=""onkeyup="chkc(this.value)" /><span id="o3"></span>
                                    </div>

                                    <div class="field-group">
                                            <textarea name="ta" class="form-control mt-4" placeholder="Address"></textarea>
                                    </div>
                                    <div class="field-group">
                                            <input name="t4" class="form-control mt-4" id="text1" type="number" value="" placeholder="no of Products" required="">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <h4>Payment</h4>

                                    <div class="icons mt-4">
                                        <h6>Accepted Cards</h6>
                                        <br>
                                        <img src="../temp/icons/maestro.svg" alt="" height="20px" width="40px">
                                        <img src="../temp/icons/mastercard.svg" alt="" height="20px" width="40px">
                                        <img src="../temp/icons/paypal.svg" alt="" height="20px" width="40px">
                                        <img src="../temp/icons/visa.svg" alt="" height="20px" width="40px">


                                    </div>

                                    <div class="field-group">
                                        <input class="form-control mt-4" type="text" value="" placeholder="Name on card" required="">
                                    </div>
                                
                                    <div class="field-group">
                                        <input class="form-control mt-4" type="text" value="" placeholder="Credit Card Number" required=""/>
                                    </div>

                                    <div class="field-group">
                                        <input class="form-control mt-4" type="text" value="" placeholder="Exp Month" required=""/>
                                    </div>

                                    <div class="row">

                                        <div class="field-group col">
                                            <input class="form-control mt-4" type="text" value="" placeholder="Exp Year" required=""/>
                                        </div>

                                        <div class="field-group col">
                                            <input class="form-control mt-4" type="text" value="" placeholder="CVV" required=""/>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit"name="b1" class="btn btn-danger form-control">Purchase</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

</html>
