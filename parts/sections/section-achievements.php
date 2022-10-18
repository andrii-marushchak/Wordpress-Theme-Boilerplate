<!-- Section: Achievements ( Grid with Icons ) -->
<?php $items = get_sub_field('items') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>

<div class="section-achievements acf-section"
     data-pt="<?php echo $padding_top ?>"
     data-pb="<?php echo $padding_bottom ?>"
>
    <div class="container">
        <div class="achievements-grid">
			<?php foreach ($items as $item): ?>
                <div class="achievements-grid__item">
                    <picture class="achievements-grid__item-icon">
						<?php echo wp_get_attachment_image($item['icon'], 'full') ?>
                    </picture>
                    <strong class="h1 achievements-grid__item-number">
						<span class="prefix">
                            <?php echo $item['number']['prefix'] ?>
                        </span>
                        <span class="number counter-animated">
                            <?php echo $item['number']['number'] ?>
                        </span>
                        <span class="suffix">
                            <?php echo $item['number']['suffix'] ?>
                        </span>
                    </strong>
                    <p class="h4 achievements-grid__item-title"><?php echo $item['caption'] ?></p>
                </div>
			<?php endforeach; ?>
        </div>

    </div>
</div>