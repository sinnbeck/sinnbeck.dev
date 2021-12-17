module.exports = {
  content: ["./resources/views/**/*.blade.php"],
  theme: {
    extend: {
        fontFamily: {
            logo: ['"Bakbak One"', 'ui-sans-serif']
        }
    },
  },
  plugins: [
      require('@tailwindcss/typography'),
  ],
}
