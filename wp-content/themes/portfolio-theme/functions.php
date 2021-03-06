<?php 
//turn on some sleeping features
add_theme_support('post-thumbnails');

//make forms follow new HTML5 guidelines
add_theme_support('html5', array('search-form', 'comment-list', 'comment-form',
								  'gallery', 'caption') );
//adds <link> elements on all archives for RSS feeds
add_theme_support('automatic-feed-links' );

add_theme_support('custom-background', array(
	'default-color' => '#ffffff',
	));

add_theme_support('post-formats', array('gallery', 'quote', 'audio', 'video', 'image') );


//CUSTOM HEADER
add_theme_support('custom-header', array(
	'default-image'          => get_template_directory_uri() . '/images/header_img3.jpg',
	'width'					 => 1300,
	'height'                 => 450,
	'uploads'                => true,
	)	 );

add_image_size( 'logo-size', 220, 180 ); // 220 pixels wide by 180 pixels tall, soft proportional crop mode
//make additional image sizes
add_image_size( 'big-banner', '1300', '300', true );
//adds ability to have editor-style.css for the edit content area (in the edit post panel)
add_editor_style();

/**
 *  Make Excerpts Better
 *	@since 0.1
 */
//you can name the function whatever you want but make sure its original ((so you can use initals, name of theme, whateva))
function vs_ex_length(){
	if(is_search()){ //for the search results
		return 15; //words
	}else{
	return 55; //this returns 85 words. default is 55
	}
}
add_filter('excerpt_length', 'vs_ex_length' );

//change the [...]
function vs_readmore(){
	return ' <a href="' . get_permalink() . '" class="readmore">Keep Reading &hellip;</a>';
	//you can also go $link = get_permalink();
	//					return "<a href='$link' class='readmore'> Keep Reading &hellip; </a>";
}
add_filter('excerpt_more', 'vs_readmore');




/**
 *  Activate Menu Areas
 * @since 0.1
 */
function vs_menu_areas(){
	register_nav_menus( array( 
		'main_menu' => 'Main Menu at the top of every page',
		'social_media' => 'Social Media Bar',
		) );
}
add_action('init', 'vs_menu_areas' ); //without this line, our custom function doesnt do anything. init stands for initialize.
/**
 *  Activate Footer Menu Areas
 * @since 0.1
 */
function vs_footer_menu_areas(){
	register_nav_menus( array( 
		'footer_menu' => 'Footer Menu at the bottom of every page',
		'social_media' => 'Social Media Bar',
		) );
}
add_action('init', 'vs_footer_menu_areas' ); //without this line, our custom function doesnt do anything. init stands for initialize.



/**
 * Add Widget Areas (dynamic sidebars)
 * @since 0.1
 */
function vs_widget_areas(){
		register_sidebar ( array(
			'name'          => 'Blog Sidebar',
			'id'            => 'blog-sidebar',
			'description'   => 'This sidebar will appear next to your blog',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) );
}
add_action('widgets_init', 'vs_widget_areas' );

//more widget sidebars to add

register_sidebar ( array(
			'name'          => 'Home Widgets',
			'id'            => 'home-widgets',
			'description'   => 'These widgets will appear on the front page',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) );
register_sidebar ( array(
			'name'          => 'Page Sidebar',
			'id'            => 'page-sidebar',
			'description'   => 'These widgets will appear next to most pages',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) );
register_sidebar ( array(
			'name'          => 'Footer Widgets',
			'id'            => 'footer-widgets',
			'description'   => 'These widgets will appear at the bottom of everything on every page',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		) );


//my custom functions for SLIDER, DEMO REEL, LATEST WORK
//

/**
 * Register a Custom Post Type (Slide) 
 * Since ver. 1.0
 */
