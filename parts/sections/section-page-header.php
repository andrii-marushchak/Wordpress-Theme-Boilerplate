<!-- Section: Page header -->
<?php $section_title = get_sub_field('section_title') ?>
<?php $section_content = get_sub_field('section_content') ?>
<?php $background_image = get_sub_field('background_image') ?>
<?php $caption = get_sub_field('caption') ?>
<?php $btn_link = get_sub_field('link') ?>
<?php $small_link = get_sub_field('small_link') ?>
<?php $notice = get_sub_field('notice') ?>


<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>

<header class="section-page-header acf-section"
        data-pt="<?php echo $padding_top ?>"
        data-pb="<?php echo $padding_bottom ?>"
>
    <picture class="bg">
		<?php echo wp_get_attachment_image($background_image, 'full') ?>
    </picture>
    <div class="container">
        <div class="col-left">
            <div class="caption"><?php echo $caption ?></div>
        </div>
        <div class="col-right">

			<?php if ($section_title || $section_content): ?>
                <div class="content-block__wrap">
                    <div class="content-block">

						<?php if ($section_title): ?>
                            <h1 class="page-title"><?php echo $section_title ?></h1>
						<?php endif; ?>

						<?php if ($section_content): ?>
                            <div class="section-text"><?php echo $section_content ?></div>
						<?php endif; ?>

						<?php if ($btn_link || $small_link): ?>
                            <div class="btns-wrap">
								<?php if ($btn_link): ?>
                                    <a href="<?php echo $btn_link['url'] ?>" target="<?php echo $btn_link['target'] ?>" class="btn-cta btn btn-grey-white" data-wpel-link="internal">
                                        <span class="caption"><?php echo $btn_link['title'] ?></span>
                                        <span class="icon">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
      fill="white"></path>
</svg>
    </span>
                                    </a>
								<?php endif; ?>
								<?php if ($small_link): ?>
                                    <a href="<?php echo $small_link['url'] ?>" class="link" target="<?php echo $small_link['target'] ?>">
										<?php echo $small_link['title'] ?>
                                    </a>
								<?php endif; ?>
                            </div>
						<?php endif; ?>
                    </div>

					<?php if ($notice): ?>
                        <div class="notice"><?php echo $notice ?></div>
					<?php endif; ?>
                </div>
			<?php endif; ?>

        </div>
    </div>
</header>

<div class="content-block-mobile">
    <div class="container">
        <h1 class="page-title"><?php echo $section_title ?></h1>
        <div class="section-text"><?php echo $section_content ?></div>
		<?php if ($btn_link || $small_link): ?>
            <div class="btns-wrap">
				<?php if ($btn_link): ?>
                    <a href="<?php echo $btn_link['url'] ?>" target="<?php echo $btn_link['target'] ?>" class="btn-cta btn btn-grey-white" data-wpel-link="internal">
                        <span class="caption"><?php echo $btn_link['title'] ?></span>
                        <span class="icon">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
      fill="white"></path>
</svg>
    </span>
                    </a>
				<?php endif; ?>
				<?php if ($small_link): ?>
                    <a href="<?php echo $small_link['url'] ?>" class="link" target="<?php echo $small_link['target'] ?>">
						<?php echo $small_link['title'] ?>
                    </a>
				<?php endif; ?>
            </div>
		<?php endif; ?>

		<?php if ($notice): ?>
            <div class="notice"><?php echo $notice ?></div>
		<?php endif; ?>
    </div>
</div>
