<?php
include 'menu.php';
include '../conection.php';
ob_start();
?>
<!---->

<!---->
<div class="bottom_content">
	 <div class="container">
             
		 <div class="sofas">
			 <div class="col-md-6 sofa-grid">
				 <img src="images/t1.jpg" alt=""/>
				 <h3>100% PROTECTED AND SECURE</h3>
				 
			 </div>
			 <div class="col-md-6 sofa-grid sofs">
				 <img src="images/t2.jpg" alt=""/>
				 <h3>MOVE MONEY ANYTIME ANYWHERE</h3>
				 
			 </div>
			 <div class="clearfix"></div>
		 </div>
             
	 </div>

</div>
 <div class="container">
<div class="col-lg-3"></div>
<div class="col-lg-6">
    <h2 style="color: lightgreen;font: italic">Deposit your money here</h2>
			 
                         <br/>
                         
                         
    <table class="table table-responsive"style="background: #E5E5E5">
        <?php
                        
                            if(isset($_POST['b1']))
                            {
  
                                
                               
                                $sel=mysqli_query($dbcon,"select * from account_bank where account_no='$_POST[t1]'");
    $r=mysqli_fetch_row($sel);
    $amt=$r[9];
                                $tot=$amt+$_POST['t2'];
                                
                                
                              $upd=mysqli_query($dbcon,"update account_bank set amount= '$tot'where account_no='$_POST[t1]'");
                           if(mysqli_affected_rows()>0)
                           {
                                $date=date('Y-m-d H:i:s');
                                 mysqli_query($dbcon,"insert into cash_deposit(amount_from,amount_to,amount,date,status)values('self','$_POST[t1]','$_POST[t2]','$date','1')");
                                if($upd>0)
                           {
                                 if(mysqli_affected_rows()>0)
                                
{
echo" sucessfully Deposited";
}
else
{
echo"Account number incorect/Create an Account";
}
}
                           }
                            }
                            
?>
        <tr>
            <td>Account No</td>
            <td><input type="number"name="t1"class="form-control"></td>
        </tr>
        <tr>
            <td>Amount</td>
            <td><input type="number"name="t2"class="form-control"placeholder="Rs/-"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit"value="Deposit"name="b1"class="btn btn-success"></td>
        </tr>
        
        
    </table>
    
    
    
</div>
 </div>
<!---->

<?php
include 'footer.php';
?>