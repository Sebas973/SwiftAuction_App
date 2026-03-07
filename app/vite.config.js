import path from "path";
import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react-swc';
import tailwindcss from "@tailwindcss/vite"
import jsconfiPaths from "vite-jsconfig-paths"


// https://vite.dev/config/
export default defineConfig({
  plugins: [
    react(),
    tailwindcss(),
    jsconfiPaths(),
  ],
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./src"),
    },
  },
});
