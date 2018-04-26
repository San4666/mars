<?php

namespace Mars\Core\Controller;

use Mars\Core\ActionInterface;
use Mars\Core\RoverInterface;
use Mars\Exception\NotFoundActionException;

/**
 * Class Controller
 */
class Controller
{
    /**
     * @var ActionInterface[]
     */
    private $commands = [];


    /**
     * @param string $name
     * @param ActionInterface $action
     *
     * @return void
     */
    public function registerAction(string $name, ActionInterface $command): void
    {
        $this->commands[$name] = $command;
    }

    /**
     * @param RoverInterface $rover
     * @param string $sting
     *
     * @throws NotFoundActionException
     */
    public function execute(RoverInterface $rover, string $sting): void
    {
        foreach (str_split($sting) as $name) {
            if (isset($this->commands[$name])) {
                $this->commands[$name]->action($rover);
            } else {
                throw new NotFoundActionException();
            }
        }
    }
}