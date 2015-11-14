<?php
function model(){

	$param = esc_attr($_POST['parameter']);
 

	$args = array(
		'post_type' => array('land-plot'),
		'nopaging'  => true

	);
	$query = new WP_Query( $args );

	$models_array = null;  

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

			if(get_the_title() == $param) 
				$models_array = get_field('lands_models');
 
		endwhile; 
	endif;
   	  
   	$models = json_encode($models_array,JSON_UNESCAPED_SLASHES);  

	include(get_template_directory().'/templates/quote/quote-model.php'); 
    exit();
}

// creating Ajax call for WordPress  
add_action('wp_ajax_nopriv_model', 'model');
add_action('wp_ajax_model', 'model');

?>