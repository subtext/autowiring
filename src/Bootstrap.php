<?php
namespace Subtext\Autowiring;

use Psr\Container\ContainerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class Bootstrap
 *
 * @package Subtext\Autowiring
 * @copyright Subtext Productions 2007-2018 All rights reserved
 * @license GPL-3.0-only or GPL-3.0-or-later
 */
class Bootstrap
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var Application
     */
    private $application;

    /**
     * @var string The root path to the project
     */
    private $rootPath;

    /**
     * Bootstrap constructor
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->rootPath = $path;
    }

    /**
     * @return ContainerInterface
     * @throws \Exception
     */
    public function getContainer(): ContainerInterface
    {
        if (!$this->container instanceof ContainerInterface) {
            $builder = new ContainerBuilder();
            $loader = new YamlFileLoader(
                $builder,
                new FileLocator($this->rootPath)
            );
            $loader->load('config/services.yml');
            $builder->setParameter('root_path', $this->rootPath);
            $builder->compile();
            $this->container = $builder->get('service_container');
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