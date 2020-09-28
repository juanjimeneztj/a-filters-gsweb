<?php
namespace JuanJimenezTJAFiltersGSWEB\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class Inline_Editing extends Widget_Base{
    public function get_name(){
        return 'inline-editing-example';
    }

    public function get_title(){
        return __('Inline Editing', 'a-filters-gsweb');
    }

    public function get_icon(){
        return 'fa fa-pencil';
    }

    public function get_categories(){
        return ['general'];
    }

    protected function _register_controls(){
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('content', 'a-filters-gsweb'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __('Title', 'a-filters-gsweb'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Title', 'a-filters-gsweb'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes('title','none');
        ?>
            <h1 <?php echo $this->get_render_attribute_string('title') ?>><?php echo $settings['title']?></h1>
        <?php
    }

    protected function _content_template(){
        ?>
        <#
            view.addInlineEditingAttributes('title','none');
        #>
        <h1 {{{ view.getRenderAttributeString('title') }}}>{{{ settings.title }}}</h1>
        <?php
    }
}