<!-- Section: News & Events Grid -->
<?php $section_title = get_sub_field('section_title') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>

<section class="section-news-events acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
>
    <div class="container">

		<?php if ($section_title): ?>
            <h2 class="h1 section-title h2-small ">
				<?php echo $section_title ?>
            </h2>
		<?php endif; ?>

        <div class="posts-grid">
			<?php $posts_args = array(
				'post_type'      => ['post', 'events'],
				'post_status'    => 'publish',
				'posts_per_page' => 4,
			);
			$posts_query      = new WP_Query($posts_args); ?>

            <div class="col-left">
				<?php if ($posts_query->have_posts()) : $p = 0;
					while ($posts_query->have_posts()) : $posts_query->the_post();
						$p ++; ?>

						<?php $post_type = get_post_type() ?>

                        <article <?php post_class('post-large'); ?>>

                            <a href="<?php the_permalink(); ?>" class="post-large__thumbnail">
								<?php the_post_thumbnail(); ?>
                                <div class="tag">
									<?php
									if ($post_type == 'post') {
										echo 'News';
									} else {
										echo $post_type;
									}
									?>
                                </div>
                            </a>

                            <div class="post-large__info">
                                <time class="date"><?php echo get_the_date() ?></time>
                                <h2 class="h4 title">
                                    <a href="<?php the_permalink(); ?>">
                                        Astanor Ventures Partners With StartLife To Help Scale Up Disruptive Agrifoodtech
                                    </a>
                                </h2>

                                <div class="excerpt">
									<?php echo wp_trim_words(get_the_excerpt(), 30) ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="permalink btn-link <?php echo $post_type ?>">
                                    <span class="caption">Read more</span>
                                    <span class="icon">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.25176 0.669796L4.74724 0.161438C4.95704 -0.0538127 5.29628 -0.0538127 5.50385 0.161438L9.84265 4.61072C10.0525 4.82597 10.0525 5.17403 9.84265 5.38699L5.50385 9.83856C5.29405 10.0538 4.9548 10.0538 4.74724 9.83856L4.25176 9.3302C4.03973 9.11266 4.04419 8.75773 4.26069 8.54477L6.95012 5.91596H0.535655C0.238813 5.91596 0 5.67094 0 5.36638V4.63362C0 4.32906 0.238813 4.08404 0.535655 4.08404H6.95012L4.26069 1.45523C4.04196 1.24227 4.0375 0.887337 4.25176 0.669796Z"
      fill="white"/>
</svg>
                    </span>
                                </a>

                            </div>
                        </article>

						<?php if ($p == 1) {
							break;
						} ?>
					<?php endwhile; endif;
				wp_reset_postdata(); ?>
            </div>

            <div class="col-right">
				<?php if ($posts_query->have_posts()) : $p = 0;
					while ($posts_query->have_posts()) : $posts_query->the_post();
						$p ++; ?>

                        <article <?php post_class('post-small'); ?>>

                            <a href="<?php the_permalink(); ?>" class="post-small__thumbnail">
								<?php the_post_thumbnail(); ?>
                                <div class="tag">
									<?php
									if ($post_type == 'post') {
										echo 'News';
									} else {
										echo $post_type;
									}
									?>
                                </div>
                            </a>

                            <div class="post-small__info">
                                <div class="top-part">
                                    <time class="date"><?php echo get_the_date() ?></time>

                                    <div class="excerpt">
										<?php echo wp_trim_words(get_the_excerpt(), 13) ?>
                                    </div>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="permalink btn-link <?php echo $post_type ?>">
                                    <span class="caption">Read more</span>
                                    <span class="icon">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.25176 0.669796L4.74724 0.161438C4.95704 -0.0538127 5.29628 -0.0538127 5.50385 0.161438L9.84265 4.61072C10.0525 4.82597 10.0525 5.17403 9.84265 5.38699L5.50385 9.83856C5.29405 10.0538 4.9548 10.0538 4.74724 9.83856L4.25176 9.3302C4.03973 9.11266 4.04419 8.75773 4.26069 8.54477L6.95012 5.91596H0.535655C0.238813 5.91596 0 5.67094 0 5.36638V4.63362C0 4.32906 0.238813 4.08404 0.535655 4.08404H6.95012L4.26069 1.45523C4.04196 1.24227 4.0375 0.887337 4.25176 0.669796Z"
      fill="white"/>
</svg>
                    </span>
                                </a>

                            </div>
                        </article>

					<?php endwhile; endif;
				wp_reset_postdata(); ?>
            </div>

        </div>

        <div class="buttons-wrap">
            <div class="col">
                <a href="<?php echo get_permalink(get_option('page_for_posts')) ?>" class="btn-cta btn btn-blue btn-shrink">
                    <span class="caption">All news</span>
                    <span class="icon">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
      fill="white"></path>
</svg>
    </span>
                </a>
            </div>
            <div class="col">
                <a href="<?php echo home_url('/events') ?>" class="btn-cta btn btn-orange btn-shrink">
                    <span class="caption">All events</span>
                    <span class="icon">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
      fill="white"></path>
</svg>
    </span>
                </a>
            </div>
        </div>

    </div>
</section>