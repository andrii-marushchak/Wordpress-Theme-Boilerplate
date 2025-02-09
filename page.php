<?php declare( strict_types=1 );
get_header();
the_post(); ?>

<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

<?php if ( have_rows( 'builder' ) ) : ?>

	<?php get_template_part( 'template-parts/acf-builder' ); ?>

<?php else : ?>

    <div class="container">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <section class="editor entry-content">
		    <?php the_content(); ?>
        </section>
    </div>

<?php endif; ?>

<?php
get_footer();
