<?php

namespace Mars\Core\Action;

use Mars\Core\ActionInterface;
use Mars\Core\RoverInterface;

/**
 * Class TurnLeftAction
 */
class TurnLeftAction implements ActionInterface
{
    /*
     * Executes  action the Rover
     *
     * @param RoverInterface $rover
     */
    function action(RoverInterface $rover): void
    {
        $rover->left();
    }

}