<?php
require_once(get_theme_file_path( '/inc/themepo-customizer.php' ));

  /* Theme Setup  */
function myfirsttheme_setup() {
/* Menu Register */
register_nav_menus( array(
    'main_menu' => __('Main Menu ', 'themepo'),
) );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'myfirsttheme_setup' );
/* Enqueue Assets */
function add_theme_scripts() {

   /* Google Web Fonts */
	wp_enqueue_style( 'gfonts', 'https://fonts.googleapis.com' );
	wp_enqueue_style( 'gfont', 'https://fonts.gstatic.com' );
	wp_enqueue_style( 'gapis', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap' );

   /*  <!-- Icon Font Stylesheet --> */
	wp_enqueue_style( 'fontsawsome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css' );
	wp_enqueue_style( 'bootstrap-icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css' );
   
   /* <!-- Libraries Stylesheet --> */
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/lib/animate/animate.min.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'owlcarousel', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/lib/lightbox/css/lightbox.min.css', array(), '1.1', 'all' );

    /*<!-- Customized Bootstrap Stylesheet --> */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.1', 'all' );

   /* <!-- Template Stylesheet --> */
	wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/css/style.css', array(), '1.1', 'all' );
    wp_enqueue_style( 'style', get_stylesheet_uri() );


    /* <!-- JavaScript Libraries --> */
	wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js' );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/lib/wow/wow.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/lib/easing/easing.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/lib/waypoints/waypoints.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/lib/counterup/counterup.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/lib/lightbox/js/lightbox.min.js', array( 'jquery' ), 1.1, true );

    /*<!-- Template Javascript --> */
	wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), 1.1, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

   


/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'right sidebar',
		'id'            => 'home_right',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );


/**
 * Register a custom post type called "event".
 *
 * @see get_post_type_labels() for label keys.
 */
function custom_post_type_registers() {
	$labels = array(
		'name'                  => _x( 'events', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'event', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'events', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'event', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New event', 'textdomain' ),
		'new_item'              => __( 'New event', 'textdomain' ),
		'edit_item'             => __( 'Edit event', 'textdomain' ),
		'view_item'             => __( 'View event', 'textdomain' ),
		'all_items'             => __( 'All events', 'textdomain' ),
		'search_items'          => __( 'Search events', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent events:', 'textdomain' ),
		'not_found'             => __( 'No events found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No events found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'event Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'event archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into event', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this event', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter events list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'events list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'events list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'event' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt',  ),
	);

	register_post_type( 'event', $args );
}

add_action( 'init', 'custom_post_type_registers' );

/*
**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function book_post_type_registers() {
	$labels = array(
		'name'                  => _x( 'books', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'book', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'books', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'book', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New book', 'textdomain' ),
		'new_item'              => __( 'New book', 'textdomain' ),
		'edit_item'             => __( 'Edit book', 'textdomain' ),
		'view_item'             => __( 'View book', 'textdomain' ),
		'all_items'             => __( 'All books', 'textdomain' ),
		'search_items'          => __( 'Search books', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent books:', 'textdomain' ),
		'not_found'             => __( 'No books found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter events list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt',  ),
	);

	register_post_type( 'book', $args );
}

add_action( 'init', 'book_post_type_registers' );

/**
 *	ACF Admin Columns
 *
 */

 function add_acf_columns ( $columns ) {
	return array_merge ( $columns, array ( 
	  'location' => __ ( 'Event Location' ),
	  'data'   => __ ( 'Event Date' ) 
	) );
  }
  add_filter ( 'manage_event_posts_columns', 'add_acf_columns' );

   /*
 * Add columns to Hosting CPT
 */
 function hosting_custom_column ( $column, $post_id ) {
	switch ( $column ) {
	  case 'location':
		echo get_post_meta ( $post_id, 'location', true );
		break;
	  case 'data':
		echo get_post_meta ( $post_id, 'data', true );
		break;
	}
 }
 add_action ( 'manage_event_posts_custom_column', 'hosting_custom_column', 10, 2 );


  /*
 * Add Sortable columns
 */

function my_column_register_sortable( $columns ) {
	$columns['location'] = 'location';
	$columns['data'] = 'data';
	return $columns;
}
add_filter('manage_edit-event_sortable_columns', 'my_column_register_sortable' );


/**
 * Register a 'genre' taxonomy for post type 'book'.
 *
 * @see register_post_type for registering post types.
 */
function event_category() {
	register_taxonomy( 'event_category', 'event', array(
		'label'        => __( 'Category', 'themepo' ),
		'rewrite'      => array( 'slug' => 'event_category' ),
		'hierarchical' => true,
		'public' => true,
		
	) );
}
add_action( 'init', 'event_category', 0 );



class My_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'my-widget',  // Base ID
			'My Widget'   // Name
		);
		add_action( 'widgets_init', function() {
			register_widget( 'My_Widget' );
		});
	}
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
			echo $args['before_title'];
			echo $instance['title'];
			echo $args['after_title'];
			echo '<p>'. $instance['desc'].'</p>';
		echo $args['after_widget'];
		
	}

	public function form( $instance ) {
		$title = $instance['title'];
		$desc = $instance ['desc'];
		
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input type="text" name="<?php echo $this->get_field_name ('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('desc'); ?>">Description</label>
			<textarea name="<?php echo $this->get_field_name('desc');?>" id="<?php echo $this->get_field_id('desc'); ?>" value="<?php echo $desc; ?>" class="widefat"> </textarea>

			
		</p>

		<?php
	}


}
$my_widget = new My_Widget();


