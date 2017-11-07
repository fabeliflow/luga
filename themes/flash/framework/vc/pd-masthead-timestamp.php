<?php
add_shortcode( 'pd_masthead_timestamp', 'pd_masthead_timestamp_func' );
add_action( 'vc_before_init', 'progressive_map_masthead_timestamp' );

function progressive_map_masthead_timestamp() {
  if (!function_exists('vc_map')) {
    return;
  }

  vc_map( array(
    'name' => __( 'Masthead Timestamp', 'progressive' ),
    'base' => 'pd_masthead_timestamp',
    'icon' => THEME_WEB_ROOT . '/assets/images/pd-logo.png',
    'description' => __( 'Timestamp for the masthead', 'progressive' ),
    'as_parent' => array( 'only' => 'pd_masthead' ),
    'category' => __( 'Content', 'progressive' ),
    'params' => array(

      array(
        'type' => 'textfield',
        'heading' => __( 'Time', 'progressive' ),
        'param_name' => 'timestamp',
        'admin_label' => true,
      ),


      
    )
  ) );

}

function pd_masthead_timestamp_func( $atts ) {
  global $progressive; 
  extract(shortcode_atts(array(
    'timestamp' => '',

  ), $atts ));



  $ret = '<div class="masthead__timestamp  timestamp  hidden-xs">' . $timestamp . '</div>';
  
  return $ret;
}