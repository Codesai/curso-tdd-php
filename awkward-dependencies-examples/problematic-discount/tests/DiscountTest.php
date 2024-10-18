<?php

namespace tests;

use Codesai\TDD\ProblematicDiscount\Discount;
use Codesai\TDD\ProblematicDiscount\Money;
use PHPUnit\Framework\TestCase;

class DiscountTest extends TestCase
{
    /** @test */
    public function should_change_me()
    {
        $discount = new Discount();

        $net = Money::amount(110);
        $total = $discount->discountFor($net);

        self::assertThat($total, self::equalTo(Money::amount(104.5)));
    }
}