<!DOCTYPE html>

<head>
    
    <section id="admin_header">
     <?php
     $page_name = 'comp';
    include 'menu.php';   
    ?>
</section>
    
</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
        <h3 class="mb-lg-5 ms-5 mb-4">Companies Listed</h3>

            <div class="row contact_information">
                
                <div class="col-md-12 contact_left p-4">
                    <?php
                    $sel_p = mysqli_query($dbcon, "select * from comp where st='1' order by id desc");
                    if (mysqli_num_rows($sel_p) > 0) { ?>
			<table class="table table-bordered">
                            <tr class="bg-secondary text-white">
                                <td></td>
                                <td>Name</td>
                                <td>Contact</td>
                                <td>Email</td>
                                <td>Status</td>
                            </tr>
                                <?php
                                $i = 0;
                                while ($r_p = mysqli_fetch_row($sel_p)) 
                                { ?>
                            <tr>
                                <td><?php echo ++$i ?></td>
                                <td><?php echo $r_p[1] ?></td>
                                <td><?php echo $r_p[2] ?></td>
                                <td><?php echo $r_p[3] ?></td>
                                <td><?php 
                                    if($r_p[7]==0) 
                                    {
                                        echo "Inactive";
                                    } 
                                    else 
                                    {
                                        echo "Active";
                                    } 
                                    ?> 
                                    </td>
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
