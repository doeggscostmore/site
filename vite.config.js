import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import VitePluginWebpCompress from 'vite-plugin-webp-compress';

export default defineConfig({
    esbuild: { legalComments: 'eof' },

    plugins: [
        laravel({
            input: [
                // SCSS
                'resources/css/app.scss',
                'resources/css/vendor.scss',

                // JS
                'resources/js/app.js',
                'resources/js/vendor.js',

                // Favicons
                'resources/img/favicon.png'
            ],
            refresh: true,
        }),

        VitePluginWebpCompress(),
    ],
});
