!function() {
  jQuery(document).ready(function() {
    var container = jQuery('#progressive_seo_box');
    container.removeClass('postbox');

    jQuery('input.background_image ').bind('change', function() {
      console.log('updated');
    });

  });

}();