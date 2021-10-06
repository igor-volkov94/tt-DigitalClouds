<?php
header('Access-Control-Allow-Origin: *');

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/constants.php')) {
    require $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/constants.php';
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/functions.php')) {
    require $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/functions.php';
}

use Bitrix\Main\Loader;
Loader::includeModule('catalog');