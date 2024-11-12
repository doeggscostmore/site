import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // SCSS
                'resources/css/app.scss', 
                'resources/css/bootstrap.scss', 
                'resources/css/fonts.scss', 

                // JS
                'resources/js/app.js',
                'resources/js/bootstrap.js',
            ],
            refresh: true,
        }),
    ],
});
