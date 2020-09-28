<?php

namespace JuanJimenezTJAFiltersGSWEB;

class Plugin {

    private static $_instance = null;

    public static function instance(){
        if(is_null(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function include_widgets_files(){
        require_once(__DIR__.'/widgets/a-filters-gsweb-widget.php');
        require_once(__DIR__.'/widgets/inline-editing.php');
    }

    public function register_widgets(){
        $this->include_widgets_files();

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\a_filters_gsweb() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Inline_Editing() );
    }

    public function __construct(){
        add_action('elementor/widgets/widgets_registered',[$this, 'register_widgets']);
    }
}

Plugin::instance();