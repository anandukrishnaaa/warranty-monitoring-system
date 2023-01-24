<?php
include '../connection.php';
ob_start();
session_start();
$usr=$_SESSION['uid'];
$mid=$_GET['mid'];
$count=rand('10000','99999');

                          
                          $dn=  mysqli_query($dbcon,"select * from sale1 where id='$mid'");
                          $dn1=  mysqli_fetch_row($dn);
                          $sh=  mysqli_query($dbcon,"select * from comp where em='$dn1[9]'");
                          $sh1=  mysqli_fetch_row($sh);
?>
<?php

if($usr=$_SESSION['uid'])
{
    
}
 else
     {
    header("location:../index.php");    
}
?>



<html>
    
    
    <head>
        <script>
            
             $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
            
            </script>
        <style>
            #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
        </style> 
    </head>
    <body>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            
            <a href="home.php"><button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> HOME</button></a>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                       <h1 class="name">
                            <a target="_blank" href=#">
                           <?php echo $sh1[1] ?>
                            </a>
                        </h1>
                    </div>
                    <div class="col company-details">
                        
                        <div> <?php echo $sh1[2] ?></div>
                        <div> <?php echo $sh1[3] ?></div>
                        
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?php echo $dn1[1] ?></h2>
                        <div class="address">Contact- <?php echo $dn1[2] ?></div>
                        <div class="address">Email- <?php echo $dn1[3] ?></div>
                        
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE <?php echo $count ?></h1>
                        <div class="date">Date of Invoice: <?php echo $dn1[8] ?></div>
                        
                    </div>
                </div>
                   <?php
                        
                                                        $sel_gal=mysqli_query($dbcon,"select * from sale1 where id='$mid'");
                                                        if(mysqli_num_rows($sel_gal)>0)
                                                        {$i=0;
                                                        ?>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">PRODUCT</th>
                            <th class="text-right">PRICE</th>
                            <th class="text-right">QUANTITY</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                                                            while($r_gal=mysqli_fetch_row($sel_gal))
                                                            {
                                                                $pro=  mysqli_query($dbcon,"select * from pro where id='$r_gal[4]'");
                          $pro1=  mysqli_fetch_row($pro);
                                                                $i++;
                                                                ?>
                        <tr>
                            <td class="no"><?php echo $i ?></td>
                            <td class="text-left"><h3><?php echo $pro1[2] ?></h3></td>
                            <td class="unit"><?php echo $r_gal[5] ?> Rs/-</td>
                            <td class="qty"><?php echo $r_gal[6] ?></td>
                            <td class="total">
                                
                                <?php
                                $tot=$r_gal[5]*$r_gal[6];
                                echo"$tot";
                                ?>
                                
                                Rs/-</td>
                        </tr>
                        <?php
                                                            }
                                                            ?>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
                <?php
                
                                                        }
                                                        ?>
                <br/>
                
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">We will be waiting for your Next Visit.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
    </body>
</html>

<script>
    window.print();
    </script>