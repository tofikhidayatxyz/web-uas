/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: "jit",
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    darkMode: false,
    theme: {
        fontFamily: {
            sans: ["Inter, sans-serif"],
        },
        extend: {
            colors: {
                grey: "#969696",
                primary: "#FF994F",
                secondary: "#FFFAF2",
                dark: "#151F3C",
                chocolate: "#281900",
                "white-green": "#B4FF86",
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
