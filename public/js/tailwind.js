tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: "#000000", // Black
                secondary: "#333333", // Dark Gray
                tertiary: "#666666", // Medium Gray
                dark: "#000000", // Black
                light: "#FFFFFF", // White
                accent: "#DDDDDD", // Light Gray
                muted: "#AAAAAA", // Muted Gray
                streamline: {
                    50: "#F9F9F9",
                    100: "#EDEDED",
                    200: "#D6D6D6",
                    300: "#BFBFBF",
                    400: "#999999",
                    500: "#7F7F7F",
                    600: "#666666",
                    700: "#4D4D4D",
                    800: "#333333",
                    900: "#1A1A1A",
                },
            },
            fontFamily: {
                sans: ["Inter", "sans-serif"],
                display: ["Inter", "sans-serif"],
            },
            boxShadow: {
                soft: "0 5px 15px rgba(0, 0, 0, 0.1)",
                hover: "0 10px 25px rgba(0, 0, 0, 0.3)",
            },
            animation: {
                "fade-in": "fadeIn 0.5s ease-out",
                "scale-in": "scaleIn 0.3s ease-out",
                "slide-in": "slideInLeft 0.6s ease-out",
                float: "float 6s ease-in-out infinite",
                "pulse-soft": "pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite",
            },
            keyframes: {
                fadeIn: {
                    "0%": {
                        opacity: "0",
                        transform: "translateY(10px)",
                    },
                    "100%": {
                        opacity: "1",
                        transform: "translateY(0)",
                    },
                },
                scaleIn: {
                    "0%": {
                        transform: "scale(0.95)",
                        opacity: "0",
                    },
                    "100%": {
                        transform: "scale(1)",
                        opacity: "1",
                    },
                },
                slideInLeft: {
                    "0%": {
                        transform: "translateX(-20px)",
                        opacity: "0",
                    },
                    "100%": {
                        transform: "translateX(0)",
                        opacity: "1",
                    },
                },
                float: {
                    "0%, 100%": {
                        transform: "translateY(0)",
                    },
                    "50%": {
                        transform: "translateY(-10px)",
                    },
                },
                pulse: {
                    "0%, 100%": {
                        opacity: "1",
                    },
                    "50%": {
                        opacity: "0.7",
                    },
                },
            },
        },
    },
};
