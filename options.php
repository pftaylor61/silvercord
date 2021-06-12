<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace( "/\W/", "_", strtolower( $themename ) );
	return $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'mercury'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// If using image radio buttons, define a directory path
	$imagepath =  trailingslashit( get_template_directory_uri() ) . 'images/';

	// Background Defaults
	$background_defaults = array(
		'color' => '#333333',
		'image' => $imagepath . 'dark-noise.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' );
        
        $header_bg_defaults = array(
		'color' => '#dddddd',
		'image' => $imagepath . 'ltbg.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' );

	// Editor settings
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	// Footer Position settings
	$footer_position_settings = array(
		'left' => esc_html__( 'Left aligned', 'mercury' ),
		'center' => esc_html__( 'Center aligned', 'mercury' ),
		'right' => esc_html__( 'Right aligned', 'mercury' )
	);

	// Number of shop products
	$shop_products_settings = array(
		'4' => esc_html__( '4 Products', 'mercury' ),
		'8' => esc_html__( '8 Products', 'mercury' ),
		'12' => esc_html__( '12 Products', 'mercury' ),
		'16' => esc_html__( '16 Products', 'mercury' ),
		'20' => esc_html__( '20 Products', 'mercury' ),
		'24' => esc_html__( '24 Products', 'mercury' ),
		'28' => esc_html__( '28 Products', 'mercury' )
	);

	$options = array();

	$options[] = array(
		'name' => esc_html__( 'Basic Settings', 'mercury' ),
		'type' => 'heading' );

	$options[] = array(
		'name' => esc_html__( 'Background', 'mercury' ),
		'desc' => sprintf( wp_kses( __( 'If you&rsquo;d like to replace or remove the default background image, use the <a href="%1$s" title="Custom background">Appearance &gt; Background</a> menu option.', 'mercury' ), array( 
			'a' => array( 
				'href' => array(),
				'title' => array() )
			) ), admin_url( 'themes.php?page=custom-background' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Logo', 'mercury' ),
		'desc' => sprintf( wp_kses( __( 'If you&rsquo;d like to replace or remove the default logo, use the <a href="%1$s" title="Custom header">Appearance &gt; Header</a> menu option.', 'mercury' ), array( 
			'a' => array( 
				'href' => array(),
				'title' => array() )
			) ), admin_url( 'themes.php?page=custom-header' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Social Media Settings', 'mercury' ),
		'desc' => esc_html__( 'Enter the URLs for your Social Media platforms. You can also optionally specify whether you want these links opened in a new browser tab/window.', 'mercury' ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__('Open links in new Window/Tab', 'mercury'),
		'desc' => esc_html__('Open the social media links in a new browser tab/window', 'mercury'),
		'id' => 'social_newtab',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => esc_html__( 'Twitter', 'mercury' ),
		'desc' => esc_html__( 'Enter your Twitter URL.', 'mercury' ),
		'id' => 'social_twitter',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Facebook', 'mercury' ),
		'desc' => esc_html__( 'Enter your Facebook URL.', 'mercury' ),
		'id' => 'social_facebook',
		'std' => '',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'MeWe', 'mercury' ),
		'desc' => esc_html__( 'Enter your MeWe URL.', 'mercury' ),
		'id' => 'social_mewe',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Google+', 'mercury' ),
		'desc' => esc_html__( 'Enter your Google+ URL.', 'mercury' ),
		'id' => 'social_googleplus',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'LinkedIn', 'mercury' ),
		'desc' => esc_html__( 'Enter your LinkedIn URL.', 'mercury' ),
		'id' => 'social_linkedin',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'SlideShare', 'mercury' ),
		'desc' => esc_html__( 'Enter your SlideShare URL.', 'mercury' ),
		'id' => 'social_slideshare',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Dribbble', 'mercury' ),
		'desc' => esc_html__( 'Enter your Dribbble URL.', 'mercury' ),
		'id' => 'social_dribbble',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Tumblr', 'mercury' ),
		'desc' => esc_html__( 'Enter your Tumblr URL.', 'mercury' ),
		'id' => 'social_tumblr',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'GitHub', 'mercury' ),
		'desc' => esc_html__( 'Enter your GitHub URL.', 'mercury' ),
		'id' => 'social_github',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Bitbucket', 'mercury' ),
		'desc' => esc_html__( 'Enter your Bitbucket URL.', 'mercury' ),
		'id' => 'social_bitbucket',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Foursquare', 'mercury' ),
		'desc' => esc_html__( 'Enter your Foursquare URL.', 'mercury' ),
		'id' => 'social_foursquare',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'YouTube', 'mercury' ),
		'desc' => esc_html__( 'Enter your YouTube URL.', 'mercury' ),
		'id' => 'social_youtube',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Instagram', 'mercury' ),
		'desc' => esc_html__( 'Enter your Instagram URL.', 'mercury' ),
		'id' => 'social_instagram',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Flickr', 'mercury' ),
		'desc' => esc_html__( 'Enter your Flickr URL.', 'mercury' ),
		'id' => 'social_flickr',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Pinterest', 'mercury' ),
		'desc' => esc_html__( 'Enter your Pinterest URL.', 'mercury' ),
		'id' => 'social_pinterest',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'RSS', 'mercury' ),
		'desc' => esc_html__( 'Enter your RSS Feed URL.', 'mercury' ),
		'id' => 'social_rss',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Advanced settings', 'mercury' ),
		'type' => 'heading' );
        
        $options[] = array(
		'name' =>  esc_html__( 'Header Background', 'mercury' ),
		'desc' => esc_html__( 'Select an image and background color for the homepage header.', 'mercury' ),
		'id' => 'header_background',
		'std' => $header_bg_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' =>  esc_html__( 'Banner Background', 'mercury' ),
		'desc' => esc_html__( 'Select an image and background color for the homepage banner.', 'mercury' ),
		'id' => 'banner_background',
		'std' => $background_defaults,
		'type' => 'background' );
        
        $options[] = array(
		'name' => esc_html__( 'Footer Background Color', 'mercury' ),
		'desc' => esc_html__( 'Select the background color for the footer.', 'mercury' ),
		'id' => 'footer_color',
		'std' => '#222222',
		'type' => 'color' );

	$options[] = array(
		'name' => esc_html__( 'Footer Content', 'mercury' ),
		'desc' => esc_html__( 'Enter the text you&lsquo;d like to display in the footer. This content will be displayed just below the footer widgets. It&lsquo;s ideal for displaying your copyright message or credits.', 'mercury' ),
		'id' => 'footer_content',
		'std' => mercury_get_credits(),
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => esc_html__( 'Footer Content Position', 'mercury' ),
		'desc' => esc_html__( 'Select what position you would like the footer content aligned to.', 'mercury' ),
		'id' => 'footer_position',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini',
		'options' => $footer_position_settings );

	if( mercury_is_woocommerce_active() ) {
		$options[] = array(
		'name' => esc_html__( 'WooCommerce settings', 'mercury' ),
		'type' => 'heading' );

		$options[] = array(
			'name' => esc_html__('Shop sidebar', 'mercury'),
			'desc' => esc_html__('Display the sidebar on the WooCommerce Shop page', 'mercury'),
			'id' => 'woocommerce_shopsidebar',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__('Products sidebar', 'mercury'),
			'desc' => esc_html__('Display the sidebar on the WooCommerce Single Product page', 'mercury'),
			'id' => 'woocommerce_productsidebar',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__( 'Cart, Checkout & My Account sidebars', 'mercury' ),
			'desc' => esc_html__( 'The &lsquo;Cart&rsquo;, &lsquo;Checkout&rsquo; and &lsquo;My Account&rsquo; pages are displayed using shortcodes. To remove the sidebar from these Pages, simply edit each Page and change the Template (in the Page Attributes Panel) to the &lsquo;Full-width Page Template&rsquo;.', 'mercury' ),
			'type' => 'info' );

		$options[] = array(
			'name' => esc_html__('Shop Breadcrumbs', 'mercury'),
			'desc' => esc_html__('Display the breadcrumbs on the WooCommerce pages', 'mercury'),
			'id' => 'woocommerce_breadcrumbs',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__( 'Shop Products', 'mercury' ),
			'desc' => esc_html__( 'Select the number of products to display on the shop page.', 'mercury' ),
			'id' => 'shop_products',
			'std' => '12',
			'type' => 'select',
			'class' => 'mini',
			'options' => $shop_products_settings );

	}

	return $options;
}

add_action( 'optionsframework_after','mercury_options_display_sidebar' );

/**
 * dewi admin sidebar
 */
function mercury_options_display_sidebar() { 
        // replaceable variables
        $ocws_theme_screenshot_thumb = "mercury400.png";
        $ocws_theme = wp_get_theme();
        $ocws_theme_op_text = $ocws_theme->get('Description')."<br /><br />Version #".$ocws_theme->get('Version');
        
        
	 ?>
        <div id="optionsframework-sidebar">
		<div class="metabox-holder">
	    	<div class="ocws_postbox">
	    		<h3><?php esc_attr_e( 'About '.$ocws_theme->get('Name'), 'mercury' ); ?></h3>
                        <img src="<?php echo get_template_directory_uri().'/assets/'.$ocws_theme_screenshot_thumb; ?>" style="margin-right:auto; margin-left:auto; width:300px;" />
      			<div class="ocws_inside_box"> 
                            <?php echo $ocws_theme_op_text; ?>
	      			
      			</div><!-- ocws_inside_box -->
	    	</div><!-- .ocws_postbox -->
	  	</div><!-- .metabox-holder -->
	</div><!-- #optionsframework-sidebar -->
        
        
<?php
}
?>
