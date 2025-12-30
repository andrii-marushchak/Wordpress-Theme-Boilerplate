</main><!-- /.site-content -->

<footer class="site-footer">
    <div class="container">
        <a href="<?php echo esc_url( home_url() ); ?>" class="site-logo" rel="home" aria-label="<?php bloginfo( 'name' ); ?>">
			<?php echo wp_get_attachment_image( get_field( 'logo', 'option' ), 'large' ); ?>
        </a>

		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'footer',
				'container'      => 'ul',
			)
		);
		?>

		<?php get_template_part( 'template-parts/socials' ); ?>
    </div>

    <div class="site-footer__copyright">
        <div class="container">
            <span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php esc_html_e( 'All rights reserved', '_it_start' ); ?></span>
        </div>
    </div>
</footer>

<?php get_template_part( 'template-parts/svg' ); ?>

<?php wp_footer(); ?>

</body>
</html>
