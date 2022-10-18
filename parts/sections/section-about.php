<!-- Section: About  -->
<?php $section_subtitle = get_sub_field('section_subtitle') ?>
<?php $content = get_sub_field('content') ?>
<?php $image = get_sub_field('image') ?>
<?php $iframe = get_sub_field('iframe') ?>
<?php $image_position = get_sub_field('image_position') ?>


<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>

<section class="section-about acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
>
    <div class="container">

		<?php if ($section_subtitle): ?>
            <strong class="h2 h2-small section-subtitle">
				<?php echo $section_subtitle ?>
            </strong>
		<?php endif; ?>

        <div class="section-row" data-image-position="<?php echo $image_position ?>">

			<?php if ($image || $iframe): ?>
                <div class="col-left col">
					<?php if ($image): ?>
						<?php echo wp_get_attachment_image($image, 'full') ?>
					<?php endif; ?>

					<?php if ($iframe): ?>
                        <div class="iframe-wrap">
							<?php echo $iframe ?>
                        </div>
					<?php endif; ?>
                </div>
			<?php endif; ?>

            <div class="col-right col">
                <h2 class="section-title"><?php echo $content['section_title'] ?></h2>
                <div class="section-text">
					<?php echo $content['content'] ?>
                </div>
            </div>

        </div>
    </div>
</section>
