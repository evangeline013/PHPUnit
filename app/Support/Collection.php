<?php
/**
 * Created by PhpStorm.
 * User: Evangeline
 * Date: 3/12/19
 * Time: 9:27 PM
 */

namespace App\Support;

class Collection implements \IteratorAggregate, \JsonSerializable
{
    protected $items = [];

    public function __construct(array $items = []) {
        $this->items = $items;
    }

    public function get() {
        return $this->items;
    }

    public function count() {
        return count($this->items);
    }

    public function add(array $items) {
        $this->items = array_merge($this->items, $items);
    }

    public function merge(Collection $collection) {
        $this->add($collection->get());
    }

    public function getIterator() {
        return new \ArrayIterator($this->items);
    }

    public function  toJson() {
        return json_encode($this->items);
    }

    public function jsonSerialize() {
        return $this->items;
    }
}