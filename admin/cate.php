<!DOCTYPE html>

<head>
    
<section id="admin_header">
     <?php
     $page_name = 'cat';
    include 'menu.php';   
    ?>
</section>

<?php
if (isset($_POST['b1'])) 
{
    $t1 = $_POST['t1'];
    $ins = mysqli_query($dbcon,"insert into cate(nme,st) values('$t1','0')");
    if ($ins > 0) 
    {
        header("location:cate.php?suss=1");
    }
}
?>

<?php
if (isset($_GET['del'])) 
{
    $del1 = mysqli_query($dbcon, "delete from cate where id='" . $_GET['del'] . "'");
    //echo mysql_error();
    if ($del1 > 0) {
        header("location:cate.php");
    }
}
?>

</head>

<body> 
    
   
    
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <h3 class="mb-lg-5 ms-5 mb-4">Category Management ~ Add Category</h3>
            <div class="row contact_information contact_right p-lg-5 p-4">
                <div class="col-md-6">
                    <div class="my-3">
                        <form  method="post">
                            <div class="field-group">

                                <div class="">
                                    <input name="t1" id="text1" type="text" value="" class="form-control" placeholder="Category Name" required="">
                                </div>
                            </div>
                            
                            <div class="content-input-field">
                                <button type="submit"name="b1" class="btn btn-danger form-control">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-md-6 contact_left p-4">
                <?php
                $sel_p=mysqli_query($dbcon,"select * from cate order by id desc");
                if(mysqli_num_rows($sel_p)>0)
                { ?>
                <table class="table table-bordered">
                <tr>
                    <td>Category</td>
                    <td>Delete Category</td>
                </tr>
                <?php
                $i=0;
                while($r_p=mysqli_fetch_row($sel_p))
                {
                $i++;
                ?>
                <tr>
                    <td><?php echo $r_p[1] ?></td>
                    <td><a href="cate.php?del=<?php echo $r_p[0] ?>"><span style="color: red" class="fa fa-trash"></span></a></td>
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
