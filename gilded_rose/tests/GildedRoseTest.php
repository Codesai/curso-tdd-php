<?php

namespace tests;

use Codesai\TDD\GildedRose\GildedRose;
use Codesai\TDD\GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{

    /** @test */
    public function should_change_me() {
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertSame('fixme', $items[0]->name);
    }
}