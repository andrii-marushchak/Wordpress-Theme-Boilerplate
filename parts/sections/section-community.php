<!-- Section: Community -->
<?php $section_title = get_sub_field('section_title') ?>
<?php $section_content = get_sub_field('section_content') ?>
<?php $grid_items = get_sub_field('grid_items') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>

<section class="section-community acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
>

    <div class="container">

		<?php if ($section_title): ?>
            <h2 class="section-title h2-small"><?php echo $section_title ?></h2>
		<?php endif; ?>

		<?php if ($section_content): ?>
            <div class="section-subtitle section-text"><?php echo $section_content ?></div>
		<?php endif; ?>

        <div class="community-stats">
			<?php foreach ($grid_items as $item): ?>
                <div class="community-stats__col">
                    <strong class="h1 h1-small number">
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

					<?php if ($item['link']): ?>
                        <div class="btn-wrap">
                            <a href="<?php echo $item['link']['url'] ?>" target="<?php echo $item['link']['url'] ?>" class="btn-link black">
                                <span class="caption"><?php echo $item['link']['title'] ?></span>
                                <span class="icon">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.25176 0.669796L4.74724 0.161438C4.95704 -0.0538127 5.29628 -0.0538127 5.50385 0.161438L9.84265 4.61072C10.0525 4.82597 10.0525 5.17403 9.84265 5.38699L5.50385 9.83856C5.29405 10.0538 4.9548 10.0538 4.74724 9.83856L4.25176 9.3302C4.03973 9.11266 4.04419 8.75773 4.26069 8.54477L6.95012 5.91596H0.535655C0.238813 5.91596 0 5.67094 0 5.36638V4.63362C0 4.32906 0.238813 4.08404 0.535655 4.08404H6.95012L4.26069 1.45523C4.04196 1.24227 4.0375 0.887337 4.25176 0.669796Z"
      fill="white"/>
</svg>
                    </span>
                            </a>
                        </div>
					<?php endif; ?>

                    <div class="description"><?php echo $item['description'] ?></div>
                </div>
			<?php endforeach; ?>
        </div>

    </div>
</section>