add_action('init', 'slide_init');
function slide_init() {
	$args = array(
		'labels' => array(
			'name' => 'Project Pictures Slide Show', 
			'singular_name' => 'Slide', 
			'add_new' => 'Add New Slide', 
			'add_new_item' => 'Add New Slide',
			'edit_item' => 'Edit Slide',
			'new_item' => 'New Slide',
			'view_item' => 'View Slide',
			'search_items' => 'Search Slides',
			'not_found' => 'No slides found',
			'not_found_in_trash' => 'No slides found in Trash', 
			'parent_item_colon' => '',
			'menu_name' => 'Project Pictures'
		),
		'public' => true,
		'exclude_from_search' => true,
		'show_in_menu' => true, 
		'rewrite' => true,
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => 7,
		'menu_icon'		=> 'dashicons-format-gallery',
		'supports' => array('title', 'editor', 'thumbnail')
	); 
	register_post_type('slide', $args);
}

/**
 * Put  little help box at the top of the editor 
 * Since ver 1.0
 */
add_action('contextual_help', 'slide_help_text', 10, 3);
function slide_help_text($contextual_help, $screen_id, $screen) {
	if ('slide' == $screen->id) {
		$contextual_help ='<p>Things to remember when adding a slide:</p>
		<ul>
			<li>Attach a Featured Image to give the slide its background</li>
			<li>Make sure the photo is at least 300 pixels tall! Or it will expand to fit and parts of the image will get cut off</li>
			<li>The best dimensions are 1000px width and 350px height</li>
			<li>Don\'t put the picture in the text box, put it in the FEATURED IMAGE section(usually is on the right underneath Publish)</li>
		</ul>';
	}
	elseif ('edit-slide' == $screen->id) {
		$contextual_help = '<p>A list of all slides appears below. To edit a slide, click on the slide\'s title</p>';
	}
	return $contextual_help;
}

/**
 * This prevents 404 errors when viewing our custom post archives
 * always do this whenever introducing a new post type or taxonomy
 * 
 */
function vs_slider_rewrite_flush(){
	slide_init();
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'vs_slider_rewrite_flush');

/**
* Add the image size for the slider 
* Since ver 1.0
*/
function vs_slider_image(){
	add_image_size( 'slider-size', 960, 250, true );	
}
add_action('init', 'vs_slider_image');

add_action('init', 'slide_init' );
	function vs_slider(){
	//additional query to get up to 5 slides
	$slide_query = new WP_Query( array(
		'post_type' => 'slide', //this is the post type we registered above
		'posts_per_page' => 5,
		'nopaging' => true, //prevents clashing with paginated archives
	 ));
	//CUSTOM LOOP
	if( $slide_query->have_posts() ): 
?> 
	<section id="slider">
		<ul class="slides">
			<?php while( $slide_query->have_posts() ):
			$slide_query->the_post(); ?>
			<li>
				<?php the_post_thumbnail('slider-size'); ?>
			</li>
			<?php endwhile; ?>
		</ul>
	</section>

<?php 
	endif;
	wp_reset_postdata();//so it doesnt clash with other loops

	}//end vs_slider

/**
 * Attach JS files
 */
add_action('wp_enqueue_scripts', 'vs_slider_scripts' );
function vs_slider_scripts(){
	//attach jquery (already included in wordpress core)
	wp_enqueue_script('jquery');

	//attach responsiveslides	
	$rs_path = get_template_directory_uri() . '/js/responsiveslides.js';
	wp_enqueue_script('responsiveslides', $rs_path, 'jquery' );
					/*	handle,				path,	dependencies*/
					
	//attach custom.js
	$custom_path = get_template_directory_uri() . '/js/custom.js';
	wp_enqueue_script('vs-custom', $custom_path, 'responsiveslides', '1.0', true );
}

/**
 * Hamburger Menu
 */
wp_register_script( 'hamburgermenu', get_template_directory_uri().'/js/hamburgermenu.js', array('jquery'), '', true );

wp_enqueue_script( 'hamburgermenu' );

/**
 * Cool Title
 */
wp_register_script( 'cooltitle', get_template_directory_uri().'/js/cooltitle.js', array('jquery'), '', true );
wp_enqueue_script( 'cooltitle' );


// DISABLE THE COOL TITLE SCRIPT ON LOGIN PAGE
if( in_array( $_SERVER['PHP_SELF'], array( '/wp-login.php', '/wp-register.php' ) )):
	wp_deregister_script( 'cooltitle' );
