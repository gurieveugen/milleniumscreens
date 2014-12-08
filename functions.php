<?php
/*--------------------------------------------------------------------------------------------------*/
/*This is Wordpress Function file Please Do not Edit this if You Don't Have Good Knowledge About It.*/
/*--------------------------------------------------------------------------------------------------*/

/*
Enable Excerpt on Pages
*/

add_action('init', 'my_custom_init');

function my_custom_init() {
	add_post_type_support( 'page', 'excerpt' );
}



//Setup Thumbnails

function ms_setup(){
	add_editor_style();
	add_theme_support('post-thumbnails');
	add_image_size( 'admin-list-thumb', 80, 80, true);
}
add_action('after_setup_theme','ms_setup');


//
if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(
            array(
                'label' => 'Secondary Image',
                'id' => 'secondary-image',
                'post_type' => 'styles'
            )
        );
    }

//Custom Post Type Slideshow or Banner Content

function ms_slideshow_register() {

    $labels = array(
        'name' => _x('Banner Slideshow', 'post type general name'),
        'singular_name' => _x('Slideshow Item', 'post type singular name'),
        'add_new' => _x('Add New', 'slideshow item'),
        'add_new_item' => __('Add New Slideshow Item'),
        'edit_item' => __('Edit Slideshow Item'),
        'new_item' => __('New Slideshow Item'),
        'view_item' => __('View Slideshow Item'),
        'search_items' => __('Search Slideshow'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail'),
		'menu_icon' => get_template_directory_uri(). '/img/slideshow.png',
        'rewrite' => array('slug' => 'banner_slideshow', 'with_front' => FALSE)
      ); 

    register_post_type( 'banner_slideshow' , $args );
}

add_action('init', 'ms_slideshow_register');




//Copyright Text Editor or Customizer

function ms_customizer_menu() {
    add_theme_page( 'Customize', 'Customize', 'edit_theme_options','customize.php');
}
add_action( 'admin_menu', 'ms_customizer_menu' );

function ms_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'ms_section_one',
        array(
            'title' => 'Copyright Text',
            'description' => 'Please Insert the Copyright Text Here.',
            'priority' => 35,
        )
    );
	
	$wp_customize->add_setting(
		'copyright_textbox',
		array(
			'default' => '© Copyright 2013',
		)
	);
	$wp_customize->add_control(
		'copyright_textbox',
		array(
			'label' => 'Copyright text',
			'section' => 'ms_section_one',
			'type' => 'text',
		)
	);
}
add_action( 'customize_register', 'ms_customizer' );


//Widgets Initialization Here
function ms_widgets_init() {

	register_sidebar( array(
		'name' => 'Contact',
		'id' => 'contact',
		'before_widget' => '<div class="col-md-4">',
		'after_widget' => '</div></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>
        <div class="address">'
	) );
	register_sidebar( array(
		'name' => 'Quality Products',
		'id' => 'quality-products',
		'before_widget' => '<div class="col-md-4 product">',
		'after_widget' => '</a> </div>',
		'before_title' => '<h2><span></span>',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'name' => 'Colour Range',
		'id' => 'color-range',
		'before_widget' => '<div class="col-md-4 range">',
		'after_widget' => '</a> </div>',
		'before_title' => '<h2><span></span>',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'name' => 'Warranty',
		'id' => 'warranty',
		'before_widget' => '<div class="col-md-4 warrant">',
		'after_widget' => '</a> </div>',
		'before_title' => '<h2><span></span>',
		'after_title' => '</h2>'
	) );
}
add_action( 'widgets_init', 'ms_widgets_init' );	

