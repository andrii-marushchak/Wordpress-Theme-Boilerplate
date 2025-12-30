<?php
/**
 * The template for displaying search forms
 *
 * @package _it_start
 */

// Enable strict typing mode.
declare( strict_types=1 );
?>

<form class="search-form" id="searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input class="search-form__input" id="s" name="s" type="text" placeholder="<?php esc_html_e( 'Search', 'theme_domain' ); ?>" required/>
    <button class="search-form__submit" type="submit">
        Search
    </button>
</form>
