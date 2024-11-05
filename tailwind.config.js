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
      fontFamily:{
        'inter' : ["Inter", "sans-serif"]
      },
      colors:{
        '50' : '#F6F6F6',
        '100' : '#E7E7E7',
        '200' : '#D1D1D1',
        '300' : '#B0B0B0',
        '400' : '#888888',
        '500' : '#6D6D6D',
        '600' : '#5D5D5D',
        '700' : '#4F4F4F',
        '800' : '#454545',
        '900' : '#3D3D3D',
        '950' : '#242424',
        
      }
    },
  },
  plugins: [
    require('flowbite/plugin')({
      charts: true,
  }),
  ],
}

