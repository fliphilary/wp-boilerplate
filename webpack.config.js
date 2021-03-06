const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const AssetsPlugin = require('assets-webpack-plugin');
const webpack = require('webpack');

const theme = 'boilerplate';

const extractSass = new ExtractTextPlugin({
  filename: "css/[name].[hash].css",
  disable: process.env.NODE_ENV === "development"
});

const assets = new AssetsPlugin({
  filename: 'manifest.json',
  path: path.resolve(`public/content/themes/${theme}/dist/`),
  fullPath: false
});

module.exports = {
  entry: './src/index.js',
  devtool: "inline-sourcemap",
  output: {
    path: path.resolve(`public/content/themes/${theme}/dist/`),
    filename: 'js/app.[chunkhash].js',
    publicPath: `/content/themes/${theme}/dist/`,
  },
  resolve: {
    extensions: ['.js', '.jsx']
  },
  module: {
    loaders: [
      { test: /\.json$/, loaders: ['json-loader'] },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        exclude: /node_modules/
      },
      {
        test: /\.scss|.css$/,
        use: extractSass.extract({
          use: [
            {
              loader:"css-loader",
              options:{sourceMap: true}
            },
            {
              loader:"sass-loader",
              options:{sourceMap: true}
            }
          ],
          fallback: "style-loader"})
      },
      {
        test: /\.(jpg|jpeg|gif|png|svg)(\?.*$|$)/,
        exclude: [/node_modules/,/src\/fonts/],
        loader:'url-loader?limit=1024&name=images/[name].[ext]',
      },
      {
        test: /\.(svg|woff|woff2|ttf|eot|otf)(\?.*$|$)/,
        exclude: [/src\/images/],
        loader: 'url-loader?limit=1024&name=fonts/[name].[ext]'
      }
    ]
  },
  plugins: [extractSass, assets ]
}
