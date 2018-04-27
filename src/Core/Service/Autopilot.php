<?php

namespace Mars\Core\Service;


use Mars\Core\Entity\Direction;
use Mars\Core\LocationReadInterface;
use Mars\Core\RoverInterface;

/**
 * Class autopilot
 *
 * @package Mars\Core\services
 */
class Autopilot
{
    /**
     * @var RoverInterface
     */
    private $rover;
    /**
     * @var LocationReadInterface
     */
    private $locationRead;

    /**
     * RoverManager constructor.
     *
     * @param RoverInterface $rover
     * @param LocationReadInterface $locationRead
     */
    public function __construct(RoverInterface $rover, LocationReadInterface $locationRead)
    {
        $this->rover = $rover;
        $this->locationRead = $locationRead;
    }

    /**
     * @return void
     */
    public function run() : void
    {
        $this->setY();
        $this->setX();
    }

    /**
     * @return void
     */
    private function setDirection(string $direction): void
    {
        while (true) {
            $this->rover->right();
            if($this->rover->getDirection() == $direction) {
                break;
            }
        }
    }

    /**
     * @return void
     */
    private function setX() : void
    {
        $diffX = $this->rover->getX() - $this->locationRead->getX();
        $steps = abs($diffX);

        if ($diffX < 0) {
            $this->move(Direction::EAST, $steps);
        } else {
            $this->move(Direction::WEST, $steps);
        }


    }

    /**
     * @return void
     */
    private function setY(): void
    {
        $diffY = $this->rover->getY() - $this->locationRead->getY();
        $stepsY = abs($diffY);

        if ($diffY < 0) {
            $this->move(Direction::NORTH, $stepsY);
        } else {
            $this->move(Direction::SOUTH, $stepsY);
        }
    }

    /**
     * @param $direction
     * @param $steps
     *
     * @return void
     */
    private function move($direction, $steps) : void
    {
        $this->setDirection($direction);
        while ($steps > 0) {
            $this->rover->move();
            $steps--;
        }
    }


}