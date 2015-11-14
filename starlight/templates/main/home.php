<?php get_header(); ?>
<?php
$args = array(

	'post_type' => array('slides'),  
);  
?>

<section class="shadow-wrap">
	<div class="spinner"></div>
	<div class="flexslider" id="home-slider"> 
		
		<ul class="slides">

			<?php $query = new WP_Query( $args ); ?> 
			<?php while ($query->have_posts()) : $query->the_post(); ?>
	
				<li>
					<div class="img-wrap">
						<div class="overlay"></div>
						<img src="<?php the_image($query->ID); ?>" />	
					</div> 
					<h2>
						<span class="small"><?php the_title(); ?></span>
						<span class="big"><?php the_field("slides_subtitle"); ?></span>
						
					</h2>
				</li>
			<?php endwhile; ?>  
		</ul>
	</div> 
</section>

<section class="quote-icons">
	<h2>
		We will make it easy for you ton find your new home
	</h2>

	<a href="<?php echo get_permalink(36); ?>#land" class="button-red">Start Your Quote</a>

	<div class="cap wrap">
		<div>
			<div class="icon-land">
				<img src="<?php echo get_template_directory_uri(); ?>/images/quote-land.png">
				
			</div>
			<h3>Land Plot</h3>
			<p>Choose your land plot through a convenient interface</p>
		</div>
		<div>
			<div class="icon-model">
				<img src="<?php echo get_template_directory_uri(); ?>/images/quote-model.png">
				
			</div>
			<h3>Model</h3>
			<p>Choose your model through a convenient interface</p>
		</div>
		<div> 
			<div class="icon-facade">
				<img src="<?php echo get_template_directory_uri(); ?>/images/quote-facade.png">
				
			</div>
			<h3>Facade</h3>
			<p>Choose your facade through a convenient interface</p>
		</div> 
	</div>
</section>


<section class="cap who-we-are">
	<div>
		<h2>
			Who we are and what we do
		</h2>
		<span class="underline"></span>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed 
			do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
			nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
			reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
		</p>
	</div>
</section>



<section class="cap home-listings shadow-bottom">
	<div>
	<?php for($i=0;$i<4;$i++){ ?>
		<a class="home-listing" href="<?php echo get_permalink(); ?>">
			
			<div class="left crop">
				<img src="<?php echo get_template_directory_uri(); ?>/images/slider/1.jpeg">
			</div>
			<div class="right">
				<div class="text-wrap">

					<h2>Title of this house</h2>
					<span class="price">$870,000</span>
					<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed 
					do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>

					<span class="link">
						Go to property <span class="arrow">→</span>
					</span>

				</div>
			</div>
		</a>
	<?php } ?>
	</div>
</section>

<section class="cap home-contact">
	<div>
		<h2>Have questions for us?</h2>
		<a href="/" class="button-white">Go to contact form</a>
	</div>
</section>

<?php get_footer(); ?> 
