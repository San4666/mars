<?php

namespace Mars\Core\Entity;


use Mars\Core\LocationReadInterface;

class Location implements LocationReadInterface
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
     * Location constructor.
     *
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y)
    {

        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @inheritdoc
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }
}