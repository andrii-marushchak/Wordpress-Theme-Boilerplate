<!-- Main Navigation -->
<nav class="nav-main">
    <div class="nav-main__inner">
        <div class="container">
            <div class="nav-main__row">

                <!-- Left -->
                <div class="nav-main__left">
                    <a href="<?php echo home_url('/') ?>" class="nav-main__logo" title="<?php bloginfo('name') ?>">
						<?php echo wp_get_attachment_image(startlife_get_option('logo'), 'full'); ?>
                    </a>
                </div>

                <!-- Right -->
                <div class="nav-main__right">
					<?php $args = array(
						'theme_location' => 'main-menu',
						'container'      => 'ul',
					);
					wp_nav_menu($args); ?>


                    <!-- Search Form -->
	                <?php get_template_part('parts/blog-events/search-form') ?>


					<?php $btn = startlife_get_option('header_cta_button'); ?>
					<?php if ($btn): ?>
                        <a href="<?php echo $btn['url'] ?>" target="<?php echo $btn['target'] ?>" class="btn-cta btn btn-primary">
                            <span class="caption"><?php echo $btn['title'] ?></span>
                            <span class="icon">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
      fill="white"/>
</svg>
    </span>
                        </a>
					<?php endif; ?>

                    <button class="nav-main__toggle" aria-label="Open Side Navigation">
                        <svg width="42" height="20" viewBox="0 0 42 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M41.0054 0H8.73491L7 4H39.2583L41.0054 0Z" fill="#098500"/>
                            <path d="M37.375 8H5.08594L3.35156 12H35.6209L37.375 8Z" fill="#098500"/>
                            <path d="M34.0264 16H1.73978L0 20H32.2679L34.0264 16Z" fill="#098500"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </div>
</nav>


<!-- Side Navigation -->
<nav class="nav-side">
    <div class="nav-side__header">
        <div class="container">
            <a href="<?php echo home_url('/') ?>" class="nav-side__logo">
				<?php echo wp_get_attachment_image(startlife_get_option('logo'), 'full'); ?>
            </a>
            <button class="nav-side__close" aria-label="Close Side Navigation">
                <svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="22.2264" width="31.433" height="3.698" transform="rotate(-45 0 22.2264)" fill="#098500"/>
                    <rect x="2.77734" y="0.0385742" width="31.433" height="3.698" transform="rotate(45 2.77734 0.0385742)" fill="#098500"/>
                </svg>
            </button>
        </div>
    </div>
    <div data-scroll-lock-scrollable class="nav-side__scroller">
        <div class="container">

            <!-- Search Form -->
	        <?php get_template_part('parts/blog-events/search-form') ?>

            <div class="menu-wrap">
				<?php $args = array(
					'theme_location' => 'mobile-menu',
					'container'      => 'ul',
				);
				wp_nav_menu($args); ?>
            </div>
        </div>
    </div>
</nav>



