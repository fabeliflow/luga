<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package shaggy_reynolds
 */

get_header(); ?>

  <main class="main">

    <?php
    while ( have_posts() ) : the_post(); ?>
    <section class="masthead  masthead--blog">
      <div class="masthead__content">
        <div class="container">
          <div class="row text-center">
            <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-md-offset-1 vc_col-md-10">
              <div class="vc_column-inner ">
                <div class="wpb_wrapper"><h1 class="masthead__eyebrow"><?php echo single_post_title() . ( !empty( $progressive['location'] ) ? ' ' . $progressive['location'] : '' ); ?></h1>
                <h2 class="masthead__headline"><?php echo single_post_title(); ?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section  article">
      <div class="container">
        <div class="vc_row  wpb_row  vc_row-fluid">
          <div class="article__content  article__content-blog-grid  vc_col-sm-12  vc_col-md-8">

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

              <div class="entry-content">
                <?php
                  the_content(); 
                ?>
              </div>
            </article>
          </div>
          <div class="vc_col-sm-12  vc_col-md-4  sidebar  sidebar--blog">
            <?php
              if( is_active_sidebar( 'blog-sidebar' ) ) :
                dynamic_sidebar( 'blog-sidebar' );
              endif;
            ?>
          </div>
        </div>
      </div>
    </section>

  <?php endwhile; ?>

  </main><!-- #main -->

    

<?php
get_footer();