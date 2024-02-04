import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { quasar, transformAssetUrls } from '@quasar/vite-plugin'


export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
         // @quasar/plugin-vite options list:
    // https://github.com/quasarframework/quasar/blob/dev/vite-plugin/index.d.ts
    quasar({
        sassVariables: 'resources/css/quasar-variables.sass'
      })
    ],
        devServer: {
          proxy: {
            '^/api': {
              target: 'http://192.168.1.2:8000', // Ajusta esto con la dirección IP y el puerto de tu servidor Laravel
              changeOrigin: true,
              pathRewrite: {
                '^/api': '',
              },
            },
          },
        },
});