endif;




// single post on 

function welcomepost(){

//custom query to get the sticky post only and if none, return nothing
	$sticky = get_option( 'sticky_posts' );
	$welcome_query = new WP_Query( array(
					  'post__in'  => $sticky,
					  'posts_per_page' => 1,
					  'ignore_sticky_posts' => 1,
	) );
	//custom loop
	if (isset($sticky[0])):

	 ?>
	<section class="welcome">
		<?php while ($welcome_query->have_posts()):
			$welcome_query->the_post(); 
			?>

			<h3><?php the_title(); ?></h3>
								
			<?php the_post_thumbnail('thumbnail'); ?>
			<?php the_content();?>
	
	<?php endwhile; ?>
	
	</section>
	<?php endif; 
	wp_reset_postdata(); //this prevents clashing with other loops 

}// end function welcomepost







//portfolio pieces CUSTOM FUNCTION

add_action('init','vs_portfolio_pieces' );
	function vs_portfolio_pieces(){
	register_post_type('portfolio', array(
			'public' 		=> true,
			'menu_icon' 	=> 'dashicons-format-gallery',
			'has_archive'	=> true,
			'menu_position' => 5,
			'supports'		=> array( 'title', 'editor', 'thumbnail', 
									  'excerpt', 'revisions' ),
			'labels'		 => array(
				'name' 			=> 'Portfolio',
				'singular_name' => 'Portfolio Piece',
				'add_new'		=> 'Add New Portfolio Piece',
				'edit_item' 	=> 'Edit Portfolio Piece',
				'view_item'		=> 'View Portfolio Piece',
				'new_item'		=> 'New Portfolio Piece',
				'search_items'	=> 'Search Portfolio Pieces',
				'not_found'		=> 'No Portfolio Pieces Found',),
	 	)/*end array*/ 
	 );//end register_post_type

	//Add the "typework" taxonomy to portfolio pieces
	register_taxonomy('typework', 'portfolio', array(
			'hierarchical' => true, //had parent/child relationships
			'labels' => array(
				'name' => 'Type of Work',
				'singular_name' => 'Type of Work',
				'add_new_item' => 'Add New Type of Work',
				'search_items' => 'Search Type of Work',
				'update_item' => 'Update Type of Work',
				'edit_item' => 'Edit Type of Work',
			),
		) );
}//end function vs_portfolio_pieces

//DISPLAY THE LATEST WORK function

function vs_recent_work( $number = 3 ){

//custom query to get most recent portfolio pieces
	$portfolio_work_query = new WP_Query( array(
					  'post_type' 	   => 'portfolio',
					  'posts_per_page' => $number,
	) );
	//custom loop
	if ($portfolio_work_query->have_posts()):

	 ?>
	<section class="latest-work">
			<h2 class="title"> Latest Work </h2>
		<ul>
		<?php while ($portfolio_work_query->have_posts()):
			$portfolio_work_query->the_post(); 
			?><a href="<?php the_permalink(); ?>">
			<li>	
				<div class="work-info">
				
						<h3><?php the_title(); ?></h3>
					

					<div class="short-excerpt">
				
					<?php the_post_thumbnail('medium'); ?>
						<?php the_excerpt();?>
						
					</div>
					
				</div>			</li></a>

	
		<?php endwhile; ?>
		</ul>

	</section>
	<?php endif; 
	wp_reset_postdata(); //this prevents clashing with other loops 

}// end function vs_recent_work

//limit content text on preveiw box
function custom_content_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_content_length', 999 );





