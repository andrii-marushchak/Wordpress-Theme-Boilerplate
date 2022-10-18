<!-- Section: Newsletter -->
<?php $section_title = get_sub_field('section_title') ?>
<?php $images = get_sub_field('images') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>

<section class="section-goals acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
>
    <div class="container">

		<?php if ($section_title): ?>
            <h2 class="section-title h2-small"><?php echo $section_title ?></h2>
		<?php endif; ?>

        <div class="images-grid">
			<?php foreach ($images as $image): ?>
                <picture class="img-wrap">
					<?php echo wp_get_attachment_image($image['image'], 'full'); ?>
                </picture>
			<?php endforeach; ?>
        </div>

    </div>
</section>