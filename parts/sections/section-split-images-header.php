<!-- Section: Split Images Header -->
<?php $left_img = wp_get_attachment_image(get_sub_field('left_image'), 'full') ?>
<?php $right_image = wp_get_attachment_image(get_sub_field('right_image'), 'full') ?>
<?php $section_title = get_sub_field('section_title') ?>
<?php $section_content = get_sub_field('section_content') ?>
<?php $link = get_sub_field('link') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>


<section class="section-split-images-header  acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
>

    <!-- Image -->
    <picture class="left-img">
		<?php echo $left_img ?>
    </picture>
    <picture class="right-img">
		<?php echo $right_image ?>
    </picture>

    <!-- Container -->
    <div class="container">
        <div class="content">
            <h1 class="h2 section-title"><?php echo $section_title ?></h1>
            <div class="section-text"><?php echo $section_content ?></div>
			<?php if ($link): ?>
                <a href="<?php echo $link['url'] ?>" target="<?php echo $link['url'] ?>" class="btn-link white">
                    <span class="caption"><?php echo $link['title'] ?></span>
                    <span class="icon">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.25176 0.669796L4.74724 0.161438C4.95704 -0.0538127 5.29628 -0.0538127 5.50385 0.161438L9.84265 4.61072C10.0525 4.82597 10.0525 5.17403 9.84265 5.38699L5.50385 9.83856C5.29405 10.0538 4.9548 10.0538 4.74724 9.83856L4.25176 9.3302C4.03973 9.11266 4.04419 8.75773 4.26069 8.54477L6.95012 5.91596H0.535655C0.238813 5.91596 0 5.67094 0 5.36638V4.63362C0 4.32906 0.238813 4.08404 0.535655 4.08404H6.95012L4.26069 1.45523C4.04196 1.24227 4.0375 0.887337 4.25176 0.669796Z"
      fill="white"/>
</svg>
                    </span>
                </a>
			<?php endif; ?>
        </div>
    </div>

</section>
