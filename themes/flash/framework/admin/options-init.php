<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
      return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "progressive";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
      'opt_name' => 'progressive',
      'display_name' => 'Theme Options',
      'display_version' => '1.0.0',
      'page_slug' => 'shaggy_reynolds',
      'page_title' => 'Theme Options',
      'update_notice' => TRUE,
      'menu_type' => 'menu',
      'menu_title' => 'Theme Options',
      'allow_sub_menu' => TRUE,
      'page_parent_post_type' => 'your_post_type',
      'customizer' => TRUE,
      'default_mark' => '*',
      'hints' => array(
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
          'color' => 'light',
          ),
        'tip_position' => array(
          'my' => 'top left',
          'at' => 'bottom right',
          ),
        'tip_effect' => array(
          'show' => array(
            'duration' => '500',
            'event' => 'mouseover',
            ),
          'hide' => array(
            'duration' => '500',
            'event' => 'mouseleave unfocus',
            ),
          ),
        ),
      'output' => TRUE,
      'output_tag' => TRUE,
      'settings_api' => TRUE,
      'cdn_check_time' => '1440',
      'compiler' => TRUE,
      'page_permissions' => 'manage_options',
      'save_defaults' => TRUE,
      'show_import_export' => TRUE,
      'database' => 'options',
      'transient_time' => '3600',
      'network_sites' => TRUE,
      'dev_mode' => FALSE
      );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
      'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
      'title' => 'Visit us on GitHub',
      'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
      );
    $args['share_icons'][] = array(
      'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
      'title' => 'Like us on Facebook',
      'icon'  => 'el el-facebook'
      );
    $args['share_icons'][] = array(
      'url'   => 'http://twitter.com/reduxframework',
      'title' => 'Follow us on Twitter',
      'icon'  => 'el el-twitter'
      );
    $args['share_icons'][] = array(
      'url'   => 'http://www.linkedin.com/company/redux-framework',
      'title' => 'Find us on LinkedIn',
      'icon'  => 'el el-linkedin'
      );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
      array(
        'id'      => 'redux-help-tab-1',
        'title'   => __( 'Theme Information 1', 'admin_folder' ),
        'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        ),
      array(
        'id'      => 'redux-help-tab-2',
        'title'   => __( 'Theme Information 2', 'admin_folder' ),
        'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        )
      );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'admin_folder' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection( $opt_name, array(
      'title'  => __( 'Header', 'progressive' ),
      'id'     => 'basic',
      'desc'   => __( 'Fields for the themes header', 'progressive' ),
      'icon'   => 'el el-home',
      'fields' => array(

        array(
          'id'        => 'nav-bar-section',
          'type'      => 'section',
          'title'     => 'Navigation Bar Options',
          'subtitle'  => 'These options edit the themes navigation bar.',
          'indent'    => true
          ),
        array(
          'id'        => 'nav-logo',
          'type'      => 'media',
          'title'     => 'Logo',
          ),
        array(
          'id'        => 'nav-logo-location',
          'type'      => 'select',
          'title'     => 'Logo Location',
          'options'   => array (
            'left' => 'Left',
            'center' => 'Center'
            ),
          'default'   => 'center'
          ),
        array(
          'id' => 'secondary-nav-left-style',
          'type' => 'select',
          'title' => 'Secondary Nav Left Side Style:',
          'options' => array(
            'text' => 'Text',
            'phone' => 'Phone'
          ),
          'default' => 'text'
        ),
        array(
          'id' => 'secondary-nav-left-text-initial',
          'type' => 'text',
          'title' => 'Secondary Nav Text Initial',
          'required' => array('secondary-nav-left-style','equals','text'),
          'default' => 'MEET'
        ),
        array(
          'id' => 'secondary-nav-left-text-primary',
          'type' => 'text',
          'title' => 'Secondary Nav Text Primary',
          'required' => array('secondary-nav-left-style','equals','text')
        ),
        array(
          'id' => 'avatar-type',
          'type' => 'select',
          'title' => 'Avatar Type',
          'options' => array(
            'image' => 'Image',
            'icon' => 'Icon'
          ),
          'default' => 'image'
        ),
        array(
          'id' => 'avatar-image',
          'type' => 'media',
          'title' => 'Select avatar image',
          'required' => array('avatar-type', 'equals', 'image')
        ),
        array(
          'id' => 'secondary-nav-left-link',
          'type' => 'select',
          'data' => 'posts',
          'title' => 'Text link',
          'args' => array(
            'posts_per_page' => '-1',
            'post_type' => array( 'page', 'doctor' )
          )
        ),
        array(
          'id'        => 'header-scripts-section',
          'type'      => 'section',
          'title'     => 'Inline scripts & Styles',
          'subtitle'  => 'These options add inline scripts & styles to the header.',
          'indent'    => true
          ),
        array(
          'id'        => 'header-scripts',
          'type'      => 'textarea',
          'title'     => 'Header scripts',
          ),
        array(
          'id'        => 'header-styles',
          'type'      => 'textarea',
          'title'     => 'Header styles',
          ),
        )
      ) );

    Redux::setSection( $opt_name, array(
      'title'  => __( 'Footer', 'progressive' ),
      'id'     => 'footer',
      'desc'   => __( 'Fields for the themes footer', 'progressive' ),
      'icon'   => 'el el-website',
      'fields' => array(
        array(
          'id'        => 'enable-map',
          'type'      => 'switch',
          'title'     => 'Show Map?',
          'default'   => false,
          ),
        array(
          'id'        => 'map-theme',
          'type'      => 'select',
          'title'     => 'Map Theme',
          'default'   => false,
          'options'   => array(
            'light' => 'Light',
            'grayscale' => 'Grayscale',
            'dark' => 'Dark',
            'custom' => 'Custom'
          )
        ),
        array(
          'id'        => 'map-custom-theme',
          'type'      => 'textarea',
          'title'     => 'Custom Theme',
          'desc' => 'Get a custom theme from <a href="" target="_blank">SnazzyMaps</a>',
          'required' => array('map-theme','equals','custom')
        ),
        array(
          'id' => 'pin',
          'type' => 'color',
          'title' => 'Pin Color',
          'default' => false
        ),
        array(
          'id'        => 'enable-address',
          'type'      => 'switch',
          'title'     => 'Show Address?',
          'default'   => false,
          ),
        array(
          'id'        => 'enable-new-patient-number',
          'type'      => 'switch',
          'title'     => 'Show New Patient Number?',
          'default'   => false,
          ),
        array(
          'id'        => 'enable-current-patient-number',
          'type'      => 'switch',
          'title'     => 'Show Current Patient Number?',
          'default'   => false,
          ),
        array(
          'id'        => 'footer-scripts-section',
          'type'      => 'section',
          'title'     => 'Inline scripts & Styles',
          'subtitle'  => 'These options add inline scripts & styles to the Footer.',
          'indent'    => true
          ),
        array(
          'id'        => 'footer-scripts',
          'type'      => 'textarea',
          'title'     => 'Footer scripts',
          ),
        array(
          'id'        => 'footer-styles',
          'type'      => 'textarea',
          'title'     => 'Footer styles',
          ),
        )
      ) );

    Redux::setSection( $opt_name, array(
      'title'  => __( 'General', 'progressive' ),
      'id'     => 'general',
      'desc'   => __( 'General theme options.', 'progressive' ),
      'icon'   => 'el el-dashboard',
      'fields' => array(

        array(
          'id'        => 'favicon',
          'type'      => 'media',
          'title'     => 'Favicon',
          ),
        array(
          'id'        => 'location',
          'type'      => 'text',
          'title'     => 'Location',
          ),


        )
      ) );

    Redux::setSection( $opt_name, array(
      'title'  => __( 'Animations', 'progressive' ),
      'id'     => 'animations',
      'desc'   => __( 'General theme options.', 'progressive' ),
      'icon'   => 'el el-adjust',
      'fields' => array(
        array(
          'id'        => 'image-animations-section',
          'type'      => 'section',
          'title'     => 'Image Animations',
          'subtitle'  => 'These options add animations to images site wide.',
          'indent'    => true
        ),
        array(
          'id'        => 'enable-image-animations',
          'type'      => 'switch',
          'title'     => 'Enable Image Animations?',
          'default'   => false,
          ),
        array(
          'id'        => 'image-animation',
          'type'      => 'select',
          'title'     => 'Animation',
          'default'   => false,
          'options'   => array(
            'zoom-in' => 'Zoom In',
            'zoom-out' => 'Zoom Out',
            'grayscale' => 'Grayscale',
            'sepia' => 'Sepia',
            'opacity' => 'Opacity',
            'overlay' => 'Overlay',
            'shine' => 'Shine',
            'circle' => 'Circle',
            'flash' => 'flash'
          ),
          'required' => array('enable-image-animations','equals','1')
          ),
          array(
            'id'      => 'image-overlay-color',
            'type'    => 'select',
            'title'   => 'Overlay Color',
            'default' => false,
            'options' => array(
              'bg-primary' => 'Primary',
              'bg-secondary' => 'Secondary',
              'bg-tertiary' => 'Tertiary',
              'bg-light' => 'Light',
              'bg-accent' => 'Accent',
              'bg-highlight' => 'Highlight',
              'bg-custom-one' => 'Custom One',
              'bg-custom-two' => 'Custom Two',
              'bg-custom-three' => 'Custom Three',
              'bg-custom' => 'Color Picker'
            ),
            'required' => array('image-animation','equals','overlay')
          ),
          array(
            'id'        => 'image-overlay-color-custom',
            'type'      => 'color',
            'title'     => 'Custom Color',
            'required' => array('image-overlay-color','equals','bg-custom')
          ),

        )
      ) );
    Redux::setSection( $opt_name, array(
      'title'  => __( 'Location', 'progressive' ),
      'id'     => 'location',
      'desc'   => __( 'Location options for the office.', 'progressive' ),
      'icon'   => 'el el-map-marker',
      'fields' => array(
        array(
          'id'        => 'address-line-one',
          'type'      => 'text',
          'title'     => 'Address 1',
          ),
        array(
          'id'        => 'address-line-two',
          'type'      => 'text',
          'title'     => 'Address 2',
          ),
        array(
          'id'        => 'address-city',
          'type'      => 'text',
          'title'     => 'City',
          ),
        array(
          'id'        => 'address-state',
          'type'      => 'text',
          'title'     => 'State',
          ),
        array(
          'id'        => 'address-zip',
          'type'      => 'text',
          'title'     => 'Zip',
          ),
        array(
          'id'        => 'current-patient-number',
          'type'      => 'text',
          'title'     => 'Current Patient Number',
          ),
        array(
          'id'        => 'new-patient-number',
          'type'      => 'text',
          'title'     => 'New Patient Number',
          ),
        array(
          'id'        => 'enable-ppc',
          'type'      => 'switch',
          'title'     => 'Enable PPC?',
          'default'   => false,
          ),
        array(
          'id'        => 'ppc-number',
          'type'      => 'text',
          'title'     => 'PPC Number',
          'required' => array('enable-ppc','equals','1')
          ),


        )
      ) );

    Redux::setSection( $opt_name, array(
      'title'  => __( 'Social Media', 'progressive' ),
      'id'     => 'social-media',
      'desc'   => __( 'Social media options.', 'progressive' ),
      'icon'   => 'el el-myspace',
      'fields' => array(
        array(
          'id'        => 'enable-social-sharing',
          'type'      => 'switch',
          'title'     => 'Enable social sharing?',
          'default'   => false,
          ),
        array(
          'id'       => 'social-sharing',
          'type'     => 'sortable',
          'title'    => __('Sortable sharing options', 'progressive'),
          'mode'     => 'checkbox',
          'required' => array('enable-social-sharing','equals','1'),
          'options'  => array(
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'google-plus' => 'Google Plus',
            'linkedin' => 'LinkedIn'
          ),
          // For checkbox mode
          'default' => array(
              'facebook' => true,
              'twitter' => true,
              'google-plus' => false,
              'linkedin' => false,
              'pinterest' => false
          ),
),
        array(
          'id'        => 'enable-google-reviews',
          'type'      => 'switch',
          'title'     => 'Enable Google Reviews?',
          'default'   => false,
          ),
        array(
          'id'        => 'google-reviews-id',
          'type'      => 'text',
          'title'     => 'Google Reviews URL',
          'desc'      => 'Generate it <a href="https://developers.google.com/places/place-id" target="_blank">on google places.</a>',
          'required' => array('enable-google-reviews','equals','1')
          ),
        array(
          'id'        => 'enable-facebook',
          'type'      => 'switch',
          'title'     => 'Enable Facebook?',
          'default'   => false,
          ),
        array(
          'id'        => 'facebook-link',
          'type'      => 'text',
          'title'     => 'Facebook URL',
          'required' => array('enable-facebook','equals','1')
          ),
        array(
          'id'        => 'enable-google-plus',
          'type'      => 'switch',
          'title'     => 'Enable Google Plus?',
          'default'   => false,
          ),
        array(
          'id'        => 'gogle-plus-link',
          'type'      => 'text',
          'title'     => 'Google Plus URL',
          'required' => array('enable-google-plus','equals','1')
          ),
        array(
          'id'        => 'enable-twitter',
          'type'      => 'switch',
          'title'     => 'Enable Twitter?',
          'default'   => false,
          ),
        array(
          'id'        => 'twitter-link',
          'type'      => 'text',
          'title'     => 'Twitter URL',
          'required' => array('enable-twitter','equals','1')
          ),
        array(
          'id'        => 'enable-youtube',
          'type'      => 'switch',
          'title'     => 'Enable Youtube?',
          'default'   => false,
          ),
        array(
          'id'        => 'youtube-link',
          'type'      => 'text',
          'title'     => 'Youtube URL',
          'required' => array('enable-youtube','equals','1')
          ),
        array(
          'id'        => 'enable-instagram',
          'type'      => 'switch',
          'title'     => 'Enable Instagram?',
          'default'   => false,
          ),
        array(
          'id'        => 'instagram-link',
          'type'      => 'text',
          'title'     => 'Instagram URL',
          'required' => array('enable-instagram','equals','1')
          ),
        array(
          'id'        => 'enable-pinterest',
          'type'      => 'switch',
          'title'     => 'Enable Pinterest?',
          'default'   => false,
          ),
        array(
          'id'        => 'pinterest-link',
          'type'      => 'text',
          'title'     => 'Pinterest URL',
          'required' => array('enable-pinterest','equals','1')
          ),
        array(
          'id'        => 'enable-linkedin',
          'type'      => 'switch',
          'title'     => 'Enable Linkedin?',
          'default'   => false,
          ),
        array(
          'id'        => 'linkedin-link',
          'type'      => 'text',
          'title'     => 'Linkedin URL',
          'required' => array('enable-linkedin','equals','1')
          ),
        )
      ) );
