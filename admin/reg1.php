<!DOCTYPE html>

<head>
    
     <section id="admin_header">
     <?php
     $page_name = 'comp_reg';
    include 'menu.php';   
    ?>
</section>


<?php
                 
if(isset($_POST['sub1']))
 {
    $t1=$_POST['t1'];
    $t2=$_POST['t2'];
    $t3=$_POST['t3'];
    $t4=$_POST['t4'];
    $t5=$_POST['t5'];
    $log1=mysqli_query($dbcon,"select * from user_log where uid='$t3'");
    
if(mysqli_num_rows($log1)>0)
{
 echo '<script>alert("Username Already Exist")</script>'; 
}
 else {
            $up = $_FILES['myFile']['name'];
            $count = rand('1000000', '9999999');
            $nfn = $count . "" . substr($up, strrpos($up, "."));

            if (move_uploaded_file($_FILES['myFile']['tmp_name'],dirname(__DIR__, 1). "//img1//$nfn")) 
            {
                $ins = mysqli_query($dbcon, "insert into comp(nme,con,em,pass,ac,ph,st) values('$t1','$t2','$t3','$t4','$t5','$nfn','0')");

                if ($ins > 0) 
                {
                    $ins1 = mysqli_query($dbcon, "insert into user_log(uid,pwd,utyp,st) values('$t3','$t4','comp','0')");
                    if ($ins1 > 0) 
                    {
                        echo '<script>alert("Company Registration Complete!")</script>';
                    }
                }
            }
       
    }
}
?>
    
    
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
    
<section id="val">  
    
<script type="text/javascript">
// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='add_staff']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      username: "&nbsp;required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: 5
      }
    },
    // Specify validation error messages
    messages: {
      firstname: "&nbsp;Please enter a valid username",
      password: {
        required: "&nbsp;Please provide a password",
        minlength: "&nbsp;Your password must be at least 5 characters long"
      },
      email: "&nbsp;Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>   
<style type="text/css">
form .error {
color: #ff0000;
}
    
</style>
</section>

</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <h3 class="mb-lg-5 ms-5 mb-4">Company Registration</h3>         
                <div class="content-bottom contact_right p-lg-5 p-4">
                    <form method="post" enctype="multipart/form-data">
                        <div class="field-group">

                            <div class="content-input-field">
                                <input name="t1" id="text1" type="text" value="" placeholder="Name" required="">
                            </div>
                        </div>
                        
                        <div class="field-group">

                            <div class="content-input-field">
                                <input name="t2" id="text3" type="text" value="" placeholder="Contact" required=""onkeyup="chkc(this.value)" /><span id="o3"></span>
                            </div>
                        </div>
                        <div class="field-group">

                            <div class="content-input-field">
                                <input name="t3" id="text1" type="email" value="" placeholder="Email" required=""onkeyup="vem(this.value)" /><span id="em"></span>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="t4" id="myInput" type="Password" placeholder="Password">
                            </div>
                        </div>
                        <div class="field-group">

                            <div class="content-input-field">
                                <input name="t5" id="text1" type="text" value="" placeholder="Account No" required="">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                                Company Portfolio
                              <input name="myFile" class="frm-field required" class="form-control" type="file"required="">
                            </div>
                        </div>
                        <div class="content-input-field">
                            <button type="submit"name="sub1" class="btn">Register</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</body>
</html>
