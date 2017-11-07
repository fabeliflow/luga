<?php

/*
 * Note: here we are using vc_after_init because WPBMap::GetParam 
 * and mutateParame are available only when default content elements 
 * are "mapped" into the system
 */
add_action( 'vc_before_init', 'progressive_integrate_VC' );
add_action( 'vc_after_init', 'change_section_descriptions' ); 
//add_action( 'wp_enqueue_scripts', 'remove_visual_composer_stylesheets' );

require_once ( FRAMEWORK_ROOT . '/vc/pd-card.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-comparison.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-media-object.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-section-header.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-counters.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-testimonial.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-sponsors.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-sponsor.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-masthead.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-masthead-headline.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-parrallax-image-or-video-bg.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-staff-card.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-media.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-implant.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-fifty-fifty.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-carousel.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-carousel-item.php' );
require_once ( FRAMEWORK_ROOT . '/vc/pd-masthead-timestamp.php' );

function progressive_integrate_VC() {

  $animationDelay = array( 
      'Select Delay' => '', '50ms' => 50, '100ms' => 100, '150ms' => 150, '200ms' => 200, '250ms' => 250, '300ms' => 300, '350ms' => 350, '400ms' => 400, '450ms' => 450, '500ms' => 500, '550ms' => 550, '600ms' => 600
    );

  $animationEasing = array(
    'Select Easing' => '', 'Linear' => 'linear', 'Ease' => 'ease', 'Ease In' => 'ease-in', 'Ease Out' => 'ease-out', 'Ease In Out' => 'ease-in-out', 'Ease In Back' => 'ease-in-back', 'Ease Out Back' => 'ease-out-back', 'Ease In Out Back' => 'ease-in-out-back', 'Ease In Sine' => 'ease-in-sine', 'Ease Out Sine' => 'ease-out-sine', 'Ease In Out Sine' => 'ease-in-out-sine', 'Ease In Quad' => 'ease-in-quad', 'Ease Out Quad' => 'ease-out-quad', 'Ease In Out Quad' => 'ease-in-out-quad', 'Ease In Cubic' => 'ease-in-cubic', 'Ease Out Cubic' => 'ease-out-cubic', 'Ease In Out Cubic' => 'ease-in-out-cubic', 'Ease In Quart' => 'ease-in-quart', 'Ease Out Quart' => 'ease-out-quart', 'Ease In Out Quart' => 'ease-in-out-quart'
  );

  $animationOptions = array( 
    "Select Animation" => "", "Fade" => "fade", "Fade Up" => "fade-up", "Fade Down" => "fade-down", "Fade Left" => "fade-left", "Fade Right" => "fade-right", "Fade Up Left" => "fade-up-left", "Fade Up Right" => "fade-up-right", "Fade Down Left" => "fade-down-left", "Fade Down Right" => "fade-down-right", "Slide Up" => "slide-up", "Slide Down" => "slide-down", "Slide Left" => "slide-left", "Slide Right" => "slide-right", "Zoom In" => "zoom-in", "Zoom In Up" => "zoom-in-up", "Zoom In Down" => "zoom-in-down", "Zoom In Left" => "zoom-in-left", "Zoom In Right" => "zoom-in-right", "Zoom Out" => "zoom-out", "Zoom Out Up" => "zoom-out-up", "Zoom Out Down" => "zoom-out-down", "Zoom Out Left" => "zoom-out-left", "Zoom Out Right" => "zoom-out-right"
  );

    $row_atts = array(
      array(
        'type' => 'dropdown',
        'heading' => 'Vertical Align?',
        'param_name' => 'valign',
        'weight' => '2',
        'value' => array(
          "No" => "",
          "Yes" => "valign"
        )
      ),
    );

    $inner_row_atts = array(
      array(
        'type' => 'checkbox',
        'heading' => __( 'Disable row div?', 'progressive' ),
        'param_name' => 'disable_row',
        'value' => array(
          "Yes" => "true"
        ),
      ),
    );

    $open_on_create = array(
      'show_settings_on_create' => true
    );

    $text_atts = array(
      array(
        'type' => 'dropdown',
        'heading' => 'Text align',
        'param_name' => 'align_text',
        'group' => 'Extras',
        "value" => array(
          "Default" => "",
          "Center" => "text-center",
          "Left" => "text-left",
          "Right" => "text-right"
        )
      ),
      array(
        'type' => 'dropdown',
        'heading' => 'Add drop cap?',
        'description' => __( 'Add drop cap to first character.', 'js_composer' ),
        'param_name' => 'drop_cap',
        'group' => 'Extras',
        "value" => array(
          "Default" => "",
          "Yes" => "text-drop-cap",
        )
      ),
      array(
          'type' => 'dropdown',
          'heading' => __( 'Text Color', 'js_composer' ),
          'param_name' => 'text_color',
          'group' => 'Extras',
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
        'type' => 'checkbox',
        'heading' => __( 'Enable Animation?', 'progressive' ),
        'param_name' => 'enable_animation',
        'group' => 'Animation',
        'edit_field_class' => 'vc_col-sm-6',
        'value' => array(
          "Yes" => "true"
        ),
      ),
      array(
          'type' => 'dropdown',
          'heading' => __( 'Animation', 'js_composer' ),
          'param_name' => 'animation',
          'group' => 'Animation',
          'edit_field_class' => 'vc_col-sm-6  vc_no-pad-top',
          'dependency' => array(
            'element' => 'enable_animation',
            'value' => array( 'true' ),
          ),
          'value' => $animationOptions,
        ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Easing', 'js_composer' ),
        'param_name' => 'easing',
        'group' => 'Animation',
        'edit_field_class' => 'vc_col-sm-6',
        'dependency' => array(
          'element' => 'enable_animation',
          'value' => array( 'true' ),
        ),
        'description' => 'Choose timing function to ease elements in different ways',
        'value' => $animationEasing,
      ),
      array(
          'type' => 'dropdown',
          'heading' => __( 'Delay', 'js_composer' ),
          'param_name' => 'delay',
          'description' => 'Change delay of the animation',
          'group' => 'Animation',
          'dependency' => array(
            'element' => 'enable_animation',
            'value' => array( 'true' ),
          ),
          'edit_field_class' => 'vc_col-sm-6',
          'value' => $animationDelay,
        ),
    );

    $column_atts = array(
      array(
        'type' => 'checkbox',
        'heading' => __( 'Contains article content?', 'progressive' ),
        'param_name' => 'article',
        'value' => array(
          "Yes" => "true"
        ),
      ),
       array(
        'type' => 'checkbox',
        'heading' => __( 'Split article content?', 'progressive' ),
        'param_name' => 'article_split',
        'value' => array(
          "Yes" => "true"
        ),
      ),
    );
    $btn_atts = array(
      array(
        'type' => 'dropdown',
        'weight' => 1,
        'heading' => __( 'Color', 'js_composer' ),
        'param_name' => 'color',
        // partly compatible with btn2, need to be converted shape+style from btn2 and btn1
        'value' => array(
          __( 'Select', 'js_composer' ) => '',
          __( 'Primary', 'js_composer' ) => 'btn--primary',
          __( 'Secondary', 'js_composer' ) => 'btn--secondary',
          __( 'Tertiary', 'js_composer' ) => 'btn--tertiary',
          __( 'Accent', 'js_composer' ) => 'btn--accent',
          __( 'Light', 'js_composer' ) => 'btn--light',
          __( 'Tint', 'js_composer' ) => 'btn--tint',
          __( 'Custom 1', 'js_composer' ) => 'btn--custom-one',
          __( 'Custom 2', 'js_composer' ) => 'btn--custom-two',
          __( 'Custom 3', 'js_composer' ) => 'btn--custom-three',
          __( 'Default', 'js_composer' ) => 'btn--default',
        ),
      ),
      array(
        'type' => 'dropdown',
        'weight' => 1,
        'heading' => __( 'Outline Color', 'js_composer' ),
        'param_name' => 'outline_color',
        // partly compatible with btn2, need to be converted shape+style from btn2 and btn1
        'value' => array(
          __( 'Select', 'js_composer' ) => '',
          __( 'Primary', 'js_composer' ) => 'btn--outline-primary',
          __( 'Secondary', 'js_composer' ) => 'btn--outline-secondary',
          __( 'Tertiary', 'js_composer' ) => 'btn--outline-tertiary',
          __( 'Accent', 'js_composer' ) => 'btn--outline-accent',
          __( 'Light', 'js_composer' ) => 'btn--outline-light',
          __( 'Tint', 'js_composer' ) => 'btn--outline-tint',
          __( 'Custom 1', 'js_composer' ) => 'btn--outline-custom-one',
          __( 'Custom 2', 'js_composer' ) => 'btn--outline-custom-two',
          __( 'Custom 3', 'js_composer' ) => 'btn--outline-custom-three',
          __( 'Default', 'js_composer' ) => 'btn--outline-default',
        ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Size', 'js_composer' ),
        'param_name' => 'size',
        // compatible with btn2, default md, but need to be converted from btn1 to btn2
        'std' => '',
        'value' => array(
          'Normal' => '',
          'Small' => 'small',
          'Large' => 'Large',
          'Full' => 'full',
        ),
      ),
      array(
        'type' => 'checkbox',
        'heading' => __( 'Enable video popup?', 'progressive' ),
        'param_name' => 'enable_popup',
        'value' => array(
          "Yes" => "true"
        ),
      ),
    );



    vc_add_params( 'vc_row', $row_atts );
    vc_add_params( 'vc_row_inner', $inner_row_atts );
    vc_add_params( 'vc_column_text', $text_atts );
    vc_map_update( 'vc_section', $open_on_create );
    vc_add_params( 'vc_column', $column_atts );
    vc_remove_param( 'vc_btn', 'style' );
    vc_remove_param( 'vc_btn', 'gradient_color_1' );
    vc_remove_param( 'vc_btn', 'gradient_color_2' );
    vc_remove_param( 'vc_btn', 'gradient_custom_color_1' );
    vc_remove_param( 'vc_btn', 'gradient_custom_color_2' );
    vc_remove_param( 'vc_btn', 'custom_background' );
    vc_remove_param( 'vc_btn', 'custom_text' );
    vc_remove_param( 'vc_btn', 'outline_custom_color' );
    vc_remove_param( 'vc_btn', 'outline_custom_hover_background' );
    vc_remove_param( 'vc_btn', 'outline_custom_hover_text' );
    vc_remove_param( 'vc_btn', 'gradient_text_color' );
    vc_remove_param( 'vc_btn', 'size' );
    vc_remove_param( 'vc_btn', 'custom_onclick' );
    vc_remove_param( 'vc_btn', 'shape' );
    vc_remove_param( 'vc_btn', 'css_animation' );
    vc_remove_param( 'vc_btn', 'add_icon' );
    vc_remove_param( 'vc_btn', 'i_type' );
    vc_remove_param( 'vc_btn', 'i_align' );
    vc_remove_param( 'vc_btn', 'align' );
    vc_remove_param( 'vc_btn', 'iconpicker' );
    vc_remove_param( 'vc_btn', 'custom_onclick_code' );
    vc_remove_param( 'vc_btn', 'button_block' );
    vc_remove_param( 'vc_btn', 'title' );

    vc_remove_param( 'vc_btn', 'i_icon_fontawesome' );
    vc_remove_param( 'vc_btn', 'i_icon_pixelicons' );
    vc_remove_param( 'vc_btn', 'i_icon_openiconic' );
    vc_remove_param( 'vc_btn', 'i_icon_typicons' );
    vc_remove_param( 'vc_btn', 'i_icon_entypo' );
    vc_remove_param( 'vc_btn', 'i_icon_linecons' );
    vc_remove_param( 'vc_btn', 'i_icon_monosocial' );
    vc_remove_param( 'vc_btn', 'i_icon_material' );


    vc_remove_param( 'vc_section', 'video_bg' );
    vc_remove_param( 'vc_section', 'video_bg_url' );
    vc_remove_param( 'vc_section', 'video_bg_parallax' );
    vc_remove_param( 'vc_section', 'parallax' );
    vc_remove_param( 'vc_section', 'parallax_image' );
    vc_remove_param( 'vc_section', 'parallax_speed_video' );
    vc_remove_param( 'vc_section', 'parallax_speed_bg' );
    vc_remove_param( 'vc_section', 'css' );
    vc_remove_param( 'vc_section', 'full_height' );
    vc_remove_param( 'vc_section', 'content_placement' );
    vc_remove_param( 'vc_section', 'css_animation' );
    vc_remove_param( 'vc_section', 'disable_element' );
    vc_remove_param( 'vc_section', 'full_width' );

    vc_remove_param( 'vc_row', 'css' );
    vc_remove_param( 'vc_row', 'gap' );
    vc_remove_param( 'vc_row', 'row_stretch' );
    vc_remove_param( 'vc_row', 'css_animation' );
    vc_remove_param( 'vc_row', 'video_bg_parallax' );
    vc_remove_param( 'vc_row', 'video_bg' );
    vc_remove_param( 'vc_row', 'video_bg_url' );
    vc_remove_param( 'vc_row', 'content_placement' );
    vc_remove_param( 'vc_row', 'full_height' );
    vc_remove_param( 'vc_row', 'full_width' ); 
    vc_remove_param( 'vc_row', 'columns_placement' );
    vc_remove_param( 'vc_row', 'parallax' );
    vc_remove_param( 'vc_row', 'parallax_speed_bg' );
    vc_remove_param( 'vc_row', 'parallax_image' );
    vc_remove_param( 'vc_row', 'parallax_speed_video' );
    vc_remove_param( 'vc_row', 'disable_element' );

    vc_remove_param( 'vc_column', 'css' );
    vc_remove_param( 'vc_column', 'css_animation' );
    
    vc_remove_param( 'vc_tta_section', 'add_icon-true' );
    vc_remove_param( 'vc_tta_accordion', 'css' );
    vc_remove_param( 'vc_tta_accordion', 'style' );
    vc_remove_param( 'vc_tta_accordion', 'shape' );
    vc_remove_param( 'vc_tta_accordion', 'color' );
    vc_remove_param( 'vc_tta_accordion', 'spacing' );
    vc_remove_param( 'vc_tta_accordion', 'gap' );
    vc_remove_param( 'vc_tta_accordion', 'c_align' );
    vc_remove_param( 'vc_tta_accordion', 'no_fill' );
    vc_remove_param( 'vc_tta_accordion', 'autoplay' );
    vc_remove_param( 'vc_tta_accordion', 'collapsible_all' );
    vc_remove_param( 'vc_tta_accordion', 'c_icon' );
    vc_remove_param( 'vc_tta_accordion', 'c_position' );
    vc_remove_param( 'vc_tta_accordion', 'css_animation' );

    vc_remove_param( 'vc_column_text', 'css' );
    vc_remove_param( 'vc_column_text', 'css_animation' );

    vc_add_params( 'vc_btn', $btn_atts );


    vc_remove_element( 'vc_wp_meta' );
    vc_remove_element( 'vc_wp_search' );
    vc_remove_element( 'vc_wp_recent_comments' );
    vc_remove_element( 'vc_wp_calendar' );
    vc_remove_element( 'vc_wp_pages' );
    vc_remove_element( 'vc_masonry_grid' );
    vc_remove_element( 'vc_masonry_media_grid' );
    vc_remove_element( 'vc_line_chart' );
    vc_remove_element( 'vc_round_chart' );
    vc_remove_element( 'vc_pie' );
    vc_remove_element( 'vc_flickr' );
    vc_remove_element( 'vc_pinterest' );
    vc_remove_element( 'vc_googleplus' );
    vc_remove_element( 'vc_facebook' );
    vc_remove_element( 'vc_tweetmeme' );

    vc_remove_element( 'vc_tta_pageable' );
    vc_remove_element( 'vc_tta_tabs' );
    vc_remove_element( 'vc_tta_tour' );
    vc_remove_element( 'vc_cta' );
    vc_remove_element( 'vc_empty_space' );
    vc_remove_element( 'vc_message' );
    vc_remove_element( 'vc_posts_slider' );
    vc_remove_element( 'vc_progress_bar' );
    vc_remove_element( 'vc_separator' );

    vc_remove_element( 'vc_text_separator' );
    vc_remove_element( 'vc_toggle' );
    vc_remove_element( 'vc_progress_bar' );
    vc_remove_element( 'vc_custom_heading' );

    vc_remove_element( 'vc_basic_grid' );
    vc_remove_element( 'vc_masonry_grid' );
    vc_remove_element( 'vc_masonry_media_grid' );
    vc_remove_element( 'vc_media_grid' );

    vc_remove_element( 'vc_wp_categories' );
    vc_remove_element( 'vc_wp_archives' );
    vc_remove_element( 'vc_wp_posts' );
    vc_remove_element( 'vc_wp_text' );
    vc_remove_element( 'vc_wp_custommenu' );
    vc_remove_element( 'vc_wp_tagcloud' );
    vc_remove_element( 'vc_wp_recentcomments' );
    vc_remove_element( 'vc_wp_rss' );
    vc_remove_element( 'vc_gallery' );

}

function change_section_descriptions() {
  $fwparam = WPBMap::getParam( 'vc_section', 'full_width' );
  $fwparam['description'] = '';
  $idparam = WPBMap::getParam( 'vc_section', 'el_id' );
  $idparam['description'] = '';
  $idparam['edit_field_class'] = 'vc_col-sm-6';
  $classparam = WPBMap::getParam( 'vc_section', 'el_class' );
  $classparam['description'] = '';
  $classparam['edit_field_class'] = 'vc_col-sm-6';
  vc_update_shortcode_param( 'vc_section', $fwparam );
  vc_update_shortcode_param( 'vc_section', $classparam );
  vc_update_shortcode_param( 'vc_section', $idparam );
}

vc_add_shortcode_param( 'counter', 'custom_integer_param' );
function custom_integer_param( $settings, $value ) {
  return '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .
    esc_attr( $settings['param_name'] ) . ' ' .
    esc_attr( $settings['type'] ) . '_field" type="number" value="' . esc_attr( $value ) . '" />';
}

function remove_visual_composer_stylesheets() {
  wp_dequeue_style( 'js_composer_front' );
  wp_deregister_style( 'js_composer_front' );
}

add_action( 'vc_after_init', 'update_section_values' );
function update_section_values() {
  $param = WPBMap::getParam( 'vc_section', '');
}

function file_picker_settings_field( $settings, $value ) {
  $output = '';
  $select_file_class = '';
  $remove_file_class = ' hidden';
  $attachment_url = wp_get_attachment_url( $value );
  if ( $attachment_url ) {
    $select_file_class = ' hidden';
    $remove_file_class = '';
  }
  $output .= '<div class="file_picker_block">
                <div class="' . esc_attr( $settings['type'] ) . '_display">' .
                  $attachment_url .
                '</div>
                <input type="hidden" name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .
                 esc_attr( $settings['param_name'] ) . ' ' .
                 esc_attr( $settings['type'] ) . '_field" value="' . esc_attr( $value ) . '" />
                <button class="button file-picker-button' . $select_file_class . '">Select File</button>
                <button class="button file-remover-button' . $remove_file_class . '">Remove File</button>
              </div>
              ';
  return $output;
}
vc_add_shortcode_param( 'file_picker', 'file_picker_settings_field', get_template_directory_uri() . '/framework/assets/js/file_picker.js' );