module.exports = function () {
  "use strict";

  return {
    wp: {
      options: {
        style:  'compressed', // compress stylesheet
				'sourcemap': 'auto', // allow browser to map generated CSS
        'precision': 7, // help avoid rounding errors
      },
			src: '<%= config.source.sass %>/site.scss',
      dest: '<%= config.theme %>/<%= config.destination.css %>/site.css',
    },
    html: {
      options: {
        style:  'compressed', // compress stylesheet
        'sourcemap': 'auto', // allow browser to map generated CSS
        'precision': 7, // help avoid rounding errors
      },
      src: '<%= config.source.sass %>/site.scss',
      dest: '<%= config.html %>/<%= config.destination.css %>/site.css',
    },
  };
};