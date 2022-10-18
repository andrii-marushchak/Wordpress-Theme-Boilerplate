</div>

<!-- Footer -->
<footer class="footer">
    <!-- SVG Figures -->
    <div class="top-triangle">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.2" viewBox="0 0 171 394">
            <defs>
                <clipPath id="a" clipPathUnits="userSpaceOnUse">
                    <path d="M-1.45 393.69-158 325.62 29.24-105l156.55 68.07z"/>
                </clipPath>
            </defs>
            <g clip-path="url(#a)">
                <path fill="#82bc00" d="M171 411H0V0h171z"/>
            </g>
        </svg>
    </div>
    <div class="bot-triangle">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 183 393">
            <mask id="a2" width="344" height="499" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                <path fill="#098500" d="M187.24 0h170.706v469.57H187.24z" transform="rotate(23.5 187.24 0)"/>
            </mask>
            <g mask="url(#a2)">
                <path fill="#82BC00" d="M12-18h171v411H12z"/>
            </g>
        </svg>
    </div>

    <div class="container">
        <div class="footer-top">

            <!-- Socials -->
            <div class="widget widget-socials">
                <a href="<?php echo home_url('/') ?>" class="footer-logo">
					<?php echo wp_get_attachment_image(startlife_get_option('footer_logo'), 'full') ?>
                </a>
                <div class="socials">
                    <div class="socials__label">Follow us on social media</div>
                    <div class="socials__list">

						<?php $facebook = startlife_get_option('facebook') ?>
						<?php if ($facebook): ?>
                            <a href="<?php echo $facebook ?>" target="_blank">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"></path></svg>
                            </a>
						<?php endif; ?>

						<?php $linkedin = startlife_get_option('linkedin') ?>
						<?php if ($linkedin): ?>
                            <a href="<?php echo $linkedin ?>" target="_blank">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" viewBox="0 0 17 17" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g></g><path d="M0.698 5.823h3.438v10.323h-3.438v-10.323zM2.438 0.854c-1.167 0-1.938 0.771-1.938 1.782 0 0.989 0.74 1.781 1.896 1.781h0.021c1.198 0 1.948-0.792 1.938-1.781-0.011-1.011-0.74-1.782-1.917-1.782zM12.552 5.583c-1.829 0-2.643 1.002-3.094 1.709v-1.469h-3.427c0 0 0.042 0.969 0 10.323h3.427v-5.761c0-0.312 0.032-0.615 0.114-0.843 0.251-0.615 0.812-1.25 1.762-1.25 1.238 0 1.738 0.948 1.738 2.333v5.521h3.428v-5.917c0-3.167-1.688-4.646-3.948-4.646z"></path></svg>
                            </a>
						<?php endif; ?>

						<?php $twitter = startlife_get_option('twitter') ?>
						<?php if ($twitter): ?>
                            <a href="<?php echo $twitter ?>" target="_blank">
                                <svg width="31" height="25" viewBox="0 0 31 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M27.6177 6.23045C27.6372 6.50387 27.6372 6.77735 27.6372 7.05078C27.6372 15.3906 21.2896 25 9.688 25C6.11376 25 2.79347 23.9648 0.000488281 22.168C0.508319 22.2266 0.996552 22.2461 1.52392 22.2461C4.47309 22.2461 7.18798 21.25 9.35596 19.5508C6.58251 19.4922 4.25829 17.6758 3.45749 15.1758C3.84815 15.2343 4.23875 15.2734 4.64894 15.2734C5.21533 15.2734 5.78178 15.1953 6.30909 15.0586C3.41847 14.4726 1.25044 11.9336 1.25044 8.86718V8.78908C2.09025 9.25783 3.06689 9.5508 4.10197 9.58982C2.40275 8.45698 1.28951 6.52341 1.28951 4.33589C1.28951 3.16404 1.60196 2.08982 2.14887 1.15231C5.25435 4.98044 9.92234 7.48039 15.1567 7.75388C15.059 7.28513 15.0004 6.79689 15.0004 6.3086C15.0004 2.832 17.8129 0 21.309 0C23.1254 0 24.766 0.761717 25.9184 1.99219C27.3441 1.71876 28.7113 1.19139 29.9223 0.468753C29.4535 1.93363 28.4574 3.1641 27.1489 3.9453C28.4184 3.80864 29.6489 3.457 30.7817 2.96877C29.9224 4.21872 28.8481 5.33196 27.6177 6.23045Z"
                                          fill="white"/>
                                </svg>
                            </a>
						<?php endif; ?>

						<?php $youtube = startlife_get_option('youtube') ?>
						<?php if ($youtube): ?>
                            <a href="<?php echo $youtube ?>" target="_blank">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M15.841 4.8c0 0-0.156-1.103-0.637-1.587-0.609-0.637-1.291-0.641-1.603-0.678-2.237-0.163-5.597-0.163-5.597-0.163h-0.006c0 0-3.359 0-5.597 0.163-0.313 0.038-0.994 0.041-1.603 0.678-0.481 0.484-0.634 1.587-0.634 1.587s-0.159 1.294-0.159 2.591v1.213c0 1.294 0.159 2.591 0.159 2.591s0.156 1.103 0.634 1.588c0.609 0.637 1.409 0.616 1.766 0.684 1.281 0.122 5.441 0.159 5.441 0.159s3.363-0.006 5.6-0.166c0.313-0.037 0.994-0.041 1.603-0.678 0.481-0.484 0.637-1.588 0.637-1.588s0.159-1.294 0.159-2.591v-1.213c-0.003-1.294-0.162-2.591-0.162-2.591zM6.347 10.075v-4.497l4.322 2.256-4.322 2.241z"></path></svg>
                            </a>
						<?php endif; ?>

                    </div>
                </div>
            </div>

            <!-- Address -->
			<?php $widget_address = startlife_get_option('address_widget') ?>
            <div class="widget widget-address">
                <p class="widget__title"><?php echo $widget_address['title'] ?></p>
                <div class="widget__address">
					<?php startlife_the_option('address') ?>
                </div>

				<?php $address_link = startlife_get_option('direction_link') ?>
				<?php if ($address_link): ?>
                    <a href="<?php echo $address_link['url'] ?>" target="<?php echo $address_link['target'] ?>" class="address-link btn-link white">
                            <span class="caption">
                                <?php echo $address_link['title'] ?>
                            </span>
                        <span class="icon">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.25176 0.669796L4.74724 0.161438C4.95704 -0.0538127 5.29628 -0.0538127 5.50385 0.161438L9.84265 4.61072C10.0525 4.82597 10.0525 5.17403 9.84265 5.38699L5.50385 9.83856C5.29405 10.0538 4.9548 10.0538 4.74724 9.83856L4.25176 9.3302C4.03973 9.11266 4.04419 8.75773 4.26069 8.54477L6.95012 5.91596H0.535655C0.238813 5.91596 0 5.67094 0 5.36638V4.63362C0 4.32906 0.238813 4.08404 0.535655 4.08404H6.95012L4.26069 1.45523C4.04196 1.24227 4.0375 0.887337 4.25176 0.669796Z"
      fill="white"></path>
