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

    $('.implant__note .plus-icon .plus').on('click', function() {
        if ($(this).parents('.implant__note').hasClass('show-cont')) {
            $(this).parents('.implant__note').removeClass('show-cont')
        } else {
            console.log('here');
            $(this).parents('.implant__note').addClass('show-cont')
        }
    });
    AOS.init({
        disable: 'mobile'
    });

    function scrollHandler(e) {
        var oldScrollTop = scrollTop;
        var masthead = $('.js-name').offset().top;
        var scrollTop = $(window).scrollTop();
        var avatar = $('.js-avatar').offset().top;
        var moved = scrollTop - oldScrollTop;
        var animateImage = $('.image-container').offset().top;

        if (scrollTop > Math.max(masthead - 100) && !$('body').hasClass('is-scrolled')) {
            $('body').addClass('is-scrolled');
        } else if (scrollTop < Math.max(masthead - 100) && $('body').hasClass('is-scrolled')) {
            $('body').removeClass('is-scrolled');
        }


        if (scrollTop > (animateImage - $('.image-container').find('img').height())) {
            $('.image-container').find('img').addClass('in-view');
        }

        if (scrollTop > avatar) {
            $('body').addClass('js-nav--fixed');
        } else {
            $('body').removeClass('js-nav--fixed');
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


    $('.fifty__play, .video-box__play, .testimonial__play, .video-play, .js-play-video').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    $('.testimonial-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
    });

    $('.js-card-carousel').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.carousel__captions',
        arrows: false
    });

    $(".carousel__captions").slick({
        asNavFor: '.js-card-carousel',
        infinite: true,
        speed: 200,
        fade: true,
        appendArrows: $('.carousel__pagination'),
        prevArrow: '<div class="pagination__button  pagination__button--left"></div>',
        nextArrow: '<div class="pagination__button  pagination__button--right"></div>'
    })

    $('[data-plugin="collapse"]').accordion({
        heightStyle: "content",
        animate: 300
    });

    $('.accordion__title').on('click', function(el) {
        $('.accordion__title').each(function(i, el) {
            $(this).find('.accordion__icon').text($(el).is(".ui-state-active") ? "-" : "+");
        });
    });

    window.load = function() {
        $('.accordion__title').each(function(i, el) {
            $(this).find('.accordion__icon').text($(el).is(".ui-state-active") ? "-" : "+");
        });
    }

    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 12,
            scrollwheel: false,
            draggable: false,
            disableDefaultUI: true,
            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(28.539949, -81.360987), // New York

            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{
                "featureType": "all",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "saturation": 36
                }, {
                    "color": "#000000"
                }, {
                    "lightness": 40
                }]
            }, {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#000000"
                }, {
                    "lightness": 16
                }]
            }, {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 17
                }, {
                    "weight": 1.2
                }]
            }, {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 21
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 17
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 29
                }, {
                    "weight": 0.2
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 18
                }]
            }, {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 16
                }]
            }, {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 19
                }]
            }, {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 17
                }]
            }]
        };

        // Get the HTML DOM element that will contain your map
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        var pinColor = "2A9E71";
        var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
            new google.maps.Size(21, 34),
            new google.maps.Point(0, 0),
            new google.maps.Point(10, 34));
        var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
            new google.maps.Size(40, 37),
            new google.maps.Point(0, 0),
            new google.maps.Point(12, 35));
        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(28.539949, -81.360987),
            map: map,
            title: 'Snazzy!',
            icon: pinImage,
            shadow: pinShadow
        });
        map.panBy(250, 0);
        var pos = marker.getPosition();
        window.onresize = function() {
            var myMap = document.getElementById('map');

            google.maps.event.trigger(myMap, 'resize');
            map.setCenter(pos); // Add this line to recentre the map
            map.panBy(250, 0);

            if ($(window).width() < 992) {
                marker.setMap(null);
            } else {
                marker.setMap(map);
            }
        }
        window.addEventListener('zoom_changed', function() {
            map.setCenter(pos); // Add this line to recentre the map
            map.panBy(250, 0);
        });

        if ($(window).width() < 992) {
            marker.setMap(null);
        }
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
