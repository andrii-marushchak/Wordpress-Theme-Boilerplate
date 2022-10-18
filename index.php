<?php get_header(); ?>
<?php global $wp_query ?>

    <main class="page-template-news layout-news-events">
        <div class="container">

            <!-- Page Title -->
            <h1 class="page-title">Our Latest News</h1>

            <!-- Search Form -->
			<?php get_template_part('parts/blog-events/search-form') ?>

        </div>
        <div class="container">

            <!-- Posts Grid -->
            <div class="layout-news-grid">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <!-- Post  -->
					<?php get_template_part('parts/blog-events/post-template') ?>

				<?php endwhile; endif; ?>
            </div>

            <!-- Pagination -->
			<?php if ($wp_query->max_num_pages > 1): ?>

				<?php get_template_part('parts/blog-events/pagination', '', ['query' => $wp_query]) ?>

			<?php endif; ?>

        </div>
    </main>

<?php get_template_part('parts/sections/section-newsletter') ?>
<?php get_footer(); ?>