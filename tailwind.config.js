module.exports = {
    purge: [
        './resources/**/*.js',
        './resources/**/*.php',
    ],
    theme: {
        extend: {},
    },
    variants: {},
    plugins: [
        require('@tailwindcss/ui'),
    ],
}
