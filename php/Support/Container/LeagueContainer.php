<?php

namespace Acme\Support\Container;

use League\Container\Container as LContainer;
use League\Container\ContainerInterface;

class LeagueContainer extends Container
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Container constructor.
     */
    public function __construct()
    {
        $this->container = new LContainer();
        $this->singleton('container', $this);
    }

    /**
     * Add a definition to the container
     *
     * @param string $alias
     * @param mixed $concrete
     * @param boolean $singleton
     * @return Container
     */
    public function add($alias, $concrete = null, $singleton = false)
    {
        $this->container->add($alias, $concrete, $singleton);
        return $this;
    }

    /**
     * Adds a service provider to the container
     *
     * @param  string|\League\Container\ServiceProvider $provider
     * @return ContainerInterface
     */
    public function addServiceProvider($provider)
    {
        return $this->container->addServiceProvider($provider);
    }

    /**
     * Add a singleton definition to the container
     *
     * @param  string $alias
     * @param  mixed $concrete
     * @return \League\Container\Definition\DefinitionInterface|ContainerInterface
     */
    public function singleton($alias, $concrete = null)
    {
        return $this->container->singleton($alias, $concrete);
    }

    /**
     * Allows for methods to be invoked on any object that is resolved of the tyoe
     * provided
     *
     * @param  string $type
     * @param  callable $callback
     * @return \League\Container\Inflector|void
     */
    public function inflector($type, callable $callback = null)
    {
        return $this->container->inflector($type, $callback);
    }

    /**
     * Add a callable definition to the container
     *
     * @param  string $alias
     * @param  callable $concrete
     * @return \League\Container\Definition\DefinitionInterface
     */
    public function invokable($alias, callable $concrete = null)
    {
        return $this->container->invokable($alias, $concrete);
    }

    /**
     * Modify the definition of an already defined service
     *
     * @param   string $alias
     * @throws  \InvalidArgumentException if the definition does not exist
     * @throws  \League\Container\Exception\ServiceNotExtendableException if service cannot be extended
     * @return  \League\Container\Definition\DefinitionInterface
     */
    public function extend($alias)
    {
        return $this->container->extend($alias);
    }

    /**
     * Get an item from the container
     *
     * @param  string $alias
     * @param  array $args
     * @return mixed
     */
    public function get($alias, array $args = [])
    {
        return $this->container->get($alias, $args);
    }

    /**
     * Invoke
     *
     * @param  string $alias
     * @param  array $args
     * @return mixed
     */
    public function call($alias, array $args = [])
    {
        return $this->container->call($alias, $args);
    }

    /**
     * Check if an item is registered with the container
     *
     * @param  string $alias
     * @return boolean
     */
    public function isRegistered($alias)
    {
        return $this->container->isRegistered($alias);
    }

    /**
     * Check if an item is being managed as a singleton
     *
     * @param  string $alias
     * @return boolean
     */
    public function isSingleton($alias)
    {
        return $this->container->isSingleton($alias);
    }

    /**
     * Determines if a definition is registered via a service provider.
     *
     * @param  string $alias
     * @return boolean
     */
    public function isInServiceProvider($alias)
    {
        return $this->container->isInServiceProvider($alias);
    }
}
