import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "red-300": "#FECACA",
                "blue-400": "#60A5FA",
                "green-300": "#86EFAC",
                "green-400": "#34D399",
                "blue-300": "#93C5FD",
            },
        },
    },

    plugins: [forms],
};