//RESUME CUSTOM FUNCTION! 
// --download the google doc embedd plugin to get it to display AND have a download available
// NOTE: it will not show up if you are on localhost, but it will if it is a live website
add_action('init','vs_resume' );
function vs_resume(){
	register_post_type('resume', array(
			'public' 		=> true,
			'menu_icon' 	=> 'dashicons-id-alt',
			'has_archive'	=> true,
			'menu_position' => 6,
			'supports'		=> array( 'title', 'thumbnail', 'revisions', 'editor'),
			'labels'		 => array(
				'name' 			=> 'Resume',
				'singular_name' => 'Resume',
				'add_new'		=> 'Add New Resume',
				'add_new_item'	=> 'Add New Resume',
				'edit_item' 	=> 'Edit Resume',
				'view_item'		=> 'View Resume',
				'new_item'		=> 'New Resume',
				'search_items'	=> 'Search Resumes',
				'not_found'		=> 'No Resumes Found',),
	 	)/*end array*/ 
	 );//end register_post_type

}//end function vs_resume






/**
 * Customization API
 */
add_action( 'customize_register', 'vs_theme_customizer' );
//
function vs_theme_customizer( $wp_customize ) {
//Link color
	//create the setting and its defaults
	$wp_customize->add_setting(	'vs_link_color', array( 'default'     => '#6bcbca',	));
	//add the UI control. this is a color picker control. Attach it to the setting. 
	$wp_customize->add_control(	new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'      => 'Link Color',
		'section'    => 'colors', //this is one of the panels that is given to you. you can make your own, too. 
		'settings'   => 'vs_link_color', //the setting from above that this control controls!
		)
	));
//Text Color
	$wp_customize->add_setting(	'vs_text_color', array(
		'default'     => '#000',
	));
	//add the UI control. this is a color picker control. Attach it to the setting. 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
		'label'      => 'Body Text Color',
		'section'    => 'colors', //this is one of the panels that is given to you. you can make your own, too. 
		'settings'   => 'vs_text_color', //the setting from above that this control controls!
		)
	));

//nav background Color
	$wp_customize->add_setting(	'vs_nav_color', array(
		'default'     => '#1A1E24',
	));
	//add the UI control. this is a color picker control. Attach it to the setting. 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control( $wp_customize, 'nav_color', array(
		'label'      => 'Navigation Background Color',
		'section'    => 'colors', //this is one of the panels that is given to you. you can make your own, too. 
		'settings'   => 'vs_nav_color', //the setting from above that this control controls!
		)
	));
//nav text color
	$wp_customize->add_setting(	'vs_nav_text_color', array(
		'default'     => '#fff',
	));
	//add the UI control. this is a color picker control. Attach it to the setting. 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control( $wp_customize, 'nav_color', array(
		'label'      => 'Navigation Text Color',
		'section'    => 'colors', //this is one of the panels that is given to you. you can make your own, too. 
		'settings'   => 'vs_nav_text_color', //the setting from above that this control controls!
		)
	));

//nav text color
	$wp_customize->add_setting(	'vs_job_description', array(
			'default' => 'JOB DESCRIPTION',

	));
	//add the UI control. this is a color picker control. Attach it to the setting. 
	$wp_customize->add_control(	
		new WP_Customize_Control( $wp_customize, 'job_desc', array(
		'label'      => 'Job Description',
		'section'    => 'title_tagline', //this is one of the panels that is given to you. you can make your own, too. 
		'settings'   => 'vs_job_description', //the setting from above that this control controls!
		)
	));


//nav hover Color
	$wp_customize->add_setting(	'vs_nav_hover_color', array(
		'default'     => '#1A1E24',
	));
	//add the UI control. this is a color picker control. Attach it to the setting. 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control( $wp_customize, 'hover_color', array(
		'label'      => 'Navigation Hover Color',
		'section'    => 'colors', //this is one of the panels that is given to you. you can make your own, too. 
		'settings'   => 'vs_nav_hover_color', //the setting from above that this control controls!
		)
	));



}	
function vs_customizer_css() {
	?>
	<style type="text/css">
	a { color: <?php echo get_theme_mod( 'vs_link_color' ); ?>;  }
	body{color: <?php echo get_theme_mod( 'vs_text_color' ); ?>; }
	 header nav ul li:hover,
	 header nav ul li a:hover{background-color: <?php echo get_theme_mod('vs_nav_hover_color'); ?> !important}
	 nav ul.nav li a{color:<?php echo get_theme_mod('vs_nav_text_color'); ?> !important }
	@media only screen and (max-width: 959px){
	 nav ul.nav li, 
	 nav ul.nav{ background-color: <?php echo get_theme_mod( 'vs_nav_color' ); ?> !important; }

	}
	@media only screen and (min-width: 960px) {
		header div.title-wrap{ background-color: <?php echo get_theme_mod('vs_nav_color'); ?> !important}
		}

	</style>
	<?php
}
add_action( 'wp_head', 'vs_customizer_css' );


