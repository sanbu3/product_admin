import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',  //这里是你的入口文件,可以是多个
                'resources/js/app.js',
            ],
            refresh: true,
        })
    ],
    build: {
        manifest: true,
        outDir: 'public/build',
        rollupOptions: {
            input: {
                main: './resources/js/main.js',
            },
        },
    },
});
