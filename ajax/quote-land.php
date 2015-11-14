<?php
function land(){

	$args = array(
		'post_type' => array('land-plot'),
		'nopaging'  => true

	);
	$query = new WP_Query( $args );

	$lands = array();  

	if ($query->have_posts()) : 
		while ($query->have_posts()) : 

			$query->the_post(); 
			$t = array(
				'id'=>get_the_ID(),
				'title'=>get_the_title(),
				'price'=>get_field('lands_price'),
				'description'=>get_field('lands_description'),
				'map'=>get_field('lands_map'),
				'models'=>get_field('lands_models'),
				'excerpt'=>get_the_excerpt()
			); 

			array_push($lands,$t); 
 
		endwhile; 
	endif;
   	
   	$lands = json_encode($lands,JSON_UNESCAPED_SLASHES); 

	include(get_template_directory().'/templates/quote/quote-land.php');
    exit();
}

// creating Ajax call for WordPress  
add_action('wp_ajax_nopriv_land', 'land');
add_action('wp_ajax_land', 'land');

?>