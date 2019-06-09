<?php

namespace App\Session\FlashMessage;

use App\Session\SessionHandler;

/**
 * Flash message holder
 * 
 * @author Victor Mendele <victor.mendele68@gmail.com>
 */
class Bag 
{
    /**
     * Index of the bag inside the _$\_SESSION_ object
     */
    private const BAG_ARRAY_INDEX = '__bag';

    /**
     * Session handler
     *
     * @var SessionHandler
     */
    private $sessionHandler;

    /**
     * Initializes a new instance of _Bag_.
     *
     * @param SessionHandler $sessionHandler
     */
    public function __construct(SessionHandler $sessionHandler)
    {
        $this->sessionHandler = $sessionHandler;
    }

    /**
     * Add a message to the message bag
     *
     * @param string $type
     * @param string $message
     * @return self
     */
    public function add (string $type, string $message): self {
        $session = $this->sessionHandler->get();
        $session[self::BAG_ARRAY_INDEX][$type][] = $message;

        $this->sessionHandler->set($session);

        return $this;
    }

    /**
     * Returns all flashes and clean the bag
     *
     * @return array
     */
    public function getFlashes (): array {
        $session = $this->sessionHandler->get();
        $bag = $session[self::BAG_ARRAY_INDEX];
        $session[self::BAG_ARRAY_INDEX] = [];
        $this->sessionHandler->set($session);
        return $bag;
    }
}