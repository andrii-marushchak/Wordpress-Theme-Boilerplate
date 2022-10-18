<?php get_header(); ?>

<main class="page-404">
    <div class="container">
        <div class="section-row">
            <div class="col-left">
				<?php echo wp_get_attachment_image(startlife_get_option('404_image'), 'full') ?>
            </div>
            <div class="col-right">
                <h1 class="page-title"><?php echo startlife_get_option('404_page_title') ?></h1>
                <div class="page-subtitle"><?php echo startlife_get_option('404_page_subtitle') ?></div>
                <div class="page-caption"><?php echo startlife_get_option('404_caption') ?></div>

				<?php $btn = startlife_get_option('404_button') ?>
				<?php if ($btn): ?>
                    <a href="<?php echo $btn['url'] ?>" target="<?php echo $btn['target'] ?>" class="btn-cta btn btn-primary">
                        <span class="caption"><?php echo $btn['title'] ?></span>
                        <span class="icon">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
      fill="white"></path>
</svg>
    </span>
                    </a>
				<?php endif; ?>

            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
