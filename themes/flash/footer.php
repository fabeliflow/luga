<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package shaggy_reynolds
*/

global $progressive; ?>

<?php if ( !is_front_page() ) : ?>
  <!-- FOOTER -->
  <footer class="footer">

    <?php if( $progressive['enable-map'] == 1 && !is_page( 'contact-us-delaware-oh' ) ) : ?>
      <!-- FOOTER MAP -->
      <div class="footer__map">
        <div id="map" class="map" data-address="<?php echo $progressive['address-line-one'] . ( !empty( $progressive['address-line-two'] ) ? ' ' . $progressive['address-line-two'] : '' ) . ', ' . $progressive['address-city'] . ', ' . $progressive['address-state'] . ' ' . $progressive['address-zip']; ?>" data-theme="<?php echo $progressive['map-theme']; ?>" data-pin="<?php echo $progressive['pin']; ?>" data-title="<?php echo get_bloginfo('name'); ?>"></div>
        <div class="map__content">
          <div class="container">
            <div class="row">
              <div class="col-md-5  col-md-offset-7">
                <div class="map__content-header">
                  <h4 class="map__content-title">Contact Us</h4>
                  <!-- <ul class="map__content-list"> -->

                    <!-- ADDRESS -->
                    <ul class="first-loc-cont">
                      <?php if( $progressive['enable-address'] == 1 ) : ?>
                        <li class="map__content-item">
                          <i class="fa fa-map-marker"></i>
                          <address class="map__content-info"><?php echo $progressive['address-line-one']; ?><?php echo ( !empty( $progressive['address-line-two'] ) ? ', ' . $progressive['address-line-two'] : '' ); ?><br> <?php echo $progressive['address-city']; ?>, <?php echo $progressive['address-state']; ?> <?php echo $progressive['address-zip']; ?></address>
                        </li>
                        <!-- NEW PATIENT NUMBER -->
                        <?php if( $progressive['enable-new-patient-number'] == 1 && !empty( $progressive['new-patient-number'] ) ) : ?>
                          <li class="map__content-item">
                            <i class="fa fa-mobile-phone"></i>
                            <?php if( $progressive['enable-ppc'] == 1  && !empty( $progressive['ppc-number'] ) ) : ?>
                              <span class="map__content-info">New Patient:  <a href="tel:+1-<?php echo localize_us_number( $progressive['new-patient-number'] ); ?>" class="clickToCall" data-call-tracking-number="<?php echo $progressive['new-patient-number']; ?>" data-ppc-tracking-number="<?php echo $progressive['ppc-number']; ?>"><span class="webPpcNumber"><?php echo $progressive['ppc-number']; ?></a></span></span>
                            <?php else : ?>
                              <span class="map__content-info">New Patient:  <a href="tel:+1-<?php echo localize_us_number( $progressive['new-patient-number'] ); ?>"><?php echo $progressive['new-patient-number']; ?></a></span>
                            <?php endif; ?>
                          </li>
                          <li class="map__content-item">
                            <i class="fa fa-mobile-phone"></i>
                            <span class="map__content-info">Current Patient:  <a href="tel:+1-<?php echo localize_us_number( $progressive['current-patient-number'] ); ?>" target="_blank"><?php echo $progressive['current-patient-number']; ?></a></span>
                          </li>
                        <?php endif; ?>
                        <!-- END NEW PATIENT NUMBER -->
                      </ul>
                      <ul class="second-loc-cont">
                        <li class="map__content-item">
                          <i class="fa fa-map-marker"></i>
                          <address class="map__content-info">
                            4011 W. Jefferson Blvd., Suite 300<br>
                            Fort Wayne, IN 46804
                          </address>
                        </li>
                      <?php endif; ?>
                      <!-- END ADDRESS -->
                      <!-- CURRENT PATIENT NUMBER -->
                      <?php if( $progressive['enable-current-patient-number'] == 1 && !empty( $progressive['current-patient-number'] ) ) : ?>
                        <li class="map__content-item">
                          <i class="fa fa-mobile-phone"></i>
                          <span class="map__content-info">New Patient:  <a href="tel:+1-<?php echo localize_us_number( $progressive['new-patient-number'] ); ?>" target="_blank"><?php echo $progressive['new-patient-number']; ?></a></span>
                        </li>
                        <li class="map__content-item">
                          <i class="fa fa-mobile-phone"></i>
                          <span class="map__content-info">Current Patient:  <a href="tel:+1-<?php echo localize_us_number( $progressive['current-patient-number'] ); ?>" target="_blank"><?php echo $progressive['current-patient-number']; ?></a></span>
                        </li>
                      <?php endif; ?>
                      <!-- END CURRENT PATIENT NUMBER -->
                    </ul>
                  <!-- </ul> -->
                </div>

                <!-- GOOGLE REVIEWS -->
                <?php if( $progressive['enable-google-reviews'] == 1 ) : ?>
                  <div class="map__content-footer  text-center">
                    <a href="https://search.google.com/local/writereview?placeid=<?php echo $progressive['google-reviews-id']; ?>" target="_blank">Review us on Google <i class="fa fa-google-plus"></i></a>
                  </div>
                <?php endif; ?>
                <!-- END GOOGLE REVIEWS -->

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END FOOTER MAP -->
    <?php endif; ?>

    <!-- FOOTER INFO -->
    <div class="footer__info">
      <div class="wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="footer__content">
              <div class="footer__copyright  col-sm-6">
                <p>Power by Progressive Dental Marketing<span>&copy; <script>document.write( new Date().getFullYear() );</script> <?php echo get_bloginfo( 'name' ); ?></span></p>
              </div>
              <div class="footer__social  col-sm-6">
                <ul class="footer__list">
                  <?php if( $progressive['enable-facebook'] == 1 ) : ?>
                    <li class="footer__item">
                      <a href="<?php echo $progressive['facebook-link']; ?>" class="footer__link" target="_blank"><i class="fa  fa-facebook-official"></i></a>
                    </li>
                  <?php endif; ?>
                  <?php if( $progressive['enable-youtube'] == 1 ) : ?>
                    <li class="footer__item">
                      <a href="<?php echo $progressive['youtube-link']; ?>" class="footer__link" target="_blank"><i class="fa  fa-youtube-play"></i></a>
                    </li>
                  <?php endif; ?>
                  <?php if( $progressive['enable-twitter'] == 1 ) : ?>
                    <li class="footer__item">
                      <a href="<?php echo $progressive['twitter-link']; ?>" class="footer__link" target="_blank"><i class="fa  fa-twitter"></i></a>
                    </li>
                  <?php endif; ?>
                  <?php if( $progressive['enable-instagram'] == 1 ) : ?>
                    <li class="footer__item">
                      <a href="<?php echo $progressive['instagram-link']; ?>" class="footer__link" target="_blank"><i class="fa  fa-instagram"></i></a>
                    </li>
                  <?php endif; ?>
                  <?php if( $progressive['enable-google-plus'] == 1 ) : ?>
                    <li class="footer__item">
                      <a href="https://plus.google.com/104898617555881150339?hl=en" class="footer__link" target="_blank"><i class="fa  fa-google-plus"></i></a>
                    </li>
                  <?php endif; ?>
                  <?php if( $progressive['enable-pinterest'] == 1 ) : ?>
                    <li class="footer__item">
                      <a href="<?php echo $progressive['pinterest-link']; ?>" class="footer__link" target="_blank"><i class="fa  fa-pinterest"></i></a>
                    </li>
                  <?php endif; ?>
                  <?php if( $progressive['enable-linkedin'] == 1 ) : ?>
                    <li class="footer__item">
                      <a href="<?php echo $progressive['linkedin-link']; ?>" class="footer__link" target="_blank"><i class="fa  fa-linkedin"></i></a>
                    </li>
                  <?php endif; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END FOOTER INFO -->

  </footer>
  <!-- END FOOTER -->
