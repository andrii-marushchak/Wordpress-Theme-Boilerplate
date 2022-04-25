<?php /* Template Name: Page Builder */ ?>

<?php get_header(); ?>

    <main class="page-template-builder">
		<?php if (have_rows('sections')): ?>

            <!-- Sections -->
            <div class="content-blocks">
				<?php while (have_rows('sections')) : the_row(); ?>
					<?php get_template_part('parts/sections/section-' . get_row_layout()); ?>
				<?php endwhile; ?>
            </div>

		<?php endif; ?>
    </main>

<?php get_footer(); ?>