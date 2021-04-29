const colors = require('tailwindcss/colors');
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans]
            },
            colors: {
                gray: colors.blueGray,
                // blue: colors.indigo
            },
            screens: {},
            width: {
                '100': '400px',
            },
            minWidth: {
                '4': '1rem',
                '96': '24rem'
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            translate: ['group-hover']
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        // require('@tailwindcss/typography')
    ],
};