</svg>
                    </span>
                    </a>
				<?php endif; ?>

				<?php $phone = startlife_get_option('phone') ?>
				<?php if ($phone): ?>
                    <a href="tel:<?php echo startlife_get_phone($phone) ?>" class="phone-link">
						Tel: <?php echo $phone ?>
                    </a>
				<?php endif; ?>

            </div>

            <!-- For startups -->
			<?php $widget_startups = startlife_get_option('for_startups_widget') ?>
			<?php if ($widget_startups): ?>
                <div class="widget widget-startups">
                    <p class="widget__title"><?php echo $widget_startups['title'] ?></p>
                    <ul class="links">
						<?php foreach ($widget_startups['links'] as $link): ?>
                            <li>
                                <a href="<?php echo $link['link']['url'] ?>">
									<?php echo $link['link']['title'] ?>
                                </a>
                            </li>
						<?php endforeach; ?>
                    </ul>
                </div>
			<?php endif; ?>

            <!-- About us -->
			<?php $widget_about = startlife_get_option('about_us_widget') ?>
			<?php if ($widget_about): ?>
                <div class="widget widget-startups">
                    <p class="widget__title"><?php echo $widget_about['title'] ?></p>
                    <ul class="links">
						<?php foreach ($widget_about['links'] as $link): ?>
                            <li>
                                <a href="<?php echo $link['link']['url'] ?>">
									<?php echo $link['link']['title'] ?>
                                </a>
                            </li>
						<?php endforeach; ?>
                    </ul>
                </div>
			<?php endif; ?>

        </div>
        <div class="footer-center">
			<?php echo wp_get_attachment_image(startlife_get_option('partners_logos'), 'full') ?>
        </div>
        <div class="footer-bot">

            <div class="copyright"><?php echo do_shortcode(startlife_get_option('copyright')) ?></div>
			<?php $privacy_policy = startlife_get_option('privacy_policy') ?>
			<?php if ($privacy_policy): ?>
                <a href="<?php echo $privacy_policy['url'] ?>" target="<?php echo $privacy_policy['target'] ?>"><?php echo $privacy_policy['title'] ?></a>
			<?php endif; ?>

			<?php $terms_conditions = startlife_get_option('terms_conditions') ?>
			<?php if ($terms_conditions): ?>
                <a href="<?php echo $terms_conditions['url'] ?>" target="<?php echo $terms_conditions['target'] ?>"><?php echo $terms_conditions['title'] ?></a>
			<?php endif; ?>

        </div>
    </div>

</footer>

<?php wp_footer(); ?>

</body>
</html>
