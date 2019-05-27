<?php

namespace App\Renderer;

use App\Renderer\Exception\TemplateNotFoundException;

/**
 * Application renderer
 */
class Renderer
{
    /**
     * The template base folder
     *
     * @var string
     */
    private $templateFolder;

    /**
     * Initializes a new instance of _Renderer_
     *
     * @param string $templateFolder
     */
    public function __construct(string $templateFolder)
    {
        $this->templateFolder = $templateFolder;
    }

    /**
     * Renders the passed template using the the given context
     *
     * @param string $templateName
     * @param array $context
     * @return string
     */
    public function render (string $templateName, array $context = null): string {
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