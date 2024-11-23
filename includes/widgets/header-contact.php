<?php
namespace Landsdowne_Addon;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Landsdowne_Header_Contact extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Header Contact';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Header Contact', 'landsdowne-addon' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-code';
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic', 'landsdowne' ];
	}

	// Load CSS
	// public function get_style_depends() {

	// 	wp_register_style( 'guide-posts', plugins_url( '../assets/css/guide-posts.css', __FILE__ ));

	// 	return [
	// 		'guide-posts',
	// 	];

	// }

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	// public function get_keywords() {
	// 	return [ 'oembed', 'url', 'link' ];
	// }

	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'landsdowne-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Phone
		$this->add_control(
			'header_phone_icon',
			[
				'label' => esc_html__( 'Choose Phone Icon', 'landsdowne-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'header_phone_number',
			[
				'label' => esc_html__( 'Phone Number', 'landsdowne-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type here', 'landsdowne-addon' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'header_phone_url',
			[
				'label' => esc_html__( 'Phone URL', 'landsdowne-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
				'label_block' => true,
			]
		);

		// Email
		$this->add_control(
			'header_email_icon',
			[
				'label' => esc_html__( 'Choose Email Icon', 'landsdowne-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'header_email_address',
			[
				'label' => esc_html__( 'Email Address', 'landsdowne-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type here', 'landsdowne-addon' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'header_email_url',
			[
				'label' => esc_html__( 'Email URL', 'landsdowne-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();


	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$header_phone =  $settings['header_phone_number'];
		$header_email =  $settings['header_email_address'];
	?>

	<div class="header-contact">
		<?php if(!empty($header_phone)) : ?>
		<a href="<?php echo $settings['header_phone_url']['url']; ?>">
			<img src="<?php echo $settings['header_phone_icon']['url']; ?>" alt="<?php echo esc_html__( 'Phone Number', 'landsdowne-addon' ) ?>">
			<?php echo $header_phone; ?>
		</a>
		<?php endif; ?>

		<?php if(!empty($header_email)) : ?>
		<a href="<?php echo $settings['header_email_url']['url']; ?>">
			<img src="<?php echo $settings['header_email_icon']['url']; ?>" alt="<?php echo esc_html__( 'Email Address', 'landsdowne-addon' ) ?>">
			<?php echo $header_email; ?>
		</a>
		<?php endif; ?>
	</div>

	

	<?php

	}

}