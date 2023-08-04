<?php get_header(); ?>
<?php
$s=get_search_query();
$args = array(
    's' =>$s
            );
    // The Query
$the_query = new WP_Query( $args );
if($the_query->have_posts()){
while($the_query->have_posts()){
    $the_query->the_post();
?>
  
             <h2 class="post-title"><a href="<?php the_permalink(  );?>"><?php the_title(); ?></a></h2>
              <p> <?php echo get_the_author_posts_link();?></p>
              <p><a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>" class="entry-date"><?php the_time('F j, Y') ?></a></p>
                <?php echo the_post_thumbnail();?>
                <?php the_category( ); ?>
                <p><?php the_excerpt();?></p>
                <button> <a href="<?php the_permalink(); ?>">Read More</a></button>

<?php 
}
}else{
    ?>
    <h2>There is nothing to show here </h2>
<button><a href="<?php echo site_url();?>">Go Back To home</a>  </button>
    <?php   
}
?>
<?php get_footer();?>