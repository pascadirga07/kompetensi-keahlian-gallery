/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./Modules/**/resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: "#3b82f6",
                    50: "#e3f2ff",
                    100: "#c1d9ff",
                    200: "#9dbffa",
                    300: "#7ca4f9",
                    400: "#637cf8",
                    500: "#4f46e5",
                    600: "#4338ca",
                    700: "#3730a3",
                    800: "#312e81",
                    900: "#272c5e",
                },
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
