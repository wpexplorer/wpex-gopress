<?php
/**
 * General theme options
 *
 * @package WordPress
 * @subpackage GoPress WPExplorer Theme
 * @since GoPress 1.0
 */

function wpex_customizer_general( $wp_customize ) {

	if ( ! $wp_customize ) {
		return;
	}

	// Add textarea
	class WPEX_Customize_Textarea_Control extends WP_Customize_Control {
		
		//Type of customize control being rendered.
		public $type = 'textarea';

		//Displays the textarea on the customize screen.
		public function render_content() { ?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
			</label>
		<?php
		}
	}

	// Category Select
	class Category_Dropdown_Custom_Control extends WP_Customize_Control {
		public function render_content() {
		$dropdown = wp_dropdown_categories(
			array(
				'name'				=> '_customize-dropdown-cats-' . $this->id,
				'echo'				=> 0,
				'show_option_none'	=> esc_html__( '&mdash; Select &mdash;', 'wpex-gopress' ),
				'selected'			=> $this->value(),
				'class'				=> 'customize-dropdown-cats',
			)
			);
			// hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
			printf(
				'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			);
		}
	}


	// Theme Settings Section
	$wp_customize->add_section( 'wpex_general' , array(
		'title'		=> esc_html__( 'Theme Settings', 'wpex-gopress' ),
		'priority'	=> 240,
	) );

	// Logo Image
	$wp_customize->add_setting( 'wpex_logo', array(
		'type'	            => 'theme_mod',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpex_logo', array(
		'label'		=> esc_html__( 'Image Logo', 'wpex-gopress' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_logo',
	) ) );

	// Header description
	$wp_customize->add_setting( 'wpex_header_description', array(
		'type'		        => 'theme_mod',
		'default'	        => true,
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_control( 'wpex_header_description', array(
		'label'		=> esc_html__( 'Display Header Description', 'wpex-gopress' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_header_description',
		'type'		=> 'checkbox',
	) );
	
	// Homepage Slider
	$wp_customize->add_setting( 'wpex_homepage_slider_cat', array(
		'type'	            => 'theme_mod',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_control( new Category_Dropdown_Custom_Control( $wp_customize, 'wpex_homepage_slider_cat', array(
		'label'		=> esc_html__( 'Homepage Slider Featured Category', 'wpex-gopress' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_homepage_slider_cat',
	) ) );

	// How Slider Count
	$wp_customize->add_setting( 'wpex_homepage_slider_count', array(
		'type'		        => 'theme_mod',
		'default'	        => '4',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'wpex_homepage_slider_count', array(
		'label'		=> esc_html__( 'Homepage Slider Count', 'wpex-gopress' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_homepage_slider_count',
		'type'		=> 'text',
	) );

	// Enable/Disable Readmore
	$wp_customize->add_setting( 'wpex_blog_readmore', array(
		'type'		        => 'theme_mod',
		'default'	        => '',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_control( 'wpex_blog_readmore', array(
		'label'		=> esc_html__( 'Read More Link', 'wpex-gopress' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_readmore',
		'type'		=> 'checkbox',
	) );

	// Enable/Disable Featured Images on Posts
	$wp_customize->add_setting( 'wpex_blog_post_thumb', array(
		'type'		        => 'theme_mod',
		'default'	        => '1',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_control( 'wpex_blog_post_thumb', array(
		'label'		=> esc_html__( 'Featured Image on Posts', 'wpex-gopress' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_blog_post_thumb',
		'type'		=> 'checkbox',
	) );

	// Banner
	$wp_customize->add_setting( 'wpex_header_aside', array(
		'type'		=> 'theme_mod',
		'default'	=> '<a href="http://www.wpexplorer.com/out/authentic-themes/" target="_blank" rel="nofollow"><img src="'. get_template_directory_uri() .'/images/banner.png" alt="Banner" /></a>',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new WPEX_Customize_Textarea_Control( $wp_customize, 'wpex_header_aside', array(
		'label'		=> esc_html__( 'Header Aside Content', 'wpex-gopress' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_header_aside',
		'type'		=> 'textarea',
	) ) );

	// Copyright
	$wp_customize->add_setting( 'wpex_copyright', array(
		'type'		=> 'theme_mod',
		'default'	=> 'Powered by <a href=\"http://www.wordpress.org\" title="WordPress" target="_blank">WordPress</a> and <a href=\"http://themeforest.net/user/WPExplorer?ref=WPExplorer" target="_blank" title="WPExplorer" rel="nofollow">WPExplorer Themes</a>',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new WPEX_Customize_Textarea_Control( $wp_customize, 'wpex_copyright', array(
		'label'		=> esc_html__( 'Custom Copyright', 'wpex-gopress' ),
		'section'	=> 'wpex_general',
		'settings'	=> 'wpex_copyright',
		'type'		=> 'textarea',
	) ) );
		
}
add_action( 'customize_register', 'wpex_customizer_general' );