<!-- Section: FAQ  -->
<?php $section_title = get_sub_field('section_title') ?>
<?php $left_column = get_sub_field('left_column') ?>
<?php $right_column = get_sub_field('right_column') ?>
<?php $image = get_sub_field('image') ?>
<?php $button = get_sub_field('button') ?>
<?php $cta_block = get_sub_field('cta_block') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>
<?php $padding_size = get_sub_field('padding_size') ?>

<section class="section-faq acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
         data-padding-size="<?php echo $padding_size ?>"
>

    <div class="container relative">
		<?php if ($section_title): ?>
            <h2 class="h1 h1-small section-title"><?php echo $section_title ?></h2>
		<?php endif; ?>

        <div class="section-row">
			<?php if ($left_column): ?>
                <div class="col-left col">
					<?php if ($left_column['title']): ?>
                        <h2 class="h2-small col-title"><?php echo $left_column['title'] ?></h2>
					<?php endif; ?>
					<?php if ($left_column['questions']): ?>
                        <div class="accordion">
							<?php foreach ($left_column['questions'] as $question): ?>
                                <div class="accordion-item">
                                    <header class="accordion-item__header">
                                        <div class="question">
											<?php echo $question['question'] ?>
                                        </div>
                                        <figure class="icon">
                                            <svg
                                                    width="11"
                                                    height="16"
                                                    viewBox="0 0 11 16"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                        d="M9.82054 8.32796L3.14491 15.0128C2.82295 15.3352 2.30097 15.3352 1.97905 15.0128L1.20045 14.2331C0.879036 13.9112 0.878418 13.3896 1.19907 13.067L6.48963 7.7442L1.19907 2.42145C0.878418 2.09884 0.879036 1.57722 1.20045 1.25536L1.97905 0.475688C2.30101 0.153286 2.82298 0.153286 3.14491 0.475688L9.82051 7.16049C10.1425 7.48286 10.1425 8.00555 9.82054 8.32796Z"
                                                        fill="black"
                                                />
                                            </svg>
                                        </figure>
                                    </header>
                                    <div class="accordion-item__body">
                                        <div class="section-text">
											<?php echo $question['answer'] ?>
                                        </div>
                                    </div>
                                </div>
							<?php endforeach; ?>
                        </div>
					<?php endif; ?>
                </div>
			<?php endif; ?>
			<?php if ($right_column && $right_column['questions']): ?>
                <div class="col-right col">
					<?php if ($right_column['title']): ?>
                        <h2 class="h2-small col-title"><?php echo $right_column['title'] ?></h2>
					<?php endif; ?>
					<?php if ($right_column['questions']): ?>
                        <div class="accordion">
							<?php foreach ($right_column['questions'] as $question): ?>
                                <div class="accordion-item">
                                    <header class="accordion-item__header">
                                        <div class="question">
											<?php echo $question['question'] ?>
                                        </div>
                                        <figure class="icon">
                                            <svg
                                                    width="11"
                                                    height="16"
                                                    viewBox="0 0 11 16"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                        d="M9.82054 8.32796L3.14491 15.0128C2.82295 15.3352 2.30097 15.3352 1.97905 15.0128L1.20045 14.2331C0.879036 13.9112 0.878418 13.3896 1.19907 13.067L6.48963 7.7442L1.19907 2.42145C0.878418 2.09884 0.879036 1.57722 1.20045 1.25536L1.97905 0.475688C2.30101 0.153286 2.82298 0.153286 3.14491 0.475688L9.82051 7.16049C10.1425 7.48286 10.1425 8.00555 9.82054 8.32796Z"
                                                        fill="black"
                                                />
                                            </svg>
                                        </figure>
                                    </header>
                                    <div class="accordion-item__body">
                                        <div class="section-text">
											<?php echo $question['answer'] ?>
                                        </div>
                                    </div>
                                </div>
							<?php endforeach; ?>
                        </div>
					<?php endif; ?>
                </div>
			<?php endif; ?>
        </div>

		<?php if ($image): ?>
            <picture class="bg-img">
				<?php echo wp_get_attachment_image($image, 'full') ?>
            </picture>
		<?php endif; ?>

        <!-- CTA Block -->
		<?php if ($cta_block && $cta_block['title']): ?>
            <div class="cta-block">
                <div class="cta-block__inner">

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
		<?php endif; ?>

		<?php if ($button): ?>
            <div class="download-btn">
                <a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>" class="btn-cta btn btn-primary btn-download">
                    <span class="caption"><?php echo $button['title'] ?></span>
                    <span class="icon">
        <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0.59375 10.5688C0.751222 10.5688 0.902245 10.6314 1.01359 10.7428C1.12494 10.8541 1.1875 11.0051 1.1875 11.1626V14.1313C1.1875 14.4463 1.31261 14.7483 1.53531 14.971C1.75801 15.1937 2.06006 15.3188 2.375 15.3188H16.625C16.9399 15.3188 17.242 15.1937 17.4647 14.971C17.6874 14.7483 17.8125 14.4463 17.8125 14.1313V11.1626C17.8125 11.0051 17.8751 10.8541 17.9864 10.7428C18.0978 10.6314 18.2488 10.5688 18.4062 10.5688C18.5637 10.5688 18.7147 10.6314 18.8261 10.7428C18.9374 10.8541 19 11.0051 19 11.1626V14.1313C19 14.7612 18.7498 15.3653 18.3044 15.8107C17.859 16.2561 17.2549 16.5063 16.625 16.5063H2.375C1.74511 16.5063 1.14102 16.2561 0.695621 15.8107C0.250223 15.3653 0 14.7612 0 14.1313V11.1626C0 11.0051 0.0625556 10.8541 0.173905 10.7428C0.285255 10.6314 0.436278 10.5688 0.59375 10.5688Z"
                fill="white"/>
          <path d="M9.08038 12.8891C9.13553 12.9444 9.20105 12.9883 9.27319 13.0182C9.34532 13.0482 9.42265 13.0636 9.50075 13.0636C9.57885 13.0636 9.65618 13.0482 9.72831 13.0182C9.80045 12.9883 9.86597 12.9444 9.92113 12.8891L13.4836 9.32662C13.5951 9.21513 13.6578 9.06392 13.6578 8.90625C13.6578 8.74858 13.5951 8.59737 13.4836 8.48588C13.3721 8.37438 13.2209 8.31175 13.0633 8.31175C12.9056 8.31175 12.7544 8.37438 12.6429 8.48588L10.0945 11.0354V0.59375C10.0945 0.436278 10.0319 0.285255 9.9206 0.173905C9.80925 0.0625556 9.65822 0 9.50075 0C9.34328 0 9.19226 0.0625556 9.08091 0.173905C8.96956 0.285255 8.907 0.436278 8.907 0.59375V11.0354L6.35863 8.48588C6.24713 8.37438 6.09592 8.31175 5.93825 8.31175C5.78058 8.31175 5.62937 8.37438 5.51788 8.48588C5.40638 8.59737 5.34375 8.74858 5.34375 8.90625C5.34375 9.06392 5.40638 9.21513 5.51788 9.32662L9.08038 12.8891Z"
                fill="white"/>
          </svg>
      </span>
                </a>
            </div>
		<?php endif; ?>

    </div>
</section>



