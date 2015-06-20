<?php

namespace Acme\Support\Doctrine;

use Acme\Support\Container\ServiceProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class DoctrineServiceProvider extends ServiceProvider
{
    /**
     * Register the services of this provider.
     *
     * @return void
     */
    public function register()
    {
        $this->container->singleton(EntityManagerInterface::class, [$this, 'make']);

        $this->container->alias('doctrine', EntityManagerInterface::class);
    }

    /**
     * The services of this provider.
     *
     * @return array
     */
    public function services()
    {
        return [
            EntityManagerInterface::class,
            'doctrine',
        ];
    }

    public function make()
    {
        $config = $this->container->get('config');

        $database = $config->get('database');

        $config = Setup::createXMLMetadataConfiguration($database['entities']);

        return EntityManager::create($database['connection'], $config);
    }
}
