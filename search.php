<?php declare( strict_types=1 ); ?>
<?php get_header(); ?>

    <div class="archive-wrapper">
        <div class="container">
            <header class="archive-header">
                <h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'theme_domain' ), '<strong>' . get_search_query() . '</strong>' );
					?>
                </h1>
            </header>

			<?php get_search_form(); ?>

            <div class="posts-loop">
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/article' ); ?>

					<?php endwhile; ?>

					<?php get_template_part( 'template-parts/pagination' ); ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content-none' ); ?>

				<?php endif; ?>
            </div>

        </div>
    </div>

<?php get_footer();
