<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>
  <body>

    	<div id="map" style="width: 1100px; height: 640px;"></div>
    	<div id="rbar" style="width: 100px; margin-left: 910px;float: right; z-index: 10;  position: absolute;  right: 0;  top: 0;">
       	<span id="rt_span"></span>
        </div>
    <script>

    //----------------------------------------------------------------------------------------------------------------//


        function showDriver(did) {
		//alert("show driver: " + did);
                getDriverLocations(did, 0);
        }

	////////////////////////////////////////////	
	function getDrivers() {
	//alert("get_drivers");
	
	$.post("api.php",
	    {
	        op: "get_drivers",
	    },
	    function(data, status){
	        //alert("Data: " + data + "\nStatus: " + status);

		var drivers = JSON.parse(data);
                
		var spanHtml = "";

		for(var i=0; i<drivers.length; i++) {
		  var driver = drivers[i];
                  spanHtml += '<input type="button" class="btn btn-primary" value="' + driver.name  + '" onClick="showDriver(' + driver.did + ')" > <br><br>';
		}
		$('#rt_span').html(spanHtml);
	   });
	}

	////////////////////////////////////////////	
	function getDriverMaxLocation(did) {
	//alert("getDriverMaxLocation");
	
	$.post("api.php",
	    {
	        op: "get_max_driver_location",
		did: did,
	    },
	    function(data, status){
	        alert("Data: " + data + "\nStatus: " + status);
	   });
	}


	////////////////////////////////////////////	
	function getDriverLocations(did, lid) {
	//alert("getDriverLocations");
	
	$.post("api.php",
	    {
	        op: "get_driver_locations",
                did: did,
                lid: lid,
	    },
	    function(data, status){
	        //alert("Data: " + data + "\nStatus: " + status);

		var locs = JSON.parse(data);
                var cords = new Array();
		for(var i=0; i<locs.length; i++) {
                     var loc = locs[i];
                     var point = new google.maps.LatLng(loc.lat, loc.lng);
	             cords.push(point);
                     map.setCenter(point);
		}
 
	var path = new google.maps.Polyline({
          path: cords,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });
        
        path.setMap(map);
	
	   });
	}//getDriverLocations

	function refreshData() {
		//alert("refreshData");

	}

 
      //++++++++++++++++++++++++++++++++++++++++++++//


       getDrivers();
 
       


        //getDriverMaxLocation(4);
        setInterval(refreshData, 5000);


     //------------------------------------------------------------------------------------//
     //     MAP 
     //------------------------------------------------------------------------------------//
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 30.7402727, lng: 76.7738713},
          zoom: 14
        });

	// marker
        var marker = new google.maps.Marker({
          position: {lat: 30.7402727, lng: 76.7738713},
          map: map,
          title: 'Hello World!'
        });

       //-----------------------------------------------------//
       // path
        /*var flightPlanCoordinates = [
          {lat: 30.7402727, lng: 76.7738713},
          {lat: 30.7523317, lng: 76.7639687},
          {lat: 30.7454102, lng: 76.7526107},
          {lat: 30.7321987, lng: 76.7461972}
        ];
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        flightPath.setMap(map); */

	//-----------------------------------------------------//

      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCYJlUEqEzJgBy0t5JWUkRXLehGNFyrp0&callback=initMap"
    async defer></script>
  </body>
</html>
