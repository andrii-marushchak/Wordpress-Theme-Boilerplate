<!-- Section: Newsletter -->
<?php $content = startlife_get_option('section_newsletter') ?>

<section class="section-newsletter acf-section">
    <div class="container">
        <div class="section-row">


            <!-- Section Title -->
            <div class="col-left">
                <h2 class="section-title h2-small"><?php echo $content['section_title'] ?></h2>
            </div>

            <!-- Form -->
            <div class="col-right">
                <div class="form">

					<?php echo do_shortcode('[contact-form-7 id="' . $content['form'] . '"]') ?>

					<?php /* Form ?>
                    <div class="form-row">
                        <div class="form-field">
                            <label>First name*</label>
                            <input type="text" placeholder="Input your first name">
                        </div>
                        <div class="form-field">
                            <label>Organization type</label>
                            <select class="form-select form-contact-select">
                                <option value="1">Startup/Scaleup</option>
                                <option value="2">Large Company</option>
                                <option value="3">Small Company</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-field">
                            <label>Email*</label>
                            <input type="email" placeholder="Input your e-mail">
                        </div>
                    </div>
                    <div class="form-row form-row--submit">
                        <button type="submit" class="btn-cta btn btn-primary">
                            <span class="caption">Get in touch</span>
                            <span class="icon">
              <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
                      fill="white"></path>
              </svg>
            </span>
                        </button>
                    </div>
                    <?php */ ?>

                </div>
            </div>


        </div>
    </div>
</section>