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

		// Define the list of required fields that we expect.
		$required = array(
			'FOO',
		);

		// Define the default values.
		$defaults = array(
			'FOO' => 'bar',
		);

		// Load the secrets
		$data = self::_get_secrets( $required, $defaults );

		// Use the template to render widget output.
		require_once( 'templates/widget.php' );

	}

	/**
	 * Load the available secrets
	 *
	 * @param array $requiredKeys  List of keys in secrets file that must exist.
	 * @param array $defaults      The default values to use in case something isn't defined.
	 * @link https://github.com/pantheon-systems/quicksilver-examples/blob/master/slack_notification/slack_notification.php
	 */
	private static function _get_secrets( $requiredKeys, $defaults ) {

		$secretsFile = $_SERVER['HOME'] . '/files/private/secrets.json';
		if (!file_exists($secretsFile)) {
			die('<p>No secrets file found. Aborting...</p>' );
		}
		$secretsContents = file_get_contents($secretsFile);
		$secrets = json_decode($secretsContents, 1);
		if ($secrets == FALSE) {
			die('Could not parse json in secrets file. Aborting!');
		}
		$secrets = array_merge($defaults, $secrets);
		$missing = array_diff($requiredKeys, array_keys($secrets));
		if (!empty($missing)) {
			die('Missing required keys in json secrets file: ' . implode(',', $missing) . '. Aborting!');
		}
		return $secrets;

	}

}
