<!DOCTYPE html>

<head>

<section id="user_header">
<?php
$page_name = 'pur';
include 'menu.php';
?>
</section> 


<?php
$mid = $_GET['mid'];
?>

<?php
if (isset($_POST['b1'])) 
{
    $t1 = $_POST['t1'];
    $ins1 = mysqli_query($dbcon, "insert into ext values('','$t1','$mid','$usr','1')");
    if ($ins1 > 0) 
    {
        header("location:my.php");
    }
}
?>


</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <h3 class="mb-lg-5 ms-5 mb-4">Extend Warranty</h3>

            <div class="row contact_information">
                <div class="">
                    <div class="contact_right p-5">
                        <form method="post"enctype="multipart/form-data">
                        <div class="row justify-content-around align-items-center">
                            <div class="col-5">
                                <div class="field-group">
                                    <input class="form-control mt-4" id="text1" type="text" value="" placeholder="Full Name" required="">
                                </div>

                                <div class="field-group">
                                    <input class="form-control mt-4" id="text3" type="text" value="" placeholder="Phone Number" required="" />
                                </div>
                            
                                <div class="field-group">
                                    <textarea class="form-control mt-4" placeholder="Address" required=""></textarea>
                                </div>
                                    <div class="field-group">
                                            <select class="form-control" name="t1" required="">
                                                <option value="">Select a plan</option>
                                                <option value="1">1 Year(1000 Rs/-)</option>
                                                <option value="2">2 Year(2000 Rs/-)</option>
                                                <option value="3">3 Year(3000 Rs/-)</option>
                                                <option value="4">4 Year(4000 Rs/-)</option>
                                                <option value="5">5 Year(5000 Rs/-)</option>
                                            </select>
                                    </div>
                                </div>
                            <div class="col-5">
                                <h4>Payment</h4>

                                <div class="icons mt-4">
                                    <h6>Accepted Cards</h6>
                                    <br>
                                    <img src="../temp/icons/maestro.svg" alt="" height="20px" width="40px">
                                    <img src="../temp/icons/mastercard.svg" alt="" height="20px" width="40px">
                                    <img src="../temp/icons/paypal.svg" alt="" height="20px" width="40px">
                                    <img src="../temp/icons/visa.svg" alt="" height="20px" width="40px">


                                </div>

                                <div class="field-group">
                                    <input class="form-control mt-4" type="text" value="" placeholder="Name on card" required="">
                                </div>
                            
                                <div class="field-group">
                                    <input class="form-control mt-4" type="text" value="" placeholder="Credit Card Number" required=""/>
                                </div>

                                <div class="field-group">
                                    <input class="form-control mt-4" type="text" value="" placeholder="Exp Month" required=""/>
                                </div>

                                <div class="row">

                                    <div class="field-group col">
                                        <input class="form-control mt-4" type="text" value="" placeholder="Exp Year" required=""/>
                                    </div>

                                    <div class="field-group col">
                                        <input class="form-control mt-4" type="text" value="" placeholder="CVV" required=""/>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit"name="b1" class="btn btn-danger form-control">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
