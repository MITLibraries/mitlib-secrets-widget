<?php
/**
 * Class that defines a dashboard widget.
 *
 * @package MITlib Secrets Widget
 * @since 0.1.0
 */

namespace mitlib;

/**
 * Defines base widget
 */
class Mitlib_Secrets_Widget {

	/**
	 * The id of this widget.
	 */
	const WID = 'mitlib_secrets';

	/**
	 * Hook to wp_dashboard_setup to add the widget.
	 */
	public static function init() {
		if ( current_user_can( 'activate_plugins' ) ) {
			wp_add_dashboard_widget(
				self::WID, // A unique slug/ID
				'Available Secrets', // Visible name for the widget.
				array( 'mitlib\Mitlib_Secrets_Widget', 'widget' )  // Callback for the main widget content.
			);
		}
	}

	/**
	 * Load the widget code
	 */
	public static function widget() {

		// Use the template to render widget output.
		require_once( 'templates/widget.php' );

	}
}
