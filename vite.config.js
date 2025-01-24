import { defineConfig } from 'vite';

export default defineConfig({
  base: '/projetjs/',
  build: {
    outDir: 'docs', // Déploie directement dans le dossier docs
  },
});
