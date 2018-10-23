<?php

namespace GeniusTS\Roles\Exceptions;


class RoleDeniedException extends AccessDeniedException
{

    /**
     * Create a new role denied exception instance.
     *
     * @param string $role
     */
    public function __construct($role)
    {
        parent::__construct(sprintf("You don't have a required ['%s'] role.", $role));
    }
}
