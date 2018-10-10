<?php
namespace Subtext\Autowiring\Animals;

use Subtext\Autowiring\Colors\Blue;
use Subtext\Autowiring\Colors\Green;
use Subtext\Autowiring\Colors\Purple;

/**
 * Class Butterfly
 *
 * @package Subtext\Autowiring\Animals
 */
class Butterfly
{
    private $colors;

    public function __construct(Blue $blue, Green $green, Purple $purple)
    {
        $this->colors = [$blue, $green, $purple];
    }

    public function do(): string
    {
        $output = '';
        foreach ($this->colors as $color) {
            $output .= "\n" . $color->getColor();
        }
        return $output;
    }
}