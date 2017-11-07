import { TweenMax } from 'gsap';
import { Modal } from './modal';
import { Menu } from './menu';

const modal = new Modal();
modal.add( 'menu', '#site-menu' );

let openElement = Array.prototype.slice.call( document.querySelectorAll('[data-overlay]') ); // converts node list to array

openElement.map( function( el ) {
  el.onclick = function(e) {
    e.preventDefault();
    let type = el.dataset.overlay,
        title = el.getAttribute('aria-label');
    modal.loadOverlay( type, title );
  }
});

const menu = new Menu();

$('#site-menu').bind('overlayVisible', function() {
  menu.show();
});

$('#site-menu').bind('overlayHidden', function() {
  menu.hide();
});
