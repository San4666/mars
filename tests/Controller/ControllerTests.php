<?php

namespace Mars\Tests\Controller;

use Mars\Core\Controller\Controller;
use Mars\Core\Entity\Location;
use Mars\Core\Enum\Direction;
use Mars\Core\Factory\ControllerFactory;
use Mars\Emulator\Entity\Rover;
use Mars\Exception\NotFoundActionException;
use PHPUnit\Framework\TestCase;

/**
 * Class ControllerTests
 */
class ControllerTests extends TestCase
{
    /**
     * @var Controller
     */
    private $controller;
    /**
     * @var Location
     */
    private $home;

    /**
     * @var Location
     */
    private $placeOfResearch;

    public function setUp()
    {
        $this->home = new Location(100, 100);
        $this->placeOfResearch = new Location(-10, -20);
        $factory = (new  ControllerFactory($this->home, $this->placeOfResearch, 10));
        $this->controller = $factory->factory();
        parent::setUp();
    }

    /**
     * @param int $x
     * @param int $y
     * @param string $direction
     * @param string $command
     * @param $expected
     *
     * @throws NotFoundActionException
     *
     * @dataProvider dataExecute
     */

    public function testExecute(int $x, int $y, string $direction, string $command, $expected)
    {
        $rover = new Rover($x, $y, $direction);
        $this->controller->execute($rover, $command);
        $this->assertEquals($expected, (string)$rover);
    }

    public function dataExecute(): array
    {
        return [
            [1, 2, Direction::NORTH, 'LMLMLMLMM', '1 3 N'],
            [3, 3, Direction::EAST, 'MMRMMRMRRM', '5 1 E'],
        ];
    }

    /**
     * @throws NotFoundActionException
     */
    public function testMission()
    {
        $rover = new Rover(0, 0, Direction::NORTH);

        $this->controller->execute($rover, 'H');//to home
        $this->assertEquals($rover->getX(), $this->home->getX());
        $this->assertEquals($rover->getY(), $this->home->getY());

        $this->controller->execute($rover, 'P');//to place of Research
        $this->assertEquals($rover->getX(), $this->placeOfResearch->getX());
        $this->assertEquals($rover->getY(), $this->placeOfResearch->getY());

        $this->controller->execute($rover, 'I');// start research

        $this->controller->execute($rover, 'H');// to home
    }
}