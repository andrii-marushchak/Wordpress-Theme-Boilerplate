<?php global $wp_query;
$wp_query = $args['query'] ? $args['query'] : $wp_query;
?>

<div class="pagination-wrap pagination-with-results">
	<?php if ($wp_query->max_num_pages > 1): ?>

		<?php $prev_class = 'enabled';
		if ($wp_query->query_vars['paged'] < 2):
			$prev_class = 'disabled';
		endif; ?>

        <!-- Prev -->
        <button class="pagination-prev">
            <a href="<?php echo get_previous_posts_page_link() ?>" class="<?php echo $prev_class ?> prev page page-link">
			                    <span class="icon">
			<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M8.53924 14.9344L7.80317 15.7432C7.49151 16.0856 6.98753 16.0856 6.67918 15.7432L0.233644 8.66477C-0.0780239 8.32232 -0.0780239 7.76858 0.233644 7.42978L6.67918 0.347741C6.99085 0.00529671 7.49482 0.00529671 7.80317 0.347741L8.53924 1.15649C8.85422 1.50258 8.84759 2.06725 8.52598 2.40605L4.53067 6.58824L14.0597 6.58824C14.5007 6.58824 14.8555 6.97805 14.8555 7.46257L14.8555 8.62834C14.8555 9.11286 14.5007 9.50266 14.0597 9.50266H4.53067L8.52598 13.6849C8.85091 14.0237 8.85754 14.5883 8.53924 14.9344Z"
                  fill="#098500"></path>
			</svg>
			</span>
                <span class="caption">Prev</span>
            </a>
        </button>

        <!-- Pagination Links -->
        <div class="pagination">
			<?php echo paginate_links([
				'before_page_number' => '<span class="page">',
				'after_page_number'  => '</span>',
				'prev_next'          => false
			]) ?>
        </div>


		<?php $next_class = 'enabled';
		if ($wp_query->query_vars['paged'] == $wp_query->max_num_pages):
			$next_class = 'disabled';
		endif; ?>

        <!-- Next -->
        <button class="pagination-next">
            <a href="<?php echo get_next_posts_page_link() ?>" class="<?php echo $next_class ?> next page page-link" data-wpel-link="internal">
                <span class="caption">Next</span>
                <span class="icon">
<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.87287 1.06558L7.60894 0.256833C7.9206 -0.0856111 8.42458 -0.0856111 8.73293 0.256833L15.1785 7.33523C15.4901 7.67768 15.4901 8.23142 15.1785 8.57022L8.73293 15.6523C8.42126 15.9947 7.91729 15.9947 7.60894 15.6523L6.87287 14.8435C6.55789 14.4974 6.56452 13.9328 6.88613 13.5939L10.8814 9.41176H1.35239C0.911411 9.41176 0.556641 9.02195 0.556641 8.53743V7.37166C0.556641 6.88714 0.911411 6.49734 1.35239 6.49734H10.8814L6.88613 2.31514C6.5612 1.97634 6.55457 1.41167 6.87287 1.06558Z"
      fill="#098500"></path>
</svg>
</span>
            </a>
        </button>

	<?php endif; ?>
</div>