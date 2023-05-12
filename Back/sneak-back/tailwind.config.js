const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },


    theme: {
        extend: {
            colors: {
                'white': '#ffffff',
                'bleuciel': '#3E84AC',
                'bleudg': '#24ABF9',
                'bleufd': '#12567D',
                'orangedg': '#FE5A21',
                'orangefd': '#EE1710',
            },
        },
    },

    variants: {
        backgroundColor: ['active', 'responsive', 'hover', 'focus', 'current']
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin'),
    ],

    darkMode: 'class',
};

