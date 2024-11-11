import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss', 
                'resources/js/app.js'
            ],
            refresh: true,
        }),

        // For our vendor stuff, we just copy it in.  We don't have a ton, so
        // this shouldn't be a huge deal with adding extra requests.
        viteStaticCopy({
            targets: [
                {
                    src: 'node_modules/bootstrap/dist/*',
                    dest: 'vendor/bootstrap'
                },
            ]
        })
    ],
});
