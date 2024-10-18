<?php

namespace Codesai\TDD\ProblematicDiscount;

class Money
{
    private float $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public static function oneThousand(): Money {
        return new Money(self::aValueOf(1000));
    }

    public static function oneHundred(): Money {
        return new Money(self::aValueOf(100));
    }

    public static function amount(float $amount): Money {
        return new Money(self::aValueOf($amount));
    }

    public function reduceBy(int $percentage): Money {
        $newValue = $this->value * (100 - $percentage) / 100;
        return new Money($newValue);
    }

    public function moreThan(Money $other): bool {
        return $this->value > $other->value;
    }

    private static function aValueOf(float $amount) : float {
        return $amount;
    }

}