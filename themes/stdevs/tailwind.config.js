/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './**/*.html',
        './**/*.twig',
        './**/*.js',
        "./layouts/**/*.htm",
        "./pages/**/*.htm",
        "./content/**/*.htm",
        "./partials/**/*.htm",
        "../../plugins/studiodevs/collectly/**/*.htm",
    ],
    theme: {
        extend: {
            colors: {
                brand: {
                    primary: "#60adad",
                    secondary: "#ffc451",
                    hover: "#75b4b4",
                    light: "#8cc5c5",
                    dark: "#2d5a5a",
                    bg: "#bfdede"
                },
                app: {
                    sidebar: "#355d63",
                    bg: "#8ef3f3",
                    button: "#ffc451",
                    button_hover: "#ffca62",
                    text: "#1b1f23",
                    bg_secondary: "#ffc451",
                    bg_tertiary: "#ffd074",
                }
            },
            fontFamily: {
                heading: ['var(--font-heading)'],
                body: ['var(--font-body)'],
            },
        },
    },
    plugins: [],
};
