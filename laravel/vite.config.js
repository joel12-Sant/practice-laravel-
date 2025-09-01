import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',   // Tailwind
        'resources/scss/app.scss', // SCSS
        'resources/js/app.js',
      ],
      refresh: true,
    }),
  ],
});
