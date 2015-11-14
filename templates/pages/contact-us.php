<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
<section class="page-contact-us">
	<div class="crop">
		<div class="overlay"></div>
		<h1><?php the_title(); ?></h1>
		<img src="<?php the_image(get_the_ID()); ?>">
	</div>
	<div class="shadow-bottom">
		<?php echo do_shortcode('[contact-form-7 id="24" title="Contact Form"]'); ?>
	</div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?> 
