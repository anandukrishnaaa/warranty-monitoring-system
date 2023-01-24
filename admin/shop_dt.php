<!DOCTYPE html>

<head>
  
    <section id="admin_header">
     <?php
     $page_name = 'shop';
    include 'menu.php';   
    ?>
</section>

<?php
$usr=$_SESSION['uid'];
$mid=$_GET['mid'];
$sel=mysqli_query($dbcon,"select * from shop where id='$mid'");
$r=mysqli_fetch_row($sel);
?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDge58kDZRSDquz16IhEFQZMzHjMpFWwlw&callback=myMap"></script>
    <script type="text/javascript">
   function initMap() {
        var uluru = {lat: <?php echo $r[5] ?>, lng: <?php echo $r[6] ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDge58kDZRSDquz16IhEFQZMzHjMpFWwlw&callback=initMap">
    </script>

</head>

<body>
    <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <div class="left-ads-display wthree">
                <div class="row">
                    <div class="desc1-left col-md-6">
                            <div id="map" style="width: 100%; height: 400px;"></div>
                    </div>
                    <div class="desc1-right col-md-6 pl-lg-3">
                        <h2><?php echo $r[1] ?></h2>
                        <br/>
                        <h6>
                            <span class="fa fa-envelope"></span> <?php echo $r[7] ?>
                        </h6>
                        <br/>
                        <h6><a href="tel:<?php echo $r[3] ?>"><span class="fa fa-phone"></span> <?php echo $r[3] ?>  </a></h6>
                        <div class="available mt-3">                         
                            <span>Address</span>
                            <p><?php echo $r[4] ?> </p>
                        </div>
                        <div class="share-desc mt-5">
                            <div class="share text-left">
                                <h4>Manager : <?php echo $r[2] ?></h4> 
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
