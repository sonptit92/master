const path = require('path');

module.exports = {
  entry: './assets/js/app.js',
  output: {
    filename: 'app.js',
    path: path.resolve(__dirname, 'public/js')
  },
  module: {
    rules: [{
        test: /\.scss$/,
        use: ['style-loader', 'css-loader', 'sass-loader']
  }]
  }
};
