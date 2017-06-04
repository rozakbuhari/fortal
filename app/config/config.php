<?php

// Tentukan environment
define('ENVIRONMENT', 'dev');

// Setup error reporting
if (ENVIRONMENT === 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

// Konfigurasi
define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', (URL_PROTOCOL . URL_DOMAIN) . URL_SUB_FOLDER);
define('VIEW_FOLDER', APP . 'view' . DIRECTORY_SEPARATOR);

define('DB_TYPE', 'mysql');
define('DB_HOST', 'mysql');
define('DB_NAME', 'default');
define('DB_USER', 'default');
define('DB_PASS', 'secret');
define('DB_CHARSET', 'utf8');
