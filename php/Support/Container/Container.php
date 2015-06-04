<?php

namespace Acme\Support\Container;

class Container implements \Acme\Support\Contract\Container
{

    private static $instance;
    /**
     * @var \League\Container\ContainerInterface
     */
    private $container;

    /**
     * Container constructor.
     */
    private function __construct(\League\Container\ContainerInterface $container)
    {
        $this->container = $container;
    }

    public static function instance()
    {
        if (!static::$instance) {
            static::$instance = new static(new \League\Container\Container());
        }

        static::$instance->singleton('container', static::$instance);

        return static::$instance;
    }



    /**
     * Add a definition to the container
     *
     * @param string $alias
     * @param mixed $concrete
     * @param boolean $singleton
     * @return \League\Container\Definition\DefinitionInterface|\League\Container\ContainerInterface
     */
    public function add($alias, $concrete = null, $singleton = false)
    {
        // TODO: Implement add() method.
    }

    /**
     * Adds a service provider to the container
     *
     * @param  string|\League\Container\ServiceProvider $provider
     * @return \League\Container\ContainerInterface
     */
    public function addServiceProvider($provider)
    {
        // TODO: Implement addServiceProvider() method.
    }

    /**
     * Add a singleton definition to the container
     *
     * @param  string $alias
     * @param  mixed $concrete
     * @return \League\Container\Definition\DefinitionInterface|\League\Container\ContainerInterface
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
        // TODO: Implement inflector() method.
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
        // TODO: Implement invokable() method.
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
        // TODO: Implement extend() method.
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
        // TODO: Implement call() method.
    }

    /**
     * Check if an item is registered with the container
     *
     * @param  string $alias
     * @return boolean
     */
    public function isRegistered($alias)
    {
        // TODO: Implement isRegistered() method.
    }

    /**
     * Check if an item is being managed as a singleton
     *
     * @param  string $alias
     * @return boolean
     */
    public function isSingleton($alias)
    {
        // TODO: Implement isSingleton() method.
    }

    /**
     * Determines if a definition is registered via a service provider.
     *
     * @param  string $alias
     * @return boolean
     */
    public function isInServiceProvider($alias)
    {
        // TODO: Implement isInServiceProvider() method.
    }
}
