<?php

namespace Acme\Support\Config;

interface Config
{
    /**
     * Get configuration.
     *
     * @param string $config
     * @return mixed
     */
    public function get($config);

    /**
     * Set configuration.
     *
     * @param string $config
     * @param mixed $value
     * @return mixed
     */
    public function set($config, $value);
}
