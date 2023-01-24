

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
$wid=$_SESSION['wid'];
?>


<?php
if(isset($_POST['b1']))
{
  $t1=$_POST['t1'];
    $mid=$_GET['mid'];
   $t2=$_POST['t2'];
    $t3=$_POST['t3'];
    $t4=$_POST['t4'];  
   
    $sel=mysqli_query($dbcon,"select * from pro where id='$mid'");
    $r=mysqli_fetch_row($sel);
    
     $up=$_FILES['myFile']['name'];
    $count=rand('1000000','9999999');
    $nfn=$count."".substr($up,strrpos($up,"."));
   
     if(move_uploaded_file($_FILES['myFile']['tmp_name'],getcwd()."//../img5//$nfn"))
    {
        
      $ins=mysqli_query($dbcon,"insert into msg values('','$t1','$t2','$t3','$t4','$nfn','$mid','$r[11]','$usr','1','0','0','0','$wid','0')");
    
    if($ins>0)
    {
        header("location:msg.php");
        
    }
    
   

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

</head>

<body>
   

    <section class="banner-bottom py-5">
        <div class="container py-md-5">
        <h3 class="mb-lg-5 ms-5 mb-4">Warranty Request</h3>

            <div class="row contact_information">
                <div class="col-md">
                    <div class="contact_right p-lg-5 p-4">
                        <form method="post"enctype="multipart/form-data">
                        <div class="field-group">

                            <div class="">
                                <input name="t1" class="form-control mt-3" id="text1" type="text" value="" placeholder="Name" required="">
                            </div>
                        </div>
                        
                        <div class="field-group">

                            <div class="">
                                <input name="t2" class="form-control mt-3" id="text3" type="text" value="" placeholder="Contact" required="">
                            </div>
                        </div>
                        <div class="field-group">

                            <div class="">
                                <textarea name="t3" class="form-control mt-3" placeholder="Address....."></textarea>
                            </div>
                        </div>
                            <div class="field-group">

                            <div class="">
                                <textarea name="t4" class="form-control mt-3" placeholder="Complaint Details"></textarea>
                            </div>
                        </div>
                            <div class="field-group">
                            <div class="mt-4">
                                Bill Copy
                              <input name="myFile" class="frm-field required" class="form-control" type="file"required="">
                            </div>
                        </div>   
                        
                        
                        <div class="">
                            <button type="submit"name="b1" class="btn btn-primary mt-4 form-control">Send Request</button>
                        </div>
                        
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
