"scripts": {
		"dev": "cross-env NODE_ENV=dev webpack --progress --hide-modules --config build/webpack.config.js",
		"prod": "cross-env NODE_ENV=prod webpack --progress --hide-modules --config build/webpack.config.js",
		"watch": "yarn run dev -- --watch",
		"serve": "cross-env SERVE=true yarn run watch && webpack-dev-server --progress --colors",
		"test": "mocha-webpack",
		"coverage": "cross-env NODE_ENV=cover nyc --reporter=html --reporter=text mocha-webpack"
	},