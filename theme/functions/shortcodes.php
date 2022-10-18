<?php

add_shortcode('year', 'startlife_shortcode_year');

function startlife_shortcode_year() {
	return date('Y');
}