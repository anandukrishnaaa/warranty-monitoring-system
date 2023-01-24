<!DOCTYPE html>

<head>
    
    <section id="comp_header">
     <?php
     $page_name = 'add';
    include 'menu.php';   
    ?>
</section>

<?php
if (isset($_POST['b1'])) 
{
    $t1 = $_POST['t1'];
    $ta = $_POST['ta'];
    $tb = $_POST['tb'];
    $tc = $_POST['tc'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];
    $t4 = $_POST['t4'];
    $t5 = $_POST['t5'];
    $t6 = $_POST['t6'];
    $t7 = $_POST['t7'];
    $log1 = mysqli_query($dbcon, "select * from pro where pid='$t2'");
    if (mysqli_num_rows($log1) > 0) 
    {
        echo '<script>alert("Username Already Exist")</script>';
    } 
    else 
    {
        $up = $_FILES['myFile']['name'];
        $count = rand('1000000', '9999999');
        $nfn = $count . "" . substr($up, strrpos($up, "."));

        if (move_uploaded_file($_FILES['myFile']['tmp_name'], getcwd() . "//../img2//$nfn")) {
            $ins = mysqli_query($dbcon, "insert into pro values('','$ta','$t1','$t2','$t3','$t4','$t5','$t6','$t7','$tb','$nfn','$usr','$tc')");
            $pid = mysqli_insert_id($dbcon);
            if ($ins > 0) {
                for ($i = 1; $i <= $tb; $i++) 
                {
                    $count1 = rand('100000000000', '999999999999');
                    $pro_id = "$t2$count1";
                    $ins1 = mysqli_query($dbcon, "insert into pro1 values('','$pid','$pro_id','$usr','0','0','0','0')");
                }
            }
        }
    }
}
?>

<?php

if(isset($_GET['del']))
{
    $del1=mysqli_query($dbcon,"delete from cate where id='".$_GET['del']."'");
    if($del1>0)
    {
       header("location:cate.php");
    }
}
?>
    <script src="../ckeditor/ckeditor.js"></script>
    <script src="../ckeditor/samples/js/sample.js"></script>
</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
        <h3 class="mb-lg-5 ms-5 mb-4">Add Product</h3>
            <div class="row contact_information">
                <div class="col-md">
                    <div class="contact_right p-lg-5 p-4">
                        <form  method="post"enctype="multipart/form-data">
                            <div class="field-group">

                                <div class="">
                                   <select name="ta" id="stat" class="form-control mt-3" required="required">
                                        <option value="">Select Product Category</option>
                                        <?php
                                        $sel_state=mysqli_query($dbcon,"select * from cate");
                                        while($r_state=mysqli_fetch_row($sel_state))
                                        { ?>
                                        <option value="<?php echo $r_state[0] ?>"><?php echo $r_state[1] ?></option>
                                       <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <div class="field-group">

                                <div class="">
                                    <input name="t1" id="text1" type="text" value="" class="form-control mt-3" placeholder="Product Name" required="">
                                </div>
                            </div>
                            
                            <div class="field-group">

                                <div class="">
                                    <input name="t2" id="text1" type="text" value="" class="form-control mt-3" placeholder="Product ID" required="">
                                </div>
                            </div>
                            <div class="field-group mt-2">
                                <b>Manufacture Date</b>
                                <div class="">
                                    <input name="tc" id="text1" type="month" value=""  class="form-control mt-2" required="">
                                </div>
                            </div>
                            <div class="field-group mt-2">
                                <b>Product Description</b>
                                <div class="mt-2">
                                    <textarea id="editor1" name="t3" class="form-control mt-2" required="required" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <br/>
                            <div class="field-group">
                                <div class="">
                                   <select name="t4"  class="form-control mt-3" required="required">
                                        <option value="">Warranty Years</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                            <br/>
                             <div class="field-group">
                                 <b>Warranty Description</b>
                                <div class="mt-2">
                                <textarea id="editor2" name="t5" placeholder="Waranty Details" required="" class="form-control mt-3" ></textarea>
                                </div>
                             </div>
                            <div class="field-group">

                                <div class="">
                                    <input name="t6" id="text1" type="number" value="" class="form-control mt-3" placeholder="Shop Price" required="">
                                </div>
                            </div>
                            <div class="field-group">

                                <div class="">
                                    <input name="t7" id="text1" type="number" value="" class="form-control mt-3" placeholder="Sales Price" required="">
                                </div>
                            </div>
                            <div class="field-group">

                                <div class="">
                                    <input name="tb" id="text1" type="number" value="" class="form-control mt-3" placeholder="Total stock" required="">
                                </div>
                            </div>
                            <div class="field-group">

                                <div class="mt-3">
                                    Product Photo
                              <input name="myFile" class="frm-field required" class="form-control mt-3" type="file"required="">
                                </div>
                            </div>
                            <div class="content-input-field">
                                <button type="submit"name="b1" class="btn mt-3">Add Product</button>
                            </div>
                    <script>
                        CKEDITOR.replace('editor1');
                        CKEDITOR.replace('editor2');
                    </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
