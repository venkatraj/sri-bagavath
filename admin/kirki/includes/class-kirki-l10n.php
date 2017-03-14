<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'gem';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'gem' ),
				'background-image'      => esc_attr__( 'Background Image', 'gem' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'gem' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'gem' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'gem' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'gem' ),
				'inherit'               => esc_attr__( 'Inherit', 'gem' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'gem' ),
				'cover'                 => esc_attr__( 'Cover', 'gem' ),
				'contain'               => esc_attr__( 'Contain', 'gem' ),
				'background-size'       => esc_attr__( 'Background Size', 'gem' ),
				'fixed'                 => esc_attr__( 'Fixed', 'gem' ),
				'scroll'                => esc_attr__( 'Scroll', 'gem' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'gem' ),
				'left-top'              => esc_attr__( 'Left Top', 'gem' ),
				'left-center'           => esc_attr__( 'Left Center', 'gem' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'gem' ),
				'right-top'             => esc_attr__( 'Right Top', 'gem' ),
				'right-center'          => esc_attr__( 'Right Center', 'gem' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'gem' ),
				'center-top'            => esc_attr__( 'Center Top', 'gem' ),
				'center-center'         => esc_attr__( 'Center Center', 'gem' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'gem' ),
				'background-position'   => esc_attr__( 'Background Position', 'gem' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'gem' ),
				'on'                    => esc_attr__( 'ON', 'gem' ),
				'off'                   => esc_attr__( 'OFF', 'gem' ),
				'all'                   => esc_attr__( 'All', 'gem' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'gem' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'gem' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'gem' ),
				'greek'                 => esc_attr__( 'Greek', 'gem' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'gem' ),
				'khmer'                 => esc_attr__( 'Khmer', 'gem' ),
				'latin'                 => esc_attr__( 'Latin', 'gem' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'gem' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'gem' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'gem' ),
				'arabic'                => esc_attr__( 'Arabic', 'gem' ),
				'bengali'               => esc_attr__( 'Bengali', 'gem' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'gem' ),
				'tamil'                 => esc_attr__( 'Tamil', 'gem' ),
				'telugu'                => esc_attr__( 'Telugu', 'gem' ),
				'thai'                  => esc_attr__( 'Thai', 'gem' ),
				'serif'                 => _x( 'Serif', 'font style', 'gem' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'gem' ),
				'monospace'             => _x( 'Monospace', 'font style', 'gem' ),
				'font-family'           => esc_attr__( 'Font Family', 'gem' ),
				'font-size'             => esc_attr__( 'Font Size', 'gem' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'gem' ),
				'line-height'           => esc_attr__( 'Line Height', 'gem' ),
				'font-style'            => esc_attr__( 'Font Style', 'gem' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'gem' ),
				'top'                   => esc_attr__( 'Top', 'gem' ),
				'bottom'                => esc_attr__( 'Bottom', 'gem' ),
				'left'                  => esc_attr__( 'Left', 'gem' ),
				'right'                 => esc_attr__( 'Right', 'gem' ),
				'center'                => esc_attr__( 'Center', 'gem' ),
				'justify'               => esc_attr__( 'Justify', 'gem' ),
				'color'                 => esc_attr__( 'Color', 'gem' ),
				'add-image'             => esc_attr__( 'Add Image', 'gem' ),
				'change-image'          => esc_attr__( 'Change Image', 'gem' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'gem' ),
				'add-file'              => esc_attr__( 'Add File', 'gem' ),
				'change-file'           => esc_attr__( 'Change File', 'gem' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'gem' ),
				'remove'                => esc_attr__( 'Remove', 'gem' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'gem' ),
				'variant'               => esc_attr__( 'Variant', 'gem' ),
				'subsets'               => esc_attr__( 'Subset', 'gem' ),
				'size'                  => esc_attr__( 'Size', 'gem' ),
				'height'                => esc_attr__( 'Height', 'gem' ),
				'spacing'               => esc_attr__( 'Spacing', 'gem' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'gem' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'gem' ),
				'light'                 => esc_attr__( 'Light 200', 'gem' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'gem' ),
				'book'                  => esc_attr__( 'Book 300', 'gem' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'gem' ),
				'regular'               => esc_attr__( 'Normal 400', 'gem' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'gem' ),
				'medium'                => esc_attr__( 'Medium 500', 'gem' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'gem' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'gem' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'gem' ),
				'bold'                  => esc_attr__( 'Bold 700', 'gem' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'gem' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'gem' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'gem' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'gem' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'gem' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'gem' ),
				'add-new'           	=> esc_attr__( 'Add new', 'gem' ),
				'row'           		=> esc_attr__( 'row', 'gem' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'gem' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'gem' ),
				'back'                  => esc_attr__( 'Back', 'gem' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'gem' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'gem' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'gem' ),
				'none'                  => esc_attr__( 'None', 'gem' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'gem' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'gem' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'gem' ),
				'initial'               => esc_attr__( 'Initial', 'gem' ),
				'select-page'           => esc_attr__( 'Select a Page', 'gem' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'gem' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'gem' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'gem' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'gem' ),
			);

			$config = apply_filters( 'kirki/config', array() );

			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
