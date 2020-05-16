module.exports = {
  purge: [
    './resources/js/**/*.vue',
    './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        'nl-blue': {
          50: '#F4F7FA',
          100: '#E9EFF4',
          200: '#C9D8E3',
          300: '#A8C0D1',
          400: '#6690AF',
          500: '#25618D',
          600: '#21577F',
          700: '#163A55',
          800: '#112C3F',
          900: '#0B1D2A',
        },
        'nl-green': {
          50: '#F4FBF2',
          100: '#EAF6E6',
          200: '#C9E9C1',
          300: '#A9DB9B',
          400: '#69C150',
          500: '#28A605',
          600: '#249505',
          700: '#186403',
          800: '#124B02',
          900: '#0C3202',
        },
      }
    },
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ],
}
