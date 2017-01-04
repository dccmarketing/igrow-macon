<?php
/**
 * Template Name: Content Sidebar
 *
 * Description: Page template with sidebar on the right-side
 *
 * @package iGrow_Macon
 */

get_header();

?><div id="primary" class="content-area content-sidebar"><?php

	/**
	 * The igrowmacon_main_before action hook.
	 */
	do_action( 'igrowmacon_main_before' );

	?><main class="site-main" id="main" role="main"><?php

	/**
	 * The igrowmacon_while_before action hook
	 *
	 * @hooked 		title_archive
	 * @hooked 		title_single_post
	 */
	do_action( 'igrowmacon_while_before' );

	while ( have_posts() ) : the_post();

		/**
		 * The igrowmacon_entry_before action hook
		 */
		do_action( 'igrowmacon_entry_before' );

		get_template_part( 'template-parts/content', 'page' );

		/**
		 * The igrowmacon_entry_after action hook
		 *
		 * @hooked 		comments 		10
		 */
		do_action( 'igrowmacon_entry_after' );

	endwhile; // loop

	/**
	 * The igrowmacon_while_after action hook
	 */
	do_action( 'igrowmacon_while_after' );

	?></main><!-- #main --><?php

	/**
	 * The igrowmacon_main_after action hook.
	 *
	 * @hooked 		sidebar 		10
	 */
	do_action( 'igrowmacon_main_after' );

?></div><!-- #primary --><?php

get_footer();
