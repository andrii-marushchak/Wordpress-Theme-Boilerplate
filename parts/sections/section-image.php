<!-- Section: Content Image  -->
<?php $section_title = get_sub_field('section_title') ?>
<?php $image = get_sub_field('image') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>


<section class="section-image acf-section"
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

		<?php if ($image): ?>
            <picture class="img-wrap">
				<?php echo wp_get_attachment_image($image, 'full') ?>
            </picture>
		<?php endif; ?>

    </div>
</section>
