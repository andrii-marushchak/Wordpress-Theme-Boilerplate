<?php declare( strict_types=1 ); ?>

<?php if ( function_exists( 'yoast_breadcrumb' ) && ! is_front_page() ) : ?>
    <div class="breadcrumbs">
        <div class="container">
			<?php yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' ); ?>
        </div>
    </div>
<?php endif; ?>
