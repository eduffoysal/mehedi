/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["**/*.{php,js,html}","./layouts/**/*.html", "./content/**/*.md", "./content/**/*.html", "./src/**/*.js", "./node_modules/flowbite/**/*.js", "./node_modules/tw-elements/dist/js/**/*.js"],
  theme: {
    extend: {},
  },
  //plugins: [],

  plugins: [
    // include Flowbite as a plugin in your Tailwind CSS project
    require('flowbite/plugin'),
    require('tw-elements/dist/plugin')
  ]


}

