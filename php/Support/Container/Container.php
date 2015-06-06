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
}
