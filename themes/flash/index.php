<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shaggy_reynolds
 */

get_header(); ?>

	<main class="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
			<?php
			$post_object = get_page_by_title( 'Blog', OBJECT, 'page' );
			$url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_object->ID ) );
			if ( !empty( $url ) ) : ?>
				<section class="masthead  masthead--blog" style="background-image: url( <?php echo $url[0]; ?> ); background-repeat: no-repeat; background-size: cover; background-position: center center;">
      <?php else : ?>
				<section class="masthead  masthead--blog">
      <?php endif; ?>
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
							<?php
								endif;

								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'post' );

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif; ?>
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
			

<?php
get_footer();