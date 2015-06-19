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
        $this->singleton(Container::class, $this);
    }

    /**
     * Add a definition to the container.
     *
     * @param string $name
     * @param mixed $concrete
     * @return Container
     */
    public function add($name, $concrete)
    {
        if (is_callable($concrete)) {
            $concrete = call_user_func($concrete);
        }
        $this->container->add($name, $concrete, false);
        return $this;
    }

    /**
     * Get an item from the container.
     *
     * @param  string $name
     * @param  array $args
     * @return mixed
     */
    public function get($name, array $args = [])
    {
        return $this->container->get($name, $args);
    }

    /**
     * Add a singleton definition to the container.
     *
     * @param  string $name
     * @param  mixed $concrete
     * @return Container
     */
    public function singleton($name, $concrete = null)
    {
        if (is_callable($concrete)) {
            $concrete = call_user_func($concrete);
        }
        $this->container->singleton($name, $concrete);
        return $this;
    }

    /**
     * Allows for methods to be invoked on any object
     * that is resolved of the type provided.
     *
     * @param  string $type
     * @param callable $callback
     * @return Container
     */
    public function inflector($type, callable $callback)
    {
        $this->container->inflector($type, $callback);
        return $this;
    }

    /**
     * Invoke.
     *
     * @param  mixed $name
     * @param  array $args
     * @return mixed
     */
    public function call($name, array $args = [])
    {
        return $this->container->call($name, $args);
    }

    /**
     * Registers a service provider to the container.
     *
     * @param  string $provider
     * @return Container
     */
    public function register($provider)
    {
        $leagueProvider = new LeagueServiceProvider(new $provider, $this->container);
        $this->container->addServiceProvider($leagueProvider);
    }

    /**
     * Register an alias for a service.
     *
     * @param string $alias
     * @param string $name
     * @return Container
     */
    public function alias($alias, $name)
    {
        $this->container->add($alias, $this->container->get($name));
        return $this;
    }
}
