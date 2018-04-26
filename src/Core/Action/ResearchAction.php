<?php

namespace Mars\Core\Action;


use Mars\Core\ActionInterface;
use Mars\Core\RoverInterface;
use Mars\Core\Service\ResearchOfPlace;

/**
 * Class ResearchAction
 */
class ResearchAction implements ActionInterface
{
    /**
     * @var int
     */
    private $radios;

    /**
     * ResearchAction constructor.
     *
     * @param int $radios
     */
    public function __construct(int $radios)
    {
        $this->radios = $radios;
    }

    /**
     * @inheritdoc
     */
    function action(RoverInterface $rover): void
    {
       $researchOfPlace = new ResearchOfPlace($rover,$this->radios);
       $researchOfPlace->run();
    }
}