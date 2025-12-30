<?php declare( strict_types=1 );
get_header();
?>

<div class="archive-wrapper">
	<div class="container">

		<header class="archive-header">
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			<?php
			else :
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
			endif;
			?>
		</header>

		<?php if ( have_posts() ) : ?>

			<div class="posts-loop">
				<?php
				while ( have_posts() ) :
					the_post(); ?>

					<?php get_template_part( 'template-parts/article' ); ?>

				<?php endwhile; ?>
			</div>

			<?php get_template_part( 'template-parts/pagination' ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content-none' ); ?>

		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>
