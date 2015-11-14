<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package web2feel
 */

get_header(); ?>

<div class="container blog">	 
	
	<div class="archives-head"> 
		<h3>
			<?php
				if ( is_category() ) :
					single_cat_title();

				elseif ( is_tag() ) :
					single_tag_title();

				elseif ( is_author() ) :
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					*/
					the_post();
					printf( __( 'Author: %s', 'web2feel' ), '<span class="vcard">' . get_the_author() . '</span>' );
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();

				elseif ( is_day() ) :
					printf( __( 'Day: %s', 'web2feel' ), '<span>' . get_the_date() . '</span>' );

				elseif ( is_month() ) :
					printf( __( 'Month: %s', 'web2feel' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

				elseif ( is_year() ) :
					printf( __( 'Year: %s', 'web2feel' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

				elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
					_e( 'Asides', 'web2feel' );

				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
					_e( 'Images', 'web2feel');

				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
					_e( 'Videos', 'web2feel' );

				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
					_e( 'Quotes', 'web2feel' );

				elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
					_e( 'Links', 'web2feel' );

				else :
					_e( 'Archives', 'web2feel' );

				endif;
			?>

		</h3>
		<p> Archive pages </p> 
	</div>
	<?php 
	if ( get_query_var('paged') )
	    $paged = get_query_var('paged');
	elseif ( get_query_var('page') )
	    $paged = get_query_var('page');
	else
	    $paged = 1;

	$wp_query = new WP_Query(array(
		'posts_per_page'=>10,
		'post_type' => array('post') ,  
    	'category_name' => single_cat_title('',false),
        'order'=>'ASC',   
		'posts_per_page' => 10, 
		'paged' => $paged 
	));
	?>
	<?php if ( $wp_query->have_posts() ) : ?>

	<div class="wrap">
		<div class="wrap-left">
			<div class="widget-area-custom">
				<select id="blog-category">
				<?php 

				$args = array(
					'type'                     => 'blog',
					'child_of'                 => 0,
					'parent'                   => '',
					'orderby'                  => 'name',
					'order'                    => 'ASC',
					'hide_empty'               => 1,
					'hierarchical'             => 0,
					'exclude'                  => '',
					'include'                  => '',
					'number'                   => '',
					'taxonomy'                 => 'category',
					'pad_counts'               => false  
				); 
				$rows = get_categories( $args ); 
				foreach ($rows as $key => $value) :
					
					$name = $value->name;
					$slug = $value->slug;
					echo "<option value='".get_site_url()."/category/".$slug."'>".$name."</option>";

				endforeach;
				?>
				</select>
				<select id="blog-archive" onchange="document.location.href=this.options[this.selectedIndex].value;">
				<?php 

				$args = array(
					'type'            => 'yearly',
					'limit'           => '',
					'format'          => 'option', 
					'before'          => '',
					'after'           => '',
					'show_post_count' => false,
					'echo'            => 1,
					'order'           => 'DESC' 
				); 
				wp_get_archives( $args ); 
				 
				?>
				</select>
			</div>
		<?php $counter = 0; while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					
			<?php
			$image = get_the_post_thumbnail(get_the_ID(),'medium');
			if(!$image)
				$image = ot_get_option( 'default_image_template'); 
			?>
			<article <?php if($counter==0) echo 'class="article-hide-background"'; ?>>
				<div class="left">		
					<img src="<?php echo $image ?>"/> 
				</div>
				<div class="right">
					<h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?> 
				</div> 
			</article>

		<?php $counter ++; endwhile; ?> 
		</div>
		<div class="wrap-right">
			<?php get_sidebar(); ?>
		</div>
		<ul class="pagination-links"> 
			<?php 
				$prev = get_previous_posts_link( '«', $wp_query->max_num_pages ); 
				$next = get_next_posts_link( '»', $wp_query->max_num_pages ); 
			?> 
	        <li><?php echo $prev; ?></li>  

	        <li>
	        <?php 
			$total = $wp_query->found_posts;
			$total = floor($total/10)+1; 
			echo $paged.' of '.$total;
			?>
	        </li> 
	 
	        <li><?php echo $next; ?></li>  
	    </ul> 
	<?php endif; ?> 
</div>
<?php get_footer(); ?>
