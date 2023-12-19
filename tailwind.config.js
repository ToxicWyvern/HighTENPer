/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],

  theme: {
    colors: {
      "dark-blue": "#1D1D27",
      pinky: "#FFC0CB",
      goldy: "#FFCF1A",
      whitesmoke: "#EEEEEE",
    },
  },
  plugins: [],
};
