<article <?php post_class('event'); ?>>

    <picture class="event-thumbnail">
		<?php the_post_thumbnail(); ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>" class="permalink"></a>

		<?php if (get_field('event_type')): ?>
            <div class="type">
				<?php the_field('event_type'); ?>
            </div>
		<?php endif; ?>
    </picture>

    <div class="event-info">

        <!-- Date -->
		<?php $date = get_field('date') ?>
		<?php if ($date): ?>
            <div class="date">
				<?php echo $date['start_date'] ?>
                <div class="divider">-</div>
				<?php echo $date['end_date'] ?>
            </div>
		<?php endif; ?>

        <!-- Post Title -->
        <h3 class="h4">
            <a href="<?php the_permalink(); ?>" class="event-title"><?php the_title() ?></a>
        </h3>

        <!-- Location -->
		<?php if (get_field('location')): ?>
            <div class="location"><?php the_field('location'); ?></div>
		<?php endif; ?>

        <!-- Time -->
		<?php $time = get_field('time') ?>
		<?php if ($time): ?>
            <div class="time">
				<?php echo $time['start_time'] ?>
                <div class="divider">-</div>
				<?php echo $time['end_time'] ?>
                <span class="timezone"><?php echo $time['timezone'] ?></span>
            </div>
		<?php endif; ?>

        <!-- Featuring -->
		<?php if (get_field('featuring')): ?>
            <div class="featuring"><?php the_field('featuring'); ?></div>
		<?php endif; ?>

    </div>
</article>