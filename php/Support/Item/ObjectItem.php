<?php

namespace Acme\Support\Item;

use Doctrine\Common\Util\Inflector;

class ObjectItem implements Item
{
    /**
     * The item instance.
     *
     * @var object
     */
    private $item;

    /**
     * Create a new instance.
     *
     * @param object $item
     */
    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Checks if the item has a property.
     *
     * @param $property
     * @return bool
     */
    public function has($property)
    {
        return property_exists($this->item, $property)
            || method_exists($this->item, $this->getterName($property))
            || method_exists($this->item, $this->setterName($property));
    }

    /**
     * @inheritdoc
     */
    public function get($property)
    {
        if (property_exists($this->item, $property)) {
            return $this->item->{$property};
        }

        $getter = $this->getterName($property);

        if (method_exists($this->item, $getter)) {
            return $this->item->{$getter}();
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function set($property, $value)
    {
        if (property_exists($this->item, $property)) {
            $this->item->{$property} = $value;
        }

        $setter = $this->setterName($property);

        if (method_exists($this->item, $setter)) {
            $this->item->{$setter}($value);
        }

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    /**
     * @inheritdoc
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * @inheritdoc
     */
    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    /**
     * @inheritdoc
     */
    public function offsetUnset($offset)
    {
        // do nothing.
    }

    /**
     * Get the inflected property name.
     *
     * @param $property
     * @return string
     */
    private function inflectProperty($property)
    {
        return Inflector::classify($property);
    }

    /**
     * Get the name of the property getter.
     *
     * @param $property
     * @return string
     */
    private function getterName($property)
    {
        return 'get' . $this->inflectProperty($property);
    }

    /**
     * Get the name of the property setter.
     *
     * @param $property
     * @return string
     */
    private function setterName($property)
    {
        return 'set' . Inflector::classify($property);
    }
}
