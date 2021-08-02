module.exports = {
  purge: {
    enabled: true,
    content: ["./source/css/tailwind.css", "./**/*.php"],
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
