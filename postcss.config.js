/**
 * External dependencies
 */
const atImport = require('postcss-import');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const customMedia = require('postcss-custom-media');
const nested = require('postcss-nested');
const postcssFlexbugsFixes = require('postcss-flexbugs-fixes');

module.exports = (ctx) => {
	const config = {
		plugins: [
			atImport(),
			postcssFlexbugsFixes,
			nested,
			customMedia(),
			autoprefixer,
		],
	};

	if (ctx.env === 'production') {
		config.plugins.push(cssnano());
	}

	return config;
};
