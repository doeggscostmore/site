import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import VitePluginWebpCompress from 'vite-plugin-webp-compress';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // SCSS
                'resources/css/app.scss', 

                // JS
                'resources/js/app.js',
            ],
            refresh: true,
        }),

        VitePluginWebpCompress(),
    ],
});
