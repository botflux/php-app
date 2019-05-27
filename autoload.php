<?php

spl_autoload_register (function ($class) {
    require_once __DIR__ . DIRECTORY_SEPARATOR . preg_replace('/App/', 'src', str_replace('\\', DIRECTORY_SEPARATOR, $class)) . '.php';
});
