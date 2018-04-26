<?php

namespace Mars\Core;

/**
 * Interface ActionInterface
 */
interface ActionInterface
{
    /**
     * Executes  action the Rover
     *
     * @param RoverInterface $rover
     *
     * @return void
     */
    function action(RoverInterface $rover): void;
}