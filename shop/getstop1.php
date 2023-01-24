<?php
include '../connection.php';
$q=$_GET['q'];
 $sel_gal1=mysqli_query($dbcon,"select * from pro3 where sid='$usr' order by id desc");
 if(mysqli_num_rows($sel_gal1)>0)
{
 while($r_gal1=mysqli_fetch_row($sel_gal1))
 {                                                        
$sel_jn=mysqli_query($dbcon,"select * from pro where nme like '$q%' and id='$r_gal1[2]' limit 5");

   $r_jn=mysqli_fetch_row($sel_jn);
    
        ?>
<div style="border: 1px solid gray; margin-bottom: 2px;padding: 3px;color: white"><img style="width: 60px;height: 60px" class="img img-circle" src="../img2/<?php echo $r_jn[10] ?>">&nbsp;<?php echo $r_jn[2] ?><span style="color: lightskyblue" class="fa fa-bookmark  pull-right" style="cursor: pointer;" onclick="add_data('<?php echo $r_jn[0] ?>')"></span></div>
<br/>
    <?php
    }
}
else
{
    echo"No Data Found";
}
?>