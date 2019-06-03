<?php

namespace App\Validation;

/**
 * A form field
 */
class FormField 
{
    /**
     * Field name
     *
     * @var string
     */
    private $name;

    /**
     * Validations
     *
     * @var callable[]
     */
    private $validations;

    public function __construct(string $name, array $validations)
    {
        $this->name = $name;
        $this->validations = $validations;
    }

    /**
     * Get field name
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set field name
     *
     * @param  string  $name  Field name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get validations
     *
     * @return  callable[]
     */ 
    public function getValidations()
    {
        return $this->validations;
    }

    /**
     * Set validations
     *
     * @param  callable[]  $validations  Validations
     *
     * @return  self
     */ 
    public function setValidations(array $validations)
    {
        $this->validations = $validations;

        return $this;
    }

    /**
     * Check if the value is valid
     *
     * @param $value
     * @return bool
     */
    public function isValid ($value): bool {
        foreach ($this->validations as $validation) {
            if (!$validation ($value)) {
                return false;
            }
        }

        return true;
    }
}