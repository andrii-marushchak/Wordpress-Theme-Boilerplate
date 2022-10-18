<?php get_header(); ?>
<?php global $wp_query ?>

<main class="page-template-search layout-news-events">
    <div class="container">
        <!-- Page Title -->
        <h1 class="page-title">Search</h1>

        <!-- Search Form -->
		<?php get_template_part('parts/blog-events/search-form') ?>
    </div>

    <div class="container">

        <div class="search-result-row">

            <div class="col-left">

                <div class="search-result">

                    <div class="search-result__caption"> Results for: “<?php echo get_search_query() ?>”</div>

                    <!-- Posts Grid -->
                    <div class="search-result-list">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <article <?php post_class(); ?>>
                                <p class="post-type">Type: <strong class="value"><?php echo get_post_type() ?></strong></p>

                                <h2 class="h4 post-title">
                                    <a href="<?php the_permalink(); ?>">
                                        StartLife Selects 9 Early-stage Startups Targeting Global Agrifood Challenges
                                    </a>
                                </h2>

                                <div class="post-excerpt">
									<?php echo wp_trim_words(get_the_excerpt(), 35, '...') ?>
                                </div>
                            </article>

						<?php endwhile; endif; ?>
                    </div>

                </div>

                <!-- Pagination -->
				<?php if ($wp_query->max_num_pages > 1): ?>

					<?php get_template_part('parts/blog-events/pagination', '', ['query' => $wp_query]) ?>

				<?php endif; ?>

            </div>

            <!-- Sidebar -->
            <div class="col-right">
                <div class="contact-info">
                    <h3 class="h4 contact-info__title">
                        Can’t find what you are looking for?
                    </h3>

					<?php if (startlife_get_option('phone')): ?>
                        <div class="phone-wrap">
                            Tel: <a href="<?php echo startlife_get_phone(startlife_get_option('phone')) ?>">
								<?php startlife_the_option('phone'); ?>
                            </a>
                        </div>
					<?php endif; ?>

					<?php $contact_page = startlife_get_option('contact_page') ?>
					<?php if ($contact_page): ?>
                        <div class="btn-wrap">
                            <a href="<?php echo get_permalink($contact_page) ?>" class="btn btn-primary">
                                <span class="caption"><?php echo get_the_title($contact_page) ?></span>
                                <span class="icon">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
      fill="white"></path>
</svg>
    </span>
                            </a>
                        </div>
					<?php endif; ?>
                </div>
            </div>

        </div>

    </div>
</main>

<?php get_footer(); ?>
