<!-- Section: Contact -->
<?php $section_title = get_sub_field('section_title') ?>
<?php $form_id = get_sub_field('form') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>

<section class="section-contact acf-section" data-pt="<?php echo $padding_top ?>" data-pb="<?php echo $padding_bottom ?>">
    <div class="container">


        <!-- Title -->

		<?php if ($section_title): ?>
            <h2 class="h1 section-title h1-small">
				<?php echo $section_title ?>
            </h2>
		<?php endif; ?>

        <div class="section-row">

            <div class="col-left">
                <div class="form dark">
					<?php echo do_shortcode('[contact-form-7 id="' . $form_id . '"]') ?>
                </div>
            </div>

            <div class="col-right">
                <div class="contact-info">

					<?php $contact_information = get_sub_field('contact_information') ?>
					<?php if ($contact_information): ?>
                        <div class="contact-block">
							<?php if ($contact_information['block_title']): ?>
                                <h3 class="contact-info__title"><?php echo $contact_information['block_title'] ?></h3>
							<?php endif; ?>

							<?php if (startlife_get_option('address')): ?>
                                <address class="address">
									<?php startlife_the_option('address'); ?>
                                </address>
							<?php endif; ?>

							<?php $phone = startlife_get_option('phone');
							if ($phone): ?>
                                <a href="tel:<?php echo startlife_get_phone($phone) ?>" class="phone">Tel: <?php echo $phone ?></a>
							<?php endif; ?>

							<?php $link = startlife_get_option('direction_link');
							if ($link): ?>
                                <div class="btn-wrap">
                                    <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="btn-cta btn btn-primary">
                                        <span class="caption"><?php echo $link['title'] ?></span>
                                        <span class="icon">
                                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
                                                      fill="white"></path>
                                            </svg>
                                         </span>
                                    </a>
                                </div>
							<?php endif; ?>
                        </div>
					<?php endif; ?>

					<?php $parking_information = get_sub_field('parking_information') ?>
					<?php if ($parking_information): ?>
                        <div class="contact-block">
							<?php if ($parking_information['block_title']): ?>
                                <h3 class="contact-info__title"><?php echo $parking_information['block_title'] ?></h3>
							<?php endif; ?>

							<?php if ($parking_information['info']): ?>
                                <div class="contact-info__desc section-text">
									<?php echo $parking_information['info'] ?>
                                </div>
							<?php endif; ?>

							<?php if ($parking_information['map_link']): ?>
                                <div class="btn-wrap">
                                    <a href="<?php echo $parking_information['map_link']['url'] ?>" target="<?php echo $parking_information['map_link']['target'] ?>" class="btn-cta btn btn-primary">
                                        <span class="caption"><?php echo $parking_information['map_link']['title'] ?></span>
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
					<?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</section>

