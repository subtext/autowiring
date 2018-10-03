<?php
namespace Subtext\Autowiring\Animals;

use Subtext\Autowiring\Colors\Red;
use Subtext\Autowiring\Colors\Yellow;
use Subtext\Autowiring\Shapes\Circle;

class Iguana
{
    private $shapes;
    private $colors;
    private $tiger;
    public function __construct(Circle $circle, Red $red, Yellow $yellow, Tiger $tiger)
    {
        $this->shapes = $circle;
        $this->colors = [$red, $yellow];
        $this->tiger = $tiger;
    }

    public function do(): void
    {
        foreach ($this->colors as $color) {
            echo $color->getColor();
        }
        echo $this->shapes->do();
        echo $this->tiger->do();
    }
}