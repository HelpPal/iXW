document.write('<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>');
document.write('<div style="padding-bottom:10px;"><input type="text" name="address" value="O. J. Brochs g 16a, Bergen" style="width:400px;border:1px solid black"><input type="button" name="search" value="Geocode"></div>');
document.write('<div id="coords"></div>');
document.write('<div id="gmap" style="width:570px; height:500px;"></div>');


jQuery(document).ready(function() {

	// Load google map
	var map = new google.maps.Map( document.getElementById("gmap"),  {
		center: new google.maps.LatLng(0,0),
		zoom: 3,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		panControl: false,
		streetViewControl: false,
		mapTypeControl: false
	});


	jQuery('input[name=search]').click(function() {

		var geocoder = new google.maps.Geocoder(); 
		geocoder.geocode({
				address : jQuery('input[name=address]').val(), 
				region: 'no' 
			},
		    function(results, status) {
		    	if (status.toLowerCase() == 'ok') {
					// Get center
					var coords = new google.maps.LatLng(
						results[0]['geometry']['location'].lat(),
						results[0]['geometry']['location'].lng()
					);
					jQuery('#coords').html('Latitute: ' + coords.lat() + '    Longitude: ' + coords.lng() );
					jQuery('#txtName').val( results[0]['formatted_address'] ) ;
					jQuery('#txtLat').val( results[0]['geometry']['location'].lat() ) ;
					jQuery('#txtLong').val( results[0]['geometry']['location'].lng() ) ; 
					jQuery('#txtDescription').val( results[0]['vicinity']) ;
					map.setCenter(coords);
					map.setZoom(18);
					
					// Set marker also
					marker = new google.maps.Marker({
						position: coords, 
						map: map, 
						title: jQuery('input[name=address]').val(),
					});
							    	
		    	}
			}
		);
	});
	
});