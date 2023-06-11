<?php
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if (strpos($url, 'includes') !== false) {
        $path = '../';
    } else {
        $path = '';
    }

    $className = str_replace('\\', '/', $className); // Convert namespace separators to directory separators
    $file = $path . $className . '.php';

    if (file_exists($file)) {
        include_once $file;
    } else {
        echo "File not found: $file";
    }
}
?>
