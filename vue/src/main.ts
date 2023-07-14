import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from '@/App.vue'

import './assets/index.scss'
import type { Component } from 'vue'
import { autoAnimatePlugin } from '@formkit/auto-animate/vue'

// Here we can register the different apps, and the selector they should be mounted to, also if they need a router or state.
const apps: Record<
	string,
	{
		app: Component
		state: boolean
	}
> = {
	'#app': { app: App, state: true }
}

const pinia = createPinia()

document.addEventListener('DOMContentLoaded', async () => {
	for (const selector in apps) {
		let router
		if (document.querySelector(selector)) {
			// If our app needs a router or state, but we have somehow failed to load it, skip this app.
			if (apps[selector].state && !pinia) continue

			const app = createApp(apps[selector].app)

			// Load the required plugins.
			if (apps[selector].state && pinia) app.use(pinia)

			// Load all the plugins that are required for the app to work.
			app.use(autoAnimatePlugin)

			app.mount(selector)
		}
	}
})
