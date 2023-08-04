<?php get_header( ); ?>

<div class="blog-header">
  <h2>Author Page</h2>
</div>

<div class="blog-row">
  <div class="leftcolumn">
    <div class="blog-card">
    <?php 
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post(); 
          ?>
           <div class="container">
            <div class="col-md-4">

            <h2 class="post-title"><a href="<?php the_permalink(  );?>"><?php the_title(); ?></a></h2>
                <h5 class="post-meta"><span><a href="<?php get_the_author_url( ); ?> "><?php the_author( );?></a></span><span> <?php the_date();?></span></h5>
                <?php echo the_post_thumbnail();?>
                <?php the_category( ); ?>
                <p><?php the_excerpt();?></p>
                <button> <a href="<?php the_permalink(); ?>">Read More</a></button>


              </div>
            </div>
          <?php
        } 
     } 
     
      ?>
   
 </div>
  </div>
  <div class="rightcolumn">
    <div class="blog-card">
      <h2>About Me</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div>
    <div class="blog-card">
      <h3>Popular Post</h3>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div>
    </div>
    <div class="blog-card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
  </div>
</div>

<?php get_footer(); ?>
