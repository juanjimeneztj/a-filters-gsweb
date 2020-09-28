<?php

namespace JuanJimenezTJAFiltersGSWEB\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class a_filters_gsweb extends Widget_Base{

    public function get_name(){
        return 'a-filters-gsweb';
    }

    public function get_title(){
        return __('A Filters GSWEB', 'a-filters-gsweb');
    }

    public function get_icon(){
        return 'eicon-tags';
    }

    public function get_categories(){
        return ['basic'];
    }

    public function get_script_depends(){
        return ['a-filters-gsweb'];
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
                'label'       => __('Title', 'a-filters-gsweb'),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => 'Enter here the title'
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $settings = $this->get_settings_for_display();
        $html = "<div><h1>".$settings['title']."</h1></div>";
        echo $html;
    }

    protected function _content_template(){
        ?>
        <div>
            <#
                if(settings.title){
                    #>
                        <h1>{{{ settings.title }}}</h1>
                    <#
                }
            #>
        </div>
        <?php
    }
}