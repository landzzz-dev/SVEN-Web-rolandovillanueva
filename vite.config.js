import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
// import vuetify from 'vite-plugin-vuetify'

export default defineConfig({
    plugins: [
        vue(),
        // vuetify(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],

    define: {
        __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: false,
    },
});
