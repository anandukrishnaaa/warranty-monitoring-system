<?php
include 'menu.php';
include '../conection.php';
ob_start();
?>
<?php
                    
                            
                            if(isset($_POST['b1']))
                                
                            {
                                
$up=$_FILES['p1']['name'];
   $count=rand('100000','999999');
    $pname=$count."".substr($up,strrpos($up,"."));
   
if(move_uploaded_file($_FILES['p1']['tmp_name'],getcwd()."\\img1\\$pname"))
{
   $up1=$_FILES['f1']['name'];
   $count1=rand('100000','999999');
    $fname=$count1."".substr($up1,strrpos($up1,"."));
   
if(move_uploaded_file($_FILES['f1']['tmp_name'],getcwd()."\\img2\\$fname"))
{ 
    
    
$msg=$_POST['t2'];
$msg1=  addslashes($msg);
$msg2=  nl2br($msg1); 




         $n=rand('100000','999999');  
         
         {
                                $acc=mysqli_query($dbcon,"select * from account_bank where account_no='$n'");
	if(mysqli_num_rows($acc)>0)
	{
		header("location:account_bank.php?acc=1");
	}
	else
	{
            
        
                                $add=mysqli_query($dbcon,"select * from account_bank where aadhar_no='$_POST[t4]'");
	if(mysqli_num_rows($add)>0)
	{
		header("location:account_bank.php?add=1");
	}
	else
	{
     mysqli_query($dbcon,"insert into account_bank(name,address,contact,gender,aadhar_no,id_proof,photo,account_no,amount,status)values('$_POST[t1]','$msg2','$_POST[t3]','$_POST[r1]','$_POST[t4]','$fname','$pname','$n','0','1')");
    
    if(mysqli_affected_rows()>0)
{
header("location:account_bank.php?success=1");
}

}
                            }
                            
                            }            

}
}
                            }

                            
                    ?>
<!---->
<script type="text/javascript">

function chkpass(b)
{
var p5=b.length;;
if(p5<10)
{
document.getElementById("n3").innerHTML="check your number";
document.getElementById("t3").style.borderColor="red";
}
else
{
document.getElementById("n3").innerHTML="";
document.getElementById("t3").style.borderColor="green";
}
}

</script>
<script type="text/javascript">
    
    
    function chkc(b2)
{
var k5=b2.length;
var ch2=/([0-9])$/;
if(ch2.test(b2)==false)
{
document.getElementById("o3").innerHTML="<font color='red'>*Only Numbers*</font>";
return false;
}
else if(k5!=10)
{
document.getElementById("o3").innerHTML="<font color='red'>*Please Check Your Mobile Number*</font>";
return false;
}
else
{
  document.getElementById("o3").innerHTML="";  
}
}
  
 function chkd(d2)
{
var t5=d2.length;
var ch2=/([0-9])$/;
if(ch2.test(d2)==false)
{
document.getElementById("p3").innerHTML="<font color='red'>*Only Numbers*</font>";
return false;
}
else if(t5!=12)
{
document.getElementById("p3").innerHTML="<font color='red'>*Please Check Your Aadhar Number*</font>";
return false;
}
else
{
  document.getElementById("p3").innerHTML="";  
}
}
  
    </script>
<br/>
<br/>
<div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="col-lg-6"><h2 style="color: #00ACED;font: italic">Create Account</h2>
                    <br/>
                    
                    <table  class="table  table-responsive  table-striped table-bordered ">
                        <tr>
                            <td>Name</td>
                            <td><input type="text"name="t1"class="form-control"required="required"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><textarea name="t2"class="form-control"required="required"></textarea></td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td><input type="text"name="t3"id="t3"class="form-control"required=""onblur="chkc(this.value)" /><span id="o3"></span></td>
                        </tr>
                        
                        <tr>
                                    <td>Gender</td>
                                    <td><input type="radio"name="r1"value="Male">Male
                                    
                                 <input type="radio"name="r1"value="Female">Female</td>
                                </tr>
                                <tr>
                            <td>Aadhar Number</td>
                            <td><input type="text"name="t4"class="form-control"required="required"onblur="chkd(this.value)" /><span id="p3"></span></td>
                        </tr>
                         
                         <tr>
                            <td>Id proof</td>
                            <td><input type="file"name="f1"required="required"></td>
                        </tr>
                         <tr>
                            <td>Photo</td>
                            <td><input type="file"name="p1"required="required"></td>
                        </tr>
                         <tr>
                         
                             <td colspan="2" align="center">
                                 <font color="green"> <?php
                                                        if(isset($_GET['success']))
                                                        {
                                                            echo "Register Successfully <br/>";
                                                        }
                                                        
                                                        ?></font>
                                                        <font color="red"> <?php
                                                        if(isset($_GET['acc']))
                                                        {
                                                            echo "Registertation Failed Please Try Again <br/>";
                                                        }
                                                        
                                                        ?></font>
                                                        <font color="red"> <?php
                                                        if(isset($_GET['add']))
                                                        {
                                                            echo "Addhar No Already Exits <br/>";
                                                        }
                                                        
                                                        ?></font>
                                 <input type="submit"value="Create Account"name="b1"class="btn btn-success"></td>
                        </tr>
                    </table>
                    
                    
                    
                </div>
                      <div class="col-lg-6">
                   <h2 style="color: #00ACED;font: italic">Your Account</h2>
    <br/>
                   
                <?php
                                        if(isset($_GET['t']))
                                        {
                                          if($_GET['t']==1)
                                          {
                                              $sel_m1=mysqli_query($dbcon,"select * from account_bank where id=".$_GET['mid']);
                                              $r_m1=  mysqli_fetch_row($sel_m1);                                              
                                              ?>
                                        <form method="post">
                                            <a href="account_bank.php" class="glyphicon glyphicon-remove" style="float: right;color: red"></a>
                                            <table class="table table-bordered table-condensed table-hover table-responsive"style="width: 200;height: 500">
                                            
                                                
                                            <center>
                                                <tr>
            <td><a href="img1//<?php echo $r_m1['7']?>"target="_blank"/><img src="img1//<?php echo $r_m1['7']?>" style="width: 180px; height:150px;"class="img img-responsive" /></a></td>
            <td colspan="2"><b>Name:</b> <?php echo $r_m1['1']?><br/><br/>
                <b>Gender:</b> <?php echo $r_m1['4']?> <br/><br/>
                <b>Address:</b> <?php echo $r_m1['2']?><br/><br/>
                <b>Contact:</b> <?php echo $r_m1['3']?>
            </td>
            
        </tr>
        <tr>
            <td><b>Account No:</b> <?php echo $r_m1['8']?></td>
            <td><b>Amount:</b> <?php echo $r_m1['9']?> Rs/-</td>
            
          
         
        </tr>
         <tr>
             <td><b>Aadhar No</b> <?php echo $r_m1['5']?></td>
             <td><b>Id Proof:</b>    <a href="img2//<?php echo $r_m1['6']?>"target="_blank"><span class="glyphicon glyphicon-fullscreen"style="color: #D00030"></span></a></td>
            
        </tr>
        
        
        
        
                                            </center>
                                                </td>
                                            </tr>
                                            
                                        </table>
                                            </form>
                                        <?php
                                          }
                                        }
                                        else
                                        {
                                        ?>
                                        <?php
                                        
                                        $sel_mem=mysqli_query($dbcon,"select * from account_bank");
                                        if(mysqli_num_rows($sel_mem)>0)
                                        {
                                            ?>
                                        <table class="table table-bordered table-condensed table-hover table-responsive">
                                            <tr>
                                                <td>#</td>
                                                <td>Name</td>
                                                <td>Account No</td>
                                                <td>Amount</td>
                                                <td>More</td>
                                            </tr>
                                        <?php
                                        $i=1;
                                            while($r_mem=mysqli_fetch_row($sel_mem))
                                            {
                                                ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $r_mem[1] ?></td>
                                                <td><?php echo $r_mem[8] ?></td>
                                                <td><?php echo $r_mem[9] ?></td>
                                                <td><a href="account_bank.php?t=1&mid=<?php echo $r_mem[0] ?>" class="glyphicon glyphicon-zoom-in"style="color: green"></a></td>
                                            </tr>
                                            <?php
                                            $i++;
                                            }
                                            ?>
                                        </table>
                                            <?php
                                        }
                                        else
                                        {
                                            echo"<b>No Data Found</b>";
                                        }
                                        ?>
                                        <?php
                                        
                                        }
                                        ?>
                      
                      </div>
                
                                    
                                    </div>
               
                
            </div>
                
            
        </div>
    
            
</div>
<!-- end registration -->
<?php
include 'footer.php';
?>