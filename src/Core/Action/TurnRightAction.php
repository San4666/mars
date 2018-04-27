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
     * @inheritdoc
     */
    function action(RoverInterface $rover): void
    {
        $rover->right();
    }

}