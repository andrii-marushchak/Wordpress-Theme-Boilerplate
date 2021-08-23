<!doctype html>
<html <?php language_attributes(); ?> class="no-css">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-transcluent">
    <meta name="format-detection" content="telephone=no">
    
    <link rel="preload" as="script" href="<?php echo DT_ASSETS_URL ?>/dist/js/scripts.min.js">
    <link rel="preload" as="style" href="<?php echo DT_ASSETS_URL ?>/dist/css/styles.min.css">
	<?php wp_head(); ?>

    <script>
        (function (H) {
            H.className = H.className.replace(/\bno-css\b/, 'css')
        })(document.documentElement)
    </script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="template-wrapper">

	<?php $args = array(
		'theme_location' => 'main-menu',
		'container'      => 'ul',
	);
	wp_nav_menu($args); ?>
