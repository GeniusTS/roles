<?php

namespace GeniusTS\Roles\Exceptions;


class LevelDeniedException extends AccessDeniedException
{

    /**
     * Create a new level denied exception instance.
     *
     * @param string $level
     */
    public function __construct($level)
    {
        parent::__construct(sprintf("You don't have a required [%s] level.", $level));
    }
}
