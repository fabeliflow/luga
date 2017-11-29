<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package flash
 */

global $progressive

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel='preconnect' href='//www.google-analytics.com' />
  <link rel='preconnect' href='//fonts.googleapis.com' />
  <?php if( !empty( $progressive['theme-color'] ) ) : ?>
  <meta content="<?php echo $progressive['theme-color']; ?>" name="theme-color">
  <meta content="<?php echo $progressive['theme-color']; ?>" name="msapplication-TileColor">
  <?php endif; ?>
  <?php if( !empty( $progressive['favicon']['url'] ) ) : ?>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $progressive['favicon']['url']; ?>">
  <?php endif; ?>
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>

  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <?php
  if( $progressive['header-scripts'] ) :
    echo $progressive['header-scripts'];
  endif;
  if( $progressive['header-styles'] ) :
    echo $progressive['header-styles'];
  endif;
  ?>
</head>
<body <?php body_class(); ?>>



  <header class="page-head">
    <?php if( !is_front_page() ) : ?>
    <div class="js-slide-down  page-head__top  is-fixed">
      <div class="page-head__doctor">
        <div class="page-head__doctor-thumbnail">
          <?php if( $progressive['avatar-type'] == 'image' && !empty( $progressive['avatar-image'] ) ) : ?>
            <img src="<?php echo $progressive['avatar-image']['url']; ?>" class="avatar  avatar--small" alt="<?php echo $progressive['secondary-nav-left-text-primary']; ?>">
          <?php endif; ?>
        </div>
        <div class="page-head__doctor-text">
          <?php echo ( !empty( $progressive['secondary-nav-left-text-initial'] ) ? $progressive['secondary-nav-left-text-initial'] . ' ' : '' ); ?> <span class="page-head__doctor-name">New Patients: <a href="tel:+1-<?php echo localize_us_number( $progressive['new-patient-number'] ); ?>"><?php echo $progressive['new-patient-number']; ?></a></span></div>

      </div>
      <div class="page-head__logo">
        <a href="<?php echo esc_url( home_url() ); ?>" class="logo  logo--header">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tiny-logo.png" alt="<?php echo get_bloginfo(name) ?>">
        </a>
      </div>
      <a href="" class="page-head__menu  toggle" aria-label="Menu" data-overlay="menu">
        MENU
        <svg width="24px" height="16px" viewBox="0 0 24 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="square">
            <g id="Group" transform="translate(2.000000, -6.000000)" stroke="#0C0C0C" stroke-width="4">
              <g transform="translate(0.000000, 7.000000)" id="Line-2">
                <path d="M0.5,13 L14.5,13"></path>
                <path d="M0.5,1 L9.5,1"></path>
                <path d="M0.5,7 L19.5,7"></path>
              </g>
            </g>
          </g>
        </svg>
      </a>
    </div>
    <?php endif; ?>
    <div class='wrapper'>
      <div class="container-fluid">
        <nav class='site-nav'>
          <div class='site-nav__logo-box'>
            <a class="site-nav__home-link" href="<?php echo esc_url( home_url() ); ?>">
              <img alt="<?php echo esc_url( home_url() ); ?>" class='site-nav__logo' src="<?php echo $progressive['nav-logo']['url']; ?>">
            </a>
          </div>
          <div class="site-nav__btn" aria-label="Menu" data-overlay="menu">
            <span>MENU</span>
            <div class="site-nav__burger  toggle">
              <div class="site-nav__patty"></div>
              <div class="site-nav__patty"></div>
              <div class="site-nav__patty"></div>
            </div>
          </div>
          <ul class="site-nav__list"></ul>
        </nav>
      </div>
    </div>
  </header>
