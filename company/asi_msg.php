

<!DOCTYPE html>

<head>
<section id="comp_header">
    <?php
    $page_name = 'msg';
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
     $t2=$_POST['t2'];
    $mid=$_GET['mid'];
     $sel=mysqli_query($dbcon,"select * from msg where id='$mid'");
    $r=mysqli_fetch_row($sel);
    
    $sel1=mysqli_query($dbcon,"select * from pro where id='$r[6]'");
    $r1=mysqli_fetch_row($sel1);
    $tot3=$r1[9]-1;
    
    
    if($t2=="1")
    {
        $del2=mysqli_query($dbcon,"update msg set st='1', se_id='$t1',typ1='Repair' where id='$mid'");
    
   
    if($del2>0)
    {
      header("location:msg.php");   
    }
    }
 else {
        
    
  $del1=mysqli_query($dbcon,"update msg set st='1', se_id='$t1',typ1='Replace' where id='$mid'");
    
   
    if($del1>0)
    {
        
        $upd4=mysqli_query($dbcon,"update pro1 set st='2', sid='$t1',uid='$r[8]' where pid='$r[6]' and st='0' and cid='$usr' order by id desc limit 1");
    
   
    if($upd4>0)
    {  
          $upd5=mysqli_query($dbcon,"update pro set qnty='$tot3' where id='$r[6]'");
    
   
    if($upd5>0)
    {
        
        $ins=mysqli_query($dbcon,"insert into new_st values('','$r[1]','$r[2]','$r[8]','$r[6]','$t1','0')");
    
    if($ins>0)
    {
        
       header("location:msg.php");
    }
}  
}                         
    }  
    }
}


?>
</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
        <h3 class="mb-lg-5 ms-5 mb-4">Assign Serivce Center</h3>

            <div class="row contact_information">
                <div class="col-md">
                    <div class="contact_right p-lg-5 p-4">
                        <form method="post"enctype="multipart/form-data">
                        <div class="field-group">

                            <div class="">
                                <select name="t1" required="" class="form-control">
                                        <option value="">Choose Service Center</option>
                                        <?php
                                        $sel_state=mysqli_query($dbcon,"select * from ser where cid='$usr'");
                                        while($r_state=mysqli_fetch_row($sel_state))
                                        {
                                            ?>
                                        <option value="<?php echo $r_state[7] ?>"><?php echo $r_state[1] ?></option>
                                       <?php
                                           }
                                        ?>
                                    </select>
                            </div>
                        </div>
                        <br/>
                          <div class="field-group">

                            <div class="">
                                <select name="t2" required="" class="form-control">
                                        <option value="">Choose action</option>
                                         <option value="1">Repair</option>
                                          <option value="2">Replace</option>
                                    </select>
                            </div>
                        </div>
                        <br/>
                        
                        <div>
                            <button type="submit"name="b1" class="btn btn-success form-control">Assign Now</button>
                        </div>
                        
                    </form>
                    </div>
                </div>

               
            </div>
        </div>
    </section>

</body>

</html>
