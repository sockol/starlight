<?php
$page = get_page( 41 )
?>
<?php get_header(); ?>


<section class="cap global-description">
	<div>
		<h1>
			<?php echo $page->post_title; ?>
		</h1>
		<span class="underline"></span>
		<p>
			<?php echo $page->post_content; ?> 
		</p>
		<a href="#start" class="button-red">Start Your Quote</a>
	</div>
</section>
<section class="projects">
	<div class="cap wrap">

		<?php while(have_posts()): the_post(); ?> 
			<div>
				 <?php the_title(); ?>
				 <?php the_excerpt(); ?>
			</div> 
		<?php endwhile; ?>

	</div>
</section> 

<?php get_footer(); ?> 
