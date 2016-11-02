<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iGrow_Macon
 */

			/**
			 * The igrowmacon_content_bottom action hook
			 */
			do_action( 'igrowmacon_content_bottom' );

		?></div><!-- #content --><?php

		/**
		 * The igrowmacon_content_after action hook
		 */
		do_action( 'igrowmacon_content_after' );

		/**
		 * The igrowmacon_footer_before action hook
		 */
		do_action( 'igrowmacon_footer_before' );

		?><footer id="colophon" role="contentinfo"><?php

			/**
			 * The igrowmacon_footer_top action hook
			 *
			 * @hooked 		footer_wrap_begin
			 */
			do_action( 'igrowmacon_footer_top' );

			/**
			 * The igrowmacon_footer_content action hook
			 *
			 * @hooked 		footer_content 			20
			 */
			do_action( 'igrowmacon_footer_content' );

			/**
			 * The igrowmacon_footer_bottom action hook
			 *
			 * @hooked 		footer_wrap_end
			 */
			do_action( 'igrowmacon_footer_bottom' );

		?></footer><!-- #colophon --><?php

	/**
	 * The igrowmacon_footer_after action hook
	 */
	do_action( 'igrowmacon_footer_after' );

	wp_footer();

	/**
	 * The igrowmacon_body_bottom action hook
	 */
	do_action( 'igrowmacon_body_bottom' );

	?></body>
</html>
