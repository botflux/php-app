<?php

namespace App\Validation;

use App\Router\Request;

abstract class BaseForm
{
    /**
     * Form fields
     *
     * @var FormField[]
     */
    private $elements = [];

    /**
     * Add a new field to the form
     *
     * @param array $configration
     * @return self
     */
    public function add (FormField $configration) {
        $this->elements[] = $configration;

        return $this;
    }

    /**
     * Check if every form field is valid
     *
     * @param Request $request
     * @return boolean
     */
    public function isValid (Request $request): bool 
    {
        foreach ($this->elements as $element) {
            $name = $element->getName();
            $field = $request->getField($name);

            if (!$element->isValid($field)) {
                return false;
            }
        }

        return true;
    }
}