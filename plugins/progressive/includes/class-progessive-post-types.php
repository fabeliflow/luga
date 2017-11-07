<?php
/**
 * Post Types
 *
 * Registers post types and taxonomies
 *
 * @class       Progressive_Post_types
 * @version     1.0.0
 * @package     Progressive/Classes/ProgressivePostTypes
 * @category    Class
 * @author      WooThemes
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
/**
 * Progressive_Post_types Class
 */
class Progressive_Post_types {

  public function __construct() {
    $this->init();
  }

  /**
   * Hook in methods.
   */
  public function init() {
    add_action( 'init', array( $this, 'register_post_types' ), 5 );
    add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ), 5 );
    //add_filter( 'rest_api_allowed_post_types', array( __CLASS__, 'rest_api_allowed_post_types' ) );
    add_action( 'save_post', array( $this , 'save_meta_boxes' ), 1, 2 );
  }

  /**
   * Register core post types.
   */
  public function register_post_types() {
    if( post_type_exists( 'testimonial' ) ) {
      return;
    }

    do_action( 'progressive_register_post_type' );

    $labels = array(
      'name'                  => _x( 'Testimonials', 'Post Type General Name', 'progressive' ),
      'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'progressive' ),
      'menu_name'             => __( 'Testimonials', 'progressive' ),
      'name_admin_bar'        => __( 'Testimonials', 'progressive' ),
      'archives'              => __( 'Testimonial Archives', 'progressive' ),
      'attributes'            => __( 'Testimonial Attributes', 'progressive' ),
      'parent_item_colon'     => __( 'Parent Testimonial:', 'progressive' ),
      'all_items'             => __( 'All Testimonials', 'progressive' ),
      'add_new_item'          => __( 'Add New Testimonial', 'progressive' ),
      'add_new'               => __( 'Add New', 'progressive' ),
      'new_item'              => __( 'New Testimonial', 'progressive' ),
      'edit_item'             => __( 'Edit Testimonial', 'progressive' ),
      'update_item'           => __( 'Update Testimonial', 'progressive' ),
      'view_item'             => __( 'View Testimonial', 'progressive' ),
      'view_items'            => __( 'View Testimonials', 'progressive' ),
      'search_items'          => __( 'Search Testimonials', 'progressive' ),
      'not_found'             => __( 'Not found', 'progressive' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'progressive' ),
      'featured_image'        => __( 'Featured Image', 'progressive' ),
      'set_featured_image'    => __( 'Set featured image', 'progressive' ),
      'remove_featured_image' => __( 'Remove featured image', 'progressive' ),
      'use_featured_image'    => __( 'Use as featured image', 'progressive' ),
      'insert_into_item'      => __( 'Insert into Testimonial', 'progressive' ),
      'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'progressive' ),
      'items_list'            => __( 'Testimonials list', 'progressive' ),
      'items_list_navigation' => __( 'Testimonials list navigation', 'progressive' ),
      'filter_items_list'     => __( 'Filter Testimonials list', 'progressive' ),
    );
    $args = array(
      'label'                 => __( 'Testimonial', 'progressive' ),
      'description'           => __( 'Patient Stories for the site.', 'progressive' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
      'taxonomies'            => array( 'category', 'post_tag' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => false,   
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
      'menu_icon'             => 'dashicons-admin-comments'
    );
    register_post_type( 'testimonial', $args );

    if( post_type_exists( 'location' ) ) {
      return;
    }


    $labels = array(
      'name'                  => _x( 'Locations', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Location', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Locations', 'text_domain' ),
      'name_admin_bar'        => __( 'Locations', 'text_domain' ),
      'archives'              => __( 'Location Archives', 'text_domain' ),
      'attributes'            => __( 'Location Attributes', 'text_domain' ),
      'parent_item_colon'     => __( 'Parent Location:', 'text_domain' ),
      'all_items'             => __( 'All Locations', 'text_domain' ),
      'add_new_item'          => __( 'Add New Location', 'text_domain' ),
      'add_new'               => __( 'Add New', 'text_domain' ),
      'new_item'              => __( 'New Location', 'text_domain' ),
      'edit_item'             => __( 'Edit Location', 'text_domain' ),
      'update_item'           => __( 'Update Location', 'text_domain' ),
      'view_item'             => __( 'View Location', 'text_domain' ),
      'view_items'            => __( 'View Locations', 'text_domain' ),
      'search_items'          => __( 'Search Locations', 'text_domain' ),
      'not_found'             => __( 'Not found', 'text_domain' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
      'featured_image'        => __( 'Featured Image', 'text_domain' ),
      'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
      'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
      'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
      'insert_into_item'      => __( 'Insert into Location', 'text_domain' ),
      'uploaded_to_this_item' => __( 'Uploaded to this location', 'text_domain' ),
      'items_list'            => __( 'Locations list', 'text_domain' ),
      'items_list_navigation' => __( 'Locations list navigation', 'text_domain' ),
      'filter_items_list'     => __( 'Filter locations list', 'text_domain' ),
    );
    $args = array(
      'label'                 => __( 'Location', 'text_domain' ),
      'description'           => __( 'Locations post type.', 'text_domain' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
      'taxonomies'            => array( 'category', 'post_tag' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => false,   
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
      'menu_icon'             => 'dashicons-location-alt'
    );
    register_post_type( 'location', $args );

    if( post_type_exists( 'doctor' ) ) {
      return;
    }

    $labels = array(
      'name'                  => _x( 'Doctors', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Doctor', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Doctors', 'text_domain' ),
      'name_admin_bar'        => __( 'Doctors', 'text_domain' ),
      'archives'              => __( 'Doctors Archives', 'text_domain' ),
      'attributes'            => __( 'Doctors Attributes', 'text_domain' ),
      'parent_item_colon'     => __( 'Parent Doctor:', 'text_domain' ),
      'all_items'             => __( 'All Doctors', 'text_domain' ),
      'add_new_item'          => __( 'Add New Doctor', 'text_domain' ),
      'add_new'               => __( 'Add New', 'text_domain' ),
      'new_item'              => __( 'New Doctor', 'text_domain' ),
      'edit_item'             => __( 'Edit Doctor', 'text_domain' ),
      'update_item'           => __( 'Update Doctor', 'text_domain' ),
      'view_item'             => __( 'View Doctor', 'text_domain' ),
      'view_items'            => __( 'View Doctors', 'text_domain' ),
      'search_items'          => __( 'Search Doctors', 'text_domain' ),
      'not_found'             => __( 'Not found', 'text_domain' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
      'featured_image'        => __( 'Featured Image', 'text_domain' ),
      'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
      'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
      'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
      'insert_into_item'      => __( 'Insert into Doctor', 'text_domain' ),
      'uploaded_to_this_item' => __( 'Uploaded to this doctor', 'text_domain' ),
      'items_list'            => __( 'Doctors list', 'text_domain' ),
      'items_list_navigation' => __( 'Doctors list navigation', 'text_domain' ),
      'filter_items_list'     => __( 'Filter doctors list', 'text_domain' ),
    );
    $args = array(
      'label'                 => __( 'Doctor', 'text_domain' ),
      'description'           => __( 'Doctors post type', 'text_domain' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
      'taxonomies'            => array( 'category', 'post_tag' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => false,   
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
      'menu_icon'             => 'dashicons-admin-users'
    );
    register_post_type( 'doctor', $args );

    if( post_type_exists( 'result' ) ) {
      return;
    }

    $labels = array(
      'name'                  => _x( 'Results', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Result', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Results', 'text_domain' ),
      'name_admin_bar'        => __( 'Results', 'text_domain' ),
      'archives'              => __( 'Result Archives', 'text_domain' ),
      'attributes'            => __( 'Results Attributes', 'text_domain' ),
      'parent_item_colon'     => __( 'Parent Result:', 'text_domain' ),
      'all_items'             => __( 'All Results', 'text_domain' ),
      'add_new_item'          => __( 'Add New Result', 'text_domain' ),
      'add_new'               => __( 'Add New', 'text_domain' ),
      'new_item'              => __( 'New Result', 'text_domain' ),
      'edit_item'             => __( 'Edit Result', 'text_domain' ),
      'update_item'           => __( 'Update Result', 'text_domain' ),
      'view_item'             => __( 'View Result', 'text_domain' ),
      'view_items'            => __( 'View Results', 'text_domain' ),
      'search_items'          => __( 'Search Results', 'text_domain' ),
      'not_found'             => __( 'Not found', 'text_domain' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
      'featured_image'        => __( 'Featured Image', 'text_domain' ),
      'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
      'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
      'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
      'insert_into_item'      => __( 'Insert into Result', 'text_domain' ),
      'uploaded_to_this_item' => __( 'Uploaded to this result', 'text_domain' ),
      'items_list'            => __( 'Results list', 'text_domain' ),
      'items_list_navigation' => __( 'Results list navigation', 'text_domain' ),
      'filter_items_list'     => __( 'Filter results list', 'text_domain' ),
    );
    $args = array(
      'label'                 => __( 'Result', 'text_domain' ),
      'description'           => __( 'Before and After Post Type', 'text_domain' ),
      'labels'                => $labels,
      'supports'              => array( 'title', ),
      'taxonomies'            => array( 'category', 'post_tag' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-format-gallery',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => false,
      'can_export'            => true,
      'has_archive'           => false,   
      'exclude_from_search'   => true,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
    );
    register_post_type( 'Results', $args );

  } // end register core post types

  public function register_meta_boxes() {
    add_meta_box( 
      'timestamp', 
      __( 'Timestamp', 'progressive' ), 
      array( $this, 'meta_boxes_callback' ), 'testimonial'
    );
  } // end register meta boxes

  public function meta_boxes_callback( $post ) {
    wp_nonce_field( 'timestamp_nonce', 'timestamp_nonce' );

    $value = get_post_meta( $post->ID, '_global_notice', true );
    echo '<input type="text" id="timestamp" name="timestamp" value="' . esc_attr( $value ) . '">';
  }
  public function save_meta_boxes( $post_id ) {

    // check if nonce set
    if( ! isset( $_POST['timestamp_nonce'] ) ) {
      return;
    }

    // Verify the nonce is valid
    if( ! wp_verify_nonce( $_POST['timestamp_nonce'], 'timestamp_nonce' ) ) {
      return;
    }

    // If this is an autosave, our form has not been submitted, do nothing
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
    }

    // Check the user's permissions
    if( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
      if( ! current_user_can( 'edit_page', $post_id ) ) {
        return;
      }
    }
    else {
      if( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
      }
    }

    // OK, it's safe for us to save

    // Check if timestamp is set
    if( ! isset( $_POST['timestamp'] ) ) {
      return;
    }

    // Sanitize user input.
    $timestamp = sanitize_text_field( $_POST['timestamp'] );

    // Update field in database
    update_post_meta( $post_id, '_timestamp', $timestamp );
  } // end save meta boxes
}

new Progressive_Post_types();