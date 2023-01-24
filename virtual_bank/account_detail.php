<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
<?php
include 'menu.php';
include '../conection.php';
ob_start();
?>
							<!--script-for-menu-->
							<script>
							$( "span.menu" ).click(function() {
							  $( ".top-menu" ).slideToggle( "slow", function() {
								// Animation complete.
							  });
							});
						</script>
				<!-- start-search-->
			<div class="clearfix"> </div>
        </div>

		   <!--banner-->
			 	<div class="banner two">
                  
			   </div>
		</div>
		</div>
   <!--//banner-->
   <!--/typography-->
      <div class="typography">
	   <div class="container">
	       
<div class="col-lg-3"></div>
<div class="col-lg-6">
    <br/>
		 <h2 style="color: #00ACED;font: italic"> Account Details</h2>
                 <br/>
		   
   <table  class="table  table-responsive  table-striped table-bordered ">
         <?php
                           
                            $a=mysqli_query($dbcon,"select * from account_bank where id=".$_GET['bid']);
                            
                            $i=0;
                            while($b=mysqli_fetch_array($a))
                            {
                            
                            
                            ?>
        
        
        <tr>
            <td><a href="img1//<?php echo $b['photo']?>"target="_blank"/><img src="img1//<?php echo $b['photo']?>" style="width: 180px; height:150px;"class="img img-responsive" /></a></td>
            <td colspan="2"><b>Name:</b> <?php echo $b['name']?><br/><br/>
                <b>Gender:</b> <?php echo $b['gender']?> <br/><br/>
                <b>Address:</b> <?php echo $b['address']?><br/><br/>
                <b>Contact:</b> <?php echo $b['contact']?>
            </td>
            
        </tr>
        <tr>
            <td><b>Account No:</b> <?php echo $b['account_no']?></td>
            <td><b>Amount:</b> <?php echo $b['amount']?> Rs/-</td>
            
          
         
        </tr>
         <tr>
             <td><b>Aadhar No</b> <?php echo $b['aadhar_no']?></td>
             <td><b>Id Proof:</b>    <a href="img2//<?php echo $b['id_proof']?>"target="_blank"><span class="glyphicon glyphicon-fullscreen"style="color: #D00030"></span></a></td>
            
        </tr>
        
        
        
        <?php
                            }
                            ?>
    </table>  
	
		
			

	   </div>
	  </div>
	<?php
include 'footer.php';
?>