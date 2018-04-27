<?php

namespace Mars\Core\Controller;

use Mars\Core\Action\CompositionAction;
use Mars\Core\ActionInterface;
use Mars\Core\RoverInterface;
use Mars\Exception\Exception;
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
     * @param ActionInterface $command
     *
     * @return void
     *
     * @throws Exception
     */
    public function registerAction(string $name, ActionInterface $command): void
    {
        if (strlen($name) == 1) {
            $this->commands[$name] = $command;
        } else {
            throw new Exception('a name of command must be one character');
        }

    }

    /**
     * @param RoverInterface $rover
     * @param string $commandString
     *
     * @throws NotFoundActionException
     */
    public function execute(RoverInterface $rover, string $commandString): void
    {
        $this->parserCommandString($commandString)->action($rover);
    }

    /**
     * @param string $commandString
     *
     * @return ActionInterface
     *
     * @throws NotFoundActionException
     */
    private function parserCommandString(string $commandString): ActionInterface
    {
        $collection = new CompositionAction();
        foreach (str_split($commandString) as $name) {
            if (isset($this->commands[$name])) {
                $collection->add($this->commands[$name]);
            } else {
                throw new NotFoundActionException();
            }
        }
        return $collection;
    }
}