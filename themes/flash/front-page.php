<?php

get_header(); ?>

  <!-- <main class="main">

    <?php
    while ( have_posts() ) : the_post();

      //get_template_part( 'template-parts/content', 'page' );

    endwhile; // End of the loop.
    ?>
  </main> -->

  <div class="slider">
    <div class="slider__item  slider__item--valign  slider__item--masthead  section" id="slide-1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/home-banner.jpg);">
      <div class="slider__overlay"></div>
      <video class="slider__video" poster="<?php echo get_template_directory_uri(); ?>/assets/images/home-banner.jpg" preload="auto" loop autoplay muted data-autoplay>
        <source src="/wp-content/uploads/2017/11/broll.mp4" type="video/mp4">
      </video>
      <img class="slider__mobile" src="<?php echo get_template_directory_uri(); ?>/assets/images/home-banner.jpg" alt="<?php echo get_bloginfo(name) ?>">
      <div class="wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-10">
              <div class="slider__inner  slider__inner--center">
                <h1 class="slider__eyebrow">Fort Wayne Oral Maxillofacial Surgery &amp; Implant Center, Fort Wayne, IN</h1>
                <h2 class="slider__title">Exceptional Oral Surgery Care</h2>
                <div class="slider__btn-group">
                  <a href="/contact-us-fort-wayne-in" class="btn  btn--accent">SCHEDULE APPOINTMENT</a>
                  <a href="https://www.youtube.com/watch?v=uCvBpO28cKs" class="btn  btn--default  btn--ghost-white  js-slider-play">WATCH VIDEO</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="slider__item  slider__item--doctor  section" id="slide-2">
      <div class="slide  slider__item" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/doctor-img-home-01.jpg);">
        <img class="slider__mobile" src="<?php echo get_template_directory_uri(); ?>/assets/images/doctor-img-home-01.jpg" alt="<?php echo get_bloginfo(name) ?>">
        <div class="slider__content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-offset-5  col-md-6  col-lg-offset-5  col-lg-5  col-sm-12">
                <div class="slider__inner  slider__inner--doctor">
                  <h2 class="slider__title">Dr. Lugakingira</h2>
                  <p class="slider__desc"> Dr. Lugakingira a.k.a “The Implant Doctor”, a.k.a “Dr. Luga” is originally from Tanzania, East Africa. His undergraduate majors were Physics, Chemistry, Biology, and Advanced Mathematics. He earned his DDS degree from the University of Dar-es-salaam in 1999, and his DMD degree from the University of Pennsylvania in 2004, both with honors. His academic career was distinguished by numerous awards and honors. He earned his M.S degree and Certificate in Oral and Maxillofacial Surgery from the University of Illinois at Chicago in 2011.</p>
                  <a href="/doctor/dr-lugakingira-fort-wayne-in" class="btn  btn--accent  btn--bio">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slide  slider__item" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/doctor-img-home-02.jpg);">
        <img class="slider__mobile" src="<?php echo get_template_directory_uri(); ?>/assets/images/doctor-img-home-02.jpg" alt="<?php echo get_bloginfo(name) ?>">
        <div class="slider__content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-offset-5  col-md-6  col-lg-offset-5  col-lg-5  col-sm-12">
                <div class="slider__inner  slider__inner--doctor">
                  <h2 class="slider__title">Dr. Awah</h2>
                  <p class="slider__desc"> Dr. Franklin Awah joins our practice from Hanover Park, IL. He did his undergraduate studies at the University of Illinois at Chicago (UIC) where he majored in Information Technology. His passion for healthcare and service made him return to dental school at UIC. During dental school, he developed a love for oral surgery. His hard work and dedication was rewarded with the AAOMS Student of the Year award. He was accepted into the University of Alabama at Birmingham (UAB), one of the top oral surgery programs in the country.</p>
                  <a href="/doctor/dr-awah-fort-wayne-in" class="btn  btn--accent  btn--bio">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slider__controls  slider__controls--doctors">
        <div class="carousel__pagination  pagination">
          <div class="pagination__button  pagination__button--left"></div>
          <div class="pagination__button  pagination__button--right"></div>
        </div>
      </div>
    </div>

    <div class="slider__item  slider__item--testimonials  section" id="slide-3"  style="background-color: rgba(1,14,30,1);">
  <div class="slider__content">
    <div class="wrapper">
      <ul class="grid">
        <?php $stories = get_posts( array(
          'post_type' => 'testimonial',
          'post_status' => 'publish',
          'posts_per_page' => '6'
        )); ?>
        <?php $count = 1; foreach( $stories as $story) : ?>
          <li class="grid__item">
            <a href="<?php echo get_permalink( $story->ID ); ?>">
              <figure class="video  o-crop  o-crop--16:9  video--large">
                <div class="o-crop__content" style="background-image: url(<?php echo get_the_post_thumbnail_url( $story->ID, 'full' ); ?>)">
                  <div class="video__left">
                    <span class="video__headline  text-light"><?php echo $story->post_title; ?></span>
                    <h3 class="video__desc  text-light"><?php echo $story->post_excerpt; ?></h3>
                  </div>
                  <div class="video__right">
                    <span class="video__timestamp"><?php echo get_post_meta( $story->ID, '_timestamp', true ); ?></span>
                  </div>
                </div>

              </figure>
            </a>
          </li>
        <?php endforeach; ?>
        <!-- <li class="grid__item">
          <div class="video  video--blank  o-crop  o-crop--16:9">
            <div class="o-crop__content">
              <span class="video__headline  text-light">CREATE YOUR STORY</span>
              <h3 class="video__desc  text-light">Contact Our Team Today.</h3>
              <a href="/contact-us-weston-wi" class="btn  btn--small  btn--grid  btn--primary">Schedule Consultation</a>
            </div>
          </div>
        </li> -->
      </ul>
    </div>
  </div>
