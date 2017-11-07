<?php
get_header(); ?>

  <main class="main">

    <?php
    while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/content', get_post_format() );

    endwhile; // End of the loop.
    ?>

  </main><!-- #main -->

<?php
get_footer();