/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        "Circular": ['Circular STD'],
        "Staatliches": ['Staatliches'],
        "Cera": ['Cera PRO Regular']
      },
      colors : {
        "biru" : '#2FA0B1'
      }
    },
  },
  plugins: [],
}

