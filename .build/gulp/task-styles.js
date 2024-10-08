import { src, dest } from 'gulp';
import cleanCSS from 'gulp-clean-css';
import filter from 'gulp-filter';
import sassImportJson from 'gulp-sass-import-json';
import autoprefixer from 'gulp-autoprefixer';
import rename from 'gulp-rename';
import sourcemaps from 'gulp-sourcemaps';
import sassModule from 'gulp-sass';
import sassCompiler from 'sass';

const sass = sassModule(sassCompiler);

export const task = (config) => {
	return (
		src(config.assetsBuild + 'styles/**/*.scss')
			.pipe(sassImportJson({ cache: false, isScss: true }))
			.pipe(sourcemaps.init())
			.pipe(
				sass({
					includePaths: ['./node_modules/'],
				}).on('error', sass.logError)
			)
			.pipe(sourcemaps.write({ includeContent: false }))
			.pipe(sourcemaps.init({ loadMaps: true }))
			.pipe(autoprefixer())
			.pipe(dest(config.assetsDir + 'styles/'))
			.pipe(sourcemaps.write('.'))
			.on('error', config.errorLog)
			// Minify
			.pipe(cleanCSS())
			.pipe(
				rename({
					suffix: '.min',
				})
			)
			.on('error', config.errorLog)
			.pipe(dest(config.assetsDir + 'styles/'))
			.pipe(filter('**/*.css'))
	);
};
