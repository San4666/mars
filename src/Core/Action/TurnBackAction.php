<?php

namespace Mars\Core\Action;

use Mars\Core\ActionInterface;
use Mars\Core\RoverInterface;

/**
 * Class TurnBackAction
 */
class TurnBackAction implements ActionInterface
{
    /**
     * @inheritdoc
     */
    function action(RoverInterface $rover): void
    {
        $rover->left();
        $rover->left();
    }
}