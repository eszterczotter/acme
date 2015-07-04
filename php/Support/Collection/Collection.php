<?php

namespace Acme\Support\Collection;

use ArrayAccess;
use Countable;
use IteratorAggregate;

interface Collection extends Countable, ArrayAccess, IteratorAggregate
{

}
