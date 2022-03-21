module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  purge: {
    content: [
      './resources/views/**/*.blade.php',
      './resources/ts/**/*.{js,jsx,ts,tsx,vue}',
    ],
    options: {
      safelist: [
        {
          pattern: /text-(.*?)-(400|600)/
        },
      ]
    }
  },
  theme: {
    extend: {},
  },
  plugins: [],
}
