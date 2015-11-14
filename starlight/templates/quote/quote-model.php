<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define('WP_USE_THEMES', false);
require_once(get_home_path().'/wp-load.php');   

$model = $models_array[0];
$gallery = get_field('models_gallery',$model->ID);
?> 
<script>
	/*
	Land object
	*/ 
	models = <?php echo $models; ?>;
	// console.log(lands);
</script> 
<div class="cap model" id="model">   
	<div class="wrap"> 
 		<div class="box-wrap">
			
			<div class="picks" id="picks">
				<?php $i=0; foreach ($models_array as $key=>$val) : ?>
					<div class="pick <?php if($i==0) echo 'picked'; ?>" id="<?php echo $val->ID; ?>">
						<?php echo $val->post_title; $i = 1;?>
					</div>
				<?php endforeach; ?> 
			</div>
			<div class="picks-wrap" id="picks-wrap">

				<?php foreach ($models_array as $key=>$val) : ?>
				<div id="<?php echo $val->ID; ?>">
					<div class="left">

						<h2>
							<?php echo $val->post_title; ?>
						</h2>
						
						<?php $temp = get_field('models_sqfootage',$val->ID); if($temp != ""): ?>
							<span>							
								<?php echo $temp; ?> Sq. Feet
							</span>
						<?php endif; ?> 

						<?php $temp = get_field('models_description',$val->ID); if($temp != ""): ?>
							<p>							
								<?php echo $temp; ?>  
							</p>
						<?php endif; ?> 

					</div>
					<div class="right">
		 
						<section class="shadow-wrap">
							<div class="spinner"></div>
							<div class="flexslider quote-models-slider"> 
								
								<ul class="slides">
		 
									<?php foreach (get_field('models_gallery',$val->ID) as $k=>$v) : ?>
		  								
										<li>
											<img src="<?php echo $v['sizes']['large']; ?>" />  
										</li>

									<?php endforeach; ?>  
								</ul>
								<div class="flexslider-nav"> 
									<div href="prev" class="prev"><</div>
									<div href="next" class="next">></div>
								</div>
							</div> 
						</section> 

						<button class="button-red next-button" id="<?php echo $val->ID; ?>">
							Pick this Model
							<span>→</span>
						</button> 
						
					</div>	
				</div>
				<?php endforeach; ?>  

			</div>
			
		</div>
	</div> 
</div>
