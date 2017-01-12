<?php

/**
 * A class of methods using hooks in the theme.
 *
 * @since 			1.0.0
 * @package 		iGrow_Macon
 * @subpackage 		iGrow_Macon/classes
 */
class iGrow_Macon_Themehooks {

	/**
	 * Constructor
	 */
	public function __construct() {}

	/**
	 * Registers all the WordPress hooks and filters for this class.
	 */
	public function hooks() {

		add_action( 'igrowmacon_head_content', 			array( $this, 'head_content' ), 10 );

		add_action( 'igrowmacon_header_top', 			array( $this, 'header_wrap_start' ), 10 );
		add_action( 'igrowmacon_header_top', 			array( $this, 'site_branding_begin' ), 15 );

		add_action( 'igrowmacon_header_content', 		array( $this, 'title_site' ), 10 );

		add_action( 'igrowmacon_header_bottom', 		array( $this, 'site_branding_end' ), 50 );
		add_action( 'igrowmacon_header_bottom', 		array( $this, 'menu_toggles' ), 60 );
		add_action( 'igrowmacon_header_bottom', 		array( $this, 'header_wrap_end' ), 90 );
		add_action( 'igrowmacon_header_bottom', 		array( $this, 'menu_primary' ), 95 );
		
		add_action( 'igrowmacon_header_after', 			array( $this, 'contact_bar_begin' ) );
		add_action( 'igrowmacon_header_after', 			array( $this, 'menu_social' ) );
		add_action( 'igrowmacon_header_after', 			array( $this, 'contact_bar_end' ) );
		
		add_action( 'igrowmacon_content_before', 		array( $this, 'sliders' ) );
		add_action( 'igrowmacon_content_before', 		array( $this, 'featured_image' ) );

		add_action( 'igrowmacon_body_top', 				array( $this, 'analytics_code' ), 10 );
		add_action( 'igrowmacon_body_top', 				array( $this, 'skip_link' ), 20 );

		add_action( 'igrowmacon_main_before', 			array( $this, 'sidebar_content' ), 10 );

		add_action( 'igrowmacon_while_before', 			array( $this, 'title_archive' ) );
		add_action( 'igrowmacon_while_before', 			array( $this, 'title_single_post' ) );
		add_action( 'igrowmacon_while_before', 			array( $this, 'title_search' ), 10 );
		add_action( 'igrowmacon_while_before', 			array( $this, 'title_news_page' ), 10 );

		add_action( 'igrowmacon_content_top', 			array( $this, 'breadcrumbs' ) );

		add_action( 'igrowmacon_entry_header_content', 	array( $this, 'title_entry' ), 10 );
		add_action( 'igrowmacon_entry_header_content', 	array( $this, 'title_page' ), 10 );
		add_action( 'igrowmacon_entry_header_content', 	array( $this, 'posted_on' ), 20 );

		add_action( 'igrowmacon_entry_footer_content', 	array( $this, 'entry_categories_links' ), 10 );
		add_action( 'igrowmacon_entry_footer_content', 	array( $this, 'entry_tags_links' ), 15 );
		add_action( 'igrowmacon_entry_footer_content', 	array( $this, 'entry_comments_links' ), 20 );
		add_action( 'igrowmacon_entry_footer_content', 	array( $this, 'entry_edit_link' ), 25 );

		add_action( 'igrowmacon_entry_after', 			array( $this, 'comments' ), 10 );

		add_action( 'igrowmacon_while_after', 			array( $this, 'posts_nav' ) );

		add_action( 'igrowmacon_main_after', 			array( $this, 'content_sidebar' ), 10 );

		add_action( 'igrowmacon_404_header', 			array( $this, 'title_404' ), 10 );

		add_action( 'igrowmacon_404_before', 			array( $this, 'four_04_message' ), 10 );

		add_action( 'igrowmacon_404_content', 			array( $this, 'add_search' ), 10 );
		add_action( 'igrowmacon_404_content', 			array( $this, 'four_04_posts_widget' ), 15 );
		add_action( 'igrowmacon_404_content', 			array( $this, 'four_04_categories' ), 20 );
		add_action( 'igrowmacon_404_content', 			array( $this, 'four_04_archives' ), 25 );
		add_action( 'igrowmacon_404_content', 			array( $this, 'four_04_tag_cloud' ), 30 );

		add_action( 'igrowmacon_footer_before', 		array( $this, 'stripes_bar' ) );
		add_action( 'igrowmacon_footer_before', 		array( $this, 'coin_flips' ) );

		add_action( 'igrowmacon_footer_top', 			array( $this, 'footer_wrap_begin' ) );

		add_action( 'igrowmacon_footer_content', 		array( $this, 'footer_content_begin' ), 5 );
		add_action( 'igrowmacon_footer_content', 		array( $this, 'footer_content_copyright' ), 10 );
		add_action( 'igrowmacon_footer_content', 		array( $this, 'footer_content_address' ), 20 );
		add_action( 'igrowmacon_footer_content',		array( $this, 'footer_content_credits' ), 30 );
		add_action( 'igrowmacon_footer_content', 		array( $this, 'footer_content_end' ), 50 );

		add_action( 'igrowmacon_footer_bottom', 		array( $this, 'footer_wrap_end' ) );

	} // hooks()

