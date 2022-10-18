<!-- Section: Team Section -->
<?php $section_title = get_sub_field('section_title') ?>
<?php $section_content = get_sub_field('section_content') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>


<section class="section-team acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
>
    <div class="container">

		<?php if ($section_title): ?>
            <h2 class="section-title h2-small"><?php echo $section_title ?></h2>
		<?php endif; ?>

		<?php if ($section_content): ?>
            <div class="section-subtitle section-text"><?php echo $section_content ?></div>
		<?php endif; ?>

        <div  class="team-grid-wrap no-pagination">
            <div class="list team-grid">
				<?php $posts_args = array(
					'post_type'      => 'team',
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				);
				$posts_query      = new WP_Query($posts_args); ?>
				<?php if ($posts_query->have_posts()) : while ($posts_query->have_posts()) :
					$posts_query->the_post(); ?>

                    <article <?php post_class('team-item '); ?>>
                        <div class="team-item__inner">
                            <picture class="photo">
								<?php the_post_thumbnail(); ?>
                            </picture>
                            <div class="info">
                                <h3 class="name"><?php the_title() ?></h3>
                                <p class="position"><?php startlife_the_field('position'); ?></p>
                            </div>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="team-item-link" title="<?php the_title() ?>"></a>
                    </article>

				<?php endwhile; endif;
				wp_reset_postdata(); ?>
            </div>

        </div>

    </div>
</section>