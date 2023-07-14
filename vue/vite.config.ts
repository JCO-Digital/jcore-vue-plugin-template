import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import cssInjectedByJsPlugin from 'vite-plugin-css-injected-by-js'

// https://vitejs.dev/config/
export default defineConfig({
	plugins: [vue(), cssInjectedByJsPlugin()],
	resolve: {
		alias: {
			'@': fileURLToPath(new URL('./src', import.meta.url))
		}
	},
	build: {
		rollupOptions: {
			output: {
				format: 'iife',
				manualChunks: undefined,
				entryFileNames: `[name].js`,
				chunkFileNames: `[name].js`,
				assetFileNames: `[name].[ext]`,
				globals: {
					vue: 'Vue',
					global: 'window'
				}
			}
		},
		outDir: '../dist/vue/',
		assetsDir: '.',
		assetsInlineLimit: 10000,
		cssCodeSplit: true,
		emptyOutDir: true,
		sourcemap: false,
		copyPublicDir: false
	}
})
