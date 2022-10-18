<!-- Section: Course Info  -->
<?php $items = get_sub_field('items') ?>

<section class="section-course-info acf-section">
    <div class="container">
        <div class="grid">
			<?php foreach ($items as $item): ?>
                <div class="grid-item">

					<?php if ($item['title']): ?>
                        <div class="grid-item__title"><?php echo $item['title'] ?></div>
					<?php endif; ?>

					<?php if ($item['caption']): ?>
                        <div class="grid-item__subtitle"><?php echo $item['caption'] ?></div>
					<?php endif; ?>

                </div>
			<?php endforeach; ?>
        </div>
    </div>
</section>
