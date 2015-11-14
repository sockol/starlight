<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?> 

 
<section class="cap global-description">
	<div>
		<h2>
			<?php the_title(); ?>
		</h2>
		<span class="underline"></span>
		<p>
			<?php the_content(); ?> 
		</p>
		<a href="#land" id="start-quote" class="button-red">Start Your Quote</a>

		<div class="quote-breadcrumb breadcrumb">
			<div class="land current">Land Plot</div>
			<div class="model">Model</div>  
			<div class="facade">Facade</div>
			<div class="settings">Preferences</div>
		</div>  

	</div>
</section>


<section class="quote-icons" id="quote-icons">
	<h2>
		How does it work?
	</h2>
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



<?php endwhile; ?>

<?php get_footer(); ?> 
