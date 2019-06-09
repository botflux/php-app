<?php

namespace App\Mailing;

use App\Session\FlashMessage\Bag;

/**
 * Mock mailing service
 * 
 * @author Victor Mendele <victor.mendele68@gmail.com>
 */
class Mailing
{
    /**
     * Session flash message bag
     *
     * @var Bag
     */
    private $flashBag;

    public function __construct(Bag $bag)
    {
        $this->flashBag = $bag;
    }

    /**
     * Send a mail
     *
     * @return self
     */
    public function send (): self {
        $this->flashBag->add('success', 'Email envoyé avec succès !');
        return $this;
    }
}