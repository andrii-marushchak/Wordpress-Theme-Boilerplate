<!-- Section: Marquee -->
<?php $section_title = get_sub_field('section_title') ?>
<?php $section_subtitle = get_sub_field('section_subtitle') ?>
<?php $button = get_sub_field('button') ?>
<?php $top_row = get_sub_field('top_row') ?>
<?php $bot_row = get_sub_field('bot_row') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>

<section class="section-marquee acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
>
    <div class="container">

        <!-- Title -->
		<?php if ($section_title): ?>
            <h2 class="h1 section-title h1-small">
				<?php echo $section_title ?>
            </h2>
		<?php endif; ?>

        <!-- Subtitle -->
		<?php if ($section_subtitle): ?>
            <div class="section-subtitle">
				<?php echo $section_subtitle ?>
            </div>
		<?php endif; ?>

        <div class="marquee-top">
            <div class="marquee" data-direction="left">
                <div class="marquee-row">
					<?php foreach ($top_row as $item): ?>
						<?php $link = $item['link']; ?>
						<?php if ($link) { ?>
                            <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="partner-logo">
								<?php echo wp_get_attachment_image($item['logo_image'], 'full') ?>
                            </a>
						<?php } else { ?>
                            <div class="partner-logo">
								<?php echo wp_get_attachment_image($item['logo_image'], 'full') ?>
                            </div>
						<?php } ?>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="marquee-bot">
            <div class="marquee" data-direction="right">
                <div class="marquee-row">
					<?php foreach ($bot_row as $item): ?>
						<?php $link = $item['link']; ?>
						<?php if ($link) { ?>
                            <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="partner-logo">
								<?php echo wp_get_attachment_image($item['logo_image'], 'full') ?>
                            </a>
						<?php } else { ?>
                            <div class="partner-logo">
								<?php echo wp_get_attachment_image($item['logo_image'], 'full') ?>
                            </div>
						<?php } ?>
					<?php endforeach; ?>
                </div>
            </div>
        </div>


        <div class="btn-wrap">
	        <?php if ($button): ?>
                <a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>" class="btn-cta btn btn-primary">
                    <span class="caption"><?php echo $button['title'] ?></span>
                    <span class="icon">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
      fill="white"/>
</svg>
    </span>
                </a>
	        <?php endif; ?>
        </div>

    </div>
</section>

