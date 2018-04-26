<?php

namespace Mars\Core\Action;

use Mars\Core\ActionInterface;
use Mars\Core\RoverInterface;

/**
 * Class MoveAction
 */
class MoveAction implements ActionInterface
{
    /**
     * @inheritdoc
     */
    function action(RoverInterface $rover): void
    {
        $rover->move();
    }
}