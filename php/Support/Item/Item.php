<?php

namespace Acme\Support\Item;

interface Item extends \ArrayAccess
{
    /**
     * Checks if the item has a property.
     *
     * @param $property
     * @return bool
     */
    public function has($property);

    /**
     * Get the property value of the item.
     *
     * @param $property
     * @return mixed
     */
    public function get($property);

    /**
     * Set the property value of the item.
     *
     * @param $property
     * @param $value
     * @return self
     */
    public function set($property, $value);
}