<?php endif; ?>

<div class='fab-main'>

  <div class="fab-inner">
    <div class="fab-btn-container">
      <div class="fab-btn fab-btn-primary"><i class="fa  fa-phone"></i></div>
      <?php if( $progressive['enable-ppc'] == 1  && !empty( $progressive['ppc-number'] ) ) : ?>
      <a href="tel:+1-<?php echo localize_us_number( $progressive['new-patient-number'] ); ?>" class="fab-btn fab-btn-secondary" target="_blank"><i class="fa  fa-phone"></i></a>
      <?php else : ?>
      <a href="tel:+1-<?php echo localize_us_number( $progressive['new-patient-number'] ); ?>" class="fab-btn fab-btn-secondary" target="_blank"><i class="fa  fa-phone"></i></a>
      <?php endif; ?>
      <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode( $progressive['address-line-one'] . ( !empty( $progressive['address-line-two'] ) ? ' ' . $progressive['address-line-two'] : '' ) . ', ' . $progressive['address-city'] . ', ' . $progressive['address-state'] . ' ' . $progressive['address-zip'] ); ?>" class="fab-btn fab-btn-tertiary"><i class="fa  fa-map-marker"></i></a>
    </div>
  </div>
</div>

<div class="c-modal" style="position:absolute" aria-hidden="true" tabindex="-1" role="dialog" id="modal">
  <div class="c-modal__wrap">
    <div class="c-modal__body">
      <div class="c-menu c-overlay" id="site-menu">
        <h3 class="c-overlay__title">Menu</h3>
        <ol class="o-breadcrumbs" aria-label="Navigation Path">
          <li class="o-breadcrumbs__item">
            <span>Menu</span>
          </li>
        </ol>
        <nav class="c-menu__main c-move__me">
          <ul class="c-menu__nav"  data-depth="0">
            <?php wp_nav_menu( array( 'menu_id' => 'primary-menu', 'theme_location' => 'primary-menu', 'items_wrap' => '%3$s', 'container' => false, 'menu_class' => false, 'walker' => new Wpse8170_Menu_Walker() ) ); ?>
          </ul>
        </nav>
      </div>
    </div>
    <button class="c-modal__close o-control" data-label="Chiudi">
      <span class="fa fa-times o-control__ico"></span>
    </button>
  </div>
