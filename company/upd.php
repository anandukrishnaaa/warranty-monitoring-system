

<!DOCTYPE html>

<head>
<section id="comp_header">
    <?php
    $page_name = 'pro';
    include 'menu.php';
    ?>
</section>

<?php
                 
                    if(isset($_POST['b1']))
 {
    
   $t1=$_POST['t1'];
   $mid=$_GET['mid'];
$sel=mysqli_query($dbcon,"select * from pro where id='$mid'");
    $r=mysqli_fetch_row($sel);
    
    $tot=$r[9]+$t1;
    
     $upd1=mysqli_query($dbcon,"update pro set qnty='$tot'where id='$mid'");
    
   
    if($upd1>0)
    {
      for( $i=1; $i<=$t1; $i++ )
      
      
      {
        
          
          $count1=rand('100000000000','999999999999');
          $pro_id= "$r[3]$count1";
          $ins1=mysqli_query($dbcon,"insert into pro1 values('','$mid','$pro_id','$usr','0','0','0')");
          
      }
       header("location:pro.php");        
            }
    }
        

        ?>
<?php
                            if(isset($_GET['del']))
{
    $del1=mysqli_query($dbcon,"delete from cate where id='".$_GET['del']."'");
    //echo mysql_error();
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
        <h3 class="mb-lg-5 ms-5 mb-4">Update New Stock</h3>

            <div class="row contact_information">
                <div class="col-md">
                    <div class="contact_right p-lg-5 p-4">
                        <form  method="post"enctype="multipart/form-data">
                            
                            <div class="field-group">

                                <div class="">
                                    <input name="t1" id="text1" type="number" value="" placeholder="Stock Quantity" required="" class="form-control">
                                </div>
                            </div>
                            
                            
                            <div class="">
                                <button type="submit"name="b1" class="btn btn-danger mt-4 form-control">Update</button>
                            </div>
                            <script>
                                initSample();
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
