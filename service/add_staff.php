<!DOCTYPE html>

<head>

<section id="serv_header">
<?php
$page_name = 'add';
include 'menu.php';
?>
</section>

<?php
$usr = $_SESSION['uid'];
$sid = $usr;
?>

<?php
if (isset($_POST['b1'])) 
{
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];
    $t4 = $_POST['t4'];

    $log1 = mysqli_query($dbcon, "select * from user_log where uid='$t3'");
    if (mysqli_num_rows($log1) > 0) {
        echo '<script>alert("Username Already Exist")</script>';
    } else {

        $ins = mysqli_query($dbcon, "insert into staff_data values('','$t1','$t2','$t3','$t4','$usr','0')");

        if ($ins > 0) {
            $ins1 = mysqli_query($dbcon, "insert into user_log values('','$t3','$t4','staff','1')");
            if ($ins1 > 0) {
                header("location:add_staff.php?suss=1");
            }
        }
    }
}
?>

<?php
if (isset($_GET['upd'])) {
    $upd = $_GET['upd'];
    $upd1 = mysqli_query($dbcon, "update staff_data set st='1'where em='$upd'");
    if ($upd1 > 0) {
        $upd2 = mysqli_query($dbcon, "update user_log set st='1'where uid='$upd'");
        if ($upd2 > 0) {
            header("location:add_staff.php");
        }
    }
}
?>
<?php
if (isset($_GET['del'])) {
    $del = $_GET['del'];
    $del1 = mysqli_query($dbcon, "update staff_data set st='2'where em='$del'");
    if ($del1 > 0) {
        $del2 = mysqli_query($dbcon, "update user_log set st='2'where uid='$del'");
        if ($del2 > 0) {
            header("location:add_staff.php");
        }
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
            <h3 class="mb-lg-5 ms-5 mb-4">Staff Management</h3>
            <div class="row contact_information contact_right p-lg-5 p-4">
                <div class="col">
                    <div class="">
                        <form method="post"enctype="multipart/form-data">
                            <div class="field-group">
                                <div class="">
                                    <input class="form-control mt-2" name="t1" id="text1" type="text" value="" placeholder="Name" required="">
                                </div>
                            </div>
                            <div class="field-group">
                                <div class="">
                                    <input class="form-control mt-2" name="t2" id="text3" type="text" value="" placeholder="Contact" required=""onkeyup="chkc(this.value)" /><span id="o3"></span>
                                </div>
                            </div>
                            <div class="field-group">
                                <div class="">
                                    <input class="form-control mt-2" name="t3" id="text1" type="email" value="" placeholder="Email" required=""onkeyup="vem(this.value)" /><span id="em"></span>
                                </div>
                            </div>
                            <div class="field-group">
                                <div class="">
                                    <input class="form-control mt-2" name="t4" id="text1" type="password" value="" placeholder="password" required="">
                                </div>
                            </div>
                            <div class="field-group">
                                <button type="submit"name="b1" class="btn btn-danger form-control mt-3">Add Staff</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-6 contact_left p-5">
                <?php
                $sel_p = mysqli_query($dbcon, "select * from staff_data where se_id='$usr'");
                if (mysqli_num_rows($sel_p) > 0) 
                {
                    ?>
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>Contact</td>
                                <td>Email</td>
                                <td>Pass</td>
                                <td>Status</td>
                                <td>Change Status</td>
                            </tr>
                            <?php
                            $i = 0;
                            while ($r_p = mysqli_fetch_row($sel_p)) 
                            {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $r_p[1] ?></td>
                                    <td><?php echo $r_p[2] ?></td>
                                    <td><?php echo $r_p[3] ?></td>
                                    <td><?php echo $r_p[4] ?></td>                                                                                                 <td><?php 
                                    if($r_p[6]==0 || $r_p[6]==2) 
                                    {
                                        echo "Inactive";
                                    } 
                                    else 
                                    {
                                        echo "Active";
                                    } 
                                    ?> </td>
                                    <td>
                                        <a href="add_staff.php?upd=<?php echo $r_p[3] ?>"><span style="color: green" class="fa fa-check"></span></a> &nbsp;&nbsp;
                                        <a href="add_staff.php?del=<?php echo $r_p[3] ?>"><span style="color: red" class="fa fa-close"></span></a></td>

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
