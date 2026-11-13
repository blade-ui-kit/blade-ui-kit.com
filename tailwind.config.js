import typography from '@tailwindcss/typography';

// Keep the v3 fallback stack when the web fonts are unavailable.
const sans = ['ui-sans-serif', 'system-ui', 'sans-serif', '"Apple Color Emoji"', '"Segoe UI Emoji"', '"Segoe UI Symbol"', '"Noto Color Emoji"'];

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: ['./resources/**/*.css', './resources/**/*.js', './resources/**/*.php'],
    theme: {
        extend: {
            colors: {
                // Preserve the v3 palette instead of adopting v4's OKLCH colors.
                gray: {
                    50: '#f9fafb',
                    100: '#f3f4f6',
                    200: '#e5e7eb',
                    300: '#d1d5db',
                    400: '#9ca3af',
                    500: '#6b7280',
                    600: '#4b5563',
                    700: '#374151',
                    800: '#1f2937',
                    900: '#111827',
                    950: '#030712',
                },
                red: {
                    50: '#fef2f2',
                    100: '#fee2e2',
                    200: '#fecaca',
                    300: '#fca5a5',
                    400: '#f87171',
                    500: '#ef4444',
                    600: '#dc2626',
                    700: '#b91c1c',
                    800: '#991b1b',
                    900: '#7f1d1d',
                    950: '#450a0a',
                },
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
            fontFamily: {
                sans: ['Mulish', ...sans],
                hind: ['Hind', ...sans],
            },
            // These v3 utilities size the page shells in pixels.
            maxWidth: {
                'screen-xl': '1280px',
                'screen-2xl': '1536px',
            },
            // Typography imports its own palette, so preserve prose colors too.
            typography: ({ theme }) => ({
                DEFAULT: {
                    css: {
                        '--tw-prose-body': theme('colors.gray.700'),
                        '--tw-prose-headings': theme('colors.gray.900'),
                        '--tw-prose-lead': theme('colors.gray.600'),
                        '--tw-prose-links': theme('colors.gray.900'),
                        '--tw-prose-bold': theme('colors.gray.900'),
                        '--tw-prose-counters': theme('colors.gray.500'),
                        '--tw-prose-bullets': theme('colors.gray.300'),
                        '--tw-prose-hr': theme('colors.gray.200'),
                        '--tw-prose-quotes': theme('colors.gray.900'),
                        '--tw-prose-quote-borders': theme('colors.gray.200'),
                        '--tw-prose-captions': theme('colors.gray.500'),
                        '--tw-prose-kbd': theme('colors.gray.900'),
                        '--tw-prose-kbd-shadows': 'rgb(17 24 39 / 10%)',
                        '--tw-prose-code': theme('colors.gray.900'),
                        '--tw-prose-pre-code': theme('colors.gray.200'),
                        '--tw-prose-pre-bg': theme('colors.gray.800'),
                        '--tw-prose-th-borders': theme('colors.gray.300'),
                        '--tw-prose-td-borders': theme('colors.gray.200'),
                    },
                },
            }),
        },
    },
    plugins: [typography],
};
