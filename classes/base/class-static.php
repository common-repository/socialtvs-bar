<?php

/*
  Based on socialtv Plugins Options Base
  Copyright (C) 2013, socialtv.com

 */

if (!class_exists('socialtv_Static')) {

   class socialtv_Static {

        public static function is_admin_bar_showing() {
            if (function_exists('is_admin_bar_showing')) {
                return is_admin_bar_showing();
            }

            return FALSE;
        }

        public static function self_admin_url($path = '', $scheme = 'admin') {
            if (function_exists('self_admin_url'))
                return self_admin_url($path, $scheme);

            return admin_url($path, $scheme);
        }

        public static function doing_ajax() {
            if (defined('DOING_AJAX') && DOING_AJAX) {
                return TRUE;
            }

            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                return TRUE;
            }

            return FALSE;
        }

    }

}