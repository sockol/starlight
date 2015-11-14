<?php
/*
included file for lands

i am adding ajax to this page.

all alnd types will have a map coordinate associated with them
they will all display themselves on the map
[right]
or maybe make a way for them to associate lands with where theya re on the map?
[no] 


show the map here with markings. markings will be an object with id-of-land:[coordiantes to put on map]


i will draw the map with that object and fetch the homes through a custom query. all those will be invisible, and appear on hover
OR i could lazy load them on hover. what do you think is best?

when i choose a house i use the slug.... slugs should be short. but will they be? maybe best to use the post id?
what do you think?????
[short enough]

then do homes in the same way.

also i dont like the transitions on the site on the quote page. i will keep the previously picked house type and land on the 
left when you begin picking the facade. what do you think?
[yup]

on the single home page contact form, insert the the page subject that they were looking at - whihc floor plan? which page url?
append it to the message thet people write

make the last part of the quote look better

also i want to change the last part of quote - now it looks too ugly.
 
so based on what part of quote we are on we load a speciffic file
also, get rid of gloabl quote taglines - put the land plot name in there, fullscreen it. 
put stuff/text over it.
[do that]


No, bad way to do it - navigation will get screwed up.
i will need to load the new quote page stuff.... but then what if the person refreshes. then i lose 
everything. need to keep it in the url - say if url has a hashtag and its equal to "land,home,facade" it meanst im on the
quote page. reload content of that page with the starting quote-rocess page 


???SHOUDL I ADD/TRY TO MAKE the same sliding menu as that instagram site?
*/
?>
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
