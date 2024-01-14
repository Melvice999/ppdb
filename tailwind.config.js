/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      'blue'        : "#3498DB",
      'black'       : "#000",
      'd-green'     : "#149200",
      'd-sky-blue'  :"#C1EBF9",
      'grey'        : "#718096",
      'l-sky-blue'  :"#F2F2F2",
      'red'         : "#FF0000",
      'white'       : "#FFF",
      'yellow'      : "#FFFF00",
    },
    fontFamily: {
      'aldrich': ['Aldrich'],
      'sen': ['sen']
    },

    extend: {},
  },
  plugins: [],
}

