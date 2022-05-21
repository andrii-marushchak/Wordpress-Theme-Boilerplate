<?php

add_shortcode('year', 'theme_name_shortcode_year');

function theme_name_shortcode_year() {
	return date('Y');
}