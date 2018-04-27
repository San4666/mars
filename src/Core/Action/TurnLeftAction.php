<?php

namespace Mars\Core\Action;

use Mars\Core\ActionInterface;
use Mars\Core\RoverInterface;

/**
 * Class TurnLeftAction
 */
class TurnLeftAction implements ActionInterface
{
    /**
     * @inheritdoc
     */
    function action(RoverInterface $rover): void
    {
        $rover->left();
    }

}