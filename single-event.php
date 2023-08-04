<?php get_header( ); ?>
<div class="container my-5">
  <!--Section: Content-->
  <section class="">
    <!-- Section heading -->
    <h3 class="text-center font-weight-bold mb-5">Latest news</h3>
    <div class="row">
        
                  <!--Grid column-->
                  <div class="col-md-12 mb-12">

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
                        <h4 class="card-title"><strong><?php the_title();?></strong></h4>
                        <h6 class="card-title"><div class="row">
                          <div class="col-md-6">
                           <?php the_field('location'); ?>
                          </div>
                          <div class="col-md-6">
                          <?php the_field('data'); ?>
                          </div>
                        </div></h6>
                        <hr>
                        <!--Text-->
                        <p class="card-text mb-3"><?php the_content();?></p>

                        <p class="font-small font-weight-bold dark-grey-text mb-1"><i class="far fa-clock-o">
                        <?php 
                          $archive_year  = get_the_time( 'Y' ); 
                          $archive_month = get_the_time( 'm' ); 
                          $archive_day   = get_the_time( 'd' ); 
                          ?>
                          <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
                        
                        <?php echo get_the_date(); ?> </a></i></p>
                        <p class="font-small grey-text mb-0"><?php echo get_the_author(  );?></p>

                      </div>
                      <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                  </div>
                  <!--Grid column--> 
             
   </div>
   
   </div>

</section>
<!--Section: Content-->

<?php get_footer( ); ?>