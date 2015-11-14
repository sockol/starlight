<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package web2feel
 */
get_header(); ?>
   
<div class="promo">
	<div class="promo-wrap">
		<div class="delivery" id="popup-info">
			<img class="icon" src="<?php echo get_template_directory_uri(); ?>/images/delivery.png"> 
			<h2>Бесплатная доставка</h2>
			<span>Бесплатная доставка по москве на покупки выше 9900 РУБ</span>
			<div class="info-box" 
				 data-title="Бесплатная доставка" 
				 data-img="<?php echo get_template_directory_uri(); ?>/images/delivery.png"
				 data-subtitle="Бесплатная доставка по москве на покупки выше 9900 РУБ"
				 data-body="доставка курьером в регионы россии 300<i class='fa fa-ruble'></i> <br> 
				 доставка заказа по москве на сумму меньше 9900<i class='fa fa-ruble'></i> стоит 300<i class='fa fa-ruble'></i>">
				 подробнее
			</div>
		</div>
		<div class="discount" id="popup-info">
			<img class="icon" src="<?php echo get_template_directory_uri(); ?>/images/discount.png"> 
			<h2>Скидка 10% </h2>
			<span>
				Скидка 10% на вторую покупку владельцам дисконтной карты нашего магазина 
			</span>
			
			<div class="info-box" 
				 data-title="скидка 10%" 
				 data-img="<?php echo get_template_directory_uri(); ?>/images/discount.png"
				 data-subtitle="владельцам дисконтной карты нашего магазина"
				 data-body="Скидка 10% на вторую покупку владельцам дисконтной карты нашего магазина - о подробностях спросите курьера ">
				 подробнее
			</div>
		</div>
		<div class="wholesale" id="popup-info">  
			<img class="icon" src="<?php echo get_template_directory_uri(); ?>/images/wholesale.png"> 
			<h2>Подарки</h2>
			<span>
				При покупке 2 или более пачек 3D Crest White прилагается подарок 
			</span>
			
			<div class="info-box"  
				 data-title="Подарки" 
				 data-img="<?php echo get_template_directory_uri(); ?>/images/wholesale.png"
				 data-subtitle="Подарки при покупке 2 или более"
				 data-body="При покупке 2 или более пачек 3D Crest White прилагается подарок: <br> 
				 - <a href='<?php echo get_permalink(267); ?>'>Зубная Паста Crest 3D White Luxe Glamorous White</a><br>
				 - <a href='<?php echo get_permalink(267); ?>'>Отбеливающие полоски Crest 3D White 1hr Express</a>">
				 подробнее
			</div>
		</div>
	</div>
</div>
<div class="info body-info">
	<div class="info-wrap">
		<div>
			<i class="fa fa-mobile"></i>
			<span class="num"><?php echo ot_get_option('national_phone'); ?>
			</span>
			<span class="city">Регионы</span>
			<p class="ml70">
				<?php echo ot_get_option('national_phone_text'); ?>
			</p>
		</div>
		<div>
			<i class="fa fa-phone"></i>
			<span class="num"><?php echo ot_get_option('moscow_phone'); ?>
			</span>
			<span class="city">Москва</span>
			<p class="ml70">
				<?php echo ot_get_option('moscow_phone_text'); ?>
			</p>
		</div>
	</div>
</div>
<div class="products">
	<?php echo do_shortcode('[featured_products per_page="12" columns="4"]'); ?>
</div>
<div class="address">
	<div class="address-wrap-content">
		<h2>Живете в москве недалеко от нашего офиса?</h2>
		<h4>Вы можете в любой момент ознакомиться с нашим ассортиментом</h4>
		<div class="box">
			<div class="left">
				 СУТКАМИ В ОФИСЕ ПО АДРЕСУ
			</div>
			<div class="right">
				<p>
					<?php echo ot_get_option('office_address'); ?>
				</p>
				<a href="tel:<?php echo ot_get_option('moscow_phone'); ?>:"><?php echo ot_get_option('moscow_phone'); ?>
				</a>
				<a href="tel:<?php echo ot_get_option('national_phone'); ?>:"><?php echo ot_get_option('national_phone'); ?>
				</a>
				<div class="socials">
					<a href="<?php echo ot_get_option('instagram'); ?>"><i class="fa fa-instagram"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="address-wrap-images">
		<img class="address-map" src="<?php echo get_template_directory_uri(); ?>/images/map-address.png">
	</div>
</div>
<!--end index content-->
<?php get_footer(); ?>