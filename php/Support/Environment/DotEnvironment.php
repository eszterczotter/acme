<?php

namespace Acme\Support\Environment;

use Dotenv\Dotenv;

class DotEnvironment implements Environment
{
    /**
     * The Dotenv instance.
     *
     * @var Dotenv
     */
    private $env;

    /**
     * Create a new Environment.
     *
     * @param Dotenv $env
     */
    public function __construct(Dotenv $env)
    {
        $this->env = $env;
    }

    public function load()
    {
        $this->env->load();
    }

    public function overload()
    {
        $this->env->overload();
    }

    public function required($variable, array $options = null)
    {
        $validator = $this->env->required($variable);

        if (is_array($options)) {
            $validator->allowedValues($options);
        }
    }

    public function get($variable)
    {
        return getenv($variable);
    }
}
