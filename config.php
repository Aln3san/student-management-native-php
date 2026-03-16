<?php

spl_autoload_register(function ($class_name) {
    $path = __DIR__ . '/Class/' . $class_name . '.php'; // تأكد من المسار
    if (file_exists($path)) {
        require_once $path;
    }
});