/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      'd-green': "#149200",
      'white': "#FFF",
      'l-sky-blue' :"#C1EBF9",
      'blue': "#3498DB"
    },
    fontFamily: {
      'aldrich': ['Aldrich'],
    },

    extend: {},
  },
  plugins: [],
}

