<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 * 
 */

$left_menu = array(
    'menu'            => 'Top Left Menu',
    'container'       => false,
    'container_class' => '',
    'container_id'    => '',
    'menu_class'      => '',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'Top Left Menu',
    'before'          => '',
    'after'           => '', 
    'items_wrap'      => '%3$s',
    'depth'           => 0,
    'walker'          => ''
); 

$right_menu = array(
    'menu'            => 'Top Right Menu',
    'container'       => false,
    'container_class' => 'right',
    'container_id'    => '',
    'menu_class'      => 'right',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'Top Right Menu',
    'before'          => '',
    'after'           => '', 
    'items_wrap'      => '%3$s',
    'depth'           => 0,
    'walker'          => ''
); 
?>
</div>
<!-- #content -->
</main>
<!-- .site-wrap -->
<footer class="site-footer">
	<div class="cap">
		<ul class="footer-nav">
    		<?php wp_nav_menu( $left_menu ); ?> 
    		<?php wp_nav_menu( $right_menu ); ?> 
        </ul>
        <span>Wilko Properties © <?php echo date("Y"); ?></span>
	</div>
</footer>
<!-- #colophon .site-footer -->
<?php wp_footer(); ?>
</div>
<!-- #page --> 

</body>
</html>