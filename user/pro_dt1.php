<!DOCTYPE html>

<head>
  
    <section id="user_header">
<?php
$page_name = 'chk';
include 'menu.php';
?>
</section> 

<?php

$wid=$_SESSION['wid'];
$mid=$_GET['mid'];
$sel=mysqli_query($dbcon,"select * from pro where id='$mid'");
    $r=mysqli_fetch_row($sel);
    
    $w=mysqli_query($dbcon,"select * from pro1 where pro_id='$wid'");
    $w1=mysqli_fetch_row($w);
    $war1=$r[5]; 
    $ch=mysqli_query($dbcon,"select * from ext where pid='$w1[0]'");
if(mysqli_num_rows($ch)>0)
{    
           $ch1=mysqli_fetch_row($ch);             
                 $war2=$ch1[1];     
}
else
    
{
    $war2="0";
}
?>    

</head>

<body>
    <div class="container card p-4 border-shadow m-5 mx-auto pb-5">
            <span class="fs-1 text-uppercase text-center mb-4"><?php echo $r[2] ?></span>

            <div class="row justify-content-center align-items-center">
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
                    <p class="text-primary">Warranty : <?php  $war3=$war1+$war2;
                    echo$war3; ?> Year</p>
                    <p class="text-primary mb-2">Date of Manufacture : <?php echo $r[12] ?></p>
                    
                    <p class="text-black"><?php echo $r[6] ?> </p>
                    <p class="text-black">Product ID : <?php echo $r[3] ?></p>
                    <p>Product Bought on : <?php echo $w1[7] ?></p>

                    <?php
                            $date=date('Y-m-d'); 
                            $bt=$w1[7];
                            $wr=$war3;
                            $chk2=date($bt, strtotime('+2 years'));
                           
                             
                            $bt = strtotime($bt);
                            $new = strtotime("+ $wr year", $bt);
                                                        
                                $fin= date('Y-m-d', $new);  
                                
                                if($date>$fin)
                                    {
                                        
                                        
                                        ?>
                                        <a href="ser.php"><button class="btn btn-danger">Warranty Expired Check Service Center</button></a>
                                    <?php
                                    }  else {
                                        
                                    $log=mysqli_query($dbcon,"select * from msg where wid='$wid' and st='1'");
                                    if(mysqli_num_rows($log)>0)
                                    {
                                        ?>
                                            <a href="ser.php"><button class="btn btn-danger">Warranty Claimed Check Service Center</button></a>
                                                            
                                                        <?php
                                    }
       
                                else
                                {
                                ?>
                                 
                                <a href="add_comp.php?mid=<?php echo $r[0] ?>"><button class="btn form-control mt-2 btn-outline-primary ">Claim Warranty</button></a>
                                <?php
                                    }
                                    }
                                    ?>
                                
                </div>
            </div>
    </div>
</body>

</html>
