/*
 * jquery-match-height 0.7.2 by @liabru
 * http://brm.io/jquery-match-height/
 * License MIT
 */
 ! function(t) {
  "use strict";
  "function" == typeof define && define.amd ? define(["jquery"], t) : "undefined" != typeof module && module.exports ? module.exports = t(require("jquery")) : t(jQuery)
}(function(t) {
  var e = -1,
  o = -1,
  n = function(t) {
    return parseFloat(t) || 0
  },
  a = function(e) {
    var o = 1,
    a = t(e),
    i = null,
    r = [];
    return a.each(function() {
      var e = t(this),
      a = e.offset().top - n(e.css("margin-top")),
      s = r.length > 0 ? r[r.length - 1] : null;
      null === s ? r.push(e) : Math.floor(Math.abs(i - a)) <= o ? r[r.length - 1] = s.add(e) : r.push(e), i = a
    }), r
  },
  i = function(e) {
    var o = {
      byRow: !0,
      property: "height",
      target: null,
      remove: !1
    };
    return "object" == typeof e ? t.extend(o, e) : ("boolean" == typeof e ? o.byRow = e : "remove" === e && (o.remove = !0), o)
  },
  r = t.fn.matchHeight = function(e) {
    var o = i(e);
    if (o.remove) {
      var n = this;
      return this.css(o.property, ""), t.each(r._groups, function(t, e) {
        e.elements = e.elements.not(n)
      }), this
    }
    return this.length <= 1 && !o.target ? this : (r._groups.push({
      elements: this,
      options: o
    }), r._apply(this, o), this)
  };
  r.version = "0.7.2", r._groups = [], r._throttle = 80, r._maintainScroll = !1, r._beforeUpdate = null,
  r._afterUpdate = null, r._rows = a, r._parse = n, r._parseOptions = i, r._apply = function(e, o) {
    var s = i(o),
    h = t(e),
    l = [h],
    c = t(window).scrollTop(),
    p = t("html").outerHeight(!0),
    u = h.parents().filter(":hidden");
    return u.each(function() {
      var e = t(this);
      e.data("style-cache", e.attr("style"))
    }), u.css("display", "block"), s.byRow && !s.target && (h.each(function() {
      var e = t(this),
      o = e.css("display");
      "inline-block" !== o && "flex" !== o && "inline-flex" !== o && (o = "block"), e.data("style-cache", e.attr("style")), e.css({
        display: o,
        "padding-top": "0",
        "padding-bottom": "0",
        "margin-top": "0",
        "margin-bottom": "0",
        "border-top-width": "0",
        "border-bottom-width": "0",
        height: "100px",
        overflow: "hidden"
      })
    }), l = a(h), h.each(function() {
      var e = t(this);
      e.attr("style", e.data("style-cache") || "")
    })), t.each(l, function(e, o) {
      var a = t(o),
      i = 0;
      if (s.target) i = s.target.outerHeight(!1);
      else {
        if (s.byRow && a.length <= 1) return void a.css(s.property, "");
        a.each(function() {
          var e = t(this),
          o = e.attr("style"),
          n = e.css("display");
          "inline-block" !== n && "flex" !== n && "inline-flex" !== n && (n = "block");
          var a = {
            display: n
          };
          a[s.property] = "", e.css(a), e.outerHeight(!1) > i && (i = e.outerHeight(!1)), o ? e.attr("style", o) : e.css("display", "")
        })
      }
      a.each(function() {
        var e = t(this),
        o = 0;
        s.target && e.is(s.target) || ("border-box" !== e.css("box-sizing") && (o += n(e.css("border-top-width")) + n(e.css("border-bottom-width")), o += n(e.css("padding-top")) + n(e.css("padding-bottom"))), e.css(s.property, i - o + "px"))
      })
    }), u.each(function() {
      var e = t(this);
      e.attr("style", e.data("style-cache") || null)
    }), r._maintainScroll && t(window).scrollTop(c / p * t("html").outerHeight(!0)),
    this
  }, r._applyDataApi = function() {
    var e = {};
    t("[data-match-height], [data-mh]").each(function() {
      var o = t(this),
      n = o.attr("data-mh") || o.attr("data-match-height");
      n in e ? e[n] = e[n].add(o) : e[n] = o
    }), t.each(e, function() {
      this.matchHeight(!0)
    })
  };
  var s = function(e) {
    r._beforeUpdate && r._beforeUpdate(e, r._groups), t.each(r._groups, function() {
      r._apply(this.elements, this.options)
    }), r._afterUpdate && r._afterUpdate(e, r._groups)
  };
  r._update = function(n, a) {
    if (a && "resize" === a.type) {
      var i = t(window).width();
      if (i === e) return;
      e = i;
    }
    n ? o === -1 && (o = setTimeout(function() {
      s(a), o = -1
    }, r._throttle)) : s(a)
  }, t(r._applyDataApi);
  var h = t.fn.on ? "on" : "bind";
  t(window)[h]("load", function(t) {
    r._update(!1, t)
  }), t(window)[h]("resize orientationchange", function(t) {
    r._update(!0, t)
  })
});
! function() {




  // proximity 

  $('.vc_row > div:not(.article, .sidebar)').each(function() {
    $(this).children().last().addClass('mb0');
  });


$('.fab-btn-container').on('click', function() {
  $(this).toggleClass('active');
});





  /*
   * Proximity adjustments
   */
  var article = $('.article__content');

  if( article.find('figure').length ) {
    var figure = article.find('figure');

    if( !article.children().last().is('figure') ) {
      figure.css('margin-bottom', '40px');
    }
  }
  $('.section').each( function() {

    var section = $(this);
    // check if figure or carousel exist, if not, continue
    if( !section.find('figure, .carousel').length ) {
      return;
    }

    section.find('.vc_row').each( function(key) {
      var row = $(this);

      // check if figure or carousel exist, if not, continue
      if( !row.find('figure, .carousel').length ) {
        return;
      }
      
      // if row contains a figure and a headline, add small margin
      if( row.find('.headline').length ) {
        row.addClass('vc_row--small-margin');
        return;
      }

      var prev = row.prev();
      var next = row.next();
      var prevCol = prev.children().last();
      var nextCol = next.children().first();
      
      // If figure is attached to copy above, add small margin to parent row
      if ( prevCol.children().last().is('p') && nextCol.children().first().hasClass('headline') ) {
        prev.addClass('vc_row--small-margin');
        return;
      }

      // if figure is used as a seperator betweem text, add small margin to both
      if( prevCol.children().last().is('p') && nextCol.children().first().is('p') ) {
        prev.addClass('vc_row--small-margin');
        row.addClass('vc_row--small-margin');
      }

    });

  });

















  $('.implant__note .plus-icon .plus').on('click', function() {
    if ($(this).parents('.implant__note').hasClass('show-cont')) {
      $(this).parents('.implant__note').removeClass('show-cont')
    } else {
      console.log('here');
      $(this).parents('.implant__note').addClass('show-cont')
    }
  });
  // AOS.init({
  //   //disable: 'mobile',
  //   //startEvent: 'load'
  // });

  /* Blockquote */
  $('del').each(function() {
    var parent = $(this).parent();
    var blockquote = document.createElement("blockquote");
    var text = document.createTextNode($(this).text());
    blockquote.appendChild(text);
    $(this).replaceWith($(this).text());
    parent.prepend(blockquote);
  });

  //$('.article, .sidebar').matchHeight();
  function scrollHandler(e) {
        var oldScrollTop = scrollTop;

        var moved = scrollTop - oldScrollTop;
        var winHeight = window.innerHeight;
        var sidebar = $('.sidebar');
        var videoBottom = sidebar.outerHeight(true) - $('.page-head__top').outerHeight();

        if( $('.js-name').length ) {
            var scrollTop = $(window).scrollTop();
            var masthead = $('.js-name').offset().top;
            if (scrollTop > Math.max(masthead - 100) && !$('body').hasClass('is-scrolled')) {
                $('body').addClass('is-scrolled');
            } else if (scrollTop < Math.max(masthead - 100) && $('body').hasClass('is-scrolled')) {
                $('body').removeClass('is-scrolled');
            }
        }

        if( $('.img').length ) {
            var animateImage = $('.img').offset().top;
            if (scrollTop > (animateImage - $('.img').find('img').height())) {
                $('.img').find('img').addClass('in-view');
            }
        }

        if( scrollTop > winHeight && scrollTop < videoBottom ) {
            $('body').addClass('show-slideout-video');
        } else {
            $('body').removeClass('show-slideout-video');
        }

        if( $('.js-avatar').length ) {
            var avatar = $('.js-avatar').offset().top;
            if (scrollTop > avatar) {
                $('body').addClass('js-nav--fixed');
            } else {
                $('body').removeClass('js-nav--fixed');
            }
        }
    }
  $(window).on('wheel', scrollHandler);
  $(window).on('scroll', scrollHandler);
  $(window).on('touchmove', scrollHandler);

  $('.wpcf7').on('mailsent.wpcf7', function(event) {
    if (typeof ga === 'function') {
      if (localStorage.getItem("fromAd") == '1') {
                // PPC user form fill goals
                ga('send', 'event', 'Form - PPC Contact Form', 'Submit', 'Home');
                ga('send', 'pageview', '/goals/PPC-Contact-Form');
              } else {
                var goal = $(this).find('[data-goal]').data('goal');
                ga('send', 'pageview', goal);
              }
            }
          });

  // Uses min-height to account for sidebars margin offset
  $('.vc_row-o-equal-height > div').matchHeight({ property: 'min-height' });

  $('.fifty__play, .video-box__play, .testimonial__play, .video-play, .js-play-video, .js-play-button, .slider__play, .js-slider-play').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
    disableOn: 0,
    iframe: {
      patterns: {
        youtube: {
          index: 'youtube.com',
          id: 'v=',
          src: '//www.youtube.com/embed/%id%?autoplay=1&rel=0&modestbranding=1&autohide=1&showinfo=0'
        }
      }
    }
  });

  if( $('.carousel').length ) {
    $('.carousel').each(function() {
      $(this).parent().css('padding', 0);
    });
  }

  // $(".animsition").animsition({
  //   inClass: 'fade-in',
  //   outClass: 'fade-out',
  //   inDuration: 250,
  //   outDuration: 250,
  //   linkElement: 'a:not([target="_blank"]):not([href^="#"]):not(.js-play-button):not(.page-head__menu):not(.slider__play)',
  //   loading: true,
  //   loadingParentElement: 'body', //animsition wrapper element
  //   loadingClass: 'animsition-loading',
  //   loadingInner: '', // e.g '<img src="loading.svg" />'
  //   timeout: false,
  //   timeoutCountdown: 5000,
  //   onLoadEvent: true,
  //   browser: [ 'animation-duration', '-webkit-animation-duration'],
  //   // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
  //   // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
  //   overlay : false,
  //   overlayClass : 'animsition-overlay-slide',
  //   overlayParentElement : 'body',
  //   transition: function(url){ window.location.href = url; }
  // });

  $('.testimonial-slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
  });

  var cardCarousel = $('.js-card-carousel');

  cardCarousel.each( function() {
    var carousel = $(this);
    var carouselCaptions = carousel.parent().find('.carousel__captions');
    var carouselPagination = carousel.parent().find('.carousel__pagination');
    var leftArrow = carouselPagination.find('.pagination__button--left');
    var rightArrow = carouselPagination.find('.pagination__button--right');
    var captions = carousel.data('captions');

    var options = {
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false
    }
    if( true == captions ) {
      options.asNavFor = carouselCaptions;
    }

    carousel.on('init', function( event, slick, direction ) {
      if( carousel.find('.slick-slide').length < 2 ) {
        carousel.parent().find( '.carousel__pagination' ).hide();
      }
    });
    carousel.slick(options);

    leftArrow.on('click', function() {
      carousel.slick('slickPrev');
    });
    rightArrow.on('click', function() {
      carousel.slick('slickNext')
    });
    if( true == captions ) {
      carouselCaptions.slick({
        infinite: true,
        speed: 200,
        fade: true,
        arrows: false,
      });
    }
  });

  $('[data-plugin="collapse"]').accordion({
    heightStyle: "content",
    animate: 300
  });

  $('.js-share-popup').click(function(e) {
        e.preventDefault();
        window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
        return false;
    });

  $('.accordion__title').on('click', function(el) {
    $('.accordion__title').each(function(i, el) {
      $(this).find('.accordion__icon').text($(el).is(".ui-state-active") ? "-" : "+");
    });
  });

  $('.slider').fullpage({
        anchors: ['welcome', 'doctor', 'testimonial', 'testimonialgrid'],
        navigation: true,
        css3: true,
        scrollingSpeed: 1000,
        easing: 'easeInOutCubic',
        easingcss3: 'ease-in-out',
        fadingEffect: 'sections',
        responsiveWidth: 991,
        fadingEffectKey: 'cGRjaHVwYWNhYnJhLnN0YWdpbmcud3BlbmdpbmUuY29tX2ZLbFptRmthVzVuUldabVpXTjB6MlU=',
        onSlideLeave: function( anchorLink, index, slideIndex, direction, nextSlideIndex ) {
            var leavingSlide = $(this);
            leavingSlide.addClass('leaving');
            if(anchorLink == "testimonial") {
                var height = $('.slider__controls').outerHeight();
                $('.slider__controls').css('height', height + 'px');
                $('.slider__quote').fadeOut('slow');

            }
        },
        afterSlideLoad( anchorLink, index, slideAnchor, slideIndex ) {
            // $('.slide').removeClass('leaving');
            var slide = $(this);
            $()
            if(anchorLink == "testimonial") {
                var quote = slide.data('quote');
                $('.slider__quote').html(quote).fadeIn('fast');
                $('.slider__controls').css('height', 'auto');
            }
        }
    });
 

  $('.slider__controls--testimonials .pagination__button--right,.slider__controls--doctors .pagination__button--right').on('click', function() {
        $.fn.fullpage.moveSlideRight();
    });
    $('.slider__controls--testimonials .pagination__button--left,.slider__controls--doctors .pagination__button--left').on('click', function() {
        $.fn.fullpage.moveSlideLeft();
    });

    if(document.body.clientWidth <= 870) { $('video').attr('autoplay', false); $('.slider__video')[0].load(); }
  $(window).on('resize', function() {
       if(document.body.clientWidth <= 870) {
          $('video').attr('autoplay', false);
          $('.slider__video')[0].load();
         
      } else {
        $('video').attr('autoplay', true);
        $('.slider__video')[0].play();
      }
    });


  window.load = function() {
    $('.accordion__title').each(function(i, el) {
      $(this).find('.accordion__icon').text($(el).is(".ui-state-active") ? "-" : "+");
    });

  }


        $('[data-plugin="scrollTo"]').on('click', function(e) {
          e.preventDefault();
          var el = $(this).attr('href');
          $('html, body').animate({
            scrollTop: $(el).offset().top - 60
          }, 1000);
        });
        $(window).on('load resize', function() {
          var mapcanvas = $('#map');
          var container = $('.contact__map');
          var x = container.width();
          var y = container.height();
          mapcanvas.css({
            'width': x + 'px',
            'height': y + 'px'
          });


        });

        $(".tabs__button-item a").on("click", function(e) {
          e.preventDefault();
          console.log('click');
          $(".tabs__content").removeClass("active");
          $(".tabs__button-item").removeClass("active");
          $(this).parent().addClass("active");
          $(".tabs__content-" + $(this).data("index")).addClass("active");
        });
        $('[data-plugin="scrollTo"]').on('click touch', function(e) {
          e.preventDefault();
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;

          }
        });


        $('.product__images').slick({
          dots: false,
          infinite: true,
          speed: 500,
          arrows: false
        });

    // WebFont.load({
    //   google: {
    //     families: [ 'Lato:300,400,700,900' ]
    //   }
    // });
  }();