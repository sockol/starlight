<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package web2feel
 */

get_header(); ?>
 

<div class="container">	
	<div class="row">

	<div id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

			<section class="container blog error-404 not-found">	   
				<div class="wrap"> 

					<header class="pages-header">
						<h1> 
							404 
							<p> Page not found </p> 
						</h1> 
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'web2feel' ); ?></p>
					</div><!-- .page-content -->
				</div><!-- .wrap -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
	</div>
</div>
<?php get_footer(); ?>