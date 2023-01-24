<!DOCTYPE html>

<head>
    
    <section id="shop_header">
    <?php
    $page_name = 'pro';
    include 'menu.php';
    ?>
</section>

<?php
$usr=$_SESSION['uid'];
$mid=$_GET['mid'];
$sel=mysqli_query($dbcon,"select * from pro where id='$mid'");
    $r=mysqli_fetch_row($sel);
?>


<?php
                 
if(isset($_POST['b1']))
 {
    $t1=$_POST['t1'];
   
    if($r[9]<$t1)
    {
      echo '<script>alert("Insufficient Stock Available....Please Try Again")</script>';   
    }
 else 
    {
        
    
    $tot=$r[7]*$t1;
         
    $ins=mysqli_query($dbcon,"insert into book values('','$mid','$r[11]','$usr','$t1','$r[7]','$tot','0')");
     $bid = mysqli_insert_id($dbcon);
    if($ins>0)
    {
      
                header("location:pro_dt.php?mid=$mid&bid=$bid");
            }
    }
        
 }
 
?>

<?php
if(isset($_GET['upd']))
{
    $mid=$_GET['mid'];  
    $upd=$_GET['upd'];
    $upd1=mysqli_query($dbcon,"update book set st='0' where id='$upd'");
    
   
    if($upd1>0)
    {
        $upd2=mysqli_query($dbcon,"update user_log set st='1'where uid='$uid'");
    
   
    
       header("location:book.php");
}
}                         
                            
?>


</head>

<body>

    <div class="container card p-4 border-shadow m-5 mx-auto">
        <span class="fs-1 text-uppercase text-center mb-4"><?php echo $r[2] ?></span>

        <div class="row justify-content-center align-items-center pb-5">
            <div class="col h-100">
                <img class="d-block p-0 mx-auto my-auto img-fluid" style="width: 500px; aspect-ratio:4/3;" src="../img2/<?php echo $r[10] ?>">
            </div>

            <div class="col ms-5">
                <p class="mt-4">
                <?php
                $cat = mysqli_query($dbcon, "select * from cate where id='$r[1]'");
                $cat1 = mysqli_fetch_row($cat);
                echo"$cat1[1]";
                ?>
                </p>
                <p class="fs-5 text-black"> Rs.<?php echo $r[8] ?></p>
                <div class="m-3">
                    <p style="">
                        <?php echo $r[4] ?>
                    </p>
                </div>
                <p class="text-primary">Warranty : <?php echo $r[5] ?> Year</p>
                <p class="text-primary">Date of Manufacture : <?php echo $r[12] ?></p>
                
                <p class="text-black"><?php echo $r[6] ?> </p>
                <p class="text-black">Product ID : <?php echo $r[3] ?></p>

                <?php
                    if(isset($_GET['bid']))
                    {
                        $bid=$_GET['bid'];
                        $pr=mysqli_query($dbcon,"select * from book where id='$bid'");
                        $pr1=mysqli_fetch_row($pr);  
                    ?>
                    
                    <p style="color: green">Order Approval </p>
                    
                    <p class="text-black">Stock Booked : <?php echo $pr1[4] ?></p class="text-black">
                    <p class="text-black">Price : <?php echo $pr1[5] ?> Rs/-</p class="text-black">
                    <p class="text-black">Total Amount : <?php echo $pr1[6] ?> Rs/-</p class="text-black">
                    <span >
                        <div class="btn btn-success"><a href="pro_dt.php?upd=<?php echo $pr1[0] ?>&mid=<?php echo $mid ?>"><b style="color: white">Confirm</b></a>
                        </div>&nbsp;&nbsp;
                        <div class="btn btn-danger"><a href="pro_dt.php?mid=<?php echo $mid ?>"><b style="color: white">Reject</b></a></div>
                    </span>

                    <?php
                    }
                    else {
                    ?>
                    <form method="post" class="m-2">
                        <input type="text" name="t1" placeholder="No of Stock Needed" required="" class="form-control" pattern="^[1-9][0-9]?$|^100$">
                        <button name="b1" class="btn btn-outline-info mt-2 form-control">Place Order</button>

                    </form>
                    
                    <?php
                    }
                    ?>

                    <p class="text-black mt-2">Stock Available : <?php echo $r[9] ?></p class="text-black">
                    <p class="text-black">Stock Bought: 
                        
                    <?php
                        
                        $st=mysqli_query($dbcon,"select * from pro3 where pid='$r[0]'");
                        if(mysqli_num_rows($st)>0)
                        {
                            
                        $st1=mysqli_fetch_row($st);  
                        echo"$st1[3]";
                        }
                        else {
                        echo"No Stock Bought";  
                        }
                    ?>
                        
                    </p class="text-black">
            </div>
        </div>
    </div>

</body>

</html>
