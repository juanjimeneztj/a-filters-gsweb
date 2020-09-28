<?php
/*
Plugin Name: A Filters GSWEB
Description: Posts filter.
Version: 1.0.0
Author: Juan Jimenez
Author: URI: https://juanjimeneztj.com/
License: GPL2+
Text Domain: Juan Jimenez
*/

if(!defined('ABSPATH')) exit;

final class a_filters_gsweb{

    const VERSION = '1.0.0';
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    const MINIMUM_PHP_VERSION = '7.0';

    public function __construct(){
        add_action('init', array($this,'i18n'));
        add_action('plugins_loaded', array($this, 'init'));
    }

    public function i18n(){
        load_plugin_textdomain('a-filters-gsweb');
    }

    public function init(){

        if(! did_action('elementor/loaded')){
            add_action('admin_notice',array($this, 'admin_notice_missing_main_plugin'));
            return;
        }

        if(! version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')){
            add_action('admin_notice',array($this, 'admin_notice_minimum_elementor_version'));
            return;
        }
        
        if(version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')){
            add_action('admin_notice',array($this, 'admin_notice_minimum_php_version'));
            return;
        }

        require_once('plugin.php');
    }

    public function admin_notice_missing_main_plugin(){
        if(isset($_GET['activate'])){
            unset($_GET['activate']);
        }

        $msg = sprintf(
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'a-filters-gsweb'),
            '<strong>' . esc_html__('A Filters GSWEB', 'a-filters-gsweb') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'a-filters-gsweb') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible">%1$s</div>', $msg);
    }

    public function admin_notice_minimum_elementor_version(){
        if(isset($_GET['activate'])){
            unset($_GET['activate']);
        }

        $msg = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'a-filters-gsweb'),
            '<strong>' . esc_html__('A Filters GSWEB', 'a-filters-gsweb') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'a-filters-gsweb') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible">%1$s</div>', $msg);
    }
    
    public function admin_notice_minimum_php_version(){
        if(isset($_GET['activate'])){
            unset($_GET['activate']);
        }

        $msg = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'a-filters-gsweb'),
            '<strong>' . esc_html__('A Filters GSWEB', 'a-filters-gsweb') . '</strong>',
            '<strong>' . esc_html__('PHP', 'a-filters-gsweb') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible">%1$s</div>', $msg);
    }

}

new a_filters_gsweb();