//Gallery Custom Post Type
$gallery_labels = array(
	'name' => _x('Gallery', 'post type general name'),
	'singular_name' => _x('Gallery', 'post type singular name'),
	'add_new' => _x('Add New', 'gallery'),
	'add_new_item' => __("Add New Gallery"),
	'edit_item' => __("Edit Gallery"),
	'new_item' => __("New Gallery"),
	'view_item' => __("View Gallery"),
	'search_items' => __("Search Gallery"),
	'not_found' =>  __('No galleries found'),
	'not_found_in_trash' => __('No galleries found in Trash'), 
	'parent_item_colon' => ''
		
);
$gallery_args = array(
	'labels' => $gallery_labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'query_var' => true,
	'rewrite' => true,
	'hierarchical' => false,
	'menu_position' => null,
	'capability_type' => 'post',
	'supports' => array('title','editor','thumbnail'),
	'menu_icon' => get_bloginfo('template_directory') . '/img/photo-album.png' //16x16 png if you want an icon
); 
register_post_type('gallery', $gallery_args);



//Add Custom Columns to Gallery Post Type
add_action('manage_posts_custom_column', 'ms_custom_columns');
add_filter('manage_edit-gallery_columns', 'ms_add_new_gallery_columns');

function ms_add_new_gallery_columns( $columns ){
	$columns = array(
		'cb'				=>		'<input type="checkbox">',
		'ms_post_thumb'		=>		'Thumbnail',
		'title'				=>		'Photo Title',
		'date'				=>		'Date'
	);
	return $columns;
}

function ms_custom_columns( $column ){
	global $post;
	
	switch ($column) {
		case 'ms_post_thumb' : echo the_post_thumbnail('admin-list-thumb'); break;
		case 'description' : the_excerpt(); break;
	}
}

//add thumbnail images to column
add_filter('manage_posts_columns', 'ms_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'ms_add_post_thumbnail_column', 5);
add_filter('manage_custom_post_columns', 'ms_add_post_thumbnail_column', 5);

// Add the column
function ms_add_post_thumbnail_column($cols){
	$cols['ms_post_thumb'] = __('Thumbnail');
	return $cols;
}

function ms_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'ms_post_thumb':
      if( function_exists('the_post_thumbnail') )
        echo the_post_thumbnail( 'admin-list-thumb' );
      else
        echo 'Not supported in this theme';
      break;
  }
}

//Colors Custom Post Type
$colors_labels = array(
	'name' => _x('Colors', 'post type general name'),
	'singular_name' => _x('Colors', 'post type singular name'),
	'add_new' => _x('Add New', 'color'),
	'add_new_item' => __("Add New Color"),
	'edit_item' => __("Edit Color"),
	'new_item' => __("New Color"),
	'view_item' => __("View Color"),
	'search_items' => __("Search Color"),
	'not_found' =>  __('No colors found'),
	'not_found_in_trash' => __('No colors found in Trash'), 
	'parent_item_colon' => ''
		
);
$colors_args = array(
	'labels' => $colors_labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'query_var' => true,
	'rewrite' => true,
	'hierarchical' => false,
	'menu_position' => null,
	'capability_type' => 'post',
	'supports' => array('title','thumbnail'),
	'menu_icon' => get_bloginfo('template_directory') . '/img/colors.png' //16x16 png if you want an icon
); 
register_post_type('colors', $colors_args);



//Add Custom Columns to Colors Post Type
add_action('manage_posts_custom_column_colors', 'ms_custom_columns_colors');
add_filter('manage_edit-colors_columns', 'ms_add_new_colors_columns');

function ms_add_new_colors_columns( $columns ){
	$columns = array(
		'cb'				=>		'<input type="checkbox">',
		'ms_post_thumb'		=>		'Thumbnail',
		'title'				=>		'Colors Title',
		'date'				=>		'Date'
	);
	return $columns;
}

function ms_custom_columns_colors( $column ){
	global $post;
	
	switch ($column) {
		case 'ms_post_thumb' : echo the_post_thumbnail('admin-list-thumb'); break;
		case 'description' : the_excerpt(); break;
	}
}

