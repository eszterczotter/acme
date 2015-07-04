<?php

namespace unit\Acme\Support\Collection;

use Acme\Support\Collection\ArrayCollection;
use Acme\Support\Collection\Collection;
use Doctrine\Common\Collections\Collection as DoctrineCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use stdClass;

class ArrayCollectionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DoctrineCollection::class);
        $this->shouldHaveType(Collection::class);
    }

    function it_is_empty_at_first()
    {
        $this->isEmpty()->shouldBe(true);
    }

    function it_counts_zero_items_if_empty()
    {
        $this->count()->shouldBe(0);
    }

    function it_doesnt_contain_anything_if_empty(stdClass $item)
    {
        $this->contains($item)->shouldBe(false);
    }

    function it_adds_an_item_fluently(stdClass $item)
    {
        $this->add($item)->shouldReturn($this);
    }

    function it_counts_the_items()
    {
        $count = rand(1,10);
        $items = array_fill(0, $count, null);
        $this->beConstructedWith($items);
        $this->count()->shouldBe($count);
    }

    function it_it_adds_an_item(stdClass $item)
    {
        $this->add($item);
        $this->contains($item)->shouldBe(true);
    }

    function it_is_not_empty_after_an_item_was_added(stdClass $item)
    {
        $this->add($item);
        $this->isEmpty()->shouldBe(false);
    }

    function it_clears_the_collection_fluently()
    {
        $count = rand(1,10);
        $items = array_fill(0, $count, null);
        $this->beConstructedWith($items);
        $this->clear()->shouldReturn($this);
        $this->count()->shouldBe(0);
    }

    function it_contains_no_key_at_start()
    {
        $this->containsKey('key')->shouldBe(false);
    }

    function it_contains_keys_of_items(stdClass $item)
    {
        $this->beConstructedWith(['key' => $item]);
        $this->containsKey('key')->shouldBe(true);
    }

    function it_removes_nothing_if_key_is_missing()
    {
        $this->remove('key')->shouldReturn(null);
    }

    function it_removes_by_key_items_contained(stdClass $item)
    {
        $this->beConstructedWith(['key' => $item]);
        $this->remove('key')->shouldReturn($item);
        $this->contains($item)->shouldBe(false);
    }

    function it_returns_false_as_key_if_item_is_missing(stdClass $item)
    {
        $this->indexOf($item)->shouldBe(false);
    }

    function it_gets_the_key_of_an_item(stdClass $item)
    {
        $this->beConstructedWith(['key' => $item]);
        $this->indexOf($item)->shouldBe('key');
    }

    function it_removes_items(stdClass $item)
    {
        $this->beConstructedWith([$item]);
        $this->removeElement($item)->shouldBe(true);
        $this->contains($item)->shouldBe(false);
    }

    function it_sets_item_at_key_fluently(stdClass $item)
    {
        $this->set('key', $item)->shouldReturn($this);
    }

    function it_contains_the_set_item(stdClass $item)
    {
        $this->set('key', $item);
        $this->contains($item)->shouldBe(true);
    }

    function it_gets_the_set_items(stdClass $item)
    {
        $this->set('key', $item);
        $this->get('key')->shouldBe($item);
    }

    function it_overrides_the_set_item(stdClass $item, stdClass $override)
    {
        $this->set('key', $item);
        $this->set('key', $override);
        $this->get('key')->shouldBe($override);
    }

    function it_gets_the_keys(stdClass $item)
    {
        $this->beConstructedWith(['a' => $item, 'b' => $item]);
        $this->getKeys()->shouldBe(['a', 'b']);
    }

    function it_gets_the_values(stdClass $item)
    {
        $this->beConstructedWith(['a' => $item, 'b' => $item]);
        $this->getValues()->shouldBe([$item, $item]);
    }

    function it_casts_to_empty_array_at_first()
    {
        $this->toArray()->shouldBe([]);
    }

    function it_casts_itself_to_plain_array(stdClass $item)
    {
        $items = [$item, $item];
        $this->beConstructedWith($items);
        $this->toArray()->shouldBe($items);
    }

    function it_gets_the_first()
    {
        $this->beConstructedWith([1,2,3,4,5]);
        $this->first()->shouldBe(1);
    }

    function it_gets_the_last()
    {
        $this->beConstructedWith([1,2,3,4,5]);
        $this->last()->shouldBe(5);
    }

    function it_returns_the_current_key()
    {
        $this->beConstructedWith([1,2,3,4,5]);
        $this->key()->shouldBe(0);
    }

    function it_returns_the_current_item()
    {
        $this->beConstructedWith([1,2,3,4,5]);
        $this->current()->shouldBe(1);
    }

    function it_returns_the_next_item()
    {
        $this->beConstructedWith([1,2,3,4,5]);
        $this->next()->shouldBe(2);
    }

    function its_items_do_not_exists_when_empty()
    {
        $this->exists(function(){return true;})->shouldReturn(false);
    }

    function it_exists_if_callback_returns_true_for_any_item()
    {
        $this->beConstructedWith([1,2,3,4,5]);
        $this->exists(function($item){return $item == 4;})->shouldReturn(true);
    }

    function it_does_not_exist_if_callback_returns_false_for_all_items()
    {
        $this->beConstructedWith([1,2,3,4,5]);
        $this->exists(function($item){return false;})->shouldReturn(false);
    }

    function its_for_all_when_empty()
    {
        $this->forAll(function(){return false;})->shouldReturn(true);
    }

    function its_for_all_if_callback_returns_true_for_all_items()
    {
        $this->beConstructedWith([1,2,3,4,5]);
        $this->forAll(function($item){return true;})->shouldReturn(true);
    }

    function its_not_for_all_if_callback_returns_false_for_any_item()
    {
        $this->beConstructedWith([1,2,3,4,5]);
        $this->forAll(function($item){return $item != 3;})->shouldReturn(false);
    }

    function it_filters_the_items()
    {
        $this->beConstructedWith([1,2,3,4,5]);
        $filtered = $this->filter(function($item){return $item % 2 == 0;});
        $filtered->shouldNotBe($this);
        $filtered->shouldHaveType(ArrayCollection::class);
        $filtered->count()->shouldBe(2);
        $filtered->forAll(function($item){return in_array($item, [2,4]);})->shouldReturn(true);
    }

    function it_maps_the_items()
    {
        $this->beConstructedWith([1,2,3,4,5]);
        $mapped = $this->map(function($item){return 2*$item;});
        $mapped->shouldNotBe($this);
        $mapped->shouldHaveType(ArrayCollection::class);
        $mapped->forAll(function($item){return in_array($item, [2,4,6,8,10]);})->shouldReturn(true);
    }
}
