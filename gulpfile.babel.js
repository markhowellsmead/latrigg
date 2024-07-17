import gulp from 'gulp';

const config = {
	name: 'WordPress Theme by Say Hello',
	key: 'latrigg',
	themeDir: './',
	assetsDir: './assets/',
	gulpDir: './.build/gulp/',
	assetsBuild: './.build/assets/',
	errorLog: function (error) {
		console.log('\x1b[31m%s\x1b[0m', error);
		if (this.emit) {
			this.emit('end');
		}
	},
};

import { task as taskStyles } from './.build/gulp/task-styles.js';
import { task as taskScripts } from './.build/gulp/task-scripts.js';
import { task as taskSvg } from './.build/gulp/task-svg.js';
import { task as taskGutenberg } from './.build/gulp/task-gutenberg.js';

export const styles = () => taskStyles(config);
export const scripts = () => taskScripts(config);
export const svg = () => taskSvg(config);
export const gutenberg = () => taskGutenberg(config);

export const watch = () => {
	const settings = { usePolling: true, interval: 100 };

	gulp.watch(config.assetsBuild + 'styles/**/*.scss', settings, gulp.series(styles));

	gulp.watch(config.assetsBuild + 'scripts/**/*.{scss,css,js}', settings, gulp.series(scripts));

	gulp.watch(config.assetsBuild + 'gutenberg/**/*.{scss,css,js,jsx}', settings, gulp.series(gutenberg));

	gulp.watch(config.assetsDir + 'settings.json', settings, gulp.series(gutenberg, scripts, styles));

	gulp.watch(config.themeDir + 'theme.json', settings, gulp.series(gutenberg, scripts, styles));

	gulp.watch([config.assetsDir + '**/*.svg', '!' + config.assetsDir + '**/*.min.svg'], settings, gulp.series(svg));
};

export const taskDefault = gulp.series(watch);
export default taskDefault;
