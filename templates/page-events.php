<?php /* Template Name: Page Events */ ?>

<?php get_header(); ?>
<?php global $wp_query ?>

    <main class="page-template-events layout-news-events">
        <div class="container">

            <!-- Page Title -->
            <h1 class="page-title">Upcoming Events</h1>

            <!-- Search Form -->
			<?php get_template_part('parts/blog-events/search-form') ?>

        </div>
        <div class="container">

            <!-- Posts Grid -->
            <div class="layout-events-grid">
				<?php $args = [
					'post_type' => ['events', 'post'],
					'status'    => 'publish',
					'orderby'   => 'date',
					'order'     => 'DESC',
					'paged'     => get_query_var('paged') ? get_query_var('paged') : 1
				];

				$custom_query = query_posts($args);
				if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <!-- Event -->
					<?php get_template_part('parts/blog-events/event-template') ?>

				<?php endwhile; endif; ?>
            </div>

            <!-- Pagination -->
			<?php if ($wp_query->max_num_pages > 1): ?>

				<?php get_template_part('parts/blog-events/pagination', '', ['query' => $wp_query]) ?>

			<?php endif; ?>

        </div>
    </main>

<?php get_footer(); ?>