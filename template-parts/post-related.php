<?php
/**
 * Related post template
 */

// Enable strict typing mode.
declare( strict_types=1 );

$args  = array(
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post__not_in'   => array( get_the_ID() ),
);
$query = new WP_Query( $args ); ?>

<?php if ( $query->have_posts() ) : ?>

    <section class="post-related">
        <h2 class="post-related__title"><?php esc_html_e( 'Our latest news', 'theme_domain' ); ?></h2>
        <div class="posts-loop">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				?>

				<?php get_template_part( 'template-parts/article' ); ?>

			<?php endwhile; ?>
        </div>
    </section>

<?php endif;
wp_reset_postdata(); ?>
