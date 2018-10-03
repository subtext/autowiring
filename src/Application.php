<?php
namespace Subtext\Autowiring;

use Psr\Container\ContainerInterface;
use Subtext\Autowiring\Animals\Butterfly;
use Subtext\Autowiring\Animals\Iguana;

/**
 * Class Application
 *
 * @package Subtext\Autowiring
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
        echo "Hello, Alonzo";
        echo "<br>";
        $insect = $this->container->get(Butterfly::class);
        echo $insect->do();
        $lizard = $this->container->get(Iguana::class);
        echo $lizard->do();
    }
}
