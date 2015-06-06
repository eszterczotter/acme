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
     * @param string $name
     * @param mixed $concrete
     * @return Container
     */
    abstract public function add($name, $concrete);

    /**
     * Get an item from the container.
     *
     * @param  string $name
     * @param  array $args
     * @return mixed
     */
    abstract public function get($name, array $args = []);

    /**
     * Add a singleton definition to the container.
     *
     * @param  string $name
     * @param  mixed $concrete
     * @return Container
     */
    abstract public function singleton($name, $concrete = null);

    /**
     * Allows for methods to be invoked on any object
     * that is resolved of the type provided.
     *
     * @param  string $type
     * @param  callable $callback
     * @return Container
     */
    abstract public function inflector($type, callable $callback);

    /**
     * Invoke.
     *
     * @param  mixed $name
     * @param  array $args
     * @return mixed
     */
    abstract public function call($name, array $args = []);

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
