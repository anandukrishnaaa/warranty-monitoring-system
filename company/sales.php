
<!DOCTYPE html>

<head>
<section id="comp_header">
    <?php
    $page_name = 'pro';
    include 'menu.php';
    ?>
</section>
</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
        <h3 class="mb-lg-5 ms-5 mb-4">Sales Details</h3>

            <div class="row contact_information">
                
                <div class="col-md-12 contact_left p-4">
                  <?php
                
            $sel_p=mysqli_query($dbcon,"select * from sale where sid='$usr' order by id desc");
            if(mysqli_num_rows($sel_p)>0)
            {
                
                ?>
			<table class="table table-bordered">
            <tr class="bg-secondary text-white">
                <td>Product Name</td>
                <td>Product</td>
                <td>Buyer</td>
                 <td>Contact</td>
                <td>Email</td>
               <td>Price</td>
                <td>Quantity</td>
                <td>Total</td>
                 <td>Date</td>
              
            </tr>
            <?php
            $i=0;
            while($r_p=mysqli_fetch_row($sel_p))
            {
                $sel1=mysqli_query($dbcon,"select * from pro where id='$r_p[4]'");
    $r1=mysqli_fetch_row($sel1);
    
                $i++;
                ?>
            <tr>
                <td><?php echo $r1[2] ?></td>
                <td><img style="width: 120px;height: 120px" src="../img2/<?php echo $r1[10] ?>" class="img-fluid" alt=""></td>
                 <td><?php echo $r_p[1] ?></td>
                  <td><?php echo $r_p[2] ?></td>
                   <td><?php echo $r_p[3] ?></td>
                 <td><?php echo $r_p[5] ?> Rs/-</td>
                  <td><?php echo $r_p[6] ?></td>
                  <td><?php echo $r_p[7] ?> Rs/-</td>
               <td><?php echo $r_p[8] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
                        <?php
            }
            ?>
                
                
                </div>

               
            </div>
        </div>
    </section>

</body>

</html>
