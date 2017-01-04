<div id="wpbdp-listing-<?php echo $listing->get_id(); ?>"
	 class="wpbdp-listing wpbdp-single wpbdp-listing-single wpbdp-listing-<?php echo $listing->get_id(); ?> single <?php echo $listing->get_sticky_status(); ?> <?php echo apply_filters( 'wpbdp_listing_view_css', '', $listing->get_id() ); ?> <?php if ( $images->main ): echo 'with-image'; endif; ?>"
	 itemscope
	 itemtype="http://schema.org/LocalBusiness">

	<div class="listing-title">
		<h1 class="page-title" itemprop="name"><?php echo $title; ?></h1>
	</div><?php
	
	echo $sticky_tag;

	echo wpbdp_render('parts/listing-buttons', array( 'listing_id' => $listing_id, 'view' => 'single' ), false );	
	wpbdp_x_part( 'single_content' );

?></div>
