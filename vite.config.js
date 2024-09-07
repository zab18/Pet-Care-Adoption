import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react'; // Add React plugin import

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.jsx',  // Change app.js to app.jsx
            ],
            refresh: true,
        }),
        react(), // Add the React plugin here
    ],
});
