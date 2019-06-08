<?php

namespace App\Renderer;

use App\Renderer\Exception\TemplateNotFoundException;
use App\Session\FlashMessage\Bag;

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
     * Flash message bag
     *
     * @var Bag
     */
    private $bag;

    /**
     * Initializes a new instance of _Renderer_
     *
     * @param string $templateFolder
     */
    public function __construct(string $templateFolder, Bag $bag)
    {
        $this->templateFolder = $templateFolder;
        $this->bag = $bag;
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
        $bag = $this->bag;

        if (!file_exists($templatePath)) {
            throw new TemplateNotFoundException("$templatePath was not found.");
        }

        ob_start();

        include $templatePath;

        $content = ob_get_clean();

        return $content;
    }
}