<?php
namespace Subtext\Autowiring;

use Psr\Container\ContainerInterface;
use Subtext\Autowiring\Animals\Butterfly;
use Subtext\Autowiring\Animals\Iguana;

/**
 * Class Application
 *
 * @package Subtext\Autowiring
 * @copyright Subtext Productions 2007-2018 All rights reserved
 * @license GPL-3.0-only or GPL-3.0-or-later
 */
class Application
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Application constructor
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function execute(): void
    {
        echo "<pre>";
        echo "Hello, Alonzo\n";
        $insect = $this->container->get(Butterfly::class);
        echo $insect->do();
        $lizard = $this->container->get(Iguana::class);
        echo $lizard->do();
        echo "</pre>";
    }
}
