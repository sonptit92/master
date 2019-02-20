const path = require('path');
var SpritesmithPlugin = require('webpack-spritesmith');

module.exports = {
    entry: {
        public: './assets/js/app.js'
    },
    output: {
        filename: '[name].min.js',
        path: path.resolve(__dirname, 'static/js')
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: ['style-loader', 'css-loader', 'sass-loader']     
            },
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader']
            },
            {
                test: /\.(woff|woff2|eot|ttf|svg)$/,
                loader: 'url-loader?limit=100000'
            },
            {
                test: /\.png$/, 
                use: [ 'file-loader?name=i/[hash].[ext]']
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: 'babel-loader'
            }
        ]
    },
    resolve: {
        modules: ["node_modules", "spritesmith-generated"]
    },
    plugins: [
        new SpritesmithPlugin({
            src: {
                cwd: path.resolve(__dirname, 'assets/icon'),
                glob: '*.png'
            },
            target: {
                image: path.resolve(__dirname, 'sprites/sprite.png'),
                css: path.resolve(__dirname, 'sprites/sprite.scss')
            },
            apiOptions: {
                cssImageRef: "~sprite.png"
            }
        })
    ]
};
