<?php

/*
  Based on socialtv Plugins Options Base
  Copyright (C) 2013, socialtv.com

 */

require_once("base/class-options-base.php");

if (!class_exists('socialtv_Notification_Bar_Options')) {

    /**
     * Options class for socialtv Notification Bar plugin
     *
     * @author Syam Mohan <syam@socialtv.com>
     * @copyright 2013 socialtv.com
     */
    class socialtv_Notification_Bar_Options extends socialtv_Options_Base {

        function __construct($optionName, $pluginSlug) {
            parent::__construct($optionName, $pluginSlug);

            //add the options required for this plugin
            $this->addOption('enabled', 'bit', FALSE)->__('Enabled');
            $this->addOption('position', 'int', 1, array($this, 'validate_1or2'))->__('Position');
            $this->addOption('height', 'int', 0, array($this, 'validate_zero_positive'))->__('Bar Height');
            $this->addOption('message', 'string', 'SocialTVs bar')->__('Message Text');
            $this->addOption('display_after', 'int', 1, array($this, 'validate_zero_positive'))->__('Display After');
            $this->addOption('animate_delay', 'float', 0.5, array($this, 'validate_zero_positive'))->__('Animation Duration');
            $this->addOption('close_button', 'bool', FALSE)->__('Display Close Button');
            $this->addOption('auto_close_after', 'int', 0, array($this, 'validate_zero_positive'))->__('Auto Close After');
            $this->addOption('display_button', 'bool', TRUE)->__('Display Button');
			
			
			$this->addOption('buttons_count', 'int', 5)->__('Buttons Count');
			$this->addOption('text_margin', 'int', 1)->__('video margin');
			
			$this->addOption('button_text_1', 'string', 'Pamplona')->__('1 Button Text');
            $this->addOption('button_action_1', 'string', '//www.youtube.com/embed/SDyJKCrpEXE')->__('1 Button URL');
			$this->addOption('button_text_2', 'string', 'Cotonou')->__('2 Button Text');
            $this->addOption('button_action_2', 'string', '//www.youtube.com/embed/bwLLbLSMMMo')->__('2 Button URL');
			$this->addOption('button_text_3', 'string', 'Dakar')->__('3 Button Text');
            $this->addOption('button_action_3', 'string', '//www.youtube.com/embed/C3H_PRD8EgA')->__('3 Button URL');
			$this->addOption('button_text_4', 'string', 'Slovakia')->__('4 Button Text');
            $this->addOption('button_action_4', 'string', '//www.youtube.com/embed/sGrHwBlf-7M')->__('4 Button URL');
			$this->addOption('button_text_5', 'string', 'Paris')->__('5 Button Text');
            $this->addOption('button_action_5', 'string', '//www.youtube.com/embed/hZ5rR0WlEkQ')->__('5 Button URL');
			$this->addOption('button_text_6', 'string', '')->__('6 Button Text');
            $this->addOption('button_action_6', 'string', '')->__('6 Button URL');
			$this->addOption('button_text_7', 'string', '')->__('7 Button Text');
            $this->addOption('button_action_7', 'string', '')->__('7 Button URL');
			$this->addOption('button_text_8', 'string', '')->__('8 Button Text');
            $this->addOption('button_action_8', 'string', '')->__('8 Button URL');
			$this->addOption('button_text_9', 'string', '')->__('9 Button Text');
            $this->addOption('button_action_9', 'string', '')->__('9 Button URL');
			$this->addOption('button_text_10', 'string', '')->__('10 Button Text');
            $this->addOption('button_action_10', 'string', '')->__('10 Button URL');
			
			
			
            $this->addOption('button_text', 'string', '')->__('Button Text');
            $this->addOption('button_action', 'int', 1, array($this, 'validate_1or2'))->__('Button Action');
			
			
			
            $this->addOption('button_action_url', 'string', '')->__('Open URL:');
            $this->addOption('button_action_new_tab', 'bool', FALSE)->__('Open URL in new tab/window');
            $this->addOption('button_action_javascript', 'string', '')->__('Execute JavaScript');
            $this->addOption('button_action_close_bar', 'bit', FALSE)->__('Close Bar on Button Click');
            $this->addOption('display_shadow', 'bit', FALSE)->__('Display Shadow');
            $this->addOption('fixed_position', 'bit', TRUE)->__('Fixed at Position');
            $this->addOption('message_color', 'string', '#ffffff', array($this, 'validate_color'))->__('Message Text Color');
            $this->addOption('bar_from_color', 'string', '#888888', array($this, 'validate_color'))->__('From Color');
            $this->addOption('bar_to_color', 'string', '#000000', array($this, 'validate_color'))->__('To Color');
            $this->addOption('button_from_color', 'string', '#00b7ea', array($this, 'validate_color'))->__('From Color');
            $this->addOption('button_to_color', 'string', '#009ec3', array($this, 'validate_color'))->__('To Color');
            $this->addOption('button_text_color', 'string', '#ffffff', array($this, 'validate_color'))->__('Button Text Color');
            $this->addOption('display_pages', 'int', '1', array($this, 'validate_display_pages'))->__('Display on Pages');
            $this->addOption('include_pages', 'string', '');
            $this->addOption('exclude_pages', 'string', '');
            $this->addOption('display_open_button', 'bit', false)->__('Display Reopen Button');
            $this->addOption('open_button_color', 'string', '#00b7ea')->__('Reopen Button Color');
            $this->addOption('keep_closed', 'bit', FALSE)->__('Keep Closed');
            $this->addOption('keep_closed_for', 'int', 0, array($this, 'validate_zero_positive'))->__('Keep Closed For');
            $this->addOption('position_offset', 'int', 0)->__('Position Offset');
            $this->addOption('custom_css', 'string', '')->__('Custom CSS');
            $this->addOption('close_button_color', 'string', '#555555', array($this, 'validate_color'))->__('Close Button Color');
            $this->addOption('close_button_color_hover', 'string', '#aaaaaa', array($this, 'validate_color'));
            $this->addOption('close_button_color_x', 'string', '#000000', array($this, 'validate_color'));
            $this->addOption('display_roles', 'int', '1', array($this, 'validate_display_roles'))->__('Display for User Roles');
            $this->addOption('include_roles', 'string', array(), array($this, 'validate_include_roles'));
            $this->addOption('display_scroll', 'bit', false)->__('Display on Scroll');
            $this->addOption('display_scroll_offset', 'int', '100', array($this, 'validate_zero_positive'))->__('Scroll Offset');
            $this->addOption('start_date', 'string', '', array($this, 'validate_date_range'))->__('Start Date');
            $this->addOption('end_date', 'string', '', array($this, 'validate_date_range'))->__('End Date');
        }

        //validation function
        protected function validate_1or2($arg) {
            if ($arg < 1) {
                return 1;
            }

            if ($arg > 2) {
                return 2;
            }

            return $arg;
        }

        //validation function
        protected function validate_color($arg) {
            if (strlen($arg) != 7)
                return '#ffffff';

            if (strpos($arg, '#') != 0)
                return '#ffffff';

            return $arg;
        }

        protected function validate_display_pages($arg) {
            if ($arg < 1) {
                return 1;
            }

            if ($arg > 4) {
                return 4;
            }

            return $arg;
        }

        protected function validate_display_roles($arg) {
            if ($arg < 1) {
                return 1;
            }

            if ($arg > 4) {
                return 4;
            }

            return $arg;
        }

        protected function validate_include_roles($arg) {
            $obj = json_decode($arg);
            if (!is_array($obj))
                return array();
            return $obj;
        }
        
        protected function validate_date_range($arg) {
            if(trim($arg) == '')
                return NULL;
            
            if (($timestamp = strtotime($arg)) === false) {
                return NULL;
            }
            
            return $timestamp;
        }

    }

}