function Menu() {
  this.getInitialState();
  this.options = this.get();
  this.el = $('.c-menu');
  this.mainMenu = this.el.find( this.options.mainMenu ).first();
  this.menuNav = this.mainMenu.children( this.options.menuNav );
  this.menuItems = this.menuNav.children( this.options.menuItem );
  this.menuCrumbs = this.el.find( this.options.menuCrumbs );
  this.setupAttributes( this.menuItems, !1 );
  this.bindEvents();
  //r.setState("currentNav", r.$menuNav, !0)
}

Menu.prototype.bindEvents = function() {
  let $this = this;

  this.menuItems.find('a').on('click', function( event ) {

    let link = $(event.currentTarget),
        parent = link.parent(),
        children = parent.children( $this.options.mainMenu );

    link.hasClass("preventDefault") && event.preventDefault();
    $this.changeItem( parent );
  });

  this.menuItems.find(".c-modal__cmd").on("click", function( event ) {
    event.preventDefault();
    let currentItem = $this.currentItem,
        currentItemNav = currentItem.parents( $this.options.menuNav ).first(),
        currentItemActive = currentItemNav.parents( $this.options.menuItem + '.is-active').first(),
        depth = currentItemNav.data('depth');

    currentItem.removeClass('is-active');
    $this.changeColumn( depth );
    $this.changeNav( currentItemNav );
    $this.changeItem( currentItemActive );
    // var n = e.state.get("currentItem"),
    //     i = n.parents(".c-menu__nav").first(),
    //     r = i.parents(".c-menu__item.is-active").first(),
    //     o = i.data("depth");
    // n.removeClass("is-active");
    // e.setState("currentColumn", o);
    // e.setState("currentNav", i, !0);
    // e.setState("currentItem", r, !0);
  });
}

Menu.prototype.renderCrumb = function( text ) {
  let el = $('<li class="o-breadcrumbs__item" />');
  $("<a />", {
    href: "#",
    text: text
  }).appendTo( el );
  this.menuCrumbs.append( el )
}

Menu.prototype.changeItem = function( item ) {
  let currentItem = this.currentItem,
      $this = this;

  this.currentItem = item;

  if ( currentItem && null !== currentItem && currentItem.length) {
    var oldParent = currentItem.get(0).parentElement,
        newParent = item.get(0).parentElement,
        newNav = item.children( $this.options.mainMenu ).children( $this.options.menuNav ),
        oldNav = currentItem.children( $this.options.mainMenu).children( $this.options.menuNav );

    if ( oldParent === newParent ) {
      item.addClass("is-active");
      currentItem.removeClass("is-active");
      TweenMax.set( oldNav.children( $this.options.menuItem ), {
        clearProps: "all"
      });
    } else {
      var a = item.parent().children( $this.options.menuItem + ".is-active" );
      if( a.length ) {
        TweenMax.set( a, {
          className: "-=is-active",
          //clearProps: "all"
        });
        TweenMax.set( a.find( $this.options.menuItem ), {
          className: "-=is-active",
          //clearProps: "all"
        });
      }
      item.addClass("is-active")
      //$this.changeNav( newNav );
      $this.renderCrumb( item.children("a").text() );

    }
    TweenMax.staggerFromTo( newNav.children( $this.options.menuItem ), .5, {
      autoAlpha: 0,
      x: 30
    }, {
      autoAlpha: 1,
      x: 0,
      ease: Sine.easeOut,
      clearProps: "transform",
    }, .15);

    
  } else {
    item.addClass('is-active');
    let children = item.children( $this.options.mainMenu ).children( $this.options.menuNav );
    $this.changeNav( children );
    $this.renderCrumb( item.children("a").text() );

    TweenMax.staggerTo( children.children( $this.options.menuItem ), .5, {
      autoAlpha: 1,
      ease: Sine.easeOut
    }, .15);
  }
}

