import defaultTheme from 'tailwindcss/defaultTheme';
import typography from '@tailwindcss/typography'

/** @type {import('tailwindcss').Config} */
export default {
    purge: ['./resources/**/*.css', './resources/**/*.js', './resources/**/*.php'],
    theme: {
        colors: {
            ...defaultTheme.colors,
            scarlet: {
                100: '#FFEAE9',
                200: '#FFCBC7',
                300: '#FFABA5',
                400: '#FF6C62',
                500: '#FF2D1F',
                600: '#E6291C',
                700: '#991B13',
                800: '#73140E',
                900: '#4D0E09',
            },
        },
        extend: {
            fontFamily: {
                sans: ['Mulish', ...defaultTheme.fontFamily.sans],
                hind: ['Hind', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [typography],
};
