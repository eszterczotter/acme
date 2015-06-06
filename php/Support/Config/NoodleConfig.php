<?php

namespace Acme\Support\Config;

use Noodlehaus\Config as Noodle;

class NoodleConfig implements Config
{
    private $noodle;

    /**
     * NoodleConfig constructor.
     *
     * @param string $directory
     */
    public function __construct($directory)
    {
        $this->noodle = new Noodle($directory);
    }

    /**
     * Get configuration.
     *
     * @param string $config
     * @return mixed
     */
    public function get($config)
    {
        return $this->noodle->get($config);
    }

    /**
     * Set configuration.
     *
     * @param string $config
     * @param mixed $value
     * @return mixed
     */
    public function set($config, $value)
    {
        $this->noodle->set($config, $value);
    }
}
