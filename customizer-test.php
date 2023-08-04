<?php 
/**
 * Template Name: Customizer Test 
 */

?>
<?php get_header( ); ?>
    <div class="conatainer">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="contentpost">
                    <?php 
                    if(get_theme_mod('checkbox_setting')){
                        ?>
                    <h1><?php echo get_theme_mod('banner_heading');?></h1>
                    <?php
                    }
                    ?>
                    
                    <p><?php echo get_theme_mod('banner_desc');?></p>
                    <button><a href="<?php echo get_theme_mod('banner_btn_link_setting');?>"><?php echo get_theme_mod('banner_btn_setting');?></a></button>
                    <img src="<?php echo get_theme_mod('banner_image_setting');?>" alt="">
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <?php get_footer(); ?>