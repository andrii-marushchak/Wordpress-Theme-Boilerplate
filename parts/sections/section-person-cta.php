<!-- Section: Person CTA  -->
<?php $section_title = get_sub_field('section_title') ?>
<?php $cta_block = get_sub_field('block_cta') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>


<section class="section-cta acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
>

    <div class="container">
		<?php if ($section_title): ?>
            <h2 class="h3 section-title"><?php echo $section_title ?></h2>
		<?php endif; ?>

        <div class="cta-block">
            <div class="cta-block__inner">

				<?php if ($cta_block['photo']): ?>
                    <picture class="photo">
						<?php echo wp_get_attachment_image($cta_block['photo'], 'full') ?>
                    </picture>
				<?php endif; ?>

                <div class="content">
					<?php if ($cta_block['title']): ?>
                        <h3 class="title h4"><?php echo $cta_block['title'] ?></h3>
					<?php endif; ?>

					<?php if ($cta_block['subtitle']): ?>
                        <div class="section-text">
							<?php echo $cta_block['subtitle'] ?>
                        </div>
					<?php endif; ?>

					<?php if ($cta_block['button']): ?>
                        <div class="btn-wrap">
                            <a href="<?php echo $cta_block['button']['url'] ?>" target="<?php echo $cta_block['button']['target'] ?>" class="btn-cta btn btn-primary">
                                <span class="caption"><?php echo $cta_block['button']['title'] ?></span>
                                <span class="icon">
            <svg
                    width="15"
                    height="16"
                    viewBox="0 0 15 16"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
            >
              <path
                      d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
                      fill="white"
              ></path>
            </svg>
          </span>
                            </a>
                        </div>
					<?php endif; ?>
                </div>
            </div>
        </div>

    </div>

</section>