//CUSTOM ARCHIVE NAV MENUS
//

if( !function_exists('add_action') ) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1. 403 Forbidden');
	exit();
}

if( !class_exists('CustomPostTypeArchiveInNavMenu') ) {
	class CustomPostTypeArchiveInNavMenu {
		
		function CustomPostTypeArchiveInNavMenu() {
			load_plugin_textdomain( 'andromedamedia', false, basename( dirname( __FILE__ ) ) . '/languages' );
			add_action( 'admin_head-nav-menus.php', array( &$this, 'cpt_navmenu_metabox' ) );
			add_filter( 'wp_get_nav_menu_items', array( &$this,'cpt_archive_menu_filter'), 10, 3 );
		}
		
		function cpt_navmenu_metabox() {
	    	add_meta_box( 'add-cpt', __('Custom Post Type Archives', 'andromedamedia'), array( &$this, 'cpt_navmenu_metabox_content' ), 'nav-menus', 'side', 'default' );
	  	}
		
		function cpt_navmenu_metabox_content() {
	    	$post_types = get_post_types( array( 'show_in_nav_menus' => true, 'has_archive' => true ), 'object' );
			
			if( $post_types ) :
				foreach ( $post_types as &$post_type ) {
			        $post_type->classes = array();
			        $post_type->type = $post_type->name;
			        $post_type->object_id = $post_type->name;
			        $post_type->title = $post_type->labels->name . ' ' . __( 'Archive', 'andromedamedia' );
			        $post_type->object = 'cpt-archive';
			    }
				$walker = new Walker_Nav_Menu_Checklist( array() );
		
				echo '<div id="cpt-archive" class="posttypediv">';
				echo '<div id="tabs-panel-cpt-archive" class="tabs-panel tabs-panel-active">';
				echo '<ul id="ctp-archive-checklist" class="categorychecklist form-no-clear">';
				echo walk_nav_menu_tree( array_map('wp_setup_nav_menu_item', $post_types), 0, (object) array( 'walker' => $walker) );
				echo '</ul>';
				echo '</div><!-- /.tabs-panel -->';
				echo '</div>';
				echo '<p class="button-controls">';
				echo '<span class="add-to-menu">';
				echo '<img class="waiting" src="' . esc_url( admin_url( 'images/wpspin_light.gif' ) ) . '" alt="" />';
				echo '<input type="submit"' . disabled( $nav_menu_selected_id, 0 ) . ' class="button-secondary submit-add-to-menu" value="' . __('Add to Menu', 'andromedamedia') . '" name="add-ctp-archive-menu-item" id="submit-cpt-archive" />';
				echo '</span>';
				echo '</p>';
				
			endif;
		}
		
		function cpt_archive_menu_filter( $items, $menu, $args ) {
	    	foreach( $items as &$item ) {
	      		if( $item->object != 'cpt-archive' ) continue;
	      		$item->url = get_post_type_archive_link( $item->type );
	      
	      		if( get_query_var( 'post_type' ) == $item->type ) {
	       			$item->classes[] = 'current-menu-item';
	        		$item->current = true;
	      		}
	    	}
	    	
	    	return $items;
		}
	}

	/* Instantiate the plugin */
	$CustomPostTypeArchiveInNavMenu = new CustomPostTypeArchiveInNavMenu();
}





/**
 * Fix 404 errors when this plugin is activated
 * (when you add a plugin you need to flush
 * 	because if you dont you will get a 404)
 * 	@since  0.1
 */

function vs_rewrite_flush() {

     //fix the .htaccess file
     flush_rewrite_rules();
}	//end function of vs_recent_posts
register_activation_hook( __FILE__, 'vs_rewrite_flush' );

		









