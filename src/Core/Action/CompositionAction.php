<?php

namespace Mars\Core\Action;


use Mars\Core\ActionInterface;
use Mars\Core\RoverInterface;

/**
 * Class CollectionAction
 */
class CompositionAction implements ActionInterface
{
    /**
     * @var ActionInterface[]
     */
    private $actions = [];

    /**
     * @inheritdoc
     */
    function action(RoverInterface $rover): void
    {
        foreach ($this->actions as $action) {
            $action->action($rover);
        }
    }

    /**
     * @param ActionInterface $action
     *
     * @return void
     */
    public function add(ActionInterface $action): void
    {
        $this->actions[] = $action;
    }


}