<?php declare( strict_types=1 );

$index = 1;

// Loop over the ACF flexible fields of this page / post.
while ( have_rows( 'builder' ) ) : the_row();

	// load the layout from sub folder.
	get_template_part( 'template-parts/acf-sections/' . get_row_layout(), null, [ 'index' => $index ] );
	$index ++;

endwhile;
