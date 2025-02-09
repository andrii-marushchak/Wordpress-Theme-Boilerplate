<?php declare( strict_types=1 );
get_header();
the_post();
?>

    <div class="post-template">
		<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

        <div class="container">
			<?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumbnail">
					<?php the_post_thumbnail( 'full' ); ?>
                </div>
			<?php endif; ?>

            <header class="post-header">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <div class="entry-meta">
					<?php echo theme_domain_post_date() ?>
                </div>
            </header>

            <div class="entry-content editor">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_theme_domain_start' ),
						'after'  => '</div>',
					)
				);
				?>

				<?php
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', '_theme_domain_start' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', '_theme_domain_start' ) . '</span> <span class="nav-title">%title</span>',
					)
				);

				?>
            </div>

			<?php get_template_part( 'template-parts/post-related' ); ?>

        </div>
    </div>

<?php get_footer();