	/**
	 * Adds a search form
	 *
	 * @hooked 		igrowmacon_404_content 		15
	 * @return 		mixed 		Search form markup
	 */
	public function add_search() {

		get_search_form();

	} // add_search()
	
	/**
	 * Inserts Google Tag manager code after body tag
	 *
	 * @exits 		tag_manager field is empty.
	 * @hooked 		igrowmacon_body_top 		10
	 * @return 		mixed 				The inserted Google Tag Manager code
	 */
	public function analytics_code() {

		$tag_id = get_theme_mod( 'tag_manager_id' );

		if ( empty( $tag_id ) ) { return; }

		echo '<!-- Google Tag Manager -->';
		echo '<noscript><iframe src="//www.googletagmanager.com/ns.html?id=' . $tag_id . '?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':
new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=
\'//www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,\'script\',\'dataLayer\',\'' . $tag_id . '\');</script>';
		echo '<!-- Google Tag Manager -->';

	} // analytics_code()

	/**
	 * Returns the appropriate breadcrumbs.
	 *
	 * @exits 		On the front page.
	 * @hooked		igrowmacon_wrap_content
	 * @return 		mixed 				WooCommerce breadcrumbs, then Yoast breadcrumbs
	 */
	public function breadcrumbs() {

		$meta = get_post_custom();
		
		if ( ! empty( $meta['hide-breadcrumbs'][0] ) ) { return; }
		
		?><div class="breadcrumbs">
			<div class="wrap-crumbs"><?php

				if ( function_exists( 'woocommerce_breadcrumb' ) ) {

					$args['after'] 			= '</span>';
					$args['before'] 		= '<span rel="v:child" typeof="v:Breadcrumb">';
					$args['delimiter'] 		= '&nbsp;>&nbsp;';
					$args['home'] 			= esc_html_x( 'Home', 'breadcrumb', 'igrow-macon' );
					$args['wrap_after'] 	= '</span></span></nav>';
					$args['wrap_before'] 	= '<nav class="woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb">';

					woocommerce_breadcrumb( $args );

				} elseif ( function_exists( 'yoast_breadcrumb' ) ) {

					yoast_breadcrumb();

				}

			?></div><!-- .wrap-crumbs -->
		</div><!-- .breadcrumbs --><?php

	} // breadcrumbs()
	
	public function coin_flips() {
		
		if ( is_home() ) { return; }
		
		$circles[] = array( 'pram', 'For expectant moms and families of children birth to 5 years old' );
		$circles[] = array( 'house', 'One-on-One Home Visits' );
		$circles[] = array( 'blocks', 'Focuses on Parent-Child Relationship' );
		$circles[] = array( 'family', 'Promotes Healthy Children and Families' );
		$circles[] = array( 'brain', 'Developmental Screening' );
		$circles[] = array( 'handandheart', 'Connection to Additional Resources' );

		?><div class="igrow-coins">
			<ul class="coin-list"><?php

			foreach ( $circles as $circle ) {

				?><li class="single-coin home-circle">
					<div class="coin-wrap">
						<div class="coin-side coin-front"><?php 
						
							igrowmacon_the_svg( $circle[0] ); 
							
						?></div>
						<div class="coin-side coin-back">
							<span class="coin-text"><?php 
						
								esc_html_e( $circle[1], 'igrow-illinois' ); 
								
							?></span>
						</div>
					</div>
				</li><?php

			}

			?></ul>
		</div><?php
		
	} // coin_flips()
	
