<?php

namespace Codesai\TDD\TripService\user;

use Codesai\TDD\TripService\trip\Trip;

class User
{
    private string $name;
    private array $trips = [];
    private array $friends = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFriends(): array
    {
        return $this->friends;
    }

    public function addFriend(User $user): void
    {
        $this->friends[] = $user;
    }

    public function addTrip(Trip $trip): void
    {
        $this->trips[] = $trip;
    }

    public function getTrips(): array
    {
        return $this->trips;
    }
}