const path = require('path');
const miniCss = require('mini-css-extract-plugin');
const autoprefixer = require('autoprefixer');

module.exports = {
    entry: './src/index.js',
    devtool: 'source-map',
    output: {
        filename: 'main.js',
        path: path.resolve(__dirname, 'dist')
    },
    module: {
        rules: [{
            test: /\.(s*)css$/,
            use: [
                miniCss.loader,
                'css-loader?sourceMap',
                {
                    loader: 'postcss-loader',
                    options: {
                        postcssOptions: {
                            plugins: [
                                [
                                    autoprefixer({
                                        overrideBrowserslist: ['last 2 versions'],
                                    })
                                ],
                            ],
                        },
                    },
                },
                'sass-loader?sourceMap',
                "import-glob-loader"
            ]
        }]
    },
    plugins: [
        new miniCss({
            filename: 'style.css',
        }),

    ],
};