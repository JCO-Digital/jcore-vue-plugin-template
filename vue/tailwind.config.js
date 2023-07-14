// eslint-disable-next-line no-undef

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ['./index.html', './src/**/*.{js,ts,vue}'],
	theme: {
		extend: {
			fontSize: {
				'2xl': '36px',
				xl: '28px',
				lg: '24px',
				md: '20px',
				sm: '18px'
			},
			colors: {
				primary: '#E6007E',
				secondary: '#000000'
			}
		}
	},
	corePlugins: {
		// Disable this if certain bootstrap stuff is not working.
		preflight: true
	}
}
