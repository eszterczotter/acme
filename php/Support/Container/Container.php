<?php

namespace Acme\Support\Container;

abstract class Container
{
    /**
     * Return the concrete container.
     *
     * @return Container
     */
    public static function instance()
    {
        return LeagueContainer::instance();
    }
}
