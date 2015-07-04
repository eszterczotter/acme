<?php

namespace Acme\Support\Collection;

use Closure;
use Doctrine\Common\Collections\Collection as DoctrineCollection;

class ArrayCollection implements Collection, DoctrineCollection
{
    /**
     * The items in the collection.
     *
     * @var array
     */
    private $items;

    /**
     * Create a new instance.
     *
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Adds an item at the end of the collection.
     *
     * @param mixed $item The item to add.
     *
     * @return self
     */
    public function add($item)
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * Clears the collection, removing all items.
     *
     * @return self
     */
    public function clear()
    {
        $this->items = [];
        return $this;
    }

    /**
     * Checks whether an item is contained in the collection.
     *
     * @param mixed $item The item to search for.
     *
     * @return boolean
     */
    public function contains($item)
    {
        return in_array($item, $this->items, true);
    }

    /**
     * Checks whether the collection is empty (contains no items).
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return ! $this->count();
    }

    /**
     * Removes the item at the specified index from the collection.
     *
     * @param string|integer $key The kex/index of the element to remove.
     *
     * @return mixed|null
     */
    public function remove($key)
    {
        if (! $this->containsKey($key)) {
            return null;
        }

        $item = $this->items[$key];
        unset($this->items[$key]);
        return $item;
    }

    /**
     * @inheritdoc
     */
    public function removeElement($element)
    {
        $key = $this->indexOf($element);

        return ! is_null($this->remove($key));
    }

    /**
     * @inheritdoc
     */
    public function containsKey($key)
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * Gets the element at the specified key/index.
     *
     * @param string|integer $key The key/index of the element to retrieve.
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->items[$key];
    }

    /**
     * Gets all keys/indices of the collection.
     *
     * @return array The keys/indices of the collection, in the order of the corresponding
     *               elements in the collection.
     */
    public function getKeys()
    {
        return array_keys($this->items);
    }

    /**
     * Gets all values of the collection.
     *
     * @return array The values of all elements in the collection, in the order they
     *               appear in the collection.
     */
    public function getValues()
    {
        return array_values($this->items);
    }

    /**
     * Sets an item in the collection at the specified key/index.
     *
     * @param string|integer $key The key/index of the element to set.
     * @param mixed $item The element to set.
     *
     * @return self
     */
    public function set($key, $item)
    {
        $this->items[$key] = $item;
        return $this;
    }

    /**
     * Gets a native PHP array representation of the collection.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->items;
    }

    /**
     * Sets the internal iterator to the first element in the collection and returns this element.
     *
     * @return mixed
     */
    public function first()
    {
        return reset($this->items);
    }

    /**
     * Sets the internal iterator to the last element in the collection and returns this element.
     *
     * @return mixed
     */
    public function last()
    {
        return end($this->items);
    }

    /**
     * Gets the key/index of the element at the current iterator position.
     *
     * @return int|string
     */
    public function key()
    {
        return key($this->items);
    }

    /**
     * Gets the element of the collection at the current iterator position.
     *
     * @return mixed
     */
    public function current()
    {
        return current($this->items);
    }

    /**
     * Moves the internal iterator position to the next element and returns this element.
     *
     * @return mixed
     */
    public function next()
    {
        return next($this->items);
    }

    /**
     * Tests for the existence of an item that satisfies the given predicate.
     *
     * @param Closure $predicate.
     *
     * @return boolean
     */
    public function exists(Closure $predicate)
    {
        return array_reduce($this->items, function ($exists, $item) use ($predicate) {
            return $exists || $predicate($item);
        }, false);
    }

    /**
     * Returns all the elements of this collection that satisfy the predicate.
     *
     * @param Closure $predicate
     *
     * @return ArrayCollection
     */
    public function filter(Closure $predicate)
    {
        return new static(array_filter($this->items, $predicate));
    }

    /**
     * Tests whether the given predicate p holds for all elements of this collection.
     *
     * @param Closure $predicate The predicate.
     *
     * @return boolean
     */
    public function forAll(Closure $predicate)
    {
        return array_reduce($this->items, function ($all, $item) use ($predicate) {
            return $all && $predicate($item);
        }, true);
    }

    /**
     * Returns a new collection with the items returned by the map.
     *
     * @param Closure $map
     *
     * @return ArrayCollection
     */
    public function map(Closure $map)
    {
        return new static(array_map($map, $this->items));
    }

    /**
     * Partitions this collection in two collections according to a predicate.
     *
     * @param Closure $predicate
     *
     * @return array
     */
    public function partition(Closure $predicate)
    {
        /** @var ArrayCollection[] $partition */
        $partition = [new static(), new static()];

        foreach ($this->items as $key => $item) {
            $partition[(int) $predicate($item)]->set($key, $item);
        }

        return $partition;
    }

    /**
     * @inheritdoc
     */
    public function indexOf($item)
    {
        return array_search($item, $this->items, true);
    }

    /**
     * Extracts a sliced collection.
     *
     * @param int $offset
     * @param int|null $length
     *
     * @return ArrayCollection
     */
    public function slice($offset, $length = null)
    {
        return new static(array_slice($this->items, $offset, $length, true));
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    /**
     * @inheritdoc
     */
    public function offsetExists($offset)
    {
        return $this->containsKey($offset);
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
        if (! isset($offset)) {
            $this->add($value);
        }
        $this->set($offset, $value);
    }

    /**
     * @inheritdoc
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }

    /**
     * Count elements of an object
     *
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }
}
