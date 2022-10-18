<?php get_header(); ?>

<main class="page-template-member">

    <div class="container">
        <!-- Back Button -->
        <a href="/" class="back-btn">
            <span class="icon">
          <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg"
          >
          <path d="M5.74824 9.8302L5.25276 10.3386C5.04296 10.5538 4.70372 10.5538 4.49615 10.3386L0.157349 5.88928C-0.0524488 5.67403 -0.0524488 5.32597 0.157349 5.11301L4.49615 0.661439C4.70595 0.446188 5.0452 0.446188 5.25276 0.661439L5.74824 1.1698C5.96027 1.38734 5.95581 1.74227 5.73932 1.95523L3.04988 4.58404L9.46435 4.58404C9.76119 4.58404 10 4.82906 10 5.13362L10 5.86638C10 6.17094 9.76119 6.41596 9.46435 6.41596L3.04988 6.41596L5.73932 9.04477C5.95804 9.25773 5.9625 9.61266 5.74824 9.8302Z"
                fill="#27348B"/>
        </svg>
      </span>
            <span class="back-btn__text">Back to overview</span>
        </a>
    </div>

    <section class="section-member">
        <div class="container">
            <div class="section-row">
                <div class="col-left">
                    <div class="member-content">
                        <!-- Name -->
                        <h1 class="member__name"><?php the_title() ?></h1>

						<?php if (startlife_get_field('position')): ?>
                            <!-- Position -->
                            <div class="member__position"><?php startlife_the_field('position'); ?></div>
						<?php endif; ?>

                        <!-- Biography -->
                        <div class="section-text biography">
							<?php the_content(); ?>
                        </div>

						<?php if (startlife_get_field('linkedin')): ?>
                            <!-- LinkedIn -->
                            <div class="btn-wrap">
                                <a href="<?php startlife_the_field('linkedin') ?>" target="_blank" class="btn-cta btn btn-blue">
                                    <span class="caption">View Linkedin profile</span>
                                    <span class="icon">
                                     <svg
                                             width="20"
                                             height="20"
                                             viewBox="0 0 14 13"
                                             fill="none"
                                             xmlns="http://www.w3.org/2000/svg"
                                     >
                        <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M0.50075 12.621H3.446V4.20675H0.50075V12.621ZM1.97375 2.946C2.16719 2.9459 2.35871 2.9077 2.53739 2.83359C2.71606 2.75947 2.87839 2.65089 3.0151 2.51404C3.15181 2.37719 3.26023 2.21475 3.33416 2.036C3.4081 1.85725 3.4461 1.66569 3.446 1.47225C3.4459 1.27881 3.4077 1.08729 3.33359 0.908615C3.25947 0.72994 3.15089 0.567613 3.01404 0.430902C2.87719 0.294191 2.71475 0.185772 2.536 0.111838C2.35725 0.0379041 2.16569 -9.83062e-05 1.97225 1.90978e-07C1.58159 0.000199103 1.207 0.15558 0.930902 0.431962C0.654801 0.708343 0.499801 1.08309 0.5 1.47375C0.500199 1.86441 0.65558 2.239 0.931962 2.5151C1.20834 2.7912 1.58309 2.9462 1.97375 2.946ZM13.121 7.99725C13.121 5.727 12.6312 4.2075 9.9845 4.2075C8.7125 4.2075 7.859 4.68 7.5095 5.343H7.47425V4.2075H5.12825V12.621H7.58V8.451C7.58 7.3515 7.78775 6.28725 9.14825 6.28725C10.4885 6.28725 10.5965 7.54425 10.5965 8.52225V12.621H13.121V7.998V7.99725Z"
                                fill="white"
                        />
                        </svg>
                                     </span>
                                </a>
                            </div>
						<?php endif; ?>
                    </div>
                </div>

                <div class="col-right">
                    <picture class="member-img">
						<?php the_post_thumbnail(); ?>
                    </picture>
                </div>

            </div>
        </div>
    </section>

	<?php if (startlife_get_field('form')): ?>
        <div class="section-contact-team">
            <div class="container">
                <div class="form-wrap ">
                    <h4 class="section-title">Send <strong><?php the_title() ?></strong> an E-mail</h4>
                    <div class="form dark">
	                    <?php echo do_shortcode('[contact-form-7 id="' . startlife_get_field('form') . '"]') ?>
                    </div>
                </div>
            </div>
        </div>
	<?php endif; ?>

</main>

<?php get_footer(); ?>
