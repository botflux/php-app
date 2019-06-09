<?php

namespace App\Session;

/**
 * Session handler
 * 
 * @author Victor Mendele <victor.mendele68@gmail.com>
 */
class SessionHandler 
{
    /**
     * Set session array
     *
     * @param array $newSessionArray
     * @return self
     */
    public function set (array $newSessionArray): self {
        $_SESSION = $newSessionArray;

        return $this;
    }

    /**
     * Get session array
     *
     * @return array
     */
    public function get (): array {
        return $_SESSION;
    }
}