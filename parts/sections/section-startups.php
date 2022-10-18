<!-- Section: Startups -->
<?php $section_title = get_sub_field('section_title') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>

<section class="section-startups acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
>
    <div class="container">

		<?php if ($section_title): ?>
            <h2 class="section-title h2-small"><?php echo $section_title ?></h2>
		<?php endif; ?>

        <div class="form dark form-filters">
            <div class="form-field search">
                <label class="search-input-wrap">
                    <input placeholder="Search..." type="text">
                    <span class="icon">
                     <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.796 12.9685L11.8749 10.0478C11.743 9.91602 11.5643 9.84279 11.3768 9.84279H10.8992C11.7079 8.80871 12.1884 7.50806 12.1884 6.09316C12.1884 2.72727 9.46065 0 6.0942 0C2.72774 0 0 2.72727 0 6.09316C0 9.45904 2.72774 12.1863 6.0942 12.1863C7.50934 12.1863 8.81021 11.7059 9.84447 10.8974V11.3749C9.84447 11.5623 9.91772 11.741 10.0496 11.8729L12.9707 14.7935C13.2461 15.0688 13.6914 15.0688 13.9639 14.7935L14.7931 13.9645C15.0685 13.6891 15.0685 13.2438 14.796 12.9685ZM6.0942 9.84279C4.02276 9.84279 2.34392 8.16717 2.34392 6.09316C2.34392 4.02207 4.01982 2.34352 6.0942 2.34352C8.16564 2.34352 9.84447 4.01914 9.84447 6.09316C9.84447 8.16424 8.16857 9.84279 6.0942 9.84279Z"
      fill="#363636"/>
</svg>

                  </span>
                </label>
            </div>

			<?php
			// Get all Taxonomies of 'startup' cpt
			$taxonomies = get_object_taxonomies('startups', 'objects');
			foreach ($taxonomies as $taxonomy): ?>
                <label class="form-field taxonomy">
                    <select name="<?php echo $taxonomy->name ?>" class="filter-select">
                        <option value="all"><?php echo $taxonomy->label ?> ( All )</option>

						<?php $terms = get_terms([
							'taxonomy'   => $taxonomy->name,
							'hide_empty' => true,
						]); ?>

						<?php foreach ($terms as $term_item): ?>
                            <option value="<?php echo $term_item->term_id ?>">
								<?php echo $term_item->name ?>
                            </option>
						<?php endforeach; ?>

                    </select>
                </label>
			<?php endforeach; ?>

            <div class="form-field">
                <button class="btn-reset-filter btn-simple btn-primary">
                    <span class="caption">Reset Filter</span>
                </button>
            </div>
        </div>


        <div id="startups-grid" class="startups-grid-wrap">
            <div class="h3 result-not-found">Sorry, we couldn't find any results</div>

            <ul class="list startups-grid">
				<?php $posts_args = array(
					'post_type'      => 'startups',
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				);
				$posts_query      = new WP_Query($posts_args); ?>
				<?php if ($posts_query->have_posts()) : while ($posts_query->have_posts()) :
					$posts_query->the_post(); ?>

                    <li class="startup-item">
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
                            <a class="startups-item-link" title="<?php the_title() ?>" target="_blank" href="<?php the_field('external_link'); ?>"></a>
						<?php endif; ?>

                        <div class="filters">
	                        <?php
	                        // Get all Taxonomies of 'startup' cpt
	                        $taxonomies = get_object_taxonomies('startups', 'objects');
	                        foreach ($taxonomies as $taxonomy): ?>
		                        <?php if (get_the_terms(get_the_ID(), $taxonomy->name)): ?>
                                    <div class="<?php echo $taxonomy->name ?>">
				                        <?php foreach (get_the_terms(get_the_ID(), $taxonomy->name) as $term): ?>
                                            <span data-id="<?php echo $term->term_id; ?>"></span>
				                        <?php endforeach; ?>
                                    </div>
		                        <?php endif; ?>
	                        <?php endforeach; ?>
                            <div class="search">
								<?php the_title() ?>
                            </div>
                        </div>

                    </li>

				<?php endwhile; endif;
				wp_reset_postdata(); ?>
            </ul>

            <div class="pagination-wrap">
                <!-- Prev -->
                <button class="pagination-prev" aria-label="Previous Page">
                    <span class="icon"><svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.53924 14.9344L7.80317 15.7432C7.49151 16.0856 6.98753 16.0856 6.67918 15.7432L0.233644 8.66477C-0.0780239 8.32232 -0.0780239 7.76858 0.233644 7.42978L6.67918 0.347741C6.99085 0.00529671 7.49482 0.00529671 7.80317 0.347741L8.53924 1.15649C8.85422 1.50258 8.84759 2.06725 8.52598 2.40605L4.53067 6.58824L14.0597 6.58824C14.5007 6.58824 14.8555 6.97805 14.8555 7.46257L14.8555 8.62834C14.8555 9.11286 14.5007 9.50266 14.0597 9.50266H4.53067L8.52598 13.6849C8.85091 14.0237 8.85754 14.5883 8.53924 14.9344Z"
      fill="#098500"/>
</svg></span>
                    <span class="caption">Prev</span>
                </button>

                <div class="pagination"></div>

                <!-- Next -->
                <button class="pagination-next" aria-label="Next Page">
                    <span class="caption">Next</span>
                    <span class="icon">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.87287 1.06558L7.60894 0.256833C7.9206 -0.0856111 8.42458 -0.0856111 8.73293 0.256833L15.1785 7.33523C15.4901 7.67768 15.4901 8.23142 15.1785 8.57022L8.73293 15.6523C8.42126 15.9947 7.91729 15.9947 7.60894 15.6523L6.87287 14.8435C6.55789 14.4974 6.56452 13.9328 6.88613 13.5939L10.8814 9.41176H1.35239C0.911411 9.41176 0.556641 9.02195 0.556641 8.53743V7.37166C0.556641 6.88714 0.911411 6.49734 1.35239 6.49734H10.8814L6.88613 2.31514C6.5612 1.97634 6.55457 1.41167 6.87287 1.06558Z"
      fill="#098500"/>
</svg>
                    </span>
                </button>
            </div>

        </div>

    </div>
</section>