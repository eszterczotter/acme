<?php

namespace Acme\Support\Bus;

use Acme\Support\Container\Container;
use Acme\Support\Validation\Validator;
use League\Tactician\Middleware;

class CommandValidatorMiddleware implements Middleware
{
    use CommandTranslator;

    /**
     * @var Container
     */
    private $container;

    /**
     * CommandValidatorMiddleware constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }


    /**
     * @param object $command
     * @param callable $next
     *
     * @return mixed
     */
    public function execute($command, callable $next)
    {
        $class = get_class($command);

        $validator = $this->translate($class, 'Validator');

        if (class_exists($class)) {
            /** @var Validator $validator */
            $validator = $this->container->get($validator);

            $validator($command);
        }

        return $next($command);
    }
}
