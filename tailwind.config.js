const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "primary": {
                    50: "#ffe53d",
                    100: "#ffdb33",
                    200: "#ffd129",
                    300: "#ffc71f",
                    400: "#ffbd15",
                    500: "#fbb30b",
                    600: "#f1a901",
                    700: "#e79f00",
                    800: "#dd9500",
                    900: "#d38b00"
                },
                "secondary": {
                    "50": "#6173b0",
                    "100": "#5769a6",
                    "200": "#4d5f9c",
                    "300": "#435592",
                    "400": "#394b88",
                    "500": "#2f417e",
                    "600": "#253774",
                    "700": "#1b2d6a",
                    "800": "#112360",
                    "900": "#071956"
                }
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
