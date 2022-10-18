<!-- Section: Partners -->
<?php $section_title = get_sub_field('section_title') ?>
<?php $partners_ids = get_sub_field('partners') ?>
<?php $cta_block = get_sub_field('cta_block') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>

<section class="section-partners acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
>
    <div class="container">

		<?php if ($section_title): ?>
            <h2 class="section-title h2-small"><?php echo $section_title ?></h2>
		<?php endif; ?>

		<?php if ($partners_ids): ?>
            <div class="partners-grid">
				<?php $posts_args = array(
					'post_type'      => 'partners',
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
					'post__in'       => $partners_ids
				);
				$posts_query      = new WP_Query($posts_args); ?>
				<?php if ($posts_query->have_posts()) : while ($posts_query->have_posts()) :
					$posts_query->the_post(); ?>

                    <article class="partner-item">
                        <picture class="logo">
							<?php the_post_thumbnail(); ?>
                        </picture>

						<?php if (get_field('tag')): ?>
                            <div class="tag"><?php the_field('tag'); ?></div>
						<?php endif; ?>

                        <h4 class="title"><?php the_title() ?></h4>

                        <!-- Overlay -->
                        <div class="overlay">

                            <!-- Title -->
                            <div class="overlay-title"><?php the_title() ?></div>

                            <!-- Excerpt -->
                            <div class="description section-text">
								<?php echo wp_trim_words(get_the_excerpt(), 25) ?>
                            </div>

                            <div class="overlay-arrow">
                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
                                          fill="#098500"></path>
                                </svg>
                            </div>

                        </div>

						<?php if (get_field('external_link')): ?>
                            <!-- Link -->
                            <a class="partner-item-link" title="<?php the_title() ?>" target="_blank" href="<?php the_field('external_link'); ?>"></a>
						<?php endif; ?>

                    </article>

				<?php endwhile; endif;
				wp_reset_postdata(); ?>
            </div>
		<?php endif; ?>

		<?php if ($cta_block['title'] || $cta_block['button']): ?>
            <div class="cta-block">
				<?php if ($cta_block['title']): ?>
                    <h3 class="cta-block__title"><?php echo $cta_block['title'] ?></h3>
				<?php endif; ?>

				<?php if ($cta_block['subtitle']): ?>
                    <div class="section-text cta-block__subtitle"><?php echo $cta_block['subtitle'] ?></div>
				<?php endif; ?>

				<?php if ($cta_block['button']): ?>
                    <a href="<?php echo $cta_block['button']['url'] ?>" target="<?php echo $cta_block['button']['target'] ?>" class="btn-cta btn btn-primary">
                        <span class="caption"><?php echo $cta_block['button']['title'] ?></span>
                        <span class="icon">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
      fill="white"></path>
</svg>
    </span>
                    </a>
				<?php endif; ?>
            </div>
		<?php endif; ?>

    </div>
</section>