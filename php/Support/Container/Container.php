<?php

namespace Acme\Support\Container;

abstract class Container
{
    private static $instance;

    /**
     * Return the concrete container.
     *
     * @return Container
     */
    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new LeagueContainer();
        }

        return self::$instance;
    }

    /**
     * Add a definition to the container
     *
     * @param string $alias
     * @param mixed $concrete
     * @return Container
     */
    abstract public function add($alias, $concrete);

    /**
     * Get an item from the container.
     *
     * @param  string $alias
     * @param  array $args
     * @return mixed
     */
    abstract public function get($alias, array $args = []);

    /**
     * Add a singleton definition to the container.
     *
     * @param  string $alias
     * @param  mixed $concrete
     * @return Container
     */
    abstract public function singleton($alias, $concrete = null);

    /**
     * Allows for methods to be invoked on any object
     * that is resolved of the type provided.
     *
     * @param  string $type
     * @param \Closure $callback
     * @return Container
     */
    abstract public function inflector($type, \Closure $callback);

    /**
     * Invoke.
     *
     * @param  mixed $alias
     * @param  array $args
     * @return mixed
     */
    abstract public function call($alias, array $args = []);

    /**
     * Registers a service provider to the container.
     *
     * @param  string $provider
     * @return Container
     */

    abstract public function register($provider);

    /**
     * Register an alias for a service.
     *
     * @param string $alias
     * @param string $name
     * @return Container
     */
    abstract public function alias($alias, $name);
}
