<?php
/**
 * Turn any Visual Composer element into a carousel element.
 *
 * @package Carousel Anything for VC
 */

if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly.
}
if ( ! class_exists( 'PD_Carousel' ) ) {

  /**
   * Sorry, but that doesn't include your kitchen sink.
   */
  class PD_Carousel {

    /**
     * Sets a unique identifier of each carousel.
     *
     * @var id
     */
    private static $id = 0;

    /**
     * Hook into WordPress.
     *
     * @return  void
     * @since 1.0
     */
    function __construct() {

      // Initializes VC shortcode.
      add_filter( 'init', array( $this, 'create_pdc_shortcodes' ), 999 );

      // Render shortcode for the plugin.
      add_shortcode( 'pd_carousel', array( $this, 'render_pdc_shortcodes' ) );

    }


    /**
     * Creates the carousel element inside VC.
     *
     * @return  void
     * @since 1.0
     */
    public function create_pdc_shortcodes() {
      if ( ! function_exists( 'vc_map' ) ) {
        return;
      }

      // $default_content = '[vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner]';
      $default_content = '[pd_carousel_item][/pd_carousel_item][pd_carousel_item][/pd_carousel_item][pd_carousel_item][/pd_carousel_item]';
      // $default_content = '';
      if ( vc_is_frontend_editor() ) {
        $default_content = '';
      }

      // Loads fixes that makes Carousel Anything possible.
      pdc_row_fixes();

      vc_map( array(
        'name' => __( 'Carousel', 'progressive' ),
        'base' => 'pd_carousel',
        'icon' => plugins_url( 'carousel-anything/images/vc-icon.png', 'progressive' ),
        'description' => __( 'A carousel system for Progressive Websites.', 'progressive' ),
        'category' => __( 'Carousel', 'progressive' ),
        'as_parent' => array( 'only' => 'vc_row,vc_row_inner,pd_card,pd_testimonial,pd_staff_card,pd_media,pd_carousel_item' ),
        'js_view' => 'VcColumnView',
        'content_element' => true,
        'is_container' => true,
        'container_not_allowed' => false,
        'default_content' => $default_content,
        'params' => array(
          array(
            'type' => 'checkbox',
            'heading' => __( 'Reverse Content', 'progressive' ),
            'param_name' => 'reverse',
            'edit_field_class' => 'vc_col-sm-6  vc_no-pad-top',
            'value' => array(
              "Yes" => "true"
            ),
          ),
          array(
            'type' => 'checkbox',
            'heading' => __( 'Enable captions', 'progressive' ),
            'param_name' => 'captions',
            'edit_field_class' => 'vc_col-sm-6  vc_no-pad-top',
            'value' => array(
              "Yes" => "true"
            ),
          ),
          array(
          'type' => 'dropdown',
          'heading' => __( 'Alignment', 'progressive' ),
          'param_name' => 'alignment',
          'admin_label' => true,
          'value' => array(
            'Default' => '',
            'Left' => 'align--left',
            'Right' => 'align--right'
          ),
        ),
          array(
            'type' => 'textfield',
            'heading' => __( 'Custom Class', 'progressive' ),
            'param_name' => 'class',
            'value' => '',
            'description' => __( 'Add a custom class name for the carousel here.', 'progressive' ),
          ),
          array(
            'type' => 'textfield',
            'heading' => __( 'Items to display on screen', 'progressive' ),
            'param_name' => 'items',
            'value' => '1',
            'group' => __( 'Responsive', 'progressive' ),
            'description' => __( 'Maximum items to display at a time.', 'progressive' ),
          ),
          array(
            'type' => 'textfield',
            'heading' => __( 'Items to display on tablets', 'progressive' ),
            'param_name' => 'items_tablet',
            'value' => '1',
            'group' => __( 'Responsive', 'progressive' ),
            'description' => __( 'Maximum items to display at a time for tablet devices.', 'progressive' ),
          ),
          array(
            'type' => 'textfield',
            'heading' => __( 'Items to display on mobile phones', 'progressive' ),
            'param_name' => 'items_mobile',
            'value' => '1',
            'group' => __( 'Responsive', 'progressive' ),
            'description' => __( 'Maximum items to display at a time for mobile devices.', 'progressive' ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => __( 'Text Color', 'js_composer' ),
            'param_name' => 'text_color',
            'group' => 'Colors',
            'value' => array(
              "Select Color" => "",
              "Primary" => "text-primary",
              "Secondary" => "text-secondary",
              "Tertiary" => "text-tertiary",
              "Light" => "text-light",
              "Accent" => "text-accent",
              "Hightlight" => "text-highlight",
              "Custom 1" => "text-custom-one",
              "Custom 2" => "text-custom-two",
              "Custom 3" => "text-custom-three"
            ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => __( 'Caption Outline Color', 'js_composer' ),
            'param_name' => 'caption_color',
            'group' => 'Colors',
            'value' => array(
              "Select Color" => "",
              "Primary" => "border-primary",
              "Secondary" => "border-secondary",
              "Tertiary" => "border-tertiary",
              "Light" => "border-light",
              "Accent" => "border-accent",
              "Hightlight" => "border-highlight",
              "Custom 1" => "border-custom-one",
              "Custom 2" => "border-custom-two",
              "Custom 3" => "border-custom-three"
            ),
          ),
        ),
      ) );
    }


    /**
     * Shortcode logic
     *
     * @param array  $atts - WordPress shortcode attributes, defined by Visual Composer.
     * @param string $content - Not needed in this plugin.
     * @return  string The rendered html
     * @since 1.0
     */
    public function render_pdc_shortcodes( $atts, $content = null ) {
      $defaults = array(
        'start' => '1',
        'items' => '1',
        'items_tablet' => '1',
        'items_mobile' => '1',
        'reverse' => '',
        'captions' => 'false',
        'text_color' => 'text-light',
        'caption_color' => 'border-accent',
        'class' => '',
        'alignment' => ''
      );
      if ( empty( $atts ) ) {
        $atts = array();
      }
      $atts = array_merge( $defaults, $atts );

      self::$id++;
      $id = 'carousel-anything-' . esc_attr( self::$id );

      $carousel = $ret = $controls = '';

      // Thumbnail styles.
      $styles = '';
      $carousel_class = '';
      $navigation_buttons = false;

      if ( ! empty( $atts['class'] ) ) {
        $carousel_class .= ' ' . esc_attr( $atts['class'] );
      }

      // Enable filters for the shortcode content, if it exists.
      $content = apply_filters( 'gambit_ca_output', $content );

      $columns = substr_count( $content, '[vc_row]' );

      // Carousel html.
      preg_match_all('/caption="[^"]*"/', $content, $output);

      $carousel_start = '<div class="carousel' . ( "true" == $atts['reverse'] ? '  carousel--rev' : '' ) . ( !empty( $atts['alignment'] ) ? '  carousel--' .  $atts['alignment'] : '' ) . '">';
      $carousel .= '<div id="' . esc_attr( $id ) . '" class="carousel__slides  js-card-carousel  col-md-9  col-sm-12  col-xs-12  ' . $carousel_class . '" data-captions="' . $atts['captions'] . '">';
      $carousel .= do_shortcode( $content ) . '</div>';
      $controls .= '
          <div class="col-md-3  col-xs-12  col-sm-12">
            <div class="carousel__controls">';
      if( "true" == $atts['captions'] ) : 
        $controls .= '<div class="carousel__captions' . ( !empty( $caption_color ) ? '  ' . $caption_color : '' ) . '">';
                foreach( $output[0] as $k => $v ) {
                  $controls .= '<div class="carousel__caption' . ( !empty( $text_color ) ? '  ' . $text_color : '' ) . '">' . str_replace( '"', '', str_replace( 'caption="', '', $v ) ) . '</div>';
                }
        $controls .= '</div>';
      endif;
        $controls .= '<div class="carousel__pagination  pagination">
          <div class="pagination__button  pagination__button--left"></div>
          <div class="pagination__button  pagination__button--right"></div>
        </div>
            </div>
          </div>';
      $carousel_end = '</div>';

      $ret .= $carousel_start;
      $ret .= ( "true" == $atts['reverse'] ? $controls . $carousel : $carousel . $controls );
      $ret .= $carousel_end; 

      return $ret;
    }
  }
  new PD_Carousel();
}


/**
 * Loads the fixes that makes Carousel Anything work.
 *
 * @return  void
 * @since 1.5
 */
function pdc_row_fixes() {

  $create_class = false;

  /**
   * We need to define this so that VC will show our nesting container correctly.
   */
  if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_PD_Carousel' ) ) {
    $create_class = true;
  } else {
    // If we can't detech the classes it means that VC is embeded in a theme.
    global $composer_settings;

    // The class WPBakeryShortCodesContainer is defined in VC's shortcodes.php, include it so we can define our container.
    if ( ! empty( $composer_settings ) ) {
      if ( array_key_exists( 'COMPOSER_LIB', $composer_settings ) ) {
        $lib_dir = $composer_settings['COMPOSER_LIB'];
        if ( file_exists( $lib_dir . 'shortcodes.php' ) ) {
          require_once( $lib_dir . 'shortcodes.php' );
        }
      }
    }

    // We need to define this so that VC will show our nesting container correctly.
    if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_PD_Carousel' ) ) {
      $create_class = true;
    }
  }

  if ( $create_class ) {

    /**
     * Defines a subclass of the shortcodes container, for modifed Visual Composer modules.
     *
     * @package carousel-anything
     * @class WPBakeryShortCode_PD_Carousel
     */
    class WPBakeryShortCode_PD_Carousel extends WPBakeryShortCodesContainer {
    }
  }
}
