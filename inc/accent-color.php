<?php
/**
 * RobertDeVore2022: Block Patterns
 *
 * @since RobertDeVore2022 1.0
 */

if ( ! function_exists( 'robert_devore_register_meta' ) ) :

	/**
	 * Add meta to have unique accent colors on pages and posts.
	 *
	 * @since RobertDeVore2022 1.0
	 *
	 * @return void
	 */
	function robert_devore_register_meta() {

		// Use robert_devore_accent_color_default filter to set a default for your site.
		// Use `is-{primary, secondary, tertiary, quarternary, quinary, senary, background}-accent
		$default = apply_filters( 'robert_devore_accent_color_default', 'is-secondary-accent' );

		register_meta(
			'post',
			'robert_devore_accentColor',
			array(
				'default'        => $default,
				'object_subtype' => 'post',
				'show_in_rest'   => true,
				'single'         => true,
				'type'           => 'string',
				'auth_callback'  => function() {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}

endif;

add_action( 'init', 'robert_devore_register_meta' );

if ( ! function_exists( 'robert_devore_accent_color_editor_assets' ) ) :

	/**
	 * Enqueue block editor scripts and styles scripts.
	 *
	 * @since RobertDeVore2022 1.0
	 *
	 * @return void
	 */
	function robert_devore_accent_color_editor_assets() {

			wp_enqueue_style( 'robert_devore-accent-color-styles', get_theme_file_uri( '/assets/css/accent-color.css' ), array(), null );
			wp_enqueue_script( 'robert_devore-accent-color', get_theme_file_uri( '/assets/js/build/accent-color.js' ), array( 'wp-blocks' ), wp_get_theme()->get( 'Version' ), true );

	}

endif;

add_action( 'enqueue_block_editor_assets', 'robert_devore_accent_color_editor_assets' );

if ( ! function_exists( 'robert_devore_add_accent_body_class' ) ) :

	/**
	 * Add accent color class to the body.
	 */
	function robert_devore_add_accent_body_class( $classes ) {
		global $post;

		if ( ! $post ) {
			return $classes;
		}

		if ( is_home() ) {
			return $classes;
		}

		$classes[] = get_post_meta( $post->ID, 'robert_devore_accentColor', true );

		return $classes;
	}

endif;

add_filter( 'body_class', 'robert_devore_add_accent_body_class' );

if ( ! function_exists( 'robert_devore_add_accent_post_class' ) ) :

	/**
	 * Add accent color class to posts on the posts page.
	 */
	function robert_devore_add_accent_post_class( $classes ) {

		global $post;

		if ( ! $post ) {
			return $classes;
		}

		$classes[] = get_post_meta( $post->ID, 'robert_devore_accentColor', true );

		return $classes;

	}

endif;

add_filter( 'post_class', 'robert_devore_add_accent_post_class' );

if ( ! function_exists( 'robert_devore_add_accent_admin_body_class' ) ) :

	/**
	 * Add accent color class within the editor.
	 */
	function robert_devore_add_accent_admin_body_class( $classes ) {
		global $post;

		if ( ! $post ) {
			return $classes;
		}

		$classes .= get_post_meta( $post->ID, 'robert_devore_accentColor', true );

		return $classes;

	}

endif;

add_filter( 'admin_body_class', 'robert_devore_add_accent_admin_body_class' );

if ( ! function_exists( 'robert_devore_theme_meta_tag' ) ) :

	/**
	 * Add meta tag to match the post's accent color
	 */
	function robert_devore_theme_meta_tag() {

		if ( ! is_singular() ) {
			return;
		}

		global $post;

		$palette     = wp_get_global_settings( array( 'color', 'palette' ) );
		$primary     = $palette['theme'][0]['color'];
		$secondary   = $palette['theme'][1]['color'];
		$tertiary    = $palette['theme'][2]['color'];
		$quarternary = $palette['theme'][3]['color'];
		$quinary     = $palette['theme'][4]['color'];
		$senary      = $palette['theme'][5]['color'];

		$color = get_post_meta( $post->ID, 'robert_devore_accentColor', true );

		switch ( $color ) {
			case 'is-primary-accent':
				$color = esc_attr( $primary );
				break;
			case 'is-secondary-accent':
				$color = esc_attr( $secondary );
				break;
			case 'is-tertiary-accent':
				$color = esc_attr( $tertiary );
				break;
			case 'is-quarternary-accent':
				$color = esc_attr( $quarternary );
				break;
			case 'is-quinary-accent':
				$color = esc_attr( $quinary );
				break;
			case 'is-senary-accent':
				$color = esc_attr( $senary );
				break;
		}

		echo '<meta name="theme-color" content="' . esc_attr( $color ) . '">';
	}

endif;

add_action( 'wp_head', 'robert_devore_theme_meta_tag' );
