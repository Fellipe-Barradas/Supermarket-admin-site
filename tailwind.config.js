/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
    ],
    theme: {
        extend: {
            screens: {
                'ssm': '320px',
            }
        },

    },
    plugins: [],
}
