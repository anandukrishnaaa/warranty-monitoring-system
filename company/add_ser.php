<!DOCTYPE html>

    <head>
        
        <section id="comp_header">
    <?php
    $page_name = 'ser';
    include 'menu.php';
    ?>
</section>
        
    <?php
if (isset($_POST['b1'])) 
{
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];
    $t4 = $_POST['t4'];
    $t5 = $_POST['t5'];
    $t6 = $_POST['t6'];
    $t7 = $_POST['t7'];
    $t8 = $_POST['t8'];
    $log1 = mysqli_query($dbcon, "select * from user_log where uid='$t7'");
    if (mysqli_num_rows($log1) > 0) {
        echo '<script>alert("Username Already Exist")</script>';
    } else {
        $up = $_FILES['myFile']['name'];
        $count = rand('1000000', '9999999');
        $nfn = $count . "" . substr($up, strrpos($up, "."));
        if (move_uploaded_file($_FILES['myFile']['tmp_name'], getcwd() . "//../img3//$nfn")) 
        {
            $ins = mysqli_query($dbcon, "insert into ser values('','$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$nfn','$usr','0')");

            if ($ins > 0) {
                $ins1 = mysqli_query($dbcon, "insert into user_log values('','$t7','$t8','ser','1')");
                if ($ins1 > 0) {
                    echo '<script>alert("Registration Complete")</script>';
                }
            }
        }
    }
}
?>
<?php
if (isset($_GET['del'])) {
    $del1 = mysqli_query($dbcon, "delete from cate where id='" . $_GET['del'] . "'");
    if ($del1 > 0) {
        header("location:cate.php");
    }
}
?>
        <script src="../ckeditor/ckeditor.js"></script>
        <script src="../ckeditor/samples/js/sample.js"></script>
    </head>

    <body>
        <section class="banner-bottom py-5">
            <div class="container py-md-5">
                <a href="ser.php"><h3 class="mb-lg-5 ms-5 mb-4 text-black">Service Center</h3></a>
                <div class="row contact_information">
                    <div class="col-md-7">
                        <div class="contact_right p-lg-5 p-4">
                            <form  method="post"enctype="multipart/form-data">
                                <div class="field-group">
                                    <div class="">
                                        <input name="t1" id="text1" type="text" value="" class="form-control mt-4" placeholder="Service Center Name" required="">
                                    </div>
                                </div>
                                <div class="field-group">

                                    <div class="">
                                        <input name="t2" id="text1" type="text" value="" class="form-control mt-4" placeholder="Manager" required="">
                                    </div>
                                </div>
                                <div class="field-group">

                                    <div class="">
                                        <input name="t3" id="text1" type="text" value="" class="form-control mt-4" placeholder="Contact info" required="">
                                    </div>
                                </div>
                                <div class="field-group">
                                    <div class="">
                                        <textarea name="t4" placeholder="Address" required="" class="form-control mt-4"></textarea>
                                    </div>
                                </div>
                                <div class="field-group">
                                    <div class="">
                                        Search and double click on the map to get Location Details
                                        <input id="pac-input"  type="text" placeholder="Search Your Location..." class="form-control mt-4">
                                    </div>
                                </div>
                                <div class="field-group">
                                    <div class="">
                                        <input type="text" name="t5"id="lat"placeholder="Double Click on the map" class="form-control mt-4" value="">
                                    </div>
                                </div>
                                <div class="field-group">
                                    <div class="">
                                        <input type="text" name="t6"placeholder="Double Click on the map" class="form-control mt-4" id="lng" value="">
                                    </div>
                                </div>
                                <div class="field-group">
                                    <div class="">
                                        <input name="t7" id="text1" type="email" value="" class="form-control mt-4" placeholder="Email ID" required="">
                                    </div>
                                </div>
                                <div class="field-group">
                                    <div class="">
                                        <input name="t8" id="text1" type="password" class="form-control mt-4" value="" placeholder="*******" required="">
                                    </div>
                                </div>

                                <div class="field-group">
                                    <div class="mt-4">
                                        Photo
                                        <input name="myFile" class="frm-field required form-control mt-4" type="file"required="">
                                    </div>
                                </div>
                                <div class="content-input-field">
                                    <button type="submit"name="b1" class="btn mt-3">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="col-md-5 ">
                        <center><p><b>Double click on the map to get more accuracy</b></p></center>
                        <div id="map" style="width: 100%; height: 900px"></div>
                        <script>
            // This example adds a search box to a map, using the Google Place Autocomplete
            // feature. People can enter geographical searches. The search box will return a
            // pick list containing a mix of places and predicted search terms.

            // This example requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

            function initAutocomplete() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 8.490001, lng: 76.95397},
                    zoom: 18,
                    mapTypeId: 'roadmap'
                });
                google.maps.event.addListener(map, 'dblclick', function (e) {
                    //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                    document.getElementById("lat").value = e.latLng.lat();
                    document.getElementById("lng").value = e.latLng.lng();
                });
                // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');
                var searchBox = new google.maps.places.SearchBox(input);
                //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function () {
                    searchBox.setBounds(map.getBounds());
                });

                var markers = [];
                // Listen for the event fired when the user selects a prediction and retrieve
                // more details for that place.
                searchBox.addListener('places_changed', function () {
                    var places = searchBox.getPlaces();

                    if (places.length == 0) {
                        return;
                    }

                    // Clear out the old markers.
                    markers.forEach(function (marker) {
                        marker.setMap(null);
                    });
                    markers = [];

                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function (place) {
                        if (!place.geometry) {
                            console.log("Returned place contains no geometry");
                            return;
                        }
                        var icon = {
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(25, 25)
                        };

                        // Create a marker for each place.
                        markers.push(new google.maps.Marker({
                            map: map,
                            icon: icon,
                            title: place.name,
                            position: place.geometry.location
                        }));

                        if (place.geometry.viewport) {
                            // Only geocodes have viewport.
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                    });
                    map.fitBounds(bounds);
                });
            }

                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDge58kDZRSDquz16IhEFQZMzHjMpFWwlw&libraries=places&callback=initAutocomplete"
                        async defer></script>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