</div>
<!-- <div class="phone-callout">
  <?php if( $progressive['enable-ppc'] == 1  && !empty( $progressive['ppc-number'] ) ) : ?>
    <a class="icon  icon--phone  clicktoCall" href="tel:+1-<?php echo localize_us_number( $progressive['new-patient-number'] ); ?>" target="_blank" data-call-tracking-number="<?php echo $progressive['new-patient-number']; ?>" data-ppc-tracking-number="<?php echo $progressive['ppc-number']; ?>"></a>
  <?php else : ?>
    <a class="fa  fa-phone" href="tel:+1-<?php echo localize_us_number( $progressive['new-patient-number'] ); ?>" target="_blank"></a>
  <?php endif; ?>
</div> -->

<?php
/**
* The template for displaying the footer
*/
wp_footer();

if( $progressive['footer-scripts'] ) :
  echo $progressive['footer-scripts'];
endif;
if( $progressive['footer-styles'] ) :
  echo $progressive['footer-styles'];
endif;
?>

<?php if( $progressive['map-theme'] == "custom" && !empty( $progressive['map-custom-theme'] ) ) : ?>
  <script>

  var customMap = <?php echo $progressive['map-custom-theme']; ?>

  </script>
<?php endif; ?>

<script>
function init() {
  var imgDefer = document.getElementsByTagName('img');
  for (var i=0; i<imgDefer.length; i++) {
    if(imgDefer[i].getAttribute('data-src')) {
      imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
      imgDefer[i].onload = function() {
        if($(this).parents('.vc_row-o-equal-height').length) {
          $('.vc_row-o-equal-height > div').matchHeight();
        }
      };
    }
  }
}
window.onload = init;

</script>

</body>
</html>
