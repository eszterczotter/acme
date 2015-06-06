<?php

namespace Acme\Support\Container;

abstract class Container
{
    protected static $instance;

    /**
     * Return the concrete container.
     *
     * @return Container
     */
    public static function instance()
    {
        if (!static::$instance) {
            static::$instance = new LeagueContainer();
        }

        return static::$instance;
    }

    /**
     * Add a definition to the container
     *
     * @param string $alias
     * @param mixed $concrete
     * @param boolean $singleton
     * @return Container
     */
    abstract public function add($alias, $concrete = null, $singleton = false);

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
     * @param  callable $callback
     * @return Container
     */
    abstract public function inflector($type, callable $callback = null);

    /**
     * Invoke.
     *
     * @param  mixed $alias
     * @param  array $args
     * @return mixed
     */
    abstract public function call($alias, array $args = []);

    /**
     * Check if an item is registered in the container.
     *
     * @param  string $alias
     * @return boolean
     */
    abstract public function exists($alias);
}
