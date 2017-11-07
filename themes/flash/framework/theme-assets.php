<?php

add_action( 'wp_enqueue_scripts', 'shaggy_reynolds_scripts', 99 );
//add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );

/**
 * Enqueue scripts and styles.
 */
function shaggy_reynolds_scripts() {
  global $progressive;

  wp_enqueue_style( 'flash-fullpage', THEME_WEB_ROOT . '/assets/css/fullpage.min.css' );
  wp_enqueue_style( 'flash-style', THEME_WEB_ROOT . '/assets/css/site.css' );
  wp_enqueue_style( 'flash-magnific', THEME_WEB_ROOT . '/assets/css/magnific.min.css' );
  wp_enqueue_style( 'flash-aos', THEME_WEB_ROOT . '/assets/css/aos.css' );
  wp_enqueue_style( 'flash-animsition', THEME_WEB_ROOT . '/assets/css/animsition.css' );
  wp_enqueue_style( 'flash-roboto', 'https://fonts.googleapis.com/css?family=Roboto:700,400' );
  wp_enqueue_style( 'flash-roboto-condensed', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:700,400' );
  wp_enqueue_style( 'flash-roboto-slab', 'https://fonts.googleapis.com/css?family=Roboto+Slab' );
  wp_enqueue_style( 'flash-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
  wp_enqueue_style( 'flash-material', 'https://fonts.googleapis.com/icon?family=Material+Icons' );

  wp_deregister_script( 'jquery' );
  wp_dequeue_script( 'jquery' );
  wp_dequeue_script( 'jquery-migrate' );
  wp_dequeue_script( 'jquery-migrate' );

  wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', array(), '', true );
  wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBnbUCc95DCXKnlWAcJK-gLsNt4__JO4u0', array(), '', true );
  wp_enqueue_script( 'flash-magnific', THEME_WEB_ROOT . '/assets/js/magnific.min.js', array(), '', true );
  wp_enqueue_script( 'flash-accordion', THEME_WEB_ROOT . '/assets/js/jquery.accordion.min.js', array(), '', true );
  wp_enqueue_script( 'flash-aos', THEME_WEB_ROOT . '/assets/js/aos.js', array(), '', true );
  wp_enqueue_script( 'flash-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js', array(), '', true );
  wp_enqueue_script( 'flash-google-maps', THEME_WEB_ROOT . '/assets/js/google-map.js', array(), '', true );
  wp_enqueue_script( 'flash-fullpage', THEME_WEB_ROOT . '/assets/js/jquery.fullpage.extension.min.js', array(), '', true );
  wp_enqueue_script( 'flash-fullpage-fade', THEME_WEB_ROOT . '/assets/js/fullpage.fadingEffect.limited.min.js', array(), '', true );
  wp_enqueue_script( 'flash-animsition', THEME_WEB_ROOT . '/assets/js/animsition.js', array(), '', true );
  wp_enqueue_script( 'flash-site', THEME_WEB_ROOT . '/assets/js/custom.js', array(), '', true );
  wp_enqueue_script( 'flash-bundle', THEME_WEB_ROOT . '/assets/js/bundle.js', array(), '', true );
  if( $progressive['enable-ppc'] == 1 ) {
    wp_enqueue_script( 'shaggy-reynolds-ppc', THEME_WEB_ROOT . '/assets/js/web-ppc-call.js', array(), '', true );
  }

  // deregister and dequeue plugin styles and scripts
  wp_deregister_style( 'gcp-owl-carousel-css' );
  wp_dequeue_style( 'gcp-owl-carousel-css' );

  wp_deregister_style( 'carousel-anything-owl' );
  wp_dequeue_style( 'carousel-anything-owl' );

  wp_deregister_script( 'carousel-anything-owl' );
  wp_dequeue_script( 'carousel-anything-owl' );

  wp_deregister_script( 'carousel-anything' );
  wp_dequeue_script( 'carousel-anything' );

  wp_deregister_style( 'carousel-anything-single-post' );
  wp_dequeue_style( 'carousel-anything-single-post' );

  wp_deregister_style( 'js_composer_front' );
  wp_dequeue_style( 'js_composer_front' );

  wp_deregister_script( 'js_composer_front' );
  wp_dequeue_script( 'js_composer_front' );

  wp_deregister_script( 'waypoints' );
  wp_dequeue_script( 'waypoints' );

  wp_deregister_script( 'wpb_composer_front_js' );
  wp_dequeue_script( 'wpb_composer_front_js' );

  wp_deregister_style( 'contact-form-7' );
  wp_dequeue_style( 'contact-form-7' );
}

/**
 * Defer loading of scripts
 *
 * This delays the execution of the script until the HTML parser has finished.
 */
function defer_parsing_of_js ( $url ) {
  if ( is_admin() ) {
    return $url;
  }

  if ( FALSE === strpos( $url, '.js' ) ) return $url;

  return "$url' defer onload='";

}

function dvk_dequeue_scripts() {

    $load_scripts = false;

    if( is_singular() ) {
      $post = get_post();

      if( has_shortcode($post->post_content, 'contact-form-7') ) {
          $load_scripts = true;
      }

    }

    if( ! $load_scripts ) {
        wp_dequeue_script( 'contact-form-7' );
        wp_dequeue_style( 'contact-form-7' );
    }

}

add_action( 'wp_enqueue_scripts', 'dvk_dequeue_scripts', 99 );