</div>

<div class="footer  slider__item  section">

<?php if( $progressive['enable-map'] == 1 && !is_page( 'contact-us-fort-wayne-in' ) ) : ?>
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
                  <!-- <li class="map__content-item">
                    <span class="map__content-info"><strong>Delaware Smile Center</strong></span>
                  </li> -->
                <li class="map__content-item">
                  <i class="fa fa-map-marker"></i>
                  <address class="map__content-info"><?php echo $progressive['address-line-one']; ?><?php echo ( !empty( $progressive['address-line-two'] ) ? ', ' . $progressive['address-line-two'] : '' ); ?><br> <?php echo $progressive['address-city']; ?>, <?php echo $progressive['address-state']; ?> <?php echo $progressive['address-zip']; ?></address>
                </li>
                <!-- NEW PATIENT NUMBER -->
                <?php if( $progressive['enable-new-patient-number'] == 1 && !empty( $progressive['new-patient-number'] ) ) : ?>
                <li class="map__content-item">
                  <i class="fa fa-mobile-phone"></i>
                  <?php if( $progressive['enable-ppc'] == 1  && !empty( $progressive['ppc-number'] ) ) : ?>
                  <span class="map__content-info">Phone:  <a href="tel:+1-<?php echo localize_us_number( $progressive['new-patient-number'] ); ?>" class="clickToCall" data-call-tracking-number="<?php echo $progressive['new-patient-number']; ?>" data-ppc-tracking-number="<?php echo $progressive['ppc-number']; ?>"><span class="webPpcNumber"><?php echo $progressive['ppc-number']; ?></a></span></span>
                  <?php else : ?>
                  <span class="map__content-info">Phone:  <a href="tel:+1-<?php echo localize_us_number( $progressive['new-patient-number'] ); ?>"><?php echo $progressive['new-patient-number']; ?></a></span>
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
                <!-- <li class="map__content-item">
                  <span class="map__content-info"><strong>Smile Center Ohio</strong></span>
                </li> -->
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
                <?php if( $progressive['enable-new-patient-number'] == 1 && !empty( $progressive['new-patient-number'] ) ) : ?>
                <li class="map__content-item">
                  <i class="fa fa-mobile-phone"></i>
                  <span class="map__content-info">Phone:  <a href="tel:+1-<?php echo localize_us_number( $progressive['new-patient-number'] ); ?>" target="_blank"><?php echo $progressive['new-patient-number']; ?></a></span>
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
            <p>Powered by Progressive Dental Marketing<span>&copy; <script>document.write( new Date().getFullYear() );</script> <?php echo get_bloginfo( 'name' ); ?></span></p>
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
                <a href="<?php echo $progressive['google-plus-link']; ?>" class="footer__link" target="_blank"><i class="fa  fa-google-plus"></i></a>
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

</div>

</div>

<?php
get_footer(); ?>
