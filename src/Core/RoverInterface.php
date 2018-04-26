<?php

namespace Mars\Core;

/**
 * Interface RoverInterface
 *
 * @package mars
 */
interface RoverInterface extends LocationReadInterface
{

    /**
     * Gets direction of the Rover
     *
     * @return string
     */
    function getDirection(): string;


    /**
     * Turns left the rover
     *
     * @return void
     */
    function left(): void;

    /**
     * Turns right the rover
     *
     * @return void
     */
    function right(): void;

    /**
     * Moves forward the rover
     *
     * @return void
     */
    function move(): void;

}

