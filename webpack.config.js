const Encore = require('@symfony/webpack-encore');

Encore
    .setPublicPath('/build')
    .setOutputPath('public/build/')
    .addEntry('js/custom', './build/js/custom.js')
    .addStyleEntry('css/custom', './build/css/custom.css')
    .autoProvidejQuery()
    .disableSingleRuntimeChunk()
;

module.exports = Encore.getWebpackConfig();