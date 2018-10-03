<?php
namespace Subtext\Autowiring;

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

/**
 * Class Bootstrap
 *
 * @package Subtext\Autowiring
 */
class Bootstrap
{
    private $container;

    private $application;

    public function __construct()
    {

    }

    /**
     * @return ContainerInterface
     * @throws \Exception
     */
    public function getContainer(): ContainerInterface
    {
        if (!$this->container instanceof ContainerInterface) {
            $builder = new ContainerBuilder();
            $builder->addDefinitions();
            $this->container = $builder->build();
        }

        return $this->container;
    }

    /**
     * @return Application
     * @throws \Exception
     */
    public function getApplication(): Application
    {
        if (!$this->application instanceof Application) {
            $container = $this->getContainer();
            $this->application = $container->get(Application::class);
        }
        return $this->application;
    }
}