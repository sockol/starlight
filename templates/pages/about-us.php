<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
<section class="page-about-us">
	<div class="crop">
		<div class="overlay"></div>
		<h1><?php the_title(); ?></h1>
		<img src="<?php the_image(get_the_ID()); ?>">
	</div>
	<div class="pull">
		<?php the_content(); ?>
	</div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?> 
