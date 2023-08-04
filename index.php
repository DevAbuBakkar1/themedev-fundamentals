<?php get_header( ); ?>

<div class="blog-header">
  <h2>Search Posts </h2> 
  <p><?php echo  get_search_form(); ?></p>
</div>

<div class="container my-5">
  <!--Section: Content-->
  <section class="">
    <!-- Section heading -->
    <h3 class="text-center font-weight-bold mb-5">Latest news</h3>
    <div class="row">
        <?php 
        $args = array(
          'post_type' => 'event',
          'post_per_page' => '3',
        );
        $query = new WP_Query($args);
          if (  $query->have_posts() ) {
            while ( $query-> have_posts() ) {
              $query->the_post(); 
              ?>
                  <!--Grid column-->
                  <div class="col-md-4 mb-4">

                    <!--Card-->
                    <div class="card">

                      <!--Card image-->
                      <div class="view overlay">
                      <?php echo the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top'] );?>
                        <a>
                          <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                      </div>
                      <!--/.Card image-->

                      <!--Card content-->
                      <div class="card-body">
                        <!--Title-->
                        <h4 class="card-title"><strong><a href="<?php the_permalink(); ?>"><?php the_title();?></a></strong></h4>
                        <h6 class="card-title"><div class="row">
                          <div class="col-md-4">
                           <?php the_field('location'); ?>
                          </div>
                          <div class="col-md-4">
                          <?php the_field('data'); ?>
                          </div>
                          <div class="col-md-4">
                          <?php 
                             $terms = get_the_terms( get_the_ID(  ), 'event_category');
                             foreach ( $terms as $term){
                              $term_link = get_term_link( $term );
                             ?>
                             <a href="<?php echo $term_link;?>"> <?php echo $term->name; ?></a>
                             <?php } ?>
                          </div>
                        </div></h6>
                        <hr>
                        <!--Text-->
                        <p class="card-text mb-3"><?php the_excerpt();?></p>

                        <p class="font-small font-weight-bold dark-grey-text mb-1"><i class="far fa-clock-o">
                        <?php 
                          $archive_year  = get_the_time( 'Y' ); 
                          $archive_month = get_the_time( 'm' ); 
                          $archive_day   = get_the_time( 'd' ); 
                          ?>
                          <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
                        <?php echo get_the_date(); ?> </a></i></p>
                        <p class="font-small grey-text mb-0"><?php echo get_the_author_posts_link();?></p>
                        <p class="text-right mb-0 font-small font-weight-bold"><a href="<?php the_permalink( );?>">read more</a> <i class="fas fa-angle-right"></i></a></p>
                      </div>
                      <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                  </div>
                  <!--Grid column--> 
              <?php
            } 
        } 
        
      ?>

       <div class="col-md-4">
        <?php if ( is_active_sidebar( 'home_right' ) ) : ?>
            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'home_right' ); ?>
            </div><!-- #primary-sidebar -->
        <?php endif; ?>
        </div>
   </div>
   
   </div>

</section>
<!--Section: Content-->
</div>

   
 </div>
</div>



<?php get_footer( ); ?>