Menu.prototype.changeNav = function( nav ) {

  let currentNav = this.currentNav,
      $this = this,
      items = nav.children( $this.options.mainMenu ).children( $this.options.menuItem ),
      depth = nav.data('depth');

  this.currentNav = nav;

  $this.setupAttributes( items, !1 );
  $this.changeColumn( depth );

  if( currentNav && null !== currentNav ) {
    currentNav.attr("aria-hidden", !0);
    var children = currentNav.children( $this.options.mainMenu ).children( $this.options.menuItem ),
        links = children.find("a");
        links.attr("tabindex", -1);
    $(currentNav).find('.c-modal__cmd').css({opacity: 0});
  } else {
    TweenMax.staggerFromTo( items.children( $this.options.menuItem ), .5, {
      autoAlpha: 0,
      x: 30
    }, {
      autoAlpha: 1,
      x: 0,
      ease: Sine.easeOut,
      clearProps: "transform"
    }, .15);
    console.log('here');
    $(currentNav).find('.c-modal__cmd').css({opacity: 0});
    // TweenMax.staggerFromTo( $(nav).find('.c-modal__cmd'), .5, {
    //   autoAlpha: 1,
    //   x: 0
    // }, {
    //   autoAlpha: 0,
    //   x: 30,
    //   ease: Sine.easeOut,
    //   clearProps: "transform"
    // }, 1.5);
  }

}

Menu.prototype.changeColumn = function( column ) {

  let currentColumn = column,
      $this = this,
      percent = '';

  this.currentColumn = column;

  if( $(window).width() < 1200 ) {
    percent = '-100';
  } else {
    percent = '-50';
  }

  TweenMax.to( $this.mainMenu, .5, {
    xPercent: percent * column,
    ease: Power2.easeInOut,
    onComplete: function() {
      //console.log($($this.currentItem).find('.c-modal__cmd'));
      TweenMax.to( $($this.currentNav.find('.c-modal__cmd')), .5, {
        opacity: 1
      });
    }
  });

}

Menu.prototype.setupAttributes = function( items, e ) {
  let $this = this;

  items.each( (t, el) => {
    let item = $(el),
        link = item.find("a"),
        children = item.children( $this.options.mainMenu ).children( $this.options.menuNav );

    item.attr("role", "menuitem");
    if( e ) { link.attr("tabindex", -1) } else { link.attr("tabindex", 0); }
    if( children.length ) {
      children.attr("role", "menu");
      children.attr("aria-hidden", !0);
      var a = children.children( $this.options.menuItem );
      $this.setupAttributes(a, !0);
    }
  });
}

Menu.prototype.show = function() {
  var $this = this;
  TweenMax.staggerFromTo( $this.menuItems, .5, {
    autoAlpha: 0,
    x: 30
  }, {
    autoAlpha: 1,
    x: 0,
    ease: Sine.easeOut,
    clearProps: "transform"
  }, .15);
}

Menu.prototype.hide = function() {
  var $this = this;

  $this.getInitialState();
  $this.setupAttributes( $this.menuItems, !1 );
  $this.changeColumn( $this.currentColumn );
  let active = $this.el.find( $this.options.menuItem + ".is-active" );
  TweenMax.set( active, {
    className: "-=is-active",
    //clearProps: "all"
  });
  TweenMax.set( active.find( $this.options.menuItem ), {
    className: "-=is-active",
    //clearProps: "all"
  });
}

Menu.prototype.getInitialState = function() {
  this.currentItem = void 0;
  this.currentNav = void 0;
  this.currentColumn = 0;
  this.pathNav = [];
}

Menu.prototype.get = function() {
  return {
    mainMenu: ".c-menu__main",
    menuItem: ".c-menu__item",
    menuNav: ".c-menu__nav",
    menuBack: ".c-menu__back",
    menuCrumbs: ".o-breadcrumbs"
  }
}

export { Menu };