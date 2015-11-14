<?php

/**
 * The Sidebar containing the main widget areas.
 *
 * @package web2feel
 */

?>
<aside class="sidebar" id="sidebar">
    <section>
        <h2>полезные ссылки</h2>
        <div>
            <?php $type = get_post_type_object('faq-posts'); ?>
            <a href="/<?php echo $type->rewrite['slug']; ?>">
                <i class="fa fa-question"></i> часто задаваемые вопросы
            </a>  
        </div>
        <div>
            <?php $type = get_post(295); ?>
            <a href="<?php echo get_the_permalink($type->ID); ?>">
                <i class="fa fa-quote-left"></i> <?php echo $type->post_title; ?>
            </a>  
        </div>
        <div>
            <?php $type = get_post(381); ?>
            <a href="<?php echo get_the_permalink($type->ID); ?>">
                <i class="fa fa-bar-chart"></i> <?php echo $type->post_title; ?>
            </a>  
        </div>  
        <div>
            <?php $type = get_post(388); ?>
            <a href="<?php echo get_the_permalink($type->ID); ?>">
                <i class="fa fa-bar-chart"></i> <?php echo $type->post_title; ?>
            </a>  
        </div>  
        <div>
            <?php $type = get_post(384); ?>
            <a href="<?php echo get_the_permalink($type->ID); ?>">
                <i class="fa fa-random"></i> <?php echo $type->post_title; ?>
            </a>  
        </div>  
        <div> 
            <a href="<?php echo ot_get_option('instagram'); ?>">
                <i class="fa fa-instagram"></i> наша страница на Instagram
            </a>  
        </div>  
    </section>
</aside>

