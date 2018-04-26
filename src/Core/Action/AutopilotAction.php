<?php

namespace Mars\Core\Action;

use Mars\Core\ActionInterface;
use Mars\Core\LocationReadInterface;
use Mars\Core\RoverInterface;
use Mars\Core\Service\Autopilot;

/**
 * Class AutopilotAction
 */
class AutopilotAction implements ActionInterface
{
    /**
     * @var LocationReadInterface
     */
    private $locationRead;

    /**
     * AutopilotAction constructor.
     *
     * @param LocationReadInterface $locationRead
     */
    public function __construct(LocationReadInterface $locationRead)
    {
        $this->locationRead = $locationRead;
    }

    /**
     * @inheritdoc
     */
    function action(RoverInterface $rover): void
    {
        $autopilot = new Autopilot($rover, $this->locationRead);
        $autopilot->run();
    }

}