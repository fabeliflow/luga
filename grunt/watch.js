module.exports = function () {
  "use strict";

  return {
    options: {
			'livereload': true,
    },
		sass: {
			files: ['<%= config.source.sass %>/**/*.scss', '<%= config.source.sass %>/**.scss'],
			tasks: ['sass:wp', 'sass:html', 'notify:watch']
		},
    // watch html files, only used for live reload
    html: {
      files: ['<%= config.html %>/*.html'],
      tasks: []
    },
    typescript: {
      files: ['<%= config.source.js %>/**/*.js'],
      tasks: ['babel', 'uglify', 'notify:watch']
    }
  };
};
