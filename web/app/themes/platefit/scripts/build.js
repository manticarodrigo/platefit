'use strict';

process.env.NODE_ENV = 'production';

// Makes the script crash on unhandled rejections instead of silently
// ignoring them. In the future, promise rejections that are not handled will
// terminate the Node.js process with a non-zero exit code.
process.on('unhandledRejection', err => {
  throw err;
});

const webpack = require('webpack');
const config = require('./webpack.config');

const clientCompiler = webpack(config);

console.log('[0/1] Creating an optimized production build...');
compile(config, (err, stats) => {
  handleWebpackErrors(err, stats);
  console.log('[1/1] Build successful!');
});

// Wrap webpack compile in a try catch.
function compile(config, cb) {
  let compiler;
  try {
    compiler = webpack(config);
  } catch (e) {
    printErrors('Failed to compile.', [e]);
    process.exit(1);
  }
  compiler.run((err, stats) => {
    cb(err, stats);
  });
}

// Print out errors
function printErrors(summary, errors) {
  console.log(summary);
  console.log();
  errors.forEach(err => {
    console.log(err.message || err);
    console.log();
  });
}

// Gracefully handle errors and print them to console.
function handleWebpackErrors(err, stats) {
  if (err) {
    printErrors('Failed to compile.', [err]);
    process.exit(1);
  }

  const info = stats.toJson();

  if (stats.hasErrors()) {
    printErrors('Failed to compile.', info.errors);
  }

  if (stats.hasWarnings()) {
    printErrors('Compilation warning!', info.warnings);
  }
}
