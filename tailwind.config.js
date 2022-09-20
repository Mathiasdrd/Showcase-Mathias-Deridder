/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
    screens: {
      'sm': '480px',
      'md': '768px',
      'lg': '976px',
      'xl': '1440px',
      '2xl': '1536px',
    },
    colors: {
      'peach-crayola': '#F7C59F',
      'space-cadet': '#2A324B',
      'rhythm': '#767B91',
      'ligt-periwinkle': '#C7CCDB',
      'alice-blue': '#E1E5EE',
    }
    // colors: {
    //   'gainsboro': '#dddde4',
    //   'blue-bell': '#9b9ece',
    //   'slate-blue': '#6665dd',
    //   'navy-blue': '#100972',
    //   'black': '#000500'
    // }
    // colors: {
    //     'cadet-blue-crayola': '#acadbc',
    //     'blue-bell': '#9b9ece',
    //     'slate-blue': '#6665dd',
    //     'blue-ryb': '#473bf0',
    //    'black': '#000500'
    // }
  },
  plugins: [],
}