// Wordpress Recent Posts

class Recent_Posts extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'recent-post-widget',  // Base ID
			'Recent Posts Widget'   // Name
		);
		add_action( 'widgets_init', function() {
			register_widget( 'Recent_Posts' );
		});
	}
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
			echo $args['before_title'];
			echo $instance['title'];
			echo $args['after_title'];


		    $arg = array(
				'post_type' => 'post',
				'posts_per_page' => $instance['count'],
				'order_by' => $instance['order'],

			);

			$query = new WP_Query($arg);

			while($query->have_posts(  )){
				$query->the_post(  );
				?>
				
					<div class="single-post">
						<img src="<?php the_post_thumbnail_url(); ?>" alt="">
						<div class="post-content">
							<h4><a href="<?php the_permalink( );?>"> <?php  the_title() ; ?></a></h4>
							<p><?php the_date();?></p>
						</div>
					</div>
				



				<?php
			}
			echo wp_reset_postdata(  );

		echo $args['after_widget'];
		
	}

	public function form( $instance ) {
		$title = $instance['title'];
		$count = $instance['count'];
		$order = $instance['order'];


		
		
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Recent Post Title </label>
			<input type="text" name="<?php echo $this->get_field_name ('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>">Total Posts </label>
			<input type="text" name="<?php echo $this->get_field_name ('count'); ?>" id="<?php echo $this->get_field_id('count'); ?>" value="<?php echo $count; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('order'); ?>">Order By </label>
			<select name="<?php echo $this->get_field_name('order'); ?>" id="<?php echo $this->get_field_id('order'); ?>">
				<option value="'DESC'<?php echo ($order=='DESC')?'selected':''; ?>">DESC</option>
				<option value="'ASCE'<?php echo ($order=='ASCE')?'selected':''; ?>">ASCE</option>
			</select>
			
		</p>

		<?php
	}


}
$my_widget = new Recent_Posts();



/**
 * Used by hook: 'customize_preview_init'
 * 
 * @see add_action('customize_preview_init',$func)
 */

function themepo_customizer_live_preview(){

	wp_enqueue_script( 'themepo-livepre', get_template_directory_uri().'/js/customizer.js',array( 'jquery','customize-preview' ),'',	true);
}
add_action( 'customize_preview_init', 'themepo_customizer_live_preview' );


/**
 * Liver Preview CSS
 */

function mytheme_customize_css()
{
    ?>
         <style type="text/css">
            .contentpost h1 { color: <?php echo get_theme_mod('header_color', '#000'); ?>; }
         </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');





/**
 * STEP 01 :  Custom Metabox Register 
 */
function book_metabox(){
	add_meta_box('book_meta', __('Book Meta Box' ,'themepo'), 'book_callback','book', 'advanced','high' );
}
add_action('add_meta_boxes','book_metabox');



/**
 *STEP 02 :  call back function call for getting field 
 */
function book_callback(){
	?>

	<p>
		<label for="author">Author Name : </label>
		<input type="text" name="author" id="author" value="<?php echo get_post_meta(get_the_ID() , 'author', true) ?>" class="widefat">
	</p>

	<p>
		<label for="price">Book Price : </label>
		<input type="text" name="price" id="price" value="<?php echo get_post_meta(get_the_ID() , 'price', true) ?>" class="widefat">
	</p>
	<?php
}

/**
 *STEP 03 :  Save Data into field 
 */

 function book_data_save(){
	update_post_meta( get_the_ID(), 'author', $_POST['author'] );
	update_post_meta( get_the_ID(), 'price', $_POST['price'] );

 }
 add_action( 'save_post', 'book_data_save' );