//add thumbnail images to column
add_filter('manage_posts_columns_colors', 'ms_add_post_thumbnail_column_colors', 5);
add_filter('manage_pages_columns_colors', 'ms_add_post_thumbnail_column_colors', 5);
add_filter('manage_custom_post_columns_colors', 'ms_add_post_thumbnail_column_colors', 5);

// Add the column
function ms_add_post_thumbnail_column_colors($cols){
	$cols['ms_post_thumb'] = __('Thumbnail');
	return $cols;
}

function ms_display_post_thumbnail_column_colors($col, $id){
  switch($col){
    case 'ms_post_thumb':
      if( function_exists('the_post_thumbnail') )
        echo the_post_thumbnail( 'admin-list-thumb' );
      else
        echo 'Not supported in this theme';
      break;
  }
}



function ms_styles_register() {
	$labels = array(
		'name' => _x('Styles', 'post type general name'),
		'singular_name' => _x('Styles', 'post type singular name'),
		'add_new' => _x('Add New', 'Style'),
		'add_new_item' => __('Add New Style'),
		'edit_item' => __('Edit Style'),
		'new_item' => __('New Style'),
		'view_item' => __('View Styles'),
		'search_items' => __('Search Styles'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'styles'),
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => null,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
		'menu_icon' => get_template_directory_uri(). '/img/styles.png',
		'supports' =>array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'styles' , $args );
	flush_rewrite_rules();


}
add_action('init', 'ms_styles_register');



/*
Add Custom Editor Start from Here...
*/
add_action( 'edit_form_after_editor', 'ms_custom_text_editor' );
add_action( 'save_post', 'ms_save_custom_text', 10, 2 );

function ms_custom_text_editor()
{
    global $post;
    if( 'styles' != $post->post_type )
        return;

    $editor1 = get_post_meta( $post->ID, '_custom_editor_1', true);

    wp_nonce_field( plugin_basename( __FILE__ ), 'ms_styles_custom_editor' );
	echo'<h2>Benifits of Styles</h2>';
    echo wp_editor( $editor1, 'custom_editor_1', array( 'textarea_name' => 'custom_editor_1' ) );
}

function ms_save_custom_text( $post_id, $post_object ){
    if( !isset( $post_object->post_type ) || 'styles' != $post_object->post_type )
        return;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return;

    if ( !isset( $_POST['ms_styles_custom_editor'] ) || !wp_verify_nonce( $_POST['ms_styles_custom_editor'], plugin_basename( __FILE__ ) ) )
        return;

    if ( isset( $_POST['custom_editor_1'] )  )
        update_post_meta( $post_id, '_custom_editor_1', $_POST['custom_editor_1'] );
}

	
// Create custom check box for Featured Item Selection
function ms_featured_meta() {
    add_meta_box( 'featured_meta', __( 'Featured Check Box', 'featured-check-box' ), 'ms_meta_callback', 'styles','side','high' );
}
add_action( 'add_meta_boxes', 'ms_featured_meta' );
function ms_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'ms_nonce' );
    $ms_stored_meta = get_post_meta( $post->ID );
    ?>
    <div class ="checkboxThree">
        <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $ms_stored_meta['meta-checkbox'] ) ) checked( $ms_stored_meta['meta-checkbox'][0], 'yes' ); ?> />
		<label for="meta-text" class="prfx-row-title"><?php _e( 'Please Check this Box For Featured Post', 'featured-check-box' )?></label>
	</div>
 
    <?php
}

function ms_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'ms_nonce' ] ) && wp_verify_nonce( $_POST[ 'ms_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
if( isset( $_POST[ 'meta-checkbox' ] ) ) {
    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'meta-checkbox', '' );
}
 
}
add_action( 'save_post', 'ms_meta_save' );

/*This is added To ensure Mail is Sent. */

function cdx_from_email() {
	return "milleniumscreens@wordpress.com";
}
add_filter( 'wp_mail_from', 'cdx_from_email' );
function cdx_from_name() {
	return "WPGod";
}
add_filter( 'wp_mail_from_name', 'cdx_from_name' );



?>
