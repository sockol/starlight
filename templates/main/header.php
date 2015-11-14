<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package web2feel
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
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>  
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
	<meta charset="<?php bloginfo( 'charset' ); ?>"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<title><?php wp_title(  ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	   
	<?php wp_head(); ?>
</head>
<script>
    home = "<?php echo is_home(); ?>";
    sitename = "<?php echo get_bloginfo('name'); ?>";
    path = "<?php echo get_template_directory_uri(); ?>";
    admin = "<?php echo admin_url('admin-ajax.php');?>";
</script>
<body <?php body_class(); ?>>
    
<div id="page" class="hfeed site">
	 
    <!-- The menu -->
    <nav id="mmenu" class="mmenu">
	    <ul>


            <?php //wp_nav_menu( $left_menu ); ?>
            <?php //wp_nav_menu( $right_menu ); ?>

	        <!-- <li>
	            <a href="/">
	                <i class="fa fa-home"></i> Главная
	            </a>
	        </li>

	        <li>
	            <a href="">
	                <i class="fa fa-book"></i> Каталог
	            </a>
	            <ul>
	                <li>
	                    <a href="">
							Все товары
						</a>
	                </li> 
	            </ul>
	        </li>
	        <li class="dropdown">
	            <a href="#">
	                <i class="fa fa-check"></i> полезные ссылки
	            </a>

	            <ul>

	                <li>
                        <a href="/">
                            <i class="fa fa-question"></i> Часто Задаваемые Вопросы
                        </a>
	                </li> 
	            </ul>
	        </li> -->
 
	    </ul>
	</nav>
 

	<!-- normal menu -->
    <nav class="navbar-default navigation nav <?php if(is_home() || is_front_page() || in_array(get_the_id(),array(21,26))) echo 'transparent'; ?>" id="navbar">
        
        <div class="wrap mobile" id="mobile">
            <div id="menu-mobile-button" class="mmenu-button"> 
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>

            <a href="/" class="logo-mobile">   
                <?php //echo ot_get_option( 'gen_compay_name' ); ?>
            </a>
        </div>
        <div class="wrap stationary" id="hilight"> 
            <ul>
 				<li class="left">
 					<ul>
 						
	                    <li class="left menu-item-type-custom menu-item-object-custom <?php if(is_home()) echo 'current-menu-item current_page_item'; ?>">
	                        <a href="/"> 
	                            Home
	                        </a>
	                    </li> 
                		<?php wp_nav_menu( $left_menu ); ?> 
                	</ul>
                </li>

                <li class="logo">
                    <a href="/">
                        <img class="normal" src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
                        <img class="white" src="<?php echo get_template_directory_uri(); ?>/images/logo-transparent.png">
                        <div class="triangle">▼</div>
                    </a>
                </li>  
  
 				<li class="right">
 					<ul>
               			<?php wp_nav_menu( $right_menu ); ?>
                	</ul>
                </li>
  
            </ul>
        </div>
    </nav> 

	<main id="content" class="content">
		<div class="wrap">
			
			