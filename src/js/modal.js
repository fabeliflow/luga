function Modal() {
  this.getInitialState();
  this.overlays = new Map();
  this.el = $('.c-modal');
  this.reset();

  this.bindEvents();
}

Modal.prototype.bindEvents = function() {
  let $this = this;
  $(document).on("click", ".c-modal__close", function(e) {
    e.preventDefault();
    $this.unloadOverlay();
  });
 
}

Modal.prototype.add = function( name, selector ) {
  this.overlays.set( name, selector );
}

Modal.prototype.remove = function( name ) {
  this.overlays.delete( name );
}

Modal.prototype.loadOverlay = function( name, title ) {
  let overlay = this.overlays.get( name );
  this.currentOverlay = name;
  this.title = title;
  this.show( overlay );
}

Modal.prototype.unloadOverlay = function() {
  var overlay = this.overlays.get( this.currentOverlay );
  this.currentOverlay = null;
  this.hide( overlay );
}

Modal.prototype.show = function( overlay ) {
  let $this = this;
  $this.isOpen = true;

  TweenMax.to(modal, .4, {
    opacity: 1,
    scale: 1,
    onStart: function() {
      $this.el.addClass("is-open");
    },
    onComplete: function() {

      $(overlay).addClass( "is-visible" ).trigger('overlayVisible');

    }
  });
}

Modal.prototype.hide = function( overlay ) {
  this.isOpen = false;
  let $this = this;
  TweenMax.to( $this.el, .4, {
    opacity: 0,
    scale: .9,
    className: "-=is-board",
    onComplete: function() {
      $(overlay).removeClass( "is-visible" ).trigger('overlayHidden');
      $this.el.attr("tabindex", "-1");
      $this.el.attr("aria-hidden", "true");
      $this.el.removeClass("is-open");
      $this.el.focus();
    }
  });
}

Modal.prototype.getInitialState = function() {
  this.isOpen = false;
  this.currentOverlay = void 0;
  this.title = "Site Modal";
}

Modal.prototype.reset = function() {
  TweenMax.set(this.el, {
    opacity: 0,
    scale: .9
  });
}

export { Modal };
