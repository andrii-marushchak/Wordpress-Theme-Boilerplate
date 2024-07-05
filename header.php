<!doctype html>
<html <?php language_attributes(); ?> class="no-css">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-transcluent">
    <meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>

    <!-- Fix WSOD Flickering -->
    <script async>document.documentElement.className = document.documentElement.className.replace(/\bno-css\b/, 'css')</script>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div class="template-wrapper">

<?php get_template_part( 'parts/nav-desktop' ) ?>