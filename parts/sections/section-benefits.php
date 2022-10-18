<!-- Section: Benefits ( Grid with Icons ) -->
<?php $section_title = get_sub_field('section_title') ?>
<?php $items = get_sub_field('items') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>

<section class="section-benefits acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
>
    <div class="container">
		<?php if ($section_title): ?>
            <h2 class="h2-small section-title ">
				<?php echo $section_title ?>
            </h2>
		<?php endif; ?>
        <div class="benefits-grid">
			<?php foreach ($items as $item): ?>

                <div class="grid-item">
                    <div class="grid-item__icon">
						<?php echo wp_get_attachment_image($item['icon'], 'full') ?>
                    </div>
                    <p class="h3 grid-item__caption"><?php echo $item['caption'] ?></p>
                </div>

			<?php endforeach; ?>
        </div>
    </div>
</section>