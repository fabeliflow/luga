<?php
add_filter( 'wpcf7_form_elements', 'progressive_wpcf7_form_elements' );

function progressive_wpcf7_form_elements( $content ) {
  $content = strip_tags( $content, '<input><textarea><button><label><div><i><small><script><noscript><select><option><h3>');
  $content = str_replace('aria-required="true"', 'aria-required="true" required', $content );
  $content = str_replace('wpcf7-form-control wpcf7-submit', 'wpcf7-form-control wpcf7-submit btn btn--accent  btn--small contact__btn', $content );
  $content = str_replace('rows="10"', 'rows="2"', $content );
  return $content;
}

function get_string_between($string, $start, $end){
  $string = ' ' . $string;
  $ini = strpos($string, $start);
  if ($ini == 0) return '';
  $ini += strlen($start);
  $len = strpos($string, $end, $ini) - $ini;
  return substr($string, $ini, $len);
}

function localize_us_number($phone) {
  $numbers_only = preg_replace("/[^\d]/", "", $phone);
  return preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $numbers_only);
}

function generate_testimonial_controls() {
  $next = get_next_post();
  $prev = get_previous_post();

  $output = '<div class="pagination"><div class="container-fluid"><div class="row"><div class="col-md-6">';
  $output .= '</div><div class="col-md-6">';
  $output .= '</div></div></div>';

  return $output;
}

add_action( 'transition_post_status', 'pd_update_post_slug', 10, 3 );

function pd_update_post_slug( $new_status, $old_status, $post ) {
  if ( 'publish' !== $new_status or 'publish' === $old_status )
      return;

  if ( 'page' !== $post->post_type )
      return; // restrict the filter to a specific post type

  wp_update_post(
    array(
      'ID' => $post->ID,
      'post_name' => $post->post_name . '-delaware-oh'
    )
  );
}

//add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
 
    $classes[] = 'animsition';
     
    return $classes;
     
}