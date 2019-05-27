<?php

namespace App\Renderer;

use App\Renderer\Exception\TemplateNotFoundException;

class Renderer
{
    private $templateFolder;

    public function __construct(string $templateFolder)
    {
        $this->templateFolder = $templateFolder;
    }

    public function render (string $templateName, array $context): string {
        $templatePath = $this->templateFolder . DIRECTORY_SEPARATOR . $templateName;

        if (!file_exists($templatePath)) {
            throw new TemplateNotFoundException("$templatePath was not found.");
        }

        ob_start();

        include $templatePath;

        $content = ob_get_clean();

        return $content;
    }
}