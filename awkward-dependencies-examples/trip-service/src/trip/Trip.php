<?php

namespace Codesai\TDD\TripService\trip;

class Trip
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }
}