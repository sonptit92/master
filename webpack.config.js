const path = require('path');

module.exports = {
  entry: './assets/js/app.js',
  output: {
    filename: 'app.css',
    path: path.resolve(__dirname, 'public/css')
  },
  module: {
    rules: [{
      test: /\.scss$/,
      use: [{
          loader: "style-loader"
      }, {
          loader: "css-loader"
      }, {
          loader: "sass-loader",
          options: {
              includePaths: ["absolute/path/a", "absolute/path/b"]
          }
      }]
  }]
  }
};