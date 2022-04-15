<?php
/**
 * Hero headline
 */
return array(
	'title'      => __( 'Projects, three columns', 'robertdevore-2022' ),
	'categories' => array( 'robertdevore-2022' ),
	'blockTypes' => array( 'core/heading' ),
	'content'    => '
		<!-- wp:group {"align":"full","layout":{"contentSize":"80rem"}} -->
		<div class="wp-block-group alignfull"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"3rem"}}} -->
		<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"top"} -->
		<div class="wp-block-column is-vertically-aligned-top"><!-- wp:image {"id":189,"sizeSlug":"full","linkDestination":"custom","className":"is-style-rounded"} -->
		<figure class="wp-block-image size-full is-style-rounded"><a href="#"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/project.jpg" alt="' . esc_html__( 'August Macke\'s Landscape with children and goats', 'robertdevore-2022' ) . '"/></a></figure>
		<!-- /wp:image -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"1rem","padding":{"top":"10px"}}}} -->
		<div class="wp-block-group" style="padding-top:10px"><!-- wp:heading {"fontSize":"medium"} -->
		<h2 class="has-medium-font-size" id="robertdevore-2022-theme"><a href="#">' . esc_html__( 'Robert DeVore Theme →', 'robertdevore-2022' ) . '</a></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"textColor":"foreground-alt","fontSize":"small"} -->
		<p class="has-foreground-alt-color has-text-color has-small-font-size">' . esc_html__( 'WordPress block theme for storytellers', 'robertdevore-2022' ) . '</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:group --></div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":189,"sizeSlug":"full","linkDestination":"custom","className":"is-style-rounded"} -->
		<figure class="wp-block-image size-full is-style-rounded"><a href="#"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/project-2.jpg" alt="' . esc_html__( 'August Macke\'s Landscape with children and goats', 'robertdevore-2022' ) . '"/></a></figure>
		<!-- /wp:image -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"1rem","padding":{"top":"10px"}}}} -->
		<div class="wp-block-group" style="padding-top:10px"><!-- wp:heading {"fontSize":"medium"} -->
		<h2 class="has-medium-font-size" id="iceberg"><a href="#">' . esc_html__( 'Iceberg →', 'robertdevore-2022' ) . '</a></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"textColor":"foreground-alt","fontSize":"small"} -->
		<p class="has-foreground-alt-color has-text-color has-small-font-size">' . esc_html__( 'Block-based markdown editor for WordPress', 'robertdevore-2022' ) . '</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:group --></div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top"} -->
		<div class="wp-block-column is-vertically-aligned-top"><!-- wp:spacer {"height":"150px","className":"hide-on-tablet"} -->
		<div style="height:150px" aria-hidden="true" class="wp-block-spacer hide-on-tablet"></div>
		<!-- /wp:spacer -->

		<!-- wp:image {"id":189,"sizeSlug":"full","linkDestination":"custom","className":"is-style-rounded"} -->
		<figure class="wp-block-image size-full is-style-rounded"><a href="#"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/project-3.jpg" alt="' . esc_html__( 'August Macke\'s Landscape with children and goats', 'robertdevore-2022' ) . '"/></a></figure>
		<!-- /wp:image -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"1rem","padding":{"top":"10px"}}}} -->
		<div class="wp-block-group" style="padding-top:10px"><!-- wp:heading {"fontSize":"medium"} -->
		<h2 class="has-medium-font-size" id="alana"><a href="#">' . esc_html__( 'Alana →', 'robertdevore-2022' ) . '</a></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"textColor":"foreground-alt","fontSize":"small"} -->
		<p class="has-foreground-alt-color has-text-color has-small-font-size">' . esc_html__( '100’s of powerful commands for WordPress', 'robertdevore-2022' ) . '</p>
		<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->',
);
