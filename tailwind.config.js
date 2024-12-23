/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./build/*.html"], // Adjust content paths as necessary
  theme: {
    extend: {
      clipPath: {
        circle: "circle(50%)",
      },
    },
  },
  plugins: [
    function ({ addUtilities }) {
      addUtilities(
        {
          ".no-scrollbar": {
            "-ms-overflow-style": "none", /* Internet Explorer 10+ */
            "scrollbar-width": "none", /* Firefox */
          },
          ".no-scrollbar::-webkit-scrollbar": {
            display: "none", /* Safari and Chrome */
          },
          "clip-circle": {
            clipPath: "circle()"
          }
        },
        { variants: ["responsive"] } // Ensure responsive variants are enabled
      );
    },
  ],
};
