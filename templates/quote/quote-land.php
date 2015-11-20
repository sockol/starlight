<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define('WP_USE_THEMES', false);
require_once(get_home_path().'/wp-load.php'); 
?> 
<script>
	/*
	Land object
	*/ 
	lands = <?php echo $lands; ?>;
	// console.log(lands);
</script>
<div class="cap map" id="map">   
	<div class="wrap">
 		<div class="box-wrap">
 			<div class="left">   
		    	
		    	<img src="http://starlight.com/wp-content/themes/starlight/images/slider/1.jpeg" id="land-img">
			      
		        <h6 id="land-name">Pick your land plot</h6>
		        <span class="price" id="land-price"></span>
		        <p id="land-text"></p>
		        <button class="button-red next-button" id="land-button">
					Pick this Land Plot
					<span>→</span>
				</button>  

			</div>
			<div class="right" id="picks-wrap">
				<img id="map-img" src="<?php echo get_template_directory_uri(); ?>/images/map.png">
				<div class="cell-wrap">
					<?php
						/*
						Iterate over markers, insert ids at given coordinates
						*/ 
						populateMap(FALSE); 
					?> 
				</div>
			</div>
		</div>
	</div> 
</div>
