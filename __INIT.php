<?php
/**
 * Created by PhpStorm.
 * User: Jamers
 * Date: 2019-06-19
 * Time: 8:52
 * File: __INIT.php
 */
if (!defined("ROOT")) {
    define("ROOT", dirname(__FILE__) . DIRECTORY_SEPARATOR);
}

function autoload($cls)
{
    $base_list = array(
        'class',
    );
    $file = '';
    foreach ($base_list as $v) {
        $base = $v . DIRECTORY_SEPARATOR;
        $a = explode('\\', $cls);
        $a[count($a) - 1] = 'Cls_' . ucfirst($a[count($a) - 1]);
        $file = ROOT . $base . implode(DIRECTORY_SEPARATOR, $a) . '.php';
        if (file_exists($file)) {
            break;
        }
    }

    if ($file && file_exists($file)) {
        include_once $file;
    }
    return true;
}

spl_autoload_register('autoload');

$composer_autoload = ROOT . 'vendor/autoload.php';
if (file_exists($composer_autoload)) {
    include_once $composer_autoload;
}
