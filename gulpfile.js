// gulpfile.js
const { watch, series, src, dest } = require("gulp");
const sass = require('gulp-sass');
const postcss = require("gulp-postcss");
const purgecss = require('gulp-purgecss');
const concat = require('gulp-concat');
const concatCss = require('gulp-concat-css');
const tailwindcss = require('tailwindcss');

function createTailwindDev() {
  return src("./source/css/tailwind.css")
  .pipe(postcss())
  .pipe(dest("./build/css"))
}

function createTailwindProd() {
  return src("./source/css/tailwind.css")
  .pipe(postcss([
    tailwindcss('./tailwind.config.js'),
    ...(process.env.NODE_ENV === "production"
      ? [
          purgecss({
            content: ["**/*.php"],
            defaultExtractor: content =>
              content.match(/[\w-/:]+(?<!:)/g) || []
          })
        ]
      : [])
  ]))
  .pipe(dest("./build/css"))
}

//Мой код из SRC обрабатываем 
function cssSrc(cb) {
  return src("./source/css/src/*.scss")
    .pipe(postcss())
    .pipe(dest("./source/css/generate"))
  cb();
}

//Объеденяем все файлы
function cssConcat() {
  return src('./source/css/styles.css')
    .pipe(concatCss('bundle.css'))
    .pipe(dest('./build/css'))
}

function scss() {
  return src('./source/css/styles.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(dest('./build/css'));
}

function scripts() {
  return src('./source/javascript/**/*.js')
    .pipe(concat('all.js'))
    .pipe(dest('./build/js'));
}

// Default Gulp Task
exports.css = cssSrc;
exports.scss = scss;
exports.scripts = scripts;
exports.tailwind = createTailwindDev;
exports.cssdev = series(scss);
exports.default = series(createTailwindProd, cssSrc, scripts);