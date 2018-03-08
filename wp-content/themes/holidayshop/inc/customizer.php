<?php
/**
 * holidayshop Theme Customizer
 *
 * @package holidayshop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function holidayshop_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}

add_action( 'customize_register', 'holidayshop_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function holidayshop_customize_preview_js() {
	wp_enqueue_script( 'holidayshop_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'holidayshop_customize_preview_js' );

$custom_header = array(
	'default-image'          => '',
	'width'                  => 1000,
	'height'                 => 500,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $custom_header );

function holidayshop_register_theme_customizer( $wp_customize ) {

	$wp_customize->add_section( 'my_social_settings', array(
		'title'       => __( 'Social Media Icons', 'holidayshop' ),
		'priority'    => 1,
		'description' => __( 'This is the Social Media Section.Add URL to display Social Icons in footer.', 'holidayshop' )
	) );

	$wp_customize->add_setting( 'Facebook', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'Facebook', array(
		'label'    => __( "Facebook url:", 'holidayshop' ),
		'section'  => 'my_social_settings',
		'type'     => 'url',
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'Google_plus', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'Google_plus', array(
		'label'    => __( "Google plus url:", 'holidayshop' ),
		'section'  => 'my_social_settings',
		'type'     => 'url',
		'priority' => 2,
	) );
	$wp_customize->add_setting( 'Linkedin', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'Linkedin', array(
		'label'    => __( "Linkedin url:", 'holidayshop' ),
		'section'  => 'my_social_settings',
		'type'     => 'url',
		'priority' => 3,
	) );
	$wp_customize->add_setting( 'Twitter', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'Twitter', array(
		'label'    => __( "Twitter url:", 'holidayshop' ),
		'section'  => 'my_social_settings',
		'type'     => 'url',
		'priority' => 4,
	) );

	$wp_customize->add_setting( 'Insta', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'Insta', array(
		'label'    => __( "Instagram url:", 'holidayshop' ),
		'section'  => 'my_social_settings',
		'type'     => 'url',
		'priority' => 4,
	) );

	$wp_customize->add_setting( 'pinterest', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( 'pinterest', array(
		'label'    => __( "Pinterest url:", 'holidayshop' ),
		'section'  => 'my_social_settings',
		'type'     => 'url',
		'priority' => 4,
	) );

	$wp_customize->add_section( 'footer_settings_section', array(
		'title' =>  __( 'Footer Text Section', 'holidayshop' ),
	) );

	$wp_customize->add_setting( 'text_setting', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'balanceTags'
	) );

	$wp_customize->add_control( 'text_setting', array(
		'label'   => __( 'Footer Text Here', 'holidayshop' ),
		'section' => 'footer_settings_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'default_banner', array(
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url'
	) );

	$wp_customize->add_section( 'defaultbanner', array(
		'title'    => __( 'Default Banner Image', 'holidayshop' ),
		'priority' => 70,
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customizer_setting_two_control', array(
		'label'    => __( 'Default Banner Image', 'holidayshop' ),
		'section'  => 'defaultbanner',
		'settings' => 'default_banner',
	) ) );
        

}

add_action( 'customize_register', 'holidayshop_register_theme_customizer' );
