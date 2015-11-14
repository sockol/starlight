<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?> 

<section class="cap project">
	<div>
		<h1>
			<?php the_title(); ?>
		</h1> 
		<p>
			<?php the_content(); ?> 
		</p>
	</div>
</section> 

<?php endwhile; ?>

<?php get_footer(); ?> 
