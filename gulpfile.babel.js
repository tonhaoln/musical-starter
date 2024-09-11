import { src, dest, watch, series, parallel } from 'gulp';
import * as fs from 'fs';
import autoprefixer from 'autoprefixer';
import browserSync from 'browser-sync';
import cssnano from 'cssnano';
import dartSass from 'sass';
import del from 'del';
import gulpif from 'gulp-if';
import gulpSass from 'gulp-sass';
import imagemin from 'gulp-imagemin';
import named from 'vinyl-named';
import postcss from 'gulp-postcss';
import rename from 'gulp-rename';
import sourcemaps from 'gulp-sourcemaps';
import webpack from 'webpack-stream';
import yargs from 'yargs';
import vars from './build/theme-vars.js';
import themeJson from './build/theme-json.js';
import DependencyExtractionWebpackPlugin from '@wordpress/dependency-extraction-webpack-plugin';
import 'dotenv/config'
const sass = gulpSass(dartSass);
const json = JSON.parse(fs.readFileSync('./package.json'))
const PRODUCTION = yargs.argv.prod;
const server = browserSync.create();

console.log(process.env);

export const styles = () =>
  src(['src/scss/main.scss', 'src/scss/fancybox.scss', 'blocks/**/*.scss'])
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([
      autoprefixer(),
      cssnano()
    ])))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('dist/css'))
    .pipe(server.stream());

export const editorStyles = () =>
  src(['src/scss/editor.scss'])
    .pipe(sass().on('error', sass.logError))
    .pipe(dest('dist/css'))
    .pipe(server.stream());

  export const images = () =>
  src('src/images/**/*.{jpg,jpeg,png,svg,gif}')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest('dist/images'));
    

  export const scripts = () =>
    src(['src/js/bundle.js', 'src/js/fancybox.js', 'blocks/**/*.js', '!blocks/**/*.min.js'])
      .pipe(named())
      .pipe(
        webpack({
          module: {
            rules: [
              {
                test: /\.js$/,
                use: {
                  loader: 'babel-loader',
                  options: {
                    presets: ['@babel/preset-env', '@babel/preset-react'],
                  },
                },
              },
              {
                test: /\.css$/,
                use: ['style-loader', 'css-loader'],
              },
              // Add this rule for SCSS files
              {
                test: /\.scss$/,
                use: ['style-loader', 'css-loader', 'sass-loader'],
              },
            ],
          },
          mode: PRODUCTION ? 'production' : 'development',
          devtool: !PRODUCTION ? 'inline-source-map' : false,
          output: {
            filename: '[name].js',
          },
          externals: {
            jquery: 'jQuery',
          },
          plugins: [
            new DependencyExtractionWebpackPlugin()
          ],
        })
      )
      .pipe(dest('dist/js'));

  export const editorScripts = () =>
    src(['src/js/ehd-editor.js'])
      .pipe(named())
      .pipe(
        webpack({
          module: {
            rules: [
              {
                test: /\.js$/,
                use: {
                  loader: 'babel-loader',
                  options: {
                    presets: ['@babel/preset-env', '@babel/preset-react'],
                  },
                },
              },
              {
                test: /\.css$/,
                use: ['style-loader', 'css-loader'],
              },
              // Add this rule for SCSS files
              {
                test: /\.scss$/,
                use: ['style-loader', 'css-loader', 'sass-loader'],
              },
            ],
          },
          mode: 'production',
          output: {
            filename: '[name].js',
          },
          
          plugins: [
            new DependencyExtractionWebpackPlugin()
          ],
        })
      )
      .pipe(dest('dist/js'));

  export const inlineSVG = () =>
    src('src/svgicons/**/*.svg')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(
      rename({
        prefix: 'inline-',
        suffix: '.svg',
        extname: '.php',
      })
    )
    .pipe(dest('dist/svgicons'));

    export const clean = () => del(['dist']);


export const serve = done => {
  server.init({
    proxy: 'https://'+process.env.LOCAL_URL,
  });
  done();
};


export const reload = done => {
  server.reload();
  done();
};

export const watchForChanges = () => {
  watch(['src/scss/**/*.scss', 'blocks/**/*.scss'], parallel(styles, editorStyles));
  watch(['src/js/**/*.js','blocks/**/*.js'], scripts);
  watch(['src/js/**/*.js'], editorScripts);
  watch('src/images/**/*.{jpg,jpeg,png,svg,gif}', series(images, reload));
  watch('src/svgicons/**/*.svg', series(inlineSVG, reload));
  watch('**/*.php', reload);
  watch('t-ehd.json', series(vars, themeJson, styles, editorStyles, reload));
  watch('theme.json', series(styles, editorStyles, reload));
};


export const dev = series(
  clean,
  parallel(vars, styles, editorStyles, images, inlineSVG, scripts, editorScripts),
  themeJson,
  serve, 
  watchForChanges
);

export const build = series(
  clean,
  parallel(vars, themeJson, styles, editorStyles, images, inlineSVG, scripts, editorScripts)
);


export default dev;
