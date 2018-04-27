<?php

namespace Mars\Core\Factory;

use Mars\Core\Action\AutopilotAction;
use Mars\Core\Action\MoveAction;
use Mars\Core\Action\TurnBackAction;
use Mars\Core\Action\TurnLeftAction;
use Mars\Core\Action\TurnRightAction;
use Mars\Core\Controller\Controller;
use Mars\Core\LocationReadInterface;
use Mars\Exception\Exception;

/**
 * Class ControllerFactory
 * @package Mars\Factory
 */
class ControllerFactory
{
    /**
     * @var LocationReadInterface
     */
    private $home;
    /**
     * @var LocationReadInterface
     */
    private $placeOfResearch;
    /**
     * @var int
     */
    private $radiosResearch;

    /**
     * ControllerFactory constructor.
     * @param LocationReadInterface $home
     * @param LocationReadInterface $placeOfResearch
     * @param int $radiosResearch
     */
    public function __construct(LocationReadInterface $home, LocationReadInterface $placeOfResearch, int $radiosResearch)
    {
        $this->home = $home;
        $this->placeOfResearch = $placeOfResearch;
        $this->radiosResearch = $radiosResearch;
    }

    /**
     * @return Controller
     *
     * @throws Exception
     */
    public function factory(): Controller
    {
        $controller = new Controller();
        $controller->registerAction('L', new TurnLeftAction());
        $controller->registerAction('R', new TurnRightAction());
        $controller->registerAction('M', new MoveAction());
        $controller->registerAction('B', new TurnBackAction());
        $controller->registerAction('H', new AutopilotAction($this->home));
        $controller->registerAction('P', new AutopilotAction($this->placeOfResearch));
        $controller->registerAction('I', new AutopilotAction($this->placeOfResearch));
        return $controller;
    }
}