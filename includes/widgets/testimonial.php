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
class Testimonials extends \Elementor\Widget_Base {

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
		return 'Testimonial';
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
		return esc_html__( 'Testimonial', 'landsdowne-addon' );
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

		
		

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'author_image',
			[
				'label' => esc_html__( 'Author Image', 'landsdowne-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'stars_icon',
			[
				'label' => esc_html__( 'Stars Icon', 'landsdowne-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'testimonial_text',
			[
				'label' => esc_html__( 'Testimonial Title', 'go-legal-ai-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Type your text here', 'go-legal-ai-addon' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'author_name',
			[
				'label' => esc_html__( 'Author Name', 'go-legal-ai-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your text here', 'go-legal-ai-addon' ),
				'label_block' => true,
			]
		);
		
		

		$this->add_control(
			'testimonial_list',
			[
				'label' => esc_html__( 'Header Social Icons List', 'landsdowne-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Image #1', 'landsdowne-addon' ),
					],
					[
						'list_title' => esc_html__( 'Image #2', 'landsdowne-addon' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
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
	?>

	<div class="testimonial-area">
        <div class="swiper Testimonial">
            <div class="swiper-wrapper testimonial-wrap">
                <?php foreach ($settings['testimonial_list'] as $list_item) : ?>
					<div class="single-testimonial swiper-slide" >
                        <div class="author-section">
							<img src="<?php echo $list_item['author_image']['url']; ?>" alt="">
						</div>
						<div class="testimonial-content">
							<img src="<?php echo $list_item['stars_icon']['url']; ?>" alt="">
							<p><?php echo $list_item['testimonial_text']; ?></p>
							<h3 class="author-name"><?php echo $list_item['author_name']; ?></h3>
						</div>
					</div>
				<?php endforeach; ?>
            </div>
        </div>
		<div class="swiper-slide-nav">
			<div class="swiper-button-next">
			</div>
			<div class="swiper-button-prev">
			</div>
		</div>
    </div>

	

	<?php

	}

}