<html>
    <head>
    <script type='text/javascript' src='jquery-1.6.2.min.js'></script>
    <script type='text/javascript' src='jquery-ui-1.8.14.custom.min.js'></script>
    <style>
 
        BODY {font-family : Verdana,Arial,Helvetica,sans-serif; color: #000000; font-size : 13px ; }
 
        #map_canvas { width:100%; height: 100%; z-index: 0; }
    </style>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false" /></script>
    <script type='text/javascript'>
 
    //This javascript will load when the page loads.
	
    jQuery(document).ready( function($){
 
            //Initialize the Google Maps
            var geocoder;
            var map;
            var markersArray = [];
            var infos = [];
 
            geocoder = new google.maps.Geocoder();
            var myOptions = {
                  zoom: 9,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
                }
            //Load the Map into the map_canvas div
            var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
 
            //Initialize a variable that the auto-size the map to whatever you are plotting
            var bounds = new google.maps.LatLngBounds();
            //Initialize the encoded string       
            var encodedString;
            //Initialize the array that will hold the contents of the split string
            var stringArray = [];
            //Get the value of the encoded string from the hidden input
            encodedString = document.getElementById("encodedString").value;
            //Split the encoded string into an array the separates each location
            stringArray = encodedString.split("****");
 
            var x;
            for (x = 0; x < stringArray.length; x = x + 1)
            {
                var addressDetails = [];
                var marker;
                //Separate each field
                addressDetails = stringArray[x].split("&&&");
                //Load the lat, long data
                var lat = new google.maps.LatLng(addressDetails[1], addressDetails[2]);
                //Create a new marker and info window
                marker = new google.maps.Marker({
                    map: map,
                    position: lat,
                    //Content is what will show up in the info window
                    content: addressDetails[0]
                });
                //Pushing the markers into an array so that it's easier to manage them
                markersArray.push(marker);
                google.maps.event.addListener( marker, 'click', function () {
                    closeInfos();
                    var info = new google.maps.InfoWindow({content: this.content});
                    //On click the map will load the info window
                    info.open(map,this);
                    infos[0]=info;
                });
               //Extends the boundaries of the map to include this new location
               bounds.extend(lat);
            }
            //Takes all the lat, longs in the bounds variable and autosizes the map
            map.fitBounds(bounds);
 
            //Manages the info windows
            function closeInfos(){
           if(infos.length > 0){
              infos[0].set("marker",null);
              infos[0].close();
              infos.length = 0;
           }
            }
 
    });
    </script>
 
    </head>
    <body>
    <div id='input'>
 
        <?php

    $con = new mysqli('localhost', 'root', '', 'sgce');


    if (!$con) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error()); }

   $query = "SELECT * FROM `big-ten`" or die("Error in the consult.." . mysqli_error($con));  
   $result = $con->query($query); 
   if ($result = $con->query($query))  var_dump(mysqli_fetch_array($result));   

        //Initialize your first couple variables
        $encodedString = ""; //This is the string that will hold all your location data
        $x = 0; //This is a trigger to keep the string tidy
 
        //Now we do a simple query to the database
		
		$sql = "SELECT * FROM `big-ten`";
        $result = mysqli_query($con, $sql);
		
        //Multiple rows are returned
        while ($row = mysqli_fetch_array($result))
        {
            //This is to keep an empty first or last line from forming, when the string is split
            if ( $x == 0 )
            {
                 $separator = "";
            }
            else
            {
                 //Each row in the database is separated in the string by four *'s
                 $separator = "****";
            }
            //Saving to the String, each variable is separated by three &'s
            $encodedString = $encodedString.$separator.
            "<p class='content'><b>Lat:</b> ".$row[1].
            "<br><b>Long:</b> ".$row[2].
            "<br><b>Name: </b>".$row[3].
            "<br><b>Address: </b>".$row[4].
            "<br><b>Division: </b>".$row[5].
            "</p>&&&".$row[1]."&&&".$row[2];
            $x = $x + 1;
        }        
        ?>
 
        <input type="hidden" id="encodedString" name="encodedString" value="<?php echo $encodedString; ?>" />
    </div>
    <div id="map_canvas"></div>
    </body>
</html>