<?php 
/**
 * Igniter file for base activities
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

require_once 'vendor/autoload.php';
require_once 'helpers.php';
$loadEnvFrom = __DIR__.'/..';
$loadEnvFormDemo = __DIR__.'/../..';
if(!file_exists($loadEnvFrom.'/.env.php') and file_exists($loadEnvFormDemo.'/.env')) {
   $dotenv = Dotenv\Dotenv::create($loadEnvFormDemo, '.env');
} else {
    // Load env file
    $dotenv = Dotenv\Dotenv::create($loadEnvFrom, '.env.php');
}

$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USERNAME', 'DB_PASSWORD']);
