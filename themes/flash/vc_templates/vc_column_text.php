<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css_animation
 * @var $css
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_text
 */
$el_class = $css = $css_animation = $drop_cap = $text_color = $enable_animation = $easing = $delay = $animation = $align_text ='';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
  $output = '';
  $strong_pattern = "/(<strong)/";

  if( !empty( $el_class ) ) :
    $output = '<div class="' . $el_class . '">';
  endif; 
  if( !empty( $drop_cap ) || !empty( $align_text ) || !empty( $text_color ) ) {
    $classes = array(
      $drop_cap,
      $align_text,
      $text_color
    );

    $classes = implode( "  ", array_filter( $classes ) );
    $pattern = "/(<p)/";
    $replace = '<p class="' . $classes . '"';
    $output .= preg_replace( $pattern, $replace, wpb_js_remove_wpautop ( $content, true ) );

  } else {
    $output .= wpb_js_remove_wpautop( $content, true );
  }
  if( !empty( $el_class ) ) :
    $output .= '</div>';
  endif; 
echo $output;
