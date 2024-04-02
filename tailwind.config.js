import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/wire-elements/modal/resources/views/*.blade.php',
        './app/Livewire/**/*.php',
    ],
    safelist: [
        {
            pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
            variants: ['sm', 'md', 'lg', 'xl', '2xl','3xl','4xl','5xl'],
        },
    ],
    theme: {
        extend: {
            colors: {
                'main' : '#002C52',
                'icon' : '#d4777c'
            },
            fontFamily : {
                montserrat_light : [ "'Montserrat-Light' , sans-serif" ],
                montserrat_regular : [ "'Montserrat-Regular' , sans-serif" ],
                ptserifreg : [ "'PTSerif-Regular',serif" ],
                ptserif: "'PTSerif-Bold',serif"

            },
        },
        container: {
            screens: {
                '2xl': '1280px',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
