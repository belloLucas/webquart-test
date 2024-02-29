import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  preview: {
    host: true,
    port: 5173,
  },
  server: {
    host: true,
    port: 5173,
  },
});
