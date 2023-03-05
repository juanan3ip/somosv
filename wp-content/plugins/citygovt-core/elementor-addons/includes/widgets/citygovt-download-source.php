<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Icons_Manager;

class Download_Resource extends Widget_Base {

	public function get_name() {
		return 'download_resource';
	}

	public function get_title() {
		return esc_html__( 'Download Resource', 'citygovt-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'city-govt' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general',
			array(
				'label' => esc_html__( 'general', 'citygovt-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Download Resources', 'citygovt-core' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'item', 'citygovt-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'icon',
			array(
				'label' => __( 'Icon', 'text-domain' ),
				'type'  => \Elementor\Controls_Manager::ICONS,
			)
		);

		$repeater->add_control(
			'item_pdf_title',
			array(
				'label'   => esc_html__( 'Pdf |title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Cultural Centers and Event schedule.pdf', 'citygovt-core' ),
			)
		);

		$repeater->add_control(
			'item_download_title',
			array(
				'label'   => esc_html__( 'Download Title', 'citygovt-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '12 mb [ Download ]', 'citygovt-core' ),
			)
		);
		$repeater->add_control(
			'download_link',
			array(
				'label'         => esc_html__( 'Download Link ', 'citygovt-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'citygovt-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),

			)
		);

		$this->add_control(
			'items',
			array(
				'label'   => esc_html__( 'Repeater List', 'citygovt-core' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__( 'Title #1', 'citygovt-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'citygovt-core' ),
					),
					array(
						'list_title'   => esc_html__( 'Title #2', 'citygovt-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'citygovt-core' ),
					),
				),
			)
		);

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$title    = $settings['title'];
		?>
		<div class="download-links">
			<h3><?php echo $title; ?></h3>
			<ul>
				<?php
				$count = 1;
				foreach ( $settings['items'] as $item ) {
					$item_pdf_title      = $item['item_pdf_title'];
					$item_download_title = $item['item_download_title'];
					$icon                = $item['icon'];
					$download_link       = $item['download_link'];
					$download_target     = $item['download_link']['is_external'] ? ' target="_blank"' : '';
					$download_nofollow   = $item['download_link']['nofollow'] ? ' rel="nofollow"' : '';
					?>
					<?php if ( $count == '1' ) { ?>
				<li><a class="clearfix" href="<?php echo esc_url( $download_link['url'] ); ?>"
						<?php echo $download_target . ' ' . $download_nofollow; ?>>
						<?php
						if ( ! empty( $icon ) ) {
							\Elementor\Icons_Manager::render_icon( $icon, array( 'aria-hidden' => 'true' ) );
						} else {
							?>
						<span
						class="icon fa fa-file-pdf"></span><?php } ?><span class="ttl"><?php echo $item_pdf_title; ?></span><span
							class="info"><?php echo $item_download_title; ?></span></a></li>
				<?php } else { ?>
				<li><a class="clearfix" href="<?php echo esc_url( $download_link['url'] ); ?>"
						<?php echo $download_target . ' ' . $download_nofollow; ?>>
						<?php
						if ( ! empty( $icon ) ) {
							\Elementor\Icons_Manager::render_icon( $icon, array( 'aria-hidden' => 'true' ) );
						} else {
							?>
						<span
							class="icon fa fa-file-excel"></span><?php } ?><span class="ttl"><?php echo $item_pdf_title; ?></span><span
							class="info"><?php echo $item_download_title; ?></span></a></li>
				<?php } $count++;} ?>
			</ul>
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new \Download_Resource() );
