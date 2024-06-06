import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
            colors: {
                primary: {
                    100: "#dbeed8",
                    200: "#b6ddb1",
                    300: "#92cd8a",
                    400: "#6dbc63",
                    500: "#49ab3c",
                    600: "#3a8930",
                    700: "#2c6724",
                    800: "#1d4418",
                    900: "#0f220c"
                },
                offset: {
                    100: "#fff7db",
                    200: "#ffefb7",
                    300: "#fee892",
                    400: "#fee06e",
                    500: "#fed84a",
                    600: "#cbad3b",
                    700: "#98822c",
                    800: "#66561e",
                    900: "#332b0f"
                },
            }
        },
    },

    plugins: [forms],
};
