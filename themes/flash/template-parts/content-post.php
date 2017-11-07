<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shaggy_reynolds
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php
    if ( is_single() ) :
      the_title( '<h1 class="entry-title">', '</h1>' );
    else :
      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    endif;

    //if ( 'post' === get_post_type() ) : ?>
    <div class="entry-meta">
      <?php //shaggy_reynolds_posted_on(); ?>
    </div>
    <?php
    //endif; ?>
  </header>

  <div class="entry-content">
   <?php 
   $content = apply_filters( 'the_content', get_the_content() );
    $text = substr( $content, 0, strpos( $content, '</p>' ) + 4 );
    echo $text; ?>
    <a href="<?php echo get_permalink($post->ID); ?>" class="btn  btn--accent">Read More</a>

  </div>

</article>