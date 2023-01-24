<?php
ob_start();
include 'connection.php';

?>

<?php
                 
                    if(isset($_POST['sub1']))
 {
    
    $t1=$_POST['t1'];
    
   $t2=$_POST['t2'];
    $t3=$_POST['t3'];
    $t4=$_POST['t4'];
    
   
    $log1=mysqli_query($dbcon,"select * from user_log where uid='$t3'");
if(mysqli_num_rows($log1)>0)
{
 echo '<script>alert("Username Already Exist")</script>'; 
}
 else {
     
    $ins=mysqli_query($dbcon,"insert into user_data values('','$t1','$t2','$t3','$t4','0')");
    
    if($ins>0)
    {
      $ins1=mysqli_query($dbcon,"insert into user_log values('','$t3','$t4','user','1')");
        if($ins1>0)
        {
                echo '<script>alert("Registration Complete")</script>'; 
            }
    }
        }
 }?>


<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/shopping-online.png"/>
    
    <link rel="stylesheet" href="temp/bootstrap-5.1.3-dist/css/bootstrap.css">


    <script type="text/javascript">
            function nme(b2)
        {
        var k5=b2.length;
        var ch2=/([a-z])$/;
        if(ch2.test(b2)==false)
        {
        document.getElementById("np3").innerHTML="<font color='red'>*Only Alphabets*</font>";
        $("#btn").hide();
        return false;
        }

        else
        {
        document.getElementById("np3").innerHTML="";  
        $("#btn").show();
        }
        }
        
        
        
            
            function chkc(b2)
        {
        var k5=b2.length;
        var ch2=/([0-9])$/;
        if(ch2.test(b2)==false)
        {
        document.getElementById("o3").innerHTML="<font color='red'>*Only Numbers*</font>";
        $("#btn").hide();
        return false;
        }
        else if(k5!=10)
        {
        document.getElementById("o3").innerHTML="<font color='red'>*Please Check Your Mobile Number*</font>";
        $("#btn").hide();
        return false;
        }
        else
        {
        document.getElementById("o3").innerHTML="";  
        $("#btn").show();
        }
        }
        
        function chkp(c)
        {
        var s=document.getElementById("p10").value;

        if(s==c)
        {
        document.getElementById("p").innerHTML="<font color='Green'>*Password is Correct*</font>";
        $("#btn").show();
        return false;
        }
        else
        {
        document.getElementById("p").innerHTML="<font color='red'>*Verfy Password*</font>";
        $("#btn").hide();
        }
        }

        function vem(a)  
            {  
                //var a = document.myform.email.value;  
                var atposition = a.indexOf("@");  
                var dotposition = a.lastIndexOf(".");  
                if (atposition<1 || dotposition<atposition+2 || dotposition+2>=a.length) 
                {  
                    document.getElementById("em").innerHTML="<font color='red'>*Please Check Your Email Address*</font>";
                        $("#btn").hide();  
                }  
                else
        {
                        document.getElementById("em").innerHTML="";  
        $("#btn").show();
        }
            }  
    </script>
</head>

<body>
    
    <?php
       
       include 'navbar.php';
       ?>

        <div class="container bg-white p-0 mt-top">
            <div class="row justify-content-center">
                
                <div class="col p-0 m-0">
                    <img src="temp/images/c1.jpg" alt="" class="regimg">
                </div>
                <div class="col-8 p-5">
                    <h1>User Registration</h1>
                    <form method="post"enctype="multipart/form-data">
                        <div class="my-5">
                            <input name="t1" class="form-control" id="text1" type="text" value="" placeholder="Name" required="">
                        </div>
                    
                        <div class="my-5">
                                <input name="t2" class="form-control" id="text3" type="text" value="" placeholder="Contact" required=""onkeyup="chkc(this.value)" /><span id="o3"></span>
                        </div>
                        <div class="my-5">
                                <input name="t3" class="form-control" id="text1" type="email" value="" placeholder="Email" required=""onkeyup="vem(this.value)" /><span id="em"></span>
                        </div>
                        <div class="my-5">
                                <input name="t4" class="form-control" id="myInput" type="Password" placeholder="Password">
                        </div>
                    
                        <div class="mt-5">
                            <button type="submit"name="sub1" class="btn form-control btn-outline-primary">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>
