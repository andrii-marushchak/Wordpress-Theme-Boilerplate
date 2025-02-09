<?php get_header(); ?>

    <div class="container">

        <section class="not-found">
            <h1 class="h3 not-found__title"><?php esc_html_e( 'Page not found.', 'theme_domain' ); ?></h1>
            <p class="not-found__text"><?php esc_html_e( 'Sorry, the page you were looking for doesn\'t exist or has been moved.', 'theme_domain' ); ?></p>
            <div class="btn-group">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Back to homepage', 'theme_domain' ); ?></a>
            </div>
        </section>

    </div>

<?php get_footer();

