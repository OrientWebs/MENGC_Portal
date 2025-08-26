import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import flowbite from 'flowbite/plugin';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js'
    ],


    theme: {
        extend: {
            colors: {
                // this is the color for website
                "primary": {
                    50: "#FEF9F6",
                    100: "#FCEFE8",
                    200: "#FAE2D6",
                    300: "#F6CFBB",
                    400: "#F2BCA0",
                    500: "#EEA47F",
                    600: "#EA8C5D",
                    700: "#E46F34",
                    800: "#CB551B",
                    900: "#8C3B12",
                    950: "#6C2E0E"
                },
                "secondary": {
                    50: "#EFF6FA",    // very light blue
                    100: "#DCEAF4",    // light blue
                    200: "#B9D4E9",    // soft blue
                    300: "#87B5D9",    // muted blue
                    400: "#3C8BC7",    // medium blue
                    500: "#234E70",    // base blue
                    600: "#0C61A2",    // strong blue
                    700: "#1B3C55",    // deep blue
                    800: "#17344A",    // darker blue
                    900: "#0C1B27",    // very dark blue
                    950: "#0C1B27"     // darkest blue (same as 900 for design consistency)
                }

            },
            fontFamily: {
                // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                'body': [
                    'Inter',
                    'ui-sans-serif',
                    'system-ui',
                    '-apple-system',
                    'system-ui',
                    'Segoe UI',
                    'Roboto',
                    'Helvetica Neue',
                    'Arial',
                    'Noto Sans',
                    'sans-serif',
                    'Apple Color Emoji',
                    'Segoe UI Emoji',
                    'Segoe UI Symbol',
                    'Noto Color Emoji'
                ],
                'sans': [
                    'Inter',
                    'ui-sans-serif',
                    'system-ui',
                    '-apple-system',
                    'system-ui',
                    'Segoe UI',
                    'Roboto',
                    'Helvetica Neue',
                    'Arial',
                    'Noto Sans',
                    'sans-serif',
                    'Apple Color Emoji',
                    'Segoe UI Emoji',
                    'Segoe UI Symbol',
                    'Noto Color Emoji'
                ]
            },
            transitionProperty: {
                'width': 'width'
            },
            screens: {
                'sm': '576px',
                // => @media (min-width: 576px) { ... }

                'md': '768px',
                // => @media (min-width: 768px) { ... }

                'lg': '1024px',
                // => @media (min-width: 1024px) { ... }

                'xl': '1280px',
                // => @media (min-width: 1280px) { ... }

                '2xl': '1536px',
                // => @media (min-width: 1536px) { ... }
            }
        },
    },

    plugins: [flowbite, forms, typography],
};
