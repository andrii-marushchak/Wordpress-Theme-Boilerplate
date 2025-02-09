<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-transcluent">
    <meta name="format-detection" content="telephone=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home" aria-label="<?php bloginfo( 'name' ); ?>">
			<?php echo wp_get_attachment_image( get_field( 'logo', 'option' ), 'large' ); ?>
        </a>

        <nav class="main-nav">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'nav',
					'container'      => 'ul',
				)
			);
			?>
        </nav>

        <button aria-label="<?php esc_html_e( 'Toggle navigation', '_theme_domain_start' ); ?>" class="btn-toggle-nav">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>
</header>

<main class="site-content" id="content">
