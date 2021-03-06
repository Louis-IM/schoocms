<?php if(have_rows('locations','options')):
if(get_field('footer_map_zoom','options')){
	$mapZoom = get_field('footer_map_zoom','options');
} else {
	$mapZoom = 12;
}?>
<div class="footerMapWrap">
						<?php 
						while(have_rows('locations','options')): the_row();
						$i++;?>		
							<?php if(!$starterLat && !$starterLong){
								if($i == 1){
									$starterLat = get_sub_field('latitude');
									$starterLong = get_sub_field('longitude');
								}
							}
								?>			
							
						<?php endwhile;?>
				<div class="staticfooterMap footerMap">
					<div class="mapWrap"><div id="footerMap"></div></div>
					</div>
				
			</div>

				
			<?php if(have_rows('intial_setting','options')):
				while(have_rows('intial_setting','options')): the_row();			
					$starterLat = get_sub_field('latitude');
					$starterLong = get_sub_field('longitude');
				endwhile;
			endif;?>
								
			<?php if(get_field('google_maps_api_key','options')){
				$api = '&key='.get_field('google_maps_api_key','options');
			} else {
				$api = '';
			}?>
	 <script src="https://maps.googleapis.com/maps/api/js?callback=initMap<?php echo $api;?>"
    async defer></script>
	<script>
	var map;
/*google maps*/
window.initMap = function(){
	var markerLatLang = {lat: <?php echo $starterLat;?>, lng: <?php echo $starterLong;?>};
	var mapCenter = markerLatLang;
    
  // Create an array of styles.

var styles = [
 
];
  

  // Create a new StyledMapType object, passing it the array of styles,
  // as well as the name to be displayed on the map type control.
 var styledMap = new google.maps.StyledMapType(styles,
    {name: "Map"});

  // Create a map object, and include the MapTypeId to add
  // to the map type control.
  var mapOptions = {
    center: mapCenter,
    zoom: <?php echo $mapZoom;?>,
    mapTypeControlOptions: {
      mapTypeIds: ['map_style',google.maps.MapTypeId.SATELLITE,]
    }
  };
  
  var map = new google.maps.Map(document.getElementById('footerMap'),
    mapOptions);


   <?php if(get_field('locations','options')): $i = 0; foreach(get_field('locations','options') as $location):
   
   $logo = $location['map_icon'];
  
   if($logo){
	   $marker = $logo['url'];
	   $markerwidth = $logo['width'];
	   $markerheight = $logo['height'];
   } else {
	   $marker = get_bloginfo('template_url').'/images/map-marker.png';
	   $markerwidth = 40;
	   $markerheight = 47;
   }
   $i++;?>
   var image = {
    url: '<?php echo $marker?>',
    size: new google.maps.Size(<?php echo $markerwidth;?>, <?php echo $markerheight;?>),
    // The origin for this image is (0, 0).
    origin: new google.maps.Point(0, 0),
    
    anchor: new google.maps.Point(<?php echo $markerwidth/2;?>, <?php echo $markerheight;?>)
  };
   
 var mapMarker<?php echo $i;?> = new google.maps.Marker({
    position:{lat: <?php echo $location['latitude'];?>, lng: <?php echo $location['longitude'];?>},
    map: map,
    title: "<?php echo $location['title'];?>",
    icon: image,
	zIndex: 999
  });
<?php endforeach; endif;?>
   
  //Associate the styled map with the MapTypeId and set it to display.
  map.mapTypes.set('map_style', styledMap);
  map.setMapTypeId('map_style');
  function newLocation(newLat,newLng)
{
	map.setCenter(new google.maps.LatLng(
		newLat,
		newLng
	));
}
/*map toggle*/
jQuery('#mapNavToggle li').click(function(e){
	var target = jQuery(this).data('trigger');
	var newlat = jQuery('.mapInfoText',target).data('map-latitude');
   var newlong = jQuery('.mapInfoText',target).data('map-longitude');
   jQuery('#footerMapLocations .mapInfo.active').removeClass('active');
	jQuery('#mapNavToggle li.active').removeClass('active');
	jQuery(this).addClass('active');
	jQuery(target).addClass('active');
   newLocation(newlat,newlong);
});
}

jQuery(document).ready(function($){

});
      
    </script>
<?php endif;?>
