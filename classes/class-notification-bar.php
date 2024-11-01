<?php

/*
  Based on socialtv Plugins Options Base
  Copyright (C) 2013, socialtv.com

 */

require_once("base/class-base.php");
require_once("class-notification-bar-options.php");

if (!class_exists('socialtv_Notification_Bar')) {

    /**
     * Main class of socialtv Notification Bar plugin
     *
     * @author Syam Mohan <syam@socialtv.com>
     * @copyright 2013 socialtv.com
     */
    class socialtv_Notification_Bar extends socialtv_Base {

        //Constants
        const VERSION = '1';
        const OPTIONS_GROUP_NAME = 'socialtvs-options-group';
        const OPTION_NAME = 'socialtvs-options';
        const PLUGIN_SLUG = 'socialtvs-bar';
        //cookie names
        const COOKIE_LANDINGPAGE = 'socialtvs-landingpage';
        //role consts
        const ROLE_NOROLE = 'socialtvs-role-_norole_';
        const ROLE_GUEST = 'socialtvs-role-_guest_';

        //Variables
        protected $options;
        private $markupLoaded;
        private $scriptLoaded;

        function __construct() {
            parent::__construct(__FILE__, self::PLUGIN_SLUG);

            $this->markupLoaded = FALSE;

            add_action('wp_footer', array(&$this, 'write_markup'));
            add_action('shutdown', array(&$this, 'write_markup'));

            $this->add_menu($this->__('Notification bar'), $this->__('SocialTVs Bar'));
        }

        public function init() {
            //for landing page tracking
            if (!isset($_COOKIE[self::COOKIE_LANDINGPAGE])) {
                setcookie(self::COOKIE_LANDINGPAGE, 1);
            }
        }

        //add scripts
        public function enqueue_scripts() {
            if ($this->enabled() == FALSE)
                return;

            $jsRoot = $this->pluginURLRoot . 'js/';

            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery.cookie', $this->pluginURLRoot . 'jquery-plugins/jquery.c.js', array('jquery'), '1.4.0');
            wp_enqueue_script('socialtvs-bar', $jsRoot . 'notification-bar.js', array('jquery'), self::VERSION);
			wp_enqueue_script('open-track-socialtv', $jsRoot . 'script.js', array('jquery'), self::VERSION);
            $this->scriptLoaded = TRUE;
        }

        //add styles
        public function enqueue_styles() {
            if ($this->enabled() == FALSE)
                return;

            $cssRoot = $this->pluginURLRoot . 'css/';

            wp_enqueue_style('socialtvs-bar', $cssRoot . 'notification-bar.css', array(), self::VERSION);
        }

        public function admin_init() {
            register_setting(self::OPTIONS_GROUP_NAME, self::OPTION_NAME);
        }

        //options page scripts
        public function enqueue_options_scripts() {
            $this->enqueue_scripts();

            wp_enqueue_script('jquery-ui-datepicker', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js', array('jquery'), '1.8.16');

            $jsRoot = $this->pluginURLRoot . 'jquery-plugins/colorpicker/js/';
            wp_enqueue_script('jquery.eyecon.colorpicker', $jsRoot . 'colorpicker.js', array('jquery', 'jquery-ui-datepicker'), self::VERSION);

            $jsRoot = $this->pluginURLRoot . 'jquery-plugins/';
            wp_enqueue_script('json2', $jsRoot . 'json2.min.js', array('jquery'), self::VERSION);

//            $jsRoot = $this->pluginURLRoot . 'js/';
//            wp_enqueue_script('notification-bar-options', $jsRoot . 'options.js', array(), self::VERSION);
        }

        //options page styles
        public function enqueue_options_styles() {
            $this->enqueue_styles();
            
            $styleRoot = $this->pluginURLRoot . 'jquery-plugins/jquery-ui/smoothness/';
            wp_enqueue_style('jquery.ui.smoothness.datepicker', $styleRoot . 'jquery-ui-1.10.4.custom.min.css', array(), self::VERSION);

            $styleRoot = $this->pluginURLRoot . 'jquery-plugins/colorpicker/css/';
            wp_enqueue_style('jquery.eyecon.colorpicker.colorpicker', $styleRoot . 'colorpicker.css', array(), self::VERSION);

            $styleRoot = $this->pluginURLRoot . 'css/';
            wp_enqueue_style('socialtvs-bar', $styleRoot . 'options.css', array(), self::VERSION);
        }

        public function plugins_loaded() {
            //load plugin options
            $this->options = new socialtv_Notification_Bar_Options(self::OPTION_NAME, self::PLUGIN_SLUG);
        }

        //writes the html and script for the bar
        public function write_markup() {
            if ($this->markupLoaded) {
                return;
            }

            if ($this->scriptLoaded != TRUE) {
                return;
            }

            if ($this->enabled()) {
                include($this->pluginDIRRoot . 'templates/notification-bar-template.php');

                echo '<script type="text/javascript">';
                echo 'if(typeof socialtv_notification_bar == "function") ';
                echo 'socialtv_notification_bar(' . json_encode(array(
                    'position' => $this->options->position(),
                    'height' => $this->options->height(),
                    'fixed_position' => $this->options->fixed_position(),
                    'animate_delay' => $this->options->animate_delay(),
                    'close_button' => $this->options->close_button(),
                    'button_action_close_bar' => $this->options->button_action_close_bar(),
                    'auto_close_after' => $this->options->auto_close_after(),
                    'display_after' => $this->options->display_after(),
                    'is_admin_bar_showing' => socialtv_Static::is_admin_bar_showing(),
                    'display_open_button' => $this->options->display_open_button(),
                    'keep_closed' => $this->options->keep_closed(),
                    'keep_closed_for' => $this->options->keep_closed_for(),
                    'position_offset' => $this->options->position_offset(),
                    'display_scroll' => $this->options->display_scroll(),
                    'display_scroll_offset' => $this->options->display_scroll_offset(),
                )) . ');';
                echo '</script>';
            }

            $this->markupLoaded = TRUE;
        }

        protected function get_filter_objects() {
            $objects = array();

            $objects['1.home'] = $this->__('[Page]') . ' ' . $this->__('Home');

            $pages = get_pages();
            foreach ($pages as $page) {
                $objects['1.' . $page->ID] = $this->__('[Page]') . ' ' . $page->post_title;
            }

            $posts = get_posts();
            foreach ($posts as $post) {
                $objects['2.' . $post->ID] = $this->__('[Post]') . ' ' . $post->post_title;
            }

//            $categories = get_categories();
//            foreach ($categories as $category) {
//                $objects['3.' . $category->cat_ID] = $this->__('[Category]') . ' ' . $category->cat_name;
//            }

            return $objects;
        }

        protected function get_role_objects() {
            $objects = array();
            global $wp_roles;

            $roles = $wp_roles->role_names;
            foreach ($roles as $role_name => $role_display_name) {
                $objects[$role_name] = $role_display_name;
            }

            return $objects;
        }

        protected function filter() {
            if (is_admin())
                return TRUE;

            $today = current_time('mysql');
            $today = strtotime($today);
            $today = date('Y-m-d', $today);
            $today = strtotime($today);

            $start_date = $this->options->start_date();
            if ($start_date != NULL) {
                if ($start_date > $today)
                    return FALSE;
            }

            $end_date = $this->options->end_date();
            if ($end_date != NULL) {
                if ($end_date < $today)
                    return FALSE;
            }

            switch ($this->options->display_roles()) {
                case 1:
                    break;
                case 2:
                    if (!is_user_logged_in())
                        return FALSE;
                    break;
                case 3:
                    if (is_user_logged_in())
                        return FALSE;
                    break;
                case 4:
                    global $current_user;
                    if (empty($current_user->roles)) {
                        $role = self::ROLE_GUEST;
                        if (is_user_logged_in())
                            $role = self::ROLE_NOROLE;
                        if (!in_array($role, $this->options->include_roles()))
                            return FALSE;
                    } else {
                        $display = FALSE;
                        foreach ($current_user->roles as $role) {
                            if (in_array($role, $this->options->include_roles())) {
                                $display = TRUE;
                                break;
                            }
                        }
                        if (!$display)
                            return FALSE;
                    }
                    break;
            }

            switch ($this->options->display_pages()) {
                case 1:
                    return TRUE;
                case 2:
                    return !isset($_COOKIE[self::COOKIE_LANDINGPAGE]);
                case 3:
                case 4:
                    global $post;
                    $ID = FALSE;
                    $type = FALSE;
                    if (is_home()) {
                        $ID = 'home';
                        $type = 1;
                    } elseif (is_singular()) {
                        $post_type = get_post_type();
                        if ($post_type == 'page') {
                            $ID = $post->ID;
                            $type = 1;
                        } elseif ($post_type == 'post') {
                            $ID = $post->ID;
                            $type = 2;
                        }
                    }
                    if ($this->options->display_pages() == 3) {
                        if ($ID !== FALSE && $type !== FALSE) {
                            if (strpos($this->options->include_pages(), $type . '.' . $ID) === FALSE)
                                return FALSE;
                            else
                                return TRUE;
                        }
                        return FALSE;
                    }
                    if ($this->options->display_pages() == 4) {
                        if ($ID !== FALSE && $type !== FALSE) {
                            if (strpos($this->options->exclude_pages(), $type . '.' . $ID) === FALSE)
                                return TRUE;
                            else
                                return FALSE;
                        }
                        return TRUE;
                    }
            }

            return TRUE;
        }

        protected function enabled() {
            if ($this->options->enabled()) {
                return $this->filter();
            }

            return FALSE;
        }

    }

}