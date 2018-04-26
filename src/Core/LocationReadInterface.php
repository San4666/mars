<?php

namespace Mars\Core;


interface LocationReadInterface
{
    /**
     * Gets y of the Rover
     *
     * @return int
     */
    function getY(): int;

    /**
     * Gets x of the Rover
     *
     * @return int
     */
    function getX(): int;
}