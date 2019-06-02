<?php

namespace App\Core;

/**
 * Represents an application service
 */
class Service {
    /**
     * @var callable
     */
    private $callable;

    /**
     * The service holder
     *
     * @var any
     */
    private $service = null;

    /**
     * @var ServiceContainer
     */
    private $serviceContainer;

    /**
     * Initializes a new instance of _Service_ with a function that instantiate the service.
     * This function must returns the service.
     *
     * @param callable $cb
     * @param ServiceContainer $serviceContainer
     */
    public function __construct(callable $cb, ServiceContainer $serviceContainer)
    {
        $this->callable = $cb;
        $this->serviceContainer = $serviceContainer;
    }

    /**
     * Returns the service
     *
     * @return any
     */
    public function get () {
        if (is_null($this->service)) {
            $cb = $this->callable;
            $this->service = $cb($this->serviceContainer);
        }

        return $this->service;
    }
}