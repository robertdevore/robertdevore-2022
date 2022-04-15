<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RobertDeVore2022
 * @since RobertDeVore2022 1.0
 */

if ( ! function_exists( 'robert_devore_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since RobertDeVore2022 1.0
	 *
	 * @return void
	 */
	function robert_devore_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style(
			array(
				'style.css',
				'/assets/css/theme.css',
			)
		);

	}

endif;

add_action( 'after_setup_theme', 'robert_devore_support' );

if ( ! function_exists( 'robert_devore_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since RobertDeVore2022 1.0
	 *
	 * @return void
	 */
	function robert_devore_styles() {
		$theme_version  = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;

		// Register main stylesheet.
		wp_register_style(
			'robertdevore-2022-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue main stylesheet.
		wp_enqueue_style( 'robertdevore-2022-style' );

		// Register theme stylesheet.
		// Necessary so that child themes can have proper editor styles.
		wp_register_style(
			'robertdevore-2022-theme-style',
			get_template_directory_uri() . '/assets/css/theme.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'robertdevore-2022-theme-style' );

		// Add styles inline.
		wp_add_inline_style( 'robertdevore-2022-style', robert_devore_accent_colors() );
		wp_add_inline_style( 'robertdevore-2022-style', robert_devore_get_font_face_styles() );

	}

endif;

add_action( 'wp_enqueue_scripts', 'robert_devore_styles' );

if ( ! function_exists( 'robert_devore_block_styles' ) ) :
	/**
	 * Enqueue block style scripts.
	 *
	 * @since RobertDeVore2022 1.0
	 *
	 * @return void
	 */
	function robert_devore_block_styles() {
		$theme_version  = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;

		wp_enqueue_script(
			'robertdevore-2022-block-styles',
			get_theme_file_uri( '/assets/js/block-styles.js' ),
			array( 'wp-blocks' ),
			$theme_version,
			true
		);

	}

endif;

add_action( 'enqueue_block_editor_assets', 'robert_devore_block_styles' );

if ( ! function_exists( 'robert_devore_inline_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @since RobertDeVore2022 1.0
	 *
	 * @return void
	 */
	function robert_devore_inline_editor_styles() {

		// Add editor styles inline.
		wp_add_inline_style( 'wp-block-library', robert_devore_editor_styles() );
		wp_add_inline_style( 'wp-block-library', robert_devore_accent_colors() );
		wp_add_inline_style( 'wp-block-library', robert_devore_get_font_face_styles() );
	}

endif;

add_action( 'admin_init', 'robert_devore_inline_editor_styles' );

if ( ! function_exists( 'robert_devore_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions robert_devore_styles() and robert_devore_inline_editor_styles() above.
	 *
	 * @since RobertDeVore2022 1.0
	 *
	 * @return string
	 */
	function robert_devore_get_font_face_styles() {

		return "
		@font-face{
			font-family: 'Inter';
			src: url('" . get_theme_file_uri( 'assets/fonts/inter-roman.woff2' ) . "') format('woff2');
			font-style: 400;
			font-weight: normal;
			font-display: swap;

		}

		@font-face{
			font-family: 'Inter';
			src: url('" . get_theme_file_uri( 'assets/fonts/inter-semibold.woff2' ) . "') format('woff2');
			font-style: normal;
			font-weight: 600;
			font-display: swap;
		}

		@font-face{
			font-family: 'Inter';
			src: url('" . get_theme_file_uri( 'assets/fonts/inter-italic.woff2' ) . "') format('woff2');
			font-style: italic;
			font-weight: normal;
			font-display: swap;

		}
		";

	}

endif;

if ( ! function_exists( 'robert_devore_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 *
	 * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (it is used
	 * on every heading, for example). The other font is only needed if there is any applicable content in italic style,
	 * and therefore preloading it would in most cases regress performance when that font would otherwise not be loaded
	 * at all.
	 *
	 * @since RobertDeVore2022 1.0
	 *
	 * @return void
	 */
	function robert_devore_preload_webfonts() {
		?>
		<link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/inter-roman.woff2' ) ); ?>" as="font" type="font/woff2" crossorigin>
		<?php
	}

endif;

add_action( 'wp_head', 'robert_devore_preload_webfonts' );

if ( ! function_exists( 'robert_devore_accent_colors' ) ) :

	/**
	 * Set accent color variables.
	 * Called by functions robert_devore_styles() and robert_devore_inline_editor_styles() above.
	 *
	 * @since RobertDeVore2022 1.0
	 *
	 * @return string
	 */
	function robert_devore_accent_colors() {

		return '
                .is-primary-accent {
                        --wp--custom--color--accent: var(--wp--preset--color--primary);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--secondary);
                }

                .is-secondary-accent {
                        --wp--custom--color--accent: var(--wp--preset--color--secondary);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--primary);
                }

                .is-tertiary-accent {
                        --wp--custom--color--accent: var(--wp--preset--color--tertiary);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--quarternary);
                }

                .is-quarternary-accent {
                        --wp--custom--color--accent: var(--wp--preset--color--quarternary);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--tertiary);
                }

                .is-quinary-accent {
                        --wp--custom--color--accent: var(--wp--preset--color--quinary);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--senary);
                }

                .is-senary-accent {
                        --wp--custom--color--accent: var(--wp--preset--color--senary);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--quinary);
                }

		.is-background-accent {
                        --wp--custom--color--accent: var(--wp--preset--color--background);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--foreground);
                }
		';

	}

endif;

if ( ! function_exists( 'robert_devore_editor_styles' ) ) :

	/**
	 * Get editor styles.
	 * Called by function robert_devore_inline_editor_styles() above.
	 *
	 * @since RobertDeVore2022 1.0
	 *
	 * @return string
	 */
	function robert_devore_editor_styles() {

		$palette = wp_get_global_settings( array( 'layout', 'wideSize' ) );

		return "
                .post-type-post:not(.is-iceberg) .edit-post-visual-editor__post-title-wrapper {
                        margin-top: 0 !important;
                        padding-bottom: calc( 2 * var(--wp--custom--spacing--small));
                        padding-top:calc( 2 * var(--wp--custom--spacing--small));
                        margin-bottom: 3.5rem !important;
                }

                .post-type-post:not(.is-iceberg) .edit-post-visual-editor__post-title-wrapper {
                        background: var(--wp--custom--color--accent);
                }

                .post-type-post:not(.is-iceberg) .edit-post-visual-editor__post-title-wrapper > * {
                        max-width: $palette !important;
                }

		.post-type-post:not(.is-iceberg) .edit-post-visual-editor__post-title-wrapper {
                        margin-top: 0 !important;
                        padding-bottom: calc( 2 * var(--wp--custom--spacing--small));
                        padding-top:calc( 2 * var(--wp--custom--spacing--small));
                        margin-bottom: 3.5rem !important;
                }

		.post-type-post:not(.is-iceberg) .edit-post-visual-editor__post-title-wrapper h1 {
			color: var(--wp--custom--color--hero-text);
		}

		.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > p + h1,
		.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > p + h2,
		.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > p + h3,
		.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > p + h4 {
			margin-top: var(--wp--custom--spacing--medium, 6rem) !important;
		}

		.is-primary-accent .editor-styles-wrapper {
                        --wp--custom--color--accent: var(--wp--preset--color--primary);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--secondary);
                }

                .is-secondary-accent .editor-styles-wrapper {
                        --wp--custom--color--accent: var(--wp--preset--color--secondary);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--primary);
                }

		.is-tertiary-accent .editor-styles-wrapper {
                        --wp--custom--color--accent: var(--wp--preset--color--tertiary);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--quarternary);
                }

		.is-quarternary-accent .editor-styles-wrapper {
                        --wp--custom--color--accent: var(--wp--preset--color--quarternary);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--tertiary);
                }

		.is-quinary-accent .editor-styles-wrapper {
                        --wp--custom--color--accent: var(--wp--preset--color--quinary);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--senary);
                }

		.is-senary-accent .editor-styles-wrapper {
                        --wp--custom--color--accent: var(--wp--preset--color--senary);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--quinary);
                }

		.is-background-accent .editor-styles-wrapper {
                        --wp--custom--color--accent: var(--wp--preset--color--background);
                        --wp--custom--color--accent-alt: var(--wp--preset--color--background);
                }
		";

	}

endif;

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// Add accent color functionality
require get_template_directory() . '/inc/accent-color.php';