	/**
	 * The comments markup
	 *
	 * If comments are open or we have at least one comment, load up the comment template.
	 *
	 * @exits 		Comments closed.
	 * @exits 		There are no comments.
	 * @hooked 		igrowmacon_entry_after 		10
	 * @return 		mixed 					The comments markup
	 */
	public function comments() {

		if ( ! comments_open() || get_comments_number() <= 0 ) { return; }

		comments_template();

	} // comments()
	
	public function contact_bar_begin() {

		?><div class="contact-bar"><?php

	} // contact_bar_begin()
	
	public function contact_bar_end() {

		?></div><!-- .contact-bar --><?php

	} // contact_bar_end()

	/**
	 * Returns the sidebar markup.
	 *
	 * Hooked at igrowmacon_main_after:
	 *		404.php
	 * 		archive.php
	 * 		index.php
	 * 		page_content-sidebar.php
	 * 		search.php
	 *  	single.php
	 *
	 * @exits 		If its a page.
	 * @hooked 		igrowmacon_main_after 		10
	 * @return 		mixed 					The sidebar markup.
	 */
	public function content_sidebar() {
		
		if ( ! is_page() ) { return; }
		if ( ! is_page_template( 'templates/page_content-sidebar.php' ) ) { return; }

		get_sidebar();

	} // content_sidebar()

