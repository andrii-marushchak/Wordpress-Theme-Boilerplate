<?php
/**
 * Pagination template
 * @link https://developer.wordpress.org/reference/functions/paginate_links/
 */

// Enable strict typing mode.
declare( strict_types = 1 );

if ( ! function_exists( 'theme_domain_paginate_links' ) ) {

	/**
	 * Filter function used to modify pagination links.
	 *
	 * Removes 'page/1/' from pagination links if not on the first page.
	 *
	 * @param string $link The paginated link.
	 *
	 * @return string The modified paginated link.
	 */
	function theme_domain_paginate_links( string $link ): string {
		if ( is_paged() ) {
			$link = str_replace( 'page/1/', '', $link );
		}

		return $link;
	}

	add_filter( 'paginate_links', 'theme_domain_paginate_links' );

}

if ( ! isset( $wp_query ) ) {
	global $wp_query;
}

$args = array(
	'base'         => str_replace( '999999999', '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
	'total'        => $wp_query->max_num_pages,
	'current'      => max( 1, get_query_var( 'paged' ) ),
	'format'       => '?paged=%#%',
	'show_all'     => false,
	'type'         => 'list',
	'end_size'     => 2,
	'mid_size'     => 1,
	'prev_next'    => true,
	'prev_text'    => esc_html__( '&larr; Prev', '_theme_domain_start' ),
	'next_text'    => esc_html__( 'Next &rarr;', '_theme_domain_start' ),
	'add_args'     => false,
	'add_fragment' => '',
);

$paginate_links = paginate_links( $args );

if ( is_string( $paginate_links ) ) :
	?>

	<div class="pagination">
		<?php echo wp_kses_post( $paginate_links ); ?>
	</div>

<?php
endif;
