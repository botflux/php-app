<?php

namespace App\Core;

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

    public function __construct(callable $cb, ServiceContainer $serviceContainer)
    {
        $this->callable = $cb;
        $this->serviceContainer = $serviceContainer;
    }

    public function get () {
        if (is_null($this->service)) {
            $cb = $this->callable;
            $this->service = $cb($this->serviceContainer);
        }

        return $this->service;
    }
}