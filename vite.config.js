import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import {resolve} from 'path'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/sass/alert-message.scss',
                'resources/sass/tabs.scss',
            ],
            refresh: true,
        }),
    ]
});
