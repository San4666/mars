<?php

namespace Mars\Core\Service;


use Mars\Core\Entity\Location;
use Mars\Core\RoverInterface;

/**
 * Class ResearchOfPlace
 */
class ResearchOfPlace
{
    /**
     * @var RoverInterface
     */
    private $rover;
    /**
     * @var int
     */
    private $radios;

    /**
     * ResearchOfPlace constructor.
     * @param RoverInterface $rover
     * @param int $radios
     */
    public function __construct(RoverInterface $rover, int $radios)
    {
        $this->rover = $rover;
        $this->radios = $radios;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        foreach ($this->locations() as $location) {
            $autopilot = new Autopilot($this->rover, $location);
            $autopilot->run();
        }
    }

    /**
     * @return Location[]
     */
    private function locations(): array
    {
        return [
            new Location($this->rover->getX() - $this->radios, $this->rover->getY() - $this->radios),
            new Location($this->rover->getX() + $this->radios, $this->rover->getY() + $this->radios),
            new Location($this->rover->getX() - $this->radios, $this->rover->getY() + $this->radios),
            new Location($this->rover->getX() + $this->radios, $this->rover->getY() - $this->radios),
        ];
    }


}