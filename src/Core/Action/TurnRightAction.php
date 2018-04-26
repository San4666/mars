<?php

namespace Mars\Core\Action;


use Mars\Core\ActionInterface;
use Mars\Core\RoverInterface;

/**
 * Class TurnRightAction
 */
class TurnRightAction implements ActionInterface
{
    /**
     * @param RoverInterface $rover
     *
     * @return void
     */
    function action(RoverInterface $rover): void
    {
        $rover->right();
    }

}