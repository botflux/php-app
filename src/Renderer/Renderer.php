<?php

namespace App\Renderer;

class Renderer
{
    private $templateFolder;

    public function __construct(string $templateFolder)
    {
        $this->templateFolder = $templateFolder;
    }

    public function render (string $templateName, array $context): string {
        ob_start();

        include $this->templateFolder . DIRECTORY_SEPARATOR . $templateName;

        $content = ob_get_clean();

        return $content;
    }
}