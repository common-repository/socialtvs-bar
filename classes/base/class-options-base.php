<?php

/*
  Based on socialtv Plugins Options Base
  Copyright (C) 2013, socialtv.com

 */

if (!class_exists('socialtv_Options_Base')) {

    class socialtv_Options_Base {

        //variables to hold options data
        public $__data = array();
        public $__optionName;
        public $__localizeSlug;
        public $__options;
        private $lastOptionName;
        private $optionNames;

        function __construct($optionName, $localizeSlug) {
            $this->__optionName = $optionName;
            $this->__localizeSlug = $localizeSlug;

            $this->__options = get_option($this->__optionName);

            if (!is_array($this->__options)) {
                $this->__options = array();
            }

            $this->optionNames = array();
        }

        //defines option with data
        protected function addOption($name, $type, $default, $validate = NULL) {
            if (isset($this->__data[$name])) {
                echo 'Duplicate option ' . $name;
                return $this;
            }
            $this->__data[$name]['name'] = $name;
            $this->__data[$name]['type'] = $type;
            $this->__data[$name]['default'] = $default;
            $this->__data[$name]['validate'] = isset($validate) ? $validate : array(&$this, 'validate_default');
            
            //dynamic function returning option value
            $this->__data[$name]['func'] = create_function('$self, $data', '
                $value = NULL;
                if(array_key_exists($data["name"], $self->__options))
                    $value = $self->__options[$data["name"]];
                return $self->get_value($data["type"], $value, $data["default"], $data["validate"]);
            ');
            
            $this->__data[$name . '_name'] = $this->__data[$name];
            //dynamic function returning option name for settings page
            $this->__data[$name . '_name']['func'] = create_function('$self, $data', '
                return $self->__optionName . "[" . $data["name"] . "]";
            ');
            
            $this->__data[$name . '_label'] = $this->__data[$name];
            
            //dynamic function returning option label for settings page
            $this->__data[$name . '_label']['func'] = create_function('$self, $data', '
                return __($data["label"], $self->__localizeSlug);
            ');

            $this->lastOptionName = $name;
            array_push($this->optionNames, $name);

            return $this;
        }

        //default validation function
        private function validate_default($arg) {
            return $arg;
        }

        //validates a zero or positive number
        protected function validate_zero_positive($arg) {
            if ($arg < 0) {
                return 0;
            }

            return $arg;
        }

        //sets the label of the option, for POEDIT compatibility
        protected function __($label) {
            $this->__data[$this->lastOptionName . '_label']['label'] = $label;
        }

        //returns the value of option
        public function get_value($type, $value, $default, $validate) {
            if (!isset($value)) {
                return $default;
            }

            switch ($type) {
                case 'bool':
                    return (bool) $value;
                case 'int':
                    return call_user_func($validate, intval($value));
                case 'float':
                    return call_user_func($validate, floatval($value));
                case 'string':
                    return call_user_func($validate, strval($value));
            }
            return $value;
        }

        //returns optons array
        public function get_options() {
            $options = array();
            foreach ($this->optionNames as $val) {
                $options[$val] = $this->$val();
            }
            return $options;
        }

        //PHP magic function to call dynamic methods
        public function __call($name, array $args) {
            if (!array_key_exists($name, $this->__data)) {
                echo '"' . $name . '" option not yet added';
                return;
            }

            array_unshift($args, $this->__data[$name]);
            array_unshift($args, $this);
            return call_user_func_array($this->__data[$name]['func'], $args);
        }

    }

}
