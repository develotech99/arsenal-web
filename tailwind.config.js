/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
          'arsenal-gold': '#D4AF37',
          'arsenal-dark-gold': '#B8941F',
          'arsenal-black': '#0F0F0F',
          'arsenal-gray': '#1A1A1A',
        },
        fontFamily: {
          'sans': ['Inter', 'system-ui', 'sans-serif'],
          'display': ['Poppins', 'sans-serif'],
        },
      },
    },
    plugins: [],
  }