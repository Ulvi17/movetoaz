module.exports = {
  content: [
    "./pages/**/*.{js,ts,jsx,tsx}",
    "./components/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        "desert-sand": "#C9A66B",
      },
      fontFamily: {
        sans: ["system-ui", "Cairo", "sans-serif"],
      },
    },
  },
  plugins: [],
}; 