	/**
	 * Displays the entry category links.
	 *
	 * @exits 		If its a page.
	 * @exits 		If its not the 'post' post type.
	 * @return 		mixed 		Entry categories markup.
	 */
	public function entry_categories_links() {

		if ( is_page() ) { return; }
		if ( 'post' !== get_post_type() ) { return; }

		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'igrow-macon' ) );
		if ( $categories_list && igrowmacon_categorized_blog() ) {

			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'igrow-macon' ) . '</span>', $categories_list );  // WPCS: XSS OK.

		}

	} // entry_categories_links()

	/**
	 * Displays the entry comments links.
	 *
	 * @exits 		If its a page.
	 * @exits 		If its not the 'post' post type.
	 * @exits 		If its a single post, its password protected, and either the comments aren't open or there aren't comments.
	 * @return 		mixed 		Entry comments markup.
	 */
	public function entry_comments_links() {

		if ( is_page() ) { return; }
		if ( 'post' !== get_post_type() ) { return; }
		if ( ! is_single() ) { return; }
		if ( post_password_required() ) { return; }
		if ( ! comments_open() || ! get_comments_number() ) { return; }

		?><span class="comments-link"><?php

		comments_popup_link( 
			sprintf( 
				wp_kses( 
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'igrow-macon' 
				), 
				array( 'span' => array( 'class' => array() ) ) ), 
				get_the_title() 
			) 
		); // translators: %s: post title

		?></span><?php

	} // entry_comments_links()

	/**
	 * Displays the entry edit link.
	 *
	 * @exits 		If its a page.
	 * @exits 		If its not the 'post' post type.
	 * @return 		mixed 		Entry comments markup.
	 */
	public function entry_edit_link() {

		if ( is_page() ) { return; }
		if ( 'post' !== get_post_type() ) { return; }

		edit_post_link( esc_html__( 'Edit', 'igrow-macon' ), '<span class="edit-link">', '</span>' );

	} // entry_edit_link()

	/**
	 * Displays the entry tags links.
	 *
	 * @exits 		If its a page.
	 * @exits 		If its not the 'post' post type.
	 * @exits 		If the tags list is empty.
	 * @return 		mixed 		Entry tags markup.
	 */
	public function entry_tags_links() {

		if ( is_page() ) { return; }
		if ( 'post' !== get_post_type() ) { return; }

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'igrow-macon' ) );

		if ( empty( $tags_list ) ) { return; }

		printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'igrow-macon' ) . '</span>', $tags_list );  // WPCS: XSS OK.

	} // entry_tags_links()
	
	public function featured_image() {
		
		if ( is_front_page() ) { return; }
		
		$meta = get_post_custom();
		
		if ( isset( $meta['select-slider'][0] ) && ! empty( $meta['select-slider'][0] ) ) { return; }
		
		?><div class="featured-image"></div><?php
		
	} // featured_image()
		
	/**
	 * Adds the address to the footer content.
	 *
	 * @hooked 		igrowmacon_footer_content
	 * @return 		mixed 		The footer markup
	 */
	public function footer_content_address() {

		$address = get_theme_mod( 'contact_address' );
		
		if ( empty( $address ) ) { return; }
				
		?><address class="address">
			<a href="<?php echo igrowmacon_make_map_link( $address ); ?>"><?php
		
			echo esc_html( $address );
		
			?></a>
		</address><?php

	} // footer_content_address()

	/**
	 * Adds the opening footer content tag.
	 *
	 * @hooked 		igrowmacon_footer_content
	 * @return 		mixed 		The footer markup
	 */
	public function footer_content_begin() {

		?><div class="site-info"><?php

	} // footer_content_begin()
	
	/**
	 * Adds the copyright to the footer content.
	 *
	 * @hooked 		igrowmacon_footer_content
	 * @return 		mixed 		The footer markup
	 */
	public function footer_content_copyright() {

		?><div class="copyright">&copy <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( get_admin_url(), 'igrow-macon' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a></div><?php

	} // footer_content_copyright()
	
	/**
	 * Adds the site credits to the footer content.
	 *
	 * @hooked 		igrowmacon_footer_content
	 * @return 		mixed 									The footer markup
	 */
	public function footer_content_credits() {

			?><div class="credits"><?php printf( esc_html__( 'Site created by %1$s', 'igrow-macon' ), '<a href="https://dccmarketing.com/" rel="nofollow noopener" target="_blank">DCC</a>' ); ?></div><?php

	} // footer_content_credits()
	
	/**
	 * Adds the ending footer tag.
	 *
	 * @hooked 		igrowmacon_footer_content
	 * @return 		mixed 		The footer markup
	 */
	public function footer_content_end() {

		?></div><!-- .site-info --><?php

	} // footer_content_end()

	/**
	 * Adds the opening wrapper tag.
	 *
	 * @hooked 		igrowmacon_footer_top
	 * @return 		mixed 		The opening wrapper tag
	 */
	public function footer_wrap_begin() {

		?><div class="wrap-footer"><?php

	} // footer_wrap_begin()

	/**
	 * Adds the closing wrapper tag.
	 *
	 * @hooked 		igrowmacon_footer_bottom
	 * @return 		mixed 		The closing wrapper tag
	 */
	public function footer_wrap_end() {

		?></div><!-- wrap-footer --><?php

	} // footer_wrap_end()

	/**
	 * Adds the  to the 404 page content.
	 *
	 * @exits 		Not on 404 page.
	 * @hooked 		igrowmacon_404_content		25
	 * @return 		mixed 					Markup for the archives
	 */
	public function four_04_archives() {

		if ( ! is_404() ) { return; }

		/* translators: %1$s: smiley */
		$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'igrow-macon' ), convert_smilies( ':)' ) ) . '</p>';

		the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

	} // four_04_archives()

	/**
	 * Adds the  to the 404 page content.
	 *
	 * @exits 		Not on 404 page.
	 * @hooked 		igrowmacon_404_content		20
	 * @return 		mixed 					The categories widget
	 */
	public function four_04_categories() {

		if ( ! is_404() ) { return; }
		if ( ! igrowmacon_categorized_blog() ) { return; }

		?><div class="widget widget_categories">
			<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'igrow-macon' ); ?></h2>
			<ul><?php

				wp_list_categories( array(
					'orderby'    => 'count',
					'order'      => 'DESC',
					'show_count' => 1,
					'title_li'   => '',
					'number'     => 10,
				) );

			?></ul>
		</div><!-- .widget --><?php

	} // four_04_categories()

	/**
	 * Adds the Recent Posts widget to the 404 page.
	 *
	 * @exits 		Not on 404 page.
	 * @hooked 		igrowmacon_404_before 		10
	 * @return 		mixed 					The 404 message markup.
	 */
	public function four_04_message() {

		if ( ! is_404() ) { return; }

		?><p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'igrow-macon' ); ?></p><?php

	} // four_04_message()

	/**
	 * Adds the Recent Posts widget to the 404 page.
	 *
	 * @exits 		Not on 404 page.
	 * @hooked 		igrowmacon_404_content 		15
	 * @return 		mixed 					The Recent Posts widget
	 */
	public function four_04_posts_widget() {

		if ( ! is_404() ) { return; }

		the_widget( 'WP_Widget_Recent_Posts' );

	} // four_04_posts_widget()

	/**
	 * Adds the  to the 404 page content.
	 *
	 * @exits 		Not on 404 page.
	 * @hooked 		igrowmacon_404_content		30
	 * @return 		mixed 					The tag cloud widget
	 */
	public function four_04_tag_cloud() {

		if ( ! is_404() ) { return; }

		the_widget( 'WP_Widget_Tag_Cloud' );

	} // four_04_tag_cloud()

	/**
	 * Adds default meta tags in the head.
	 *
	 * @hooked 		igrowmacon_head_content 			10
	 * @return 		mixed 						The default meta tags markup.
	 */
	public function head_content() {

		?><meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php

	} // head_content()

	/**
	 * The header wrap markup
	 *
	 * @hooked  	igrowmacon_header_bottom 		90
	 * @return 		mixed 					The header wrap markup
	 */
	public function header_wrap_end() {

		?></div><!-- .wrap-header --><?php

	} // header_wrap_end()

	/**
	 * The header wrap markup
	 *
	 * @hooked 		igrowmacon_header_top 		10
	 * @return 		mixed 				The header wrap markup
	 */
	public function header_wrap_start() {

		?><div class="wrap-header"><?php

	} // header_wrap_start()
	
	/**
	 * Adds the primary menu
	 *
	 * @hooked 		igrowmacon_header_bottom 		95
	 * @return 		mixed 					The primary menu markup
	 */
	public function menu_primary() {

		?><nav id="site-navigation" class="nav-primary" role="navigation">
			<button class="menu-primary-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'igrow-macon' ); ?></button><?php
			
			if ( is_page_template( 'templates/page_B2B.php' ) ) {
			
				$menu_args['menu_id'] = 'b2b-main-menu';
			
			} else {
				
				$menu_args['menu_id'] 			= 'primary-menu';
				$menu_args['theme_location'] 	= 'primary';

			}
			
			$menu_args['container'] 		= false;
			$menu_args['container_class'] 	= 'menu-primary-wrap';
			$menu_args['items_wrap'] 		= '<ul id="%1$s" class="%2$s"><button class="close-tablet-menu-btn"><span class="close-btn-text">Close Menu</span></button>%3$s</ul>';
			$menu_args['menu_class']      	= 'primary-menu-items primary-menu-items-0';
			$menu_args['walker']  			= new iGrow_Macon_Menu_Walker();
				
			wp_nav_menu( $menu_args );

		?></nav><!-- #site-navigation --><?php

	} // menu_primary()

	/**
	 * Adds the primary menu
	 *
	 * @exits 		Menu not active.
	 * @hooked 		igrowmacon_header_bottom 		65
	 * @return 		mixed 					The social links menu markup
	 */
	public function menu_social() {

		if ( ! has_nav_menu( 'social' ) ) { return; }

		$menu_args['theme_location']	= 'social';
		$menu_args['container'] 		= false;
		$menu_args['depth']           	= 1;
		$menu_args['menu_class']      	= 'social-menu-items social-menu-items-0';
		$menu_args['menu_id'] 			= 'social-menu';
		$menu_args['walker']  			= new iGrow_Macon_Menu_Walker();

		wp_nav_menu( $menu_args );

	} // menu_social()
	
	public function menu_toggles() {
		
		if ( ! has_nav_menu( 'toggles' ) ) { return; }

		$menu_args['theme_location']	= 'toggles';
		$menu_args['container'] 		= false;
		$menu_args['depth']           	= 1;
		$menu_args['menu_class']      	= 'toggles-menu-items toggles-menu-items-0';
		$menu_args['menu_id'] 			= 'nav-toggles';
		$menu_args['walker']  			= new iGrow_Macon_Menu_Walker();

		wp_nav_menu( $menu_args );
		
	} // menu_toggles()
	
	/**
	 * Adds the posted_on post meta.
	 *
	 * @exits 		Not on post type page.
	 * @exits 		Not on search page.
	 * @hooked 		entry_header_content
	 * @return 		mixed 			The posted_on post meta.
	 */
	public function posted_on() {

		if ( 'post' != get_post_type() ) { return; }
		if ( ! is_search() ) { return; }

		?><div class="entry-meta"><?php

			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date() )
			);

			$posted_on = sprintf(
				esc_html_x( 'Posted on %s', 'post date', 'igrow-macon' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);

			$byline = sprintf(
				esc_html_x( 'by %s', 'post author', 'igrow-macon' ),
				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);

			?><span class="posted-on"><?php echo $posted_on; ?></span><span class="byline"> <?php echo $byline; ?></span>
		</div><!-- .entry-meta --><?php

	} // posted_on()

	/**
	 * Adds the post navigation to the archive pages
	 *
	 * @exits 		Not on posts home.
	 * @exits 		Not on archive page.
	 * @hooked 		igrowmacon_while_after
	 * @return 		mixed 							The posts navigation
	 */
	public function posts_nav() {

		if ( ! is_home() || ! is_archive() ) { return; }

		the_posts_navigation();

	} // posts_nav()

	/**
	 * Returns the sidebar markup.
	 *
	 * @exits 		If its not the sidebar-content template.
	 * @hooked 		igrowmacon_main_before 		10
	 * @return 		mixed 					The sidebar markup.
	 */
	public function sidebar_content() {

		if ( ! is_page() ) { return; }
		if ( ! is_page_template( 'templates/page_sidebar-content.php' ) ) { return; }

		get_sidebar();

	} // sidebar_content()

	/**
	 * Adds the starting site branding markup
	 *
	 * @hooked 		igrowmacon_header_top				15
	 * @return 		mixed 						HTML markup
	 */
	public function site_branding_begin() {

		?><div class="site-branding"><?php

	} // site_branding_begin()

	/**
	 * Adds the starting site branding markup
	 *
	 * @hooked 		igrowmacon_header_bottom			85
	 * @return 		mixed 						HTML markup
	 */
	public function site_branding_end() {

		?></div><!-- .site-branding --><?php

	} // site_branding_end()

	/**
	 * Adds the site description markup
	 *
	 * @hooked 		igrowmacon_header_content 		15
	 * @return 		mixed 								The site description markup
	 */
	public function site_description() {

		$description = get_bloginfo( 'description', 'display' );

		if ( $description || is_customize_preview() ) {

			?><p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p><?php

		}

	} // site_description()

	/**
	 * Adds the a11y skip link markup
	 *
	 * @hooked 		igrowmacon_body_top 		20
	 * @return 		mixed 				Skip link markup
	 */
	public function skip_link() {

		?><a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'igrow-macon' ); ?></a><?php

	} // skip_link()
	
	/**
	 * Displays a Soliloquy slider, if one is chosen in the Header metabox.
	 * @return 		mixed 		The slider markup.
	 */
	public function sliders() {
		
		$meta = get_post_custom();
		
		if ( ! isset( $meta['select-slider'][0] ) || empty( $meta['select-slider'][0] ) ) { return; }
		if ( ! function_exists( 'soliloquy' ) ) { return; }
		
		soliloquy( $meta['select-slider'][0] );
		
	} // sliders()
		
	/**
	 * Adds the stripes bar for mobile.
	 * @return 		mixed 		The stripes bar markup.
	 */
	public function stripes_bar() {
		
		?><div class="stripes-bar">
			<div class="stripes-inner"></div>
		</div><?php
		
	} // stripes_bar()

	/**
	 * Returns the page title
	 *
	 * @exits 		If its not the 404 page.
	 * @hooked 		igrowmacon_404_header 		10
	 * @return 		mixed 					The 404 page title
	 */
	public function title_404() {

		if ( ! is_404() ) { return; }

		?><h1 class="page-title"><?php

			esc_html_e( 'Oops! That page can&rsquo;t be found.', 'igrow-macon' );

		?></h1><?php

	} // title_404()

	/**
	 * Adds the page title to an archive page
	 *
	 * @exits 		Not on archive page.
	 * @hooked 		igrowmacon_while_before
	 * @return 		mixed 							The archive page title
	 */
	public function title_archive() {

		if ( ! is_archive() ) { return; }

		?><header class="page-header"><?php

			the_archive_title( '<h1 class="page-title cat-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );

		?></header><!-- .page-header --><?php

	} // title_archive()

	/**
	 * Returns the entry title
	 *
	 * @exits 		On static front page.
	 * @exits 		On a static page.
	 * @hooked 		entry_header_content 			10
	 * @return 		mixed 							The entry title
	 */
	public function title_entry() {

		if ( is_front_page() && ! is_home() ) { return; }
		if ( is_page() ) { return; }

		if ( is_single() ) {

			the_title( '<h1 class="entry-title">', '</h1>' );

		} else {

			the_title( sprintf( '<h2 class="entry-title"><a class="entry-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

		}

	} // title_entry()
	
	public function title_news_page() {
		
		if ( ! is_home() ) { return; }
		
		$posts_page = get_option( 'page_for_posts' );
		$title 		= get_the_title( $posts_page );
		
		?><h1 class="page-title"><?php echo esc_html( $title ); ?></h1><?php
		
	} // title_news_page()

	/**
	 * Returns the page title
	 *
	 * @exits 		On the front page.
	 * @exits 		On posts home.
	 * @exits 		Not on a page.
	 * @hooked 		igrowmacon_while_before 		10
	 * @return 		mixed 							The entry title
	 */
	public function title_page() {

		if ( ! is_page() ) { return; }

		the_title( '<h1 class="page-title">', '</h1>' );

	} // title_page()

	/**
	 * The search title markup
	 *
	 * @exits 		Not on a search page.
	 * @hooked 		igrowmacon_while_before
	 * @return 		mixed 							Search title markup
	 */
	public function title_search() {

		if ( ! is_search() ) { return; }

		?><header class="page-header">
			<h1 class="page-title"><?php

				printf( esc_html__( 'Search Results for: %s', 'igrow-macon' ), '<span>' . get_search_query() . '</span>' );

			?></h1>
		</header><!-- .page-header --><?php

	} // title_search()

	/**
	 * Adds the single post title to the index
	 *
	 * @exits 		On static front page
	 * @hooked 		igrowmacon_while_before
	 * @return 		mixed 							The single post title
	 */
	public function title_single_post() {

		if ( ! is_home() && is_front_page() ) { return; }
		if ( ! is_archive() ) { return; }

		?><header>
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		</header><?php

	} // title_single_post()

	/**
	 * Adds the site title markup
	 *
	 * @exits 		get_custom_logo doesn't exist
	 * @exits 		get_custom_logo is empty
	 * @hooked 		igrowmacon_header_content 		10
	 * @return 		mixed 								The site title markup
	 */
	public function title_site() {

		if ( ! function_exists( 'get_custom_logo' ) ) { return; }

		$logo = get_custom_logo();

		if ( is_front_page() || is_home() && ! empty( $logo ) ) {

			?><h1 class="site-title"><?php echo $logo; ?></h1><?php

		} elseif ( ! is_front_page() && ! is_home() && ! empty( $logo ) ) {

			?><p class="site-title"><?php echo $logo; ?></p><?php

		} elseif ( is_front_page() || is_home() ) {

			?><h1 class="site-title">
				<a class="site-title-link" href="<?php

					echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' );

				?></a>
			</h1><?php

		} else {

			?><p class="site-title">
				<a class="site-title-link" href="<?php

					echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' );

				?></a>
			</p><?php

		}

	} // title_site()

} // class
