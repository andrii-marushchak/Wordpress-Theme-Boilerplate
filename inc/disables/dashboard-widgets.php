<?php
/**
 * Disabling dashboard widgets
 */

if ( ! function_exists( 'theme_domain_remove_dashboard_widgets' ) ) {

	/**
	 * Removes default dashboard widgets.
	 *
	 * @return void
	 */
	function theme_domain_remove_dashboard_widgets(): void {
		//remove_action( 'welcome_panel', 'wp_welcome_panel' ); // WP welcome page.
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); // Quick Press widget.
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' ); // Recent Drafts.
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); // WordPress.com Blog.
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' ); // Other WordPress News.
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' ); // Incoming Links.
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' ); // Plugins.
		remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'normal' ); // Gravity Forms.
		remove_meta_box( 'icl_dashboard_widget', 'dashboard', 'normal' ); // Multi Language Plugin.
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); // Activity.
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); // Right Now.
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); // Recent Comments.
		remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' ); // Site Health.

		// Yoast
		remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'normal' ); // Recent Comments.
		remove_meta_box( 'wpseo-wincher-dashboard-overview', 'dashboard', 'normal' ); // Recent Comments.
	}

	add_action( 'wp_dashboard_setup', 'theme_domain_remove_dashboard_widgets' );

}
