<?php
get_header(); ?>

  <main class="main">

    <?php
    while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/content', get_post_format() );

      //generate_testimonial_controls();
      $next = get_next_post();
      if( empty( $next ) ) {
        $args = array(
          'post_per_page' => 1,
          'post_type' => 'testimonial',
          'order' => 'ASC'
        );
        $next = get_posts( $args )[0];
      }
      $prev = get_previous_post();
      if( empty( $prev ) ) {
        $args = array(
          'post_per_page' => 1,
          'post_type' => 'testimonial'
          
        );
        $prev = get_posts( $args )[0];
      }
      ?>

      <div class="pagination  pagination--posts">
        <div class="pagination__previous" data-id="<?php echo $prev->ID; ?>">
          <div class="pagination__content" style="background-image: url( <?php echo get_the_post_thumbnail_url( $prev->ID, 'full' ); ?> );">
            <span class="pagination__subheader">PREVIOUS STORY</span>
            <h5 class="pagination__header  u-h2"><?php echo $prev->post_title; ?></h5>
            <div class="pagination__button-wrap">
              <a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>" class="btn  btn--primary  btn--small">Read Story</a>
            </div>
          </div>
        </div>
        <div class="pagination__previous" data-id="<?php echo $next->ID; ?>">
          <div class="pagination__content" style="background-image: url( <?php echo get_the_post_thumbnail_url( $next->ID, 'full' ); ?> );">
            <span class="pagination__subheader">NEXT STORY</span>
            <h5 class="pagination__header  u-h2"><?php echo $next->post_title; ?></h5>
            <div class="pagination__button-wrap">
              <a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>" class="btn  btn--primary  btn--small">Read Story</a>
            </div>
          </div>
        </div>
      </div>


      <?php

    endwhile; // End of the loop.
    ?>

  </main><!-- #main -->

<?php
get_footer();