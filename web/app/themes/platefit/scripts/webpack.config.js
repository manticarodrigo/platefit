'use strict';

const webpack = require('webpack');
const autoprefixer = require('autoprefixer');
const AssetsPlugin = require('assets-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const FriendlyErrorsPlugin = require('friendly-errors-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const SpriteLoaderPlugin = require('svg-sprite-loader/plugin');
const path = require('path');
const fs = require('fs');

const appDirectory = fs.realpathSync(process.cwd());

function resolveApp(relativePath) {
  return path.resolve(appDirectory, relativePath);
}

function resolveTheme(folder) {
  const theme = path.basename(path.resolve('.'));
  return `/wp/wp-content/themes/${theme}/${folder}`;
}

const paths = {
  appSrc: resolveApp('src'),
  appBuild: resolveApp('build'),
  appPublic: resolveTheme('build'),
  appJs: resolveApp('src/app.js'),
  appEditorJs: resolveApp('src/editor.js'),
  appSprites: resolveApp('src/sprites.js'),
  appNodeModules: resolveApp('node_modules'),
};

const DEV = process.env.NODE_ENV === 'development';

module.exports = [
  {
    name: 'web',
    bail: !DEV,
    mode: DEV ? 'development' : 'production',
    devtool: DEV ? 'cheap-eval-source-map' : 'source-map',
    entry: {
      app: paths.appJs,
      editor: paths.appEditorJs,
    },
    output: {
      path: paths.appBuild,
      filename: DEV ? '[name].js' : '[name].[hash:8].js',
    },
    module: {
      rules: [
        { parser: { requireEnsure: false } },
        {
          test: /\.js?$/,
          loader: 'babel-loader',
          include: paths.appSrc,
        },
        {
          test: /\.(css|sass|scss)$/,
          use: [
            MiniCssExtractPlugin.loader,
            'css-loader',
            {
              loader: 'postcss-loader',
              options: {
                ident: 'postcss',
                plugins: () => [autoprefixer({})],
              },
            },
            'sass-loader',
          ],
        },
        {
          test: /\.(ttf|otf|eot|woff2?|png|jpe?g|gif|svg|ico|mp4|webm)$/,
          loader: 'url-loader',
          options: {
            name: `assets/[name]${DEV ? '' : '.[hash:8]'}.[ext]`,
            limit: 8192,
          },
        },
      ],
    },
    optimization: {
      minimize: !DEV,
      minimizer: [
        new OptimizeCSSAssetsPlugin({
          cssProcessorOptions: {
            map: {
              inline: false,
              annotation: true,
            },
          },
        }),
        new TerserPlugin({
          terserOptions: {
            compress: {
              warnings: false,
            },
            output: {
              comments: false,
            },
          },
          sourceMap: true,
        }),
      ],
    },
    plugins: [
      !DEV && new CleanWebpackPlugin(['build']),
      new MiniCssExtractPlugin({
        filename: DEV ? '[name].css' : '[name].[hash:8].css',
      }),
      new webpack.EnvironmentPlugin({
        NODE_ENV: 'development', // use 'development' unless process.env.NODE_ENV is defined
        DEBUG: false,
      }),
      new AssetsPlugin({
        path: paths.appBuild,
        filename: 'assets.json',
        entrypoints: true,
      }),
      DEV &&
        new FriendlyErrorsPlugin({
          clearConsole: false,
        }),
    ].filter(Boolean),
  },
  {
    name: 'sprite',
    bail: !DEV,
    mode: DEV ? 'development' : 'production',
    entry: {
      sprites: paths.appSprites,
    },
    output: {
      path: paths.appBuild,
      filename: DEV ? '[name].js' : '[name].[hash:8].js',
    },
    module: {
      rules: [
        { parser: { requireEnsure: false } },
        {
          test: /\.js?$/,
          loader: 'babel-loader',
          include: paths.appSrc,
        },
        {
          test: /\.svg$/,
          loader: 'svg-sprite-loader',
          options: {
            extract: true,
            spriteFilename: 'sprites.svg',
          },
        },
      ],
    },
    plugins: [
      !DEV && new CleanWebpackPlugin(['build']),
      new SpriteLoaderPlugin({
        plainSprite: true,
      }),
      new webpack.EnvironmentPlugin({
        NODE_ENV: 'development', // use 'development' unless process.env.NODE_ENV is defined
        DEBUG: false,
      }),
      DEV &&
        new FriendlyErrorsPlugin({
          clearConsole: false,
        }),
    ].filter(Boolean),
  },
];
