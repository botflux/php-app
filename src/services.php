<?php

$container = $app->getContainer();

$container['renderer'] = function ($c) {
    return new App\Renderer\Renderer($c['settings']['renderer']['templateFolder']);
};
