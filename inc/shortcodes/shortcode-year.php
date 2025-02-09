<?php

// Register the [year] shortcode
add_shortcode('year', function (){
	return date('Y');
});
