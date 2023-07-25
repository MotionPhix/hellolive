import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.vue',
  ],

  theme: {
    fontFamily: {
      sans: ['v-sans'],
    },

    extend: {},
  },

  plugins: [
    forms,
    typography,
  ],
}
