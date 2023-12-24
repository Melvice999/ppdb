/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      'blue': "#3498DB",
      'd-green': "#149200",
      'd-sky-blue' :"#C1EBF9",
      'l-sky-blue' :"#F2F2F2",
      'white': "#FFF",
    },
    fontFamily: {
      'aldrich': ['Aldrich'],
      'sen': ['sen']
    },

    extend: {},
  },
  plugins: [],
}

