<?php

$loader = require __DIR__ . '/vendor/autoload.php';
use controllers\TikTokController;

// set headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Check if the url parameter is set
if (! isset($_GET['url'])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$url = explode('/', $_GET['url']);

// Check http method
if ($_SERVER["REQUEST_METHOD"] != 'GET') {
    header('HTTP/1.1 405 Method not allowed');
    header('Allow: GET');
    exit();
}

// Check url base tiktok
if (isset($url[0]) != 'tiktok') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

// Check minimum value
$min = null;
if (isset($url[1])) {
    if (string_is_int($url[1])) {
        $min = $url[1];
    } else {
        header("HTTP/1.1 404 Not Found");
        exit();
    }
}

// Check maximum value
$max = null;
if (isset($url[2])) {
    if (string_is_int($url[2])) {
        $max = $url[2];
    } else {
        header("HTTP/1.1 404 Not Found");
        exit();
    }
}

// Checking if minimun parameter is lower than maximum parameter
if($max < $min){
    header("HTTP/1.1 400 Invalid data");
    exit();
}

/**
 * Checks if a provided value is a integger number
 * @param type $input string/int
 * @return type boolean
 */
function string_is_int($input) {
    if ($input[0] == '-') {
        return ctype_digit(substr($input, 1));
    }
    return ctype_digit($input);
}

// Print tiktok numbers test.
$controller = new TikTokController($min, $max);
$controller->printNumbers();
