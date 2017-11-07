<?php

add_shortcode( 'pd_section_header', 'pd_section_header_func' );
add_action( 'vc_before_init', 'progressive_map_section_header' );

function progressive_map_section_header() {
  if (function_exists('vc_map')) {

    vc_map( array(
      'name' => __( 'Section Header', 'js_composer' ),
      'is_container' => true,
      'base' => 'pd_section_header',
      'icon' => THEME_WEB_ROOT . '/assets/images/pd-logo.png',
      'show_settings_on_create' => true,
      'category' => __( 'Content', 'progressive' ),
      'params' => array(
        array(
          "type" => "textfield",
          "heading" => __( "Headline Text", "progressive" ),
          "param_name" => "text",
          'admin_label' => true,
          "group" => "Heading",
        ),
        array(
          "type" => "dropdown",
          "class" => "",
          "heading" => "Tag",
          'admin_label' => true,
          "param_name" => "type",
          "group" => "Heading",
          "value" => array(
            "" => "",
            "H2" => "h2",
            "H1" => "h1",
            "H3" => "h3",
            "H4" => "h4",
            "H5" => "h5",
            "H6" => "h6"
          )
        ),
        array(
          "type" => "dropdown",
          "class" => "",
          "heading" => "Change heading color?",
          "param_name" => "heading_color",
          "group" => "Heading",
          "value" => array(
            "" => "",
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
          "type" => "textfield",
          "heading" => "Extra classes",
          "param_name" => "classes",
          "group" => "Heading",
          'admin_label' => true,
        ),
        array(
          'type' => 'checkbox',
          'heading' => __( 'Add underline?', 'progressive' ),
          'param_name' => 'underline',
          'group' => 'Heading',
          'value' => array(
            "Yes" => "true"
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

      )
    ) );

  }
}


function pd_section_header_func( $atts, $content = null ) {
  extract(shortcode_atts(array(
      'text' => '',
      'type' => '',
      "heading_color" => '',
      'classes' => '',
      'underline' => '',
      'align_text' => ''
  ), $atts ));
  ob_start();

  $headline_classes = array(
    'headline__main',
    $classes,
    $heading_color
  );

  if( "true" == $underline ) {
    $headline_classes[] = 'headline__underline';
  }



  $headline_classes = implode( "  ", array_filter( $headline_classes ) );
  ?>
  <div class="headline<?php echo ( !empty( $align_text ) ? ' ' . $align_text : '' ); ?>">
    <<?php echo $type; ?><?php echo ( !empty( $headline_classes ) ? ' class="' . $headline_classes . '"' : '' ); ?>><?php echo $text; ?></<?php echo $type; ?>>

  </div>

  <?php
  $output = ob_get_clean();
  return $output;
}