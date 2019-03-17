<?php
/**
 * Created by PhpStorm.
 * User: Evangeline
 * Date: 3/12/19
 * Time: 9:25 PM
 */

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function test_empty_instantiated_collection_returns_no_items() {
        $collection = new \App\Support\Collection();

        $this->assertEmpty($collection->get());
    }

    public function test_count_is_correct_for_items_passed_in() {
        $collection = new \App\Support\Collection(['one', 'two', 'three']);

        $this->assertEquals(3, $collection->count());
    }

    public function test_items_returns_matched_items_passed_in() {
        $collection = new \App\Support\Collection(['one', 'two']);

        $this->assertEquals(2, $collection->count());
        $this->assertEquals('one', $collection->get()[0]);
        $this->assertEquals('two', $collection->get()[1]);
    }

    public function test_collection_is_instance_of_iterator_aggregate() {
        $collection = new \App\Support\Collection();

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    public function test_collection_can_be_iterated() {
        $collection = new \App\Support\Collection([
            'one', 'two', 'three'
        ]);

        $items = [];

        foreach($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    public function test_collection_can_be_merged_with_another_collection() {
        $collection1 = new \App\Support\Collection(['one', 'two']);
        $collection2 = new \App\Support\Collection(['three', 'four', 'five']);

        $collection1->merge($collection2);

        $this->assertCount(5, $collection1->get());
        $this->assertEquals(5, $collection1->count());
    }

    public function test_can_add_to_existing_collection() {
        $collection = new \App\Support\Collection(['one', 'two']);
        $collection->add(['three']);

        $this->assertCount(3, $collection->get());
        $this->assertEquals(3, $collection->count());
    }

    public function test_return_json_encoded_items() {
        $collection = new \App\Support\Collection([
            ['username' => 'alex'],
            ['username' => 'billy']
        ]);

        $this->assertInternalType('string', $collection->toJson());
        $this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $collection->toJson());
    }

    public function test_json_encoding_a_collection_object_returns_json() {
        $collection = new \App\Support\Collection([
            ['username' => 'alex'],
            ['username' => 'billy']
        ]);

        $encoded = json_encode($collection);
        $this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $encoded);
    }
}