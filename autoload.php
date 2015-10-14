<?php

/**
 * TODO autoload
 */
require_once 'config/defines.php';

function __autoload($class_name) {
    if (file_exists(DIR_ROOT . 'class/' . $class_name . '.php')) {
        require_once DIR_ROOT . 'class/' . $class_name . '.php';
    } elseif (file_exists(DIR_ROOT . 'controller/' . $class_name . '.php')) {
        require_once DIR_ROOT . 'controller/' . $class_name . '.php';
    }
}
