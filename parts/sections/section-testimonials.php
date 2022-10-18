<!-- Section: Testimonials  -->
<?php $section_title = get_sub_field('section_title') ?>
<?php $slides = get_sub_field('slides') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>
<?php $padding_size = get_sub_field('padding_size') ?>

<section class="section-testimonials acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
         data-padding-size="<?php echo $padding_size ?>"
>

    <div class="container">

		<?php if ($section_title): ?>
            <div class="section-title-wrap">
                <h2 class="h2-small section-title"><?php echo $section_title ?></h2>
            </div>
		<?php endif; ?>

        <div class="feedback-slider-wrapper">


            <!-- Slider -->
            <div class="feedback-slider swiper">
                <div class="swiper-wrapper">
                    <!-- Slides -->
					<?php foreach ($slides as $slide): ?>
                        <div class="swiper-slide">

                            <!-- Logo -->
                            <picture class="slide-logo">
								<?php echo wp_get_attachment_image($slide['logo'], 'full') ?>
                            </picture>

                            <!-- Content -->
                            <div class="slide-content">
                                <div class="feedback-quote"><?php echo $slide['message'] ?></div>

                                <div class="author">
                                    <picture class="author-photo">
										<?php echo wp_get_attachment_image($slide['author']['photo'], 'full') ?>
                                    </picture>
                                    <div class="author-info">
                                        <strong class="name"><?php echo $slide['author']['name'] ?></strong>
                                        <p class="position"><?php echo $slide['author']['position'] ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
					<?php endforeach; ?>
                </div>

                <!-- Navigation -->
                <div class="navigation">
                    <button aria-label="Slide to Previous" class="feedback-slider-button feedback-slider-button-prev">
                        <svg
                                width="18"
                                height="19"
                                viewBox="0 0 18 19"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                    d="M10.5031 17.3241L9.68207 18.2473C9.33441 18.6383 8.77224 18.6383 8.42827 18.2473L1.23835 10.1669C0.890688 9.77599 0.890688 9.14386 1.23835 8.7571L8.42827 0.672525C8.77594 0.281604 9.33811 0.281604 9.68207 0.672525L10.5031 1.59576C10.8545 1.99084 10.8471 2.63545 10.4884 3.02221L6.03163 7.79644L16.6612 7.79644C17.1531 7.79644 17.5488 8.24142 17.5488 8.79453L17.5488 10.1253C17.5488 10.6784 17.1531 11.1234 16.6612 11.1234L6.03163 11.1234L10.4884 15.8977C10.8508 16.2844 10.8582 16.929 10.5031 17.3241Z"
                                    fill="white"
                            />
                        </svg>
                    </button>
                    <button aria-label="Slide to Next" class="feedback-slider-button feedback-slider-button-next">
                        <svg
                                width="18"
                                height="19"
                                viewBox="0 0 18 19"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                    d="M7.92133 1.21643L8.74862 0.293191C9.09892 -0.0977302 9.66535 -0.0977302 10.0119 0.293191L17.2563 8.37361C17.6066 8.76453 17.6066 9.39666 17.2563 9.78342L10.0119 17.868C9.66163 18.2589 9.09519 18.2589 8.74862 17.868L7.92133 16.9448C7.56731 16.5497 7.57476 15.9051 7.93624 15.5183L12.4267 10.7441H1.71664C1.22101 10.7441 0.822266 10.2991 0.822266 9.746V8.4152C0.822266 7.86209 1.22101 7.4171 1.71664 7.4171H12.4267L7.93624 2.64288C7.57104 2.25611 7.56358 1.61151 7.92133 1.21643Z"
                                    fill="white"
                            />
                        </svg>
                    </button>
                </div>
            </div>


            <!-- Elements -->
            <svg class="feedback-slider-el" width="416" height="642" viewBox="0 0 416 642" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M415.893 0H277.464L0.892578 642H278.033V521.692H199.216L346.678 166.663L415.893 0Z" fill="#82BC00"/>
            </svg>
            <svg class="feedback-slider-el-2" width="106" height="117" viewBox="0 0 106 117" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M332.893 640.928L52.9358 -1L-17.1074 165.644L132.121 520.706H52.36V641L332.893 640.928Z" fill="#098500"/>
            </svg>
        </div>
    </div>

</section>



