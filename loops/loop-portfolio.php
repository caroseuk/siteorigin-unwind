<?php
/**
 * Loop Name: Portfolio
 *
 * @package siteorigin-unwind
 * @since siteorigin-unwind 1.1.5
 * @license GPL 2.0
 */

wp_enqueue_script( 'jquery-isotope' );
?>

<div class="portfolio-loop">
	<?php
		if ( get_query_var( 'paged' ) ) :
			$paged = get_query_var( 'paged' );
		elseif ( get_query_var( 'page' ) ) :
			$paged = get_query_var( 'page' );
		else :
			$paged = -1;
		endif;

		$args = array(
			'post_type'      => 'jetpack-portfolio',
			'paged'          => $paged,
		);

		$project_query = new WP_Query ( $args );

		if ( post_type_exists( 'jetpack-portfolio' ) && $project_query -> have_posts() ) :

			while ( $project_query -> have_posts() ) : $project_query -> the_post();

				get_template_part( 'template-parts/content', 'portfolio' );

			endwhile;

			wp_reset_postdata();

		else :

			get_template_part( 'template-parts/content', 'none' );

	endif; ?>
</div>
