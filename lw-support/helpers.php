<?php 
/**
 * Store required helper functions for simplyfing tasks
 *
 * PHP version 5.2.4 or newer
 *
 * @category   HelpersFile
 * @package    JQueryPHPStoreShop
 * @author     Vinod <livelyworks@gmail.com>
 * @copyright  2013 LivelyWorks. (http://livelyworks.net)
 * @license    LivelyWorks (http://livelyworks.net)
 * @link       http://livelyworks.net
 * @since      Version 1.0
 * @deprecated NA
 */


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/* 
    helper function from laravel 
    vendor/laravel/framework/src/Illuminate/Support/helpers.php
 */

if (! function_exists('envValue')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function envValue($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}
/* 
    helper function from laravel 
    vendor/laravel/framework/src/Illuminate/Support/helpers.php
 */
if (!function_exists('envItem')) {
    /**
         * Get the Enviroment item
         *
         * @param string $key     
         * @param string $fallbackValue     
         *   
         * @return void
    */
    function envItem($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return envValue($default);
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        if (($valueLength = strlen($value)) > 1 && $value[0] === '"' && $value[$valueLength - 1] === '"') {
            return substr($value, 1, -1);
        }

        return $value;
    }
}

if (!function_exists('__dd')) {
    function __dd() {
        $args = func_get_args();

        if (empty($args)) {
            print_r('__dd() No arguments are passed!!');
            exit();
        }

        $backtrace = debug_backtrace();

        if(isset($backtrace[0])) {
            $args['debug_backtrace'] = str_replace('', '', $backtrace[0]['file']).':' . $backtrace[0]['line'];
        }

        call_user_func_array('var_dump', $args);
        exit();
    }
}

if (!function_exists('__pr')) {
    function __pr() {
        $args = func_get_args();

        if (empty($args)) {
            print_r('__pr() No arguments are passed!!');
            exit();
        }

        $backtrace = debug_backtrace();

        if(isset($backtrace[0])) {
            $args['debug_backtrace'] = str_replace('', '', $backtrace[0]['file']).':' . $backtrace[0]['line'];
        }

        call_user_func_array('var_dump', $args);
    }
}