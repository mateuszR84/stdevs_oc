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
        "../../plugins/studiodevs/wiki/**/*.htm",
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
                },
                wiki: {
                    primary: "#594157",
                    secondary: "#726DA8",
                    tertiary: "#7D8CC4",
                    accent: "#A0D2DB",
                    accent_secondary: "#bee7e8"
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
