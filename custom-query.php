<?php 
/**
 * Template Name: Custom Query 
 */
?>
<?php get_header();?>
<?php 
    #----custom Query - 
  $args =  array(
    'post-type' => 'post',
     'post_per_page' => '10',
     'meta_compare' => '=',
      'meta_value' => '2',
      'meta_key' => 'order'


  );
  $query = new WP_Query( $args );

  #--- Post Loop ----
 if(  $query->have_posts()  ){
    while( $query->have_posts() ){
        $query->the_post();
        ?>
        <!-- Content Area -->
        <h2> <a href="<?php the_permalink( );?>"><?php the_title(); ?></a></h2>


    <?php 
    }
 }

 get_footer();
?>

