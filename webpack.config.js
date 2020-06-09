const CopyWebpackPlugin = require('copy-webpack-plugin')
const path = require('path')

const PATHS = {
    src: path.join(__dirname, 'web'),
    dist: path.join(__dirname, 'web/dist'),
}
module.exports = {
    mode: 'development',
    entry: {
        app: PATHS.src + '/js/app.js',
    },
    output: {
        path: PATHS.dist,
        filename: 'js/[name].js',
    },
    plugins: [
        new CopyWebpackPlugin({
            patterns: [
                {
                    from: 'node_modules/bootstrap/dist/css/bootstrap.css',
                    to: 'css',
                },
                {
                    from:
                        'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
                    to: 'js',
                },
                {
                    from: 'node_modules/jquery/dist/jquery.min.js',
                    to: 'js',
                },
                {
                    from: 'node_modules/moment/moment.js',
                    to: 'js',
                },
                {
                    from: 'node_modules/mithril/mithril.min.js',
                    to: 'js',
                },
            ],
        }),
    ],
}
