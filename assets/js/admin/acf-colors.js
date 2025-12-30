'use strict';

export const it_extend_acf_color_picker = () => {
	/* global acf */

	if (typeof acf === 'undefined' || !acf?.add_filter) {
		return;
	}

	acf.add_filter('color_picker_args', (args) => {
		args.palettes = [
			'#25445A', // Brand
			'#3F505D', // Brand Greyed
			'#FAD84A', // Accent
			'#E9D78C', // Accent Greyed
			'#121210', // Text
			'#F2F5F8', // Background
			'#E8EBF0', // Border
		];

		return args;
	});
};
