<?php
/**
* franskild functions and definitions
*
* @package WordPress
* @subpackage franskild
* @since 1.0
*
*/

require 'theme_settings.php';
require 'widget-banner.php'; 

/**
* franskild base setup
* Includes main navigation, theme supports, custom background for front page and sidebar.
*/
function franskild_setup() {

    //Add title in head
    add_theme_support( 'title-tag' );

    //Remove unvanted scripts from head
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
    remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'feed_links', 2 );
    
    //Register main navigation
    register_nav_menu( 'mainmenu', 'Website main navigation' );
    
    //Theme support and settings for thumbnails
    add_theme_support( 'post-thumbnails', array( 'post', 'franskild_cpt_music' ) );
    add_theme_support( 'post-thumbnails', array( 'post', 'franskild_cpt_images' ) );
    add_image_size( 'cover', 800, 800, array( 'left', 'top') );
    
    //Style for editor
    add_editor_style( '/css/editor-style.css' );

	//Custom background
    function custom_background_cb() {
        if ( is_front_page() )
        {
           _custom_background_cb();
        }
    }
	$args = array(
		'wp-head-callback' => 'custom_background_cb'
	);

    add_theme_support( 'custom-background', $args );

	//Sidebar for upcoming gigs widget
	register_sidebar( array( 
		'name'			=> __( 'Header', 'franskild' ),
		'id'			=> 'header1',
		'description'	=> __( 'Header on blog page.', 'franskild' ),
		'before_widget'	=> '<section class="widget>',
		'after_widget'	=> '</section>'
	) );

}

add_action( 'after_setup_theme', 'franskild_setup' );

/**
* Hook for viewport meta in head
*/
function hook_viewport_meta() {

    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php

}

add_action('wp_head', 'hook_viewport_meta');

/**
* Scripts and Styles
*/
function franskild_scripts() {

	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.css', null, '1.0', 'all' );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', 'null' );
	
}

add_action( 'wp_enqueue_scripts', 'franskild_scripts' );

/**
* Custom fonts
*/
function franskild_fonts() {

	wp_register_style( 'Lato', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
	wp_enqueue_style( 'Lato' );
	wp_enqueue_script( 'FontAwesome', '//use.fontawesome.com/a391b5c69b.js' );

}

add_action( 'wp_print_styles', 'franskild_fonts' );

/**
* Remove content from dashboard
*/
function franskild_remove_dashboard_boxes () {

	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);

}

add_action('wp_dashboard_setup', 'franskild_remove_dashboard_boxes');

/**
* Custom taxonomy
*/
function franskild_keywords_taxonomy() {

	$labels = array(
		'name'				=> _x( 'Keywords', 'franskild' ),
		'singular_item'		=> _x( 'Keyword', 'franskild' ),
		'search_items'		=> _x( 'Search keyword', 'franskild' ),
		'all_items'			=> _x( 'All keywords', 'franskild' ),
		'parent_item'		=> _x( 'Main keyword', 'franskild' ),
		'parent_item_colon'	=> _x( 'Main keyword', 'franskild' ),
		'edit_item'			=> _x( 'Edit keyword', 'franskild' ),
		'update_item'		=> _x( 'Update keyword', 'franskild' ),
		'add_new_item'		=> _x( 'Add keyword', 'franskild' ),
		'new_item_name'		=> _x( 'New keyword', 'franskild' ),
		'menu_name'			=> _x( 'Keywords', 'franskild' )
	);

	$args = array(
		'labels'		=> $labels,
		'hierarchical'	=> true,
		'edit_item'		=> true,
        'rewrite'       => array(
            'slug'          => 'keywords',
            'with_front'    => true
        )
	);

	register_taxonomy( 'franskild_taxonomies', 'post', $args );

}

add_action( 'init', 'franskild_keywords_taxonomy' );

/**
* Custom meta box
*/
function franskild_meta_box() {

	add_meta_box(
		'franskid_meta_box',
		_x( 'In collaboration with:', 'franskild' ),
		'show_franskild_meta_box',
		'post',
		'side',
		'high'
	);

}
add_action( 'add_meta_boxes', 'franskild_meta_box' );

//Show input fields for meta box
function show_franskild_meta_box ( $post ) {
	
    wp_nonce_field( basename( __FILE__), 'franskild_colab_nonce' );
	$meta = get_post_meta( $post->ID );
	?>

	<div>
		<label for="colab-name"><?php _e( 'Name', 'franskild' ); ?></label>
	</div>
	<div>
		<input type="text" name="colab_name" id="colab-name" value="<?php if ( ! empty ( $meta['colab_name'] ) ) { echo esc_attr( $meta['colab_name'][0] ); } ?>">
	</div>
	<div>
		<label for="colab-url"><?php _e( 'URL', 'franskild' ); ?></label>
	</div>
	<div>
		<input type="url" name="colab_url" id="colab-url" value="<?php if ( ! empty ( $meta['colab_name'] ) ) { echo esc_attr( $meta['colab_url'][0] ); } ?>">
	</div>
	<?php

}

//Save meta data to DB
function save_franskild_meta ( $post_id ) {
	
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'franskild_colab_nonce' ] ) && wp_verify_nonce( $_POST[ 'franskild_colab_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST[ 'colab_name' ] ) ) {
    	update_post_meta( $post_id, 'colab_name', sanitize_text_field( $_POST[ 'colab_name' ] ) );
    }
    if ( isset( $_POST[ 'colab_url' ] ) ) {
    	update_post_meta( $post_id, 'colab_url', sanitize_text_field( $_POST[ 'colab_url' ] ) );
    }

}

add_action( 'save_post', 'save_franskild_meta' );

/**
* Function for current page - pagination
* @return int Return current page ($paged)
*/
function currentPage() {

    if ( get_query_var('paged') ) {

        $paged = get_query_var('paged');

    } elseif ( get_query_var('page') ) {

        $paged = get_query_var('page');

    } else {

        $paged = 1;

    }

    return $paged;

}

?>