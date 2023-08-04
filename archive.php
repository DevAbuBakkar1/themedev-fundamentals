<?php get_header( ); ?>

<div class="blog-header">
  <h2>Archive Name: <?php single_cat_title();?></h2>
</div>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-8">
        <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
            the_post(); 
            ?>
        
                 <h2 class="post-title"><a href="<?php the_permalink(  );?>"><?php the_title(); ?></a></h2>
                <h5 class="post-meta"><span><a href="<?php get_the_author_url( ); ?> "><?php the_author( );?></a></span> <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>" class="entry-date"><?php the_time('F j, Y') ?></a></h5>
                <?php echo the_post_thumbnail();?>
                <?php the_category( ); ?>
                <p><?php the_content();?></p>
            <?php
            } 
        } 
        ?>
        </div>
        <div class="col-md-4">
        <?php if ( is_active_sidebar( 'home_right' ) ) : ?>
            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'home_right' ); ?>
            </div><!-- #primary-sidebar -->
        <?php endif; ?>
        </div>
   </div>
 </div>

   


<?php get_footer(); ?>
