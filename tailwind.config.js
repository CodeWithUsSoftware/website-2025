/** @type {import('tailwindcss').Config} */
module.exports = {
    // mode : 'jit',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            skew: {
                '25': '25deg',
            },
            fontFamily: {
                'roboto': 'roboto',
                'raleway' : 'Raleway'
            },
            colors: {
                'footer' : '#252525',
                'primary' : '#008CB6',
                'camps' : '#008037',
                'primary-lighter-1' : '#0091b6',
                'primary-lighter-2' : '#00b5e5',
                'primary-darker-1' : '#016a88',
                'success' : '#44bb96',
                'secondary' : '#667692',
                'info' : '#506691',
                'info-lighter-1' : '#637eb4',
                'info-lighter-2' : '#7696d5',
                'info-lighter-3' : '#87acf5',
                'info-lighter-4' : 'rgba(84, 121, 188, 0.1)',
                'danger' : '#c22300',
                'black-lighter-1' : '#4F4F4F',
                'black-lighter-2' : '#4F4F4F',
                'black-lighter-3' : '#818181',
                'black-lighter-4' : '#D6D6D6',
            }
        },
    },
    variants: {
        // extend: {
        //     opacity: ['disabled'],
        //     cursor: ['disabled'],
        // },
    },
    plugins: [
        // require('@tailwindcss/forms'),
        // require('@tailwindcss/line-clamp'),
        // require('@tailwindcss/aspect-ratio'),
        // require('@tailwindcss/typography'),
    ],
}
