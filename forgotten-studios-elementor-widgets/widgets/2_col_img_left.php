<?php

namespace Elementor;
class Fs_Elementor_2_Col_Img_Left_Widget extends Widget_Base {
    
    public function get_name() {
        return 'fs-two-column-image-left';
    }
    
    public function get_title() {
        return __( 'FS 2 Col Image Left', 'fs-elementor-widgets' );
    }
    
    public function get_icon() {
        return 'eicon-columns';
    }
    
    public function get_categories() {
        return [ 'fs-elementor-widgets' ];
    }
    
    protected function _register_controls() {
        // Define the content controls for the widget
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'fs-elementor-widgets' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'image',
            [
                'label' => __( 'Image', 'fs-elementor-widgets' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [],
            ]
        );
        
        $this->add_control(
            'text_content',
            [
                'label' => __( 'Text Content', 'fs-elementor-widgets' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<p>Enter your text here.</p>', 'fs-elementor-widgets' ),
            ]
        );
        
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        // Render the HTML output for the widget
    ?>
        <div class="fs-two-column-widget">
            <div class="left-column fs-image">
                <img src="<?php echo $settings['image']['url']; ?>" alt="<?php echo $settings['image']['alt']; ?>" />
            </div>
            <div class="right-column fs-text">
                <?php echo $settings['text_content']; ?>
            </div>
        </div>
    <?php
    }
    
    protected function _content_template() {
    ?>
        <div class="fs-two-column-widget">
            <div class="left-column fs-image">
                <img src="{{ settings.image.url }}" alt="{{ settings.image.alt }}" />
            </div>
            <div class="right-column fs-text">
                {{{ settings.text_content }}}
            </div>
        </div>
    <?php
    }
}
