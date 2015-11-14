<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package web2feel
 */

get_header(); ?> 
<div class="page-head">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3> <?php the_title(); ?> </h3>
				<p> </p>
			</div>
			
		</div>
	</div>
</div>
<div class="page-image">
	<?php the_post_thumbnail('large'); ?>
</div>
<div class="container">	
	<div class="row">
		<div id="primary" class="content-area col-sm-8">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					
					<div class="page-text">
						<h2><?php the_field('page_title'); ?></h2>
						<div><?php the_content(); ?></div> 
					</div> 
					
				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	 
	</div>
</div>
<?php get_footer(); ?>
