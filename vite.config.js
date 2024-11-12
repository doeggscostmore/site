import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // SCSS
                'resources/css/app.scss', 

                // JS
                'resources/js/app.js',

                // Images we use outside JS or CSS
                'resources/img/eggs-hero.jpg',
            ],
            refresh: true,
        }),
    ],
});
