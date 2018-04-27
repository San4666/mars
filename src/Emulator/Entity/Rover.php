<?php

namespace Mars\Emulator\Entity;

use Mars\Core\Entity\Direction;
use Mars\Core\RoverInterface;

/**
 * Class Rover of Naso
 */
class Rover implements RoverInterface
{

    /**
     * @var int
     */
    private $x;
    /**
     * @var int
     */
    private $y;
    /**
     * @var string
     */
    private $direction;

    /**
     * Rover constructor.
     */
    public function __construct(int $x, int $y, string $direction)
    {
        $this->x = $x;
        $this->y = $y;
        $this->direction = $direction;
    }


    /**
     * @inheritdoc
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * Gets x of a robot
     *
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * Gets y of a robot
     *
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * Turns left the rover
     *
     * @return void
     */
    public function left(): void
    {
        $this->direction = $this->mapTurnLeft()[$this->direction];
    }

    /**
     * @inheritdoc
     */
    public function right(): void
    {
        $this->direction = $this->mapTurnRight()[$this->direction];
    }

    /**
     * @inheritdoc
     */
    public function __toString(): string
    {
        return $this->x . ' ' . $this->y . ' ' . $this->direction;
    }

    /**
     * Moves forward the rover
     *
     * @return void
     */
    public function move(): void
    {
        switch ($this->direction) {
            case (Direction::NORTH) :
                $this->y++;
                break;
            case (Direction::EAST) :
                $this->x++;
                break;
            case (Direction::SOUTH) :
                $this->y--;
                break;
            case (Direction::WEST) :
                $this->x--;
                break;
        }
    }

    /**
     * @return array
     */
    private function mapTurnRight(): array
    {
        return [
            Direction::NORTH => Direction::EAST,
            Direction::EAST => Direction::SOUTH,
            Direction::SOUTH => Direction::WEST,
            Direction::WEST => Direction::NORTH
        ];
    }

    /**
     * @return array
     */
    private function mapTurnLeft(): array
    {
        return array_flip($this->mapTurnRight());
    }
}