<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays Wholesale page
 *
 * @package web2feel
 */

get_header(); ?> 
<div class="container single">	 
	   
	
	<?php while ( have_posts() ) : the_post(); ?>
	<?php
	$image = get_the_post_thumbnail(get_the_ID(),'large');
	if(!$image)
		$image = ot_get_option( 'default_image_single'); 
	
	$id = 1405; 
	$subtitle = get_field('the_story_sub_title',$id); 
	$signature = get_field('the_story_signature',$id); 
	$signature = $signature['url'];  
	$sidebox_title = get_field('the_story_sidebox_title',$id); 
	$sidebox_date = get_field('the_story_sidebox_date',$id); 
	$sidebox_text = get_field('the_story_sidebox_text',$id); 
	$bubble_text = get_field('the_story_sidebox_bubble_text',$id); 
	$sidebox_image = get_field('the_story_sidebox_image',$id);
	$sidebox_image = $sidebox_image['url'];  
	?>
		<article> 
			<div class="image-wrapper"> 
				<img src="<?php echo $image ?>"/> 
			</div>	
			<div class="text">
				<div class="left" style="display:none;">
					<div>
						<h4><?php echo $sidebox_title; ?></h4>
						<div class="wrap"> 
							<div class="date">
								<?php echo $sidebox_date; ?>
							</div>
							<div class="text-wrap">
								<?php echo $sidebox_text; ?> 
								<div class="story-bubble">
									<div class="circle-icon">
										<div class="circle-icon">
											<div style="background-image:url('<?php echo $sidebox_image; ?>');">
												<span>
													<?php echo $bubble_text; ?>
												</span>
											</div> 
										</div>
									</div>
								</div>
							</div>
						</div> 
					</div>
				</div> 
				<div class="right">
					<h1><?php the_title(); ?></h1>
					<div><?php the_content(); ?></div>
					<img src="<?php echo $signature; ?>" class="image">
				</div> 
			</div> 
		</article>

	<?php endwhile; ?>   
</div>
<?php get_footer(); ?>
