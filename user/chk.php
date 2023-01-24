<!DOCTYPE html>

<head>

<section id="user_header">
<?php
$page_name = 'chk';
include 'menu.php';
?>
</section> 


<?php
$sid=$usr;
?>

<?php
if(isset($_POST['b1']))
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
        <h3 class="mb-lg-5 ms-5 mb-4">Search Product</h3>

            <div class="row contact_information">
                <div class="col-md">
                    <div class="contact_right p-lg-5 p-4">
                        <form method="post"enctype="multipart/form-data">
                        <div class="field-group">

                            <div class="">
                                <input name="t1" id="text1" class="form-control" type="text" value="" placeholder="Enter Serial Number" required="">
                            </div>
                        </div>
    
                        <div class="mt-4">
                            <button type="submit"name="b1" class="btn btn-danger form-control">Find</button>
                        </div>  
                    </form>
                    </div>
                </div>               
            </div>
        </div>
    </section>

</body>

</html>
