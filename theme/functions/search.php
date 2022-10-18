<?php function include_cpt_search($query) {

	if ($query->is_search) {
		$query->set('post_type', array('post', 'events'));
	}

	return $query;

}

add_filter('pre_get_posts', 'include_cpt_search');