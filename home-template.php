<?php 

/**
 * Template Name: Home Template 
 */
?>

<?php get_header( ); ?>
    
     <!--  Hero Section -->
    <?php get_template_part( 'template-parts/content','hero' ); ?>

    <!-- Facts Section  -->
    <?php get_template_part( 'template-parts/content','facts' ); ?>

    <!-- About Section  -->
    <?php get_template_part( 'template-parts/content','about' ); ?>

    <!-- Services Section  -->
    <?php get_template_part( 'template-parts/content','services' ); ?>

    <!-- Features Section  -->
    <?php get_template_part( 'template-parts/content','features' ); ?>

    <!-- Our Projects Section  -->
    <?php get_template_part( 'template-parts/content','projects' ); ?>

    <!-- Our Team Section  -->
    <?php get_template_part( 'template-parts/content','team' ); ?>

  
    <!-- Testimonials Section  -->
    <?php get_template_part( 'template-parts/content','testimonials' ); ?> 

<?php get_footer(); ?>