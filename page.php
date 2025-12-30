<?php declare( strict_types=1 );

get_header();

the_post(); ?>


<?php if ( function_exists( 'has_flexible' ) && has_flexible( 'builder' ) ) : ?>

	<?php the_flexible( 'builder' ); ?>

<?php else : ?>

	<div class="container">
		<h1 class="entry-title h2"><?php the_title(); ?></h1>

		<div class="editor entry-content">
			<?php the_content(); ?>
		</div>

	</div>

<?php endif; ?>

<?php get_